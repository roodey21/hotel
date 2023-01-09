@extends('layouts.app')

@section('title', 'Edit Roles')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Tables
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('roles.update', $role->id) }}" method="POST" id="form-edit-role">
                                @method('PATCH')
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="permission">Permission</label>
                                    <table class="table table-striped">
                                        <thead>
                                            <th scope="col" width="1%"><input type="checkbox" name="all_permission">
                                            </th>
                                            <th scope="col" width="20%">Name</th>
                                        </thead>

                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="permission[{{ $permission->name }}]"
                                                        value="{{ $permission->name }}" class='permission'
                                                        {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                                                </td>
                                                <td>{{ $permission->name }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary ms-auto" id="submit-edit-role"> Submit </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('#submit-edit-role').click(function(e) {
            e.preventDefault();
            $('#form-edit-role').submit();
        });
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if ($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', false);
                    });
                }

            });
        });
    </script>
@endpush
