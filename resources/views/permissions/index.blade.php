@extends('layouts.app')

@section('title', 'Permissions')

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
                                        <th>Permission Name</th>
                                        <th>Permission Guard</th>
                                        <th class="w-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->guard_name }}</td>
                                            <td>
                                                <a href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="3">No Permission found</td>
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
                            Buat Permission Baru
                        </div>
                        <div class="card-body">
                            <form action="{{ route('permissions.store') }}" id="form-create-permission" method="POST">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label class="form-label" for="name">Nama Permission</label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        placeholder="permission name">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary ms-auto" id="submit-create-permission"> Submit </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#submit-create-permission').on('click', function(e) {
            e.preventDefault();
            $('#form-create-permission').submit();
        })
    </script>
@endsection
