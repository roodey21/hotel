@extends('layouts.app')

@section('title', 'Create Room')

@push('css')
<link rel="stylesheet" href="{{ asset('plugin/summernote/summernote.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('plugin/summernote/summernote.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endpush

@section('content')
    <x-toast />
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Rooms
                    </h2>
                    <div class="mt-1 text-muted">Display room's data</div>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        {{-- <input type="text" id="search" class="form-control d-inline-block w-9 me-3"
                        placeholder="Search user…" />
                    <a href="#" class="btn btn-primary me-2" data-bs-toggle="modal"
                        data-bs-target="#modal-create-user">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        New user
                    </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row cards">
                <div class="col-lg-8 order-md-2 order-lg-2 mb-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3>Room Detail</h3>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Nama Kamar</label>
                                            <input type="text" name="" id="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="bed_type">Tipe Kasur</label>
                                            <input type="text" name="bed_type" id="bed_type" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Judul (optional)</label>
                                            <input type="text" name="title" id="title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="subtitle">Subjudul {optional}</label>
                                            <input type="text" name="subtitle" id="subtitle" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="description">Deskripsi</label>
                                    <textarea id="summernote" class="form-control"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Room Photos -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3>Foto Kamar</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="row g-2" id="imageContainer">
                                    <div class="col-6 col-sm-4 imageItem">
                                        <label class="form-imagecheck mb-2">
                                        <input name="form-imagecheck" type="checkbox" value="1" class="form-imagecheck-input">
                                        <span class="form-imagecheck-figure">
                                            <img src="{{ asset('static/default.jpg') }}" alt="Beautiful blonde woman relaxing with a can of coke on a tree stump by the beach" class="form-imagecheck-image">
                                        </span>
                                        </label>
                                    </div>
                                    <div class="col-6 col-sm-4">
                                        <label class="form-imagecheck mb-2">
                                        <input name="form-imagecheck" type="checkbox" value="2" class="form-imagecheck-input" checked="">
                                        <span class="form-imagecheck-figure">
                                            <img src="{{ asset('static/default.jpg') }}" alt="Brainstorming session with creative designers" class="form-imagecheck-image">
                                        </span>
                                        </label>
                                    </div>
                                    <div class="col-6 col-sm-4">
                                        <label class="form-imagecheck mb-2">
                                        <input name="form-imagecheck" type="checkbox" value="3" class="form-imagecheck-input">
                                        <span class="form-imagecheck-figure">
                                            <img src="{{ asset('static/default.jpg') }}" alt="Finances - US Dollars and Bitcoins - Currency - Money" class="form-imagecheck-image">
                                        </span>
                                        </label>
                                    </div>
                                    <div class="col-6 col-sm-4">
                                        <label class="form-imagecheck mb-2">
                                        <input name="form-imagecheck" type="checkbox" value="4" class="form-imagecheck-input" checked="">
                                        <span class="form-imagecheck-figure">
                                            <img src="{{ asset('static/default.jpg') }}" alt="Group of people brainstorming and taking notes" class="form-imagecheck-image">
                                        </span>
                                        </label>
                                    </div>
                                    <div class="col-6 col-sm-4">
                                        <label class="form-imagecheck mb-2">
                                        <input name="form-imagecheck" type="checkbox" value="5" class="form-imagecheck-input">
                                        <span class="form-imagecheck-figure">
                                            <img src="{{ asset('static/default.jpg') }}" alt="Blue sofa with pillows in a designer living room interior" class="form-imagecheck-image">
                                        </span>
                                        </label>
                                    </div>
                                    <div class="col-6 col-sm-4">
                                        <label class="form-imagecheck mb-2">
                                        <input name="form-imagecheck" type="checkbox" value="6" class="form-imagecheck-input">
                                        <span class="form-imagecheck-figure">
                                            <img src="{{ asset('static/default.jpg') }}" alt="Home office desk with Macbook, iPhone, calendar, watch &amp; organizer" class="form-imagecheck-image">
                                        </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Room Photos End -->

                    <!-- Room Price -->
                    <div class="card mb-2">
                        <div class="card-header">
                            <h3>Harga Kamar</h3>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="form-label">Apakah semua hari harganya sama?</div>
                            <label class="form-check form-switch">
                              <input class="form-check-input" id="harga-sama" type="checkbox">
                              <span class="form-check-label">Ya, Jadikan semua hari dalam satu harga</span>
                            </label>
                            <div class="row d-none" id="singlePriceInput">
                                <div class="col-md-6 mt-2 ">
                                    <div class="form-group">
                                        {{-- <label class="form-label" for="singlePrice">Harga</label> --}}
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">Rp</span>
                                            <input id="singlePrice" name="price['single']" placeholder="Masukkan harga" class="form-control">
                                            <span class="input-group-text">/night</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @push('js')
                                <script>
                                    $('#harga-sama').click(function(){
                                        var check = $(this);
                                        var singleInput = $('#singlePriceInput');
                                        var multipleInput = $('#multiplePriceInput');
                                        if(check.is(':checked')){
                                            multipleInput.addClass('d-none');
                                            multipleInput.children('div').removeClass('d-block');
                                            singleInput.addClass('d-block');
                                            singleInput.removeClass('d-none');
                                            // it should show singlePrice input
                                        } else {
                                            // it should show multipleInput input
                                            multipleInput.children('div').addClass('d-block');
                                            multipleInput.removeClass('d-none');
                                            singleInput.removeClass('d-block');
                                            singleInput.addClass('d-none');
                                        }
                                    });
                                </script>
                            @endpush
                        </div>
                    </div>
                    <div class="row" id="multiplePriceInput">
                        @foreach ($priceTypes as $item)
                        <div class="col-4 d-block mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-capitalize">{{ $item->name }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" name="price['{{ $item->name }}']" class="form-control" placeholder="Masukkan harga Weekday">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Room Price End -->

                    @push('css')
                    <link rel="stylesheet" href="{{ asset('assets/css/custom-icons/css/custom-icons.css') }}">
                    @endpush
                    <!--  Room Facilities -->
                    <div class="card mb-2">
                        <div class="card-header">
                            <h3>Fasilitas Kamar</h3>
                        </div>
                        <div class="card-body">
                            {{-- <div class="table">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th width="1%"><input type="checkbox" name="facility_all" id="facility_all"></th>
                                            <th>Nama Fasilitas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($facilities as $facility)
                                            <tr>
                                                <td><input type="checkbox" name="facility_{{ $facility->id }}" id="facility_{{ $facility->id }}"></td>
                                                <td data-label="Name">
                                                    <div class="d-flex py-1 align-items-center">
                                                        <span class="me-2"><i class="{{ $facility->icon }}"></i></span>
                                                        <div class="font-weight-medium">{{ $facility->name }}</div>
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
                            </div> --}}
                            <div class="divide-y">
                                <div class="row">
                                    @forelse ($facilities as $facility)
                                    <div class="col-md-6 col-lg-4">
                                        <label class="row">
                                            <span class="col-auto">
                                                <label class="form-check form-check-single form-switch" style="padding-left: 0.5rem">
                                                <input class="form-check-input" name="facilities[]" value="{{ $facility->id }}" type="checkbox">
                                                </label>
                                            </span>
                                            <span class="col">
                                                <span class="me-2"><i class="{{ $facility->icon }}"></i></span>
                                                <span class="font-weight-medium">{{ $facility->name }}</span>
                                            </span>
                                        </label>
                                    </div>
                                    @empty
                                        <div>
                                            <h4>Belum ada fasilitas kamar yang ditambahkan</h4>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex">
                            <button type="submit" class="btn btn-block btn-primary" style="width: 100%">Simpan</button>
                        </div>
                    </div>
                </div>
                <!-- IMAGE UPLOAD -->
                <div class="col-lg-4 order-md-1 order-lg-2 mb-3">
                    <div class="card">
                        <form enctype="multipart/form-data" id="image-upload">
                            @csrf
                            <div class="card-header">
                                <h3>Image Uploader</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="thumbnail" class="text-muted mb-2">Form ini hanya digunakan untuk upload file gambar saja</label>
                                    <input type="file" name="image" id="thumbnail" class="form-control dropify">
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-block btn-primary">Upload Foto</button>
                            </div>
                        </form>
                        @push('js')
                            <script>
                                $('#image-upload').submit(function(e) {
                                    e.preventDefault();

                                    var url = "{{ route('images.store') }}";
                                    var formData = new FormData(this);
                                    formData.append('image', $(this).find('input[name="image"]')[0].files[0]);

                                    $.ajax({
                                        url: url,
                                        type: 'POST',
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        success: function(res) {
                                            console.log(res);
                                            var imageTag = `<div class="col-6 col-sm-4 imageItem"> <label class="form-imagecheck mb-2"> <input name="form-imagecheck" type="checkbox" value="1" class="form-imagecheck-input"> <span class="form-imagecheck-figure"> <img src="${res.image_url}" alt="${res.image.name}" class="form-imagecheck-image"></span></label></div>`
                                            Swal.fire({
                                                title: res.message,
                                                text: 'Gambar berhasil diupload',
                                                icon: 'success',
                                                confirmButtonText: 'Ok'
                                            }).then((result) => {
                                                $('#imageContainer').append(imageTag);
                                                toastList[0].show();
                                            });
                                        },
                                        error: function(err) {
                                            console.log(err);
                                        }
                                    });
                                });
                                var toastEl = $('.toast');
                                var toast = bootstrap.Toast.getOrCreateInstance(toastEl);
                            </script>
                        @endpush
                    </div>
                </div>
                <!-- IMAGE UPLOAD END -->
            </div>
        </div>
    </div>
@endsection
