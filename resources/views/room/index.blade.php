@extends('layouts.app')

@section('title', 'Room Management')

@section('content')
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
                            placeholder="Search user…" /> --}}
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
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row cards">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        <th>Nama Kamar/Tipe Bed</th>
                                        <th>Judul/Subjudul</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="Name">
                                            <div class="d-flex py-1 align-items-center">
                                                <span class="avatar me-2"
                                                    style="background-image: url(./static/default.jpg)"></span>
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">Deluxe King Room</div>
                                                    <div class="text-muted">King Bed</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Title">
                                            <div>Judul untuk tampil di homepage</div>
                                            <div class="text-muted">Subjudul</div>
                                        </td>
                                        <td class="text-muted" data-label="Role">
                                            <span class="badge bg-green-lt">Available</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('rooms.edit', 'haha') }}" class="btn">
                                                    Edit
                                                </a>
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-label="Name">
                                            <div class="d-flex py-1 align-items-center">
                                                <span class="avatar me-2"
                                                    style="background-image: url(./static/avatars/010m.jpg)"></span>
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">Deluxe Twin Room</div>
                                                    <div class="text-muted">Twin Bed</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Title">
                                            <div>Judul untuk tampil di homepage</div>
                                            <div class="text-muted">Subjudul</div>
                                        </td>
                                        <td class="text-muted" data-label="Role">
                                            <span class="badge bg-green-lt">Available</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="#" class="btn">
                                                    Edit
                                                </a>
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Available Room</h3>
                            <table class="table table-sm table-borderless">
                                <thead>
                                    <tr>
                                        <th>Room</th>
                                        <th class="text-end">Available/Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="progressbg">
                                                <div class="progress progressbg-progress">
                                                    <div class="progress-bar bg-primary-lt" style="width: 82.54%"
                                                        role="progressbar" aria-valuenow="82.54" aria-valuemin="0"
                                                        aria-valuemax="100" aria-label="82.54% Complete">
                                                        <span class="visually-hidden">82.54% Complete</span>
                                                    </div>
                                                </div>
                                                <div class="progressbg-text">Superior Room</div>
                                            </div>
                                        </td>
                                        <td class="w-1 fw-bold text-end">45/54</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="progressbg">
                                                <div class="progress progressbg-progress">
                                                    <div class="progress-bar bg-primary-lt" style="width: 76.29%"
                                                        role="progressbar" aria-valuenow="76.29" aria-valuemin="0"
                                                        aria-valuemax="100" aria-label="76.29% Complete">
                                                        <span class="visually-hidden">76.29% Complete</span>
                                                    </div>
                                                </div>
                                                <div class="progressbg-text">Deluxe Twin</div>
                                            </div>
                                        </td>
                                        <td class="w-1 fw-bold text-end">34/43</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="progressbg">
                                                <div class="progress progressbg-progress">
                                                    <div class="progress-bar bg-primary-lt" style="width: 72.65%"
                                                        role="progressbar" aria-valuenow="72.65" aria-valuemin="0"
                                                        aria-valuemax="100" aria-label="72.65% Complete">
                                                        <span class="visually-hidden">72.65% Complete</span>
                                                    </div>
                                                </div>
                                                <div class="progressbg-text">Deluxe King</div>
                                            </div>
                                        </td>
                                        <td class="w-1 fw-bold text-end">23/32</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
