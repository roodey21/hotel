@extends('layouts.app')

@section('title', 'Room Facilities')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Room Facilities
                    </h2>
                    <div class="mt-1 text-muted">Display room's facilities data</div>
                </div>
                <!-- Page title actions -->
                {{-- <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <a href="{{ route('rooms.create') }}" class="btn btn-primary me-2">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            New Room
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row cards">
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Nama Fasilitas</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($facilities as $facility)
                                        <tr>
                                            <td data-label="Name">
                                                <div class="d-flex py-1 align-items-center">
                                                    <span class="me-2"><i class="{{ $facility->icon }}"></i></span>
                                                    <div class="font-weight-medium">{{ $facility->name }}</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-toggle="dropdown">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a data-id="{{ $facility->id }}" class="dropdown-item edit-btn"
                                                                href="#">
                                                                Edit
                                                            </a>
                                                            <a data-id="{{ $facility->id }}"
                                                                class="dropdown-item delete-btn" href="#">
                                                                Hapus
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <form method="POST" id="deleteFacility">
                                @csrf
                                @method('DELETE')
                            </form>
                            @push('js')
                                <script>
                                    $('.edit-btn').on('click', function(e) {
                                        e.preventDefault();
                                        const id = $(this).data('id');
                                        $.ajax({
                                            url: '/rooms/facilities/' + id + '/edit',
                                            method: 'GET',
                                            success: function(res) {
                                                $('input[name="name"]').val(res.name);
                                                $('input[name="icon"]').val(res.icon);
                                                let icon = `<i class="${res.icon}"></i>`;
                                                $('#icon-preview').html(icon);
                                                $('#formStore').attr('action', `/rooms/facilities/${id}`);
                                                $('#formStore > input[name="_method"]').val('PATCH');
                                                $('#clearButton').removeClass('d-none');
                                            },
                                            error: function(err) {
                                                console.log(err);
                                            }
                                        });
                                    });

                                    $('.delete-btn').on('click', function(e) {
                                        e.preventDefault();
                                        const id = $(this).data('id');
                                        Swal.fire({
                                            title: 'Apakah anda yakin?',
                                            text: "Data yang dihapus tidak dapat dikembalikan!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, delete it!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                var form = $('#deleteFacility');
                                                form.attr('action', '/rooms/facilities/' + id);
                                                form.submit();
                                            }
                                        });
                                    })
                                </script>
                            @endpush
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <h3 class="card-header">Buat Fasilitas Kamar Baru</h3>
                        <form action="{{ route('rooms.facilities.store') }}" id="formStore" method="POST">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <div class="form-group mb-2">
                                    <label for="name" class="text-label">Nama Fasilitas</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" value="{{ old('name') }}" required>
                                    <!-- error message -->
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="icon-preview" class="text-label">Icon</label>
                                    <input type="hidden" value="{{ old('value') ?? 'icon-spa-check_1' }}" id="icon"
                                        name="icon" class="form-control">
                                    <div id="icon-preview" class="demo-icon-list-item"
                                        style="font-size: 2.5rem; border: 0px;">
                                        <i class="icon-spa-check_2"></i>
                                    </div>
                                </div>
                                <h5>Pilih icon dari list dibawah ini, icon default akan dipilih bila anda tidak
                                    memilihnya</h5>
                                <div class="row overflow-auto" style="height: 30vh">
                                    <div class="col">
                                        <div class="demo-icons-list-wrap">
                                            <div class="demo-icons-list">
                                                <a href="#" class="demo-icons-list-item">
                                                    <i class="icon-spa-calendar_2"></i>calendar 2
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-airplane"></i>airplane
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-bus"></i>bus
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-candles"></i>candles
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-car"></i>car
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-cartified_massagist"></i>cartified
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-check_1"></i>check 1
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-check_2"></i>check 2
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-contact_phone_1"></i>contact phone 1
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-credit_card"></i>credit card
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-disable"></i>disable
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-dog"></i>dog
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-dress"></i>dress
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-metro"></i>metro
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-oil"></i>oil
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-parking"></i>parking
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-tisane"></i>tisane
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-towels"></i>towels
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-spa-train"></i>train
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-add_bed"></i>add bed
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-airplane"></i>airplane
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-baggage_1"></i>baggage 1
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-baggage_2"></i>baggage 2
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-baggage_3"></i>baggage 3
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-bottle"></i>bottle
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-calendar_3"></i>calendar 3
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-calendar_2"></i>calendar 2
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-car"></i>car
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-coffee"></i>coffee
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-condition"></i>condition
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-conversion"></i>conversion
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-condition"></i>condition
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-credit_card"></i>credit card
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-disable"></i>disable
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-dog"></i>dog
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-double_bed_2"></i>double bed 2
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-double_bed"></i>double bed
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-drink"></i>drink
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-gym"></i>gym
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-hairdryer"></i>hairdryer
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-info"></i>info
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-loundry"></i>loundry
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-nosmoking"></i>nosmoking
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-parking"></i>parking
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-patio"></i>patio
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-reception"></i>reception
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-restaurant"></i>restaurant
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-room_service"></i>room service
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-safety_box"></i>safety box
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-shower"></i>shower
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-single_bed"></i>single bed
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-swimming_pool"></i>swimming pool
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-train"></i>train
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-tv"></i>tv
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-wifi"></i>wifi
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="icon-hotel-calendar_1"></i>calendar 1
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-3-guests"></i>3-guests
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-4-guests"></i>4-guests
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-air-condition"></i>air condition
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-bath-tub"></i>bath-tub
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-breakfast"></i>breakfast
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-cocktail"></i>cocktail
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-double-bed"></i>double bed
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-gym"></i>gym
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-hairdryer"></i>hairdryer
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-laundry"></i>laundry
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-luggage"></i>luggage
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-private-parking"></i>private parking
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-reception"></i>reception
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-shower"></i>shower
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-single-bed"></i>single bed
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-swimming-pool"></i>swimming pool
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-television"></i>television
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-washing-machine"></i>washing machine
                                                </a>
                                                <a href="" class="demo-icons-list-item">
                                                    <i class="customicon-wifi"></i>wifi
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex">
                                <button type="reset" id="clearButton"
                                    class="btn w-100 btn-danger d-none me-2">Batal</button>
                                <button type="submit" class="btn w-100 btn-primary">Simpan</button>
                                @push('js')
                                    <script>
                                        $('#clearButton').on('click', function() {
                                            $(this).addClass('d-none');
                                            $('input[name="name"]').val('');
                                            $('#formStore').attr('action', '{{ route('rooms.facilities.store') }}');
                                            $('#formStore > input[name="_method"]').val('POST');
                                        });
                                    </script>
                                @endpush
                            </div>
                        </form>
                    </div>
                    @push('css')
                        <link rel="stylesheet" href="{{ asset('assets/css/custom-icons/css/custom-icons.css') }}">
                        <style>
                            .demo-icons-list-item i {
                                font-size: 2rem;
                            }

                            #icon-preview {
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: center;
                                height: 7rem;
                                text-align: center;
                                padding: .5rem;
                                border-right: 1px solid var(--tblr-border-color);
                                border-bottom: 1px solid var(--tblr-border-color);
                                color: inherit;
                                cursor: pointer
                            }
                        </style>
                    @endpush
                    @push('js')
                        <script>
                            $(document).ready(function() {
                                $('.demo-icons-list-item').click(function(e) {
                                    e.preventDefault();
                                    var tag = $(this).find('i');
                                    $('#icon-preview').empty();
                                    $('#icon-preview').append(tag.clone());
                                    $('#icon').val(tag.attr('class'));
                                    // var icon = $(this).find('i').attr('class');
                                    // $('#icon').val(icon);
                                    // $('#icon-preview').attr('class', icon);
                                });
                            });
                        </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // show toastr when store data was success
        @if (session('success'))
            Swal.fire({
                title: '{{ session('success') }}',
                icon: 'success',
            });
        @endif
    </script>
@endpush
