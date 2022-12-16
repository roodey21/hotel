@extends('layouts.app')

@section('title', 'User Management')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Users
                    </h2>
                    <div class="mt-1 text-muted">Display data users</div>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <input type="text" id="search" class="form-control d-inline-block w-9 me-3"
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
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        @include('users.table')
    </div>
    <!-- modal create user start -->
    <div class="modal modal-blur fade" id="modal-create-user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="form-user-create">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="password"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Confirmation Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="confirm password" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section bottom / second modal-body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select select" name="role" id="role">
                                        <option>No one selected</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Roles doesn't exsist on lists?</label>
                                    <button type="button" class="btn create-role btn-info">Create New One</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <a href="#" class="btn btn-primary ms-auto" id="submit-user-create">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Create new user
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal create user end -->
    <!-- modal create user start -->
    <div class="modal modal-blur fade" id="modal-edit-user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-user-edit">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="hidden" name="id" id="user_id">
                                    <input type="text" name="name" id="user_name" class="form-control"
                                        placeholder="Name" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" id="user_email" class="form-control"
                                        placeholder="Email" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section bottom / second modal-body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select select" name="role" id="user_role">
                                        <option>No one selected</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Roles doesn't exsist on lists?</label>
                                    <button type="text" class="btn create-role btn-info">Create New One</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <a href="#" class="btn btn-primary ms-auto" id="submit-user-edit">
                            Submit
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal create user end -->

    <!-- modal delete confirmation start -->
    {{-- <div class="modal" tabindex="-1" id="modal-delete-user">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="py-4 text-center modal-body">
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-2 icon text-danger icon-lg" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 9v2m0 4v.01" />
                        <path
                            d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                    </svg>
                    <h3>Are you sure?</h3>
                    <div class="text-muted">Do you really want to remove these user? What you've done cannot be undone.
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <form id="form-delete-user">
                                <input type="hidden" name="user_id">
                                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        Cancel
                                    </a></div>
                                <div class="col"><button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                        Delete
                                    </button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- modal delete confirmation end -->
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('libs/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/function/createUser.js') }}"></script>
    <script src="{{ asset('js/function/deleteUser.js') }}"></script>
    <script src="{{ asset('js/function/editUser.js') }}"></script>
    <script src="{{ asset('js/function/getUser.js') }}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            // var page = url.split('page=')[1]

            getUsers(url);
            window.history.pushState("", "", url);
        });

        $('#search').on('change', function(e) {
            if (e.target.value.length > 0) {
                console.log(e.target.value.length);

            }
        });

        $('.create-role').on('click', function(e) {
            e.preventDefault();
            let parentForm = $(this).closest('form'); // form pertama yang menjadi parentnya
            console.log(parentForm);
            Swal.fire({
                title: 'Confirm leaving this page?',
                text: "your data will not be saved",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, go to create role page!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "{{ route('roles.index') }}";
                }
            });
        });
    </script>
@endsection
