@extends('layouts.app')

@section('title', 'Roles')

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
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Role Name</th>
                                        <th class="w-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <a class="pe-2" href="{{ route('roles.edit', $role->id) }}">Edit</a><a
                                                    class="text-danger"
                                                    href="{{ route('roles.destroy', $role->id) }}">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="2">No roles found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Buat Roles Baru
                        </div>
                        <div class="card-body">
                            <form action="{{ route('roles.store') }}" id="form-create-role" method="POST">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label class="form-label" for="name">Nama roles</label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        placeholder="roles name">
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                                        <th scope="col" width="20%">Name</th>
                                        <th scope="col" width="1%">Guard</th>
                                    </thead>

                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="permission[{{ $permission->name }}]"
                                                    value="{{ $permission->name }}" class='permission'>
                                            </td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->guard_name }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </form>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary ms-auto" id="submit-create-role"> Submit </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#submit-create-role').click(function(e) {
            e.preventDefault();
            $('#form-create-role').submit();
        });
    </script>
@endsection
