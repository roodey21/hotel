<div class="container-xl">
    <div class="row row-cards">
        @foreach ($users as $user)
            <div class="col-md-6 col-lg-3" id="item-{{ $user->id }}">
                <div class="card">
                    <div class="p-4 text-center card-body">
                        <span class="mb-3 avatar avatar-xl avatar-rounded"
                            style="background-image: url({{ Avatar::create(ucfirst($user->name))->toBase64() }})"></span>
                        <h3 class="m-0 mb-1"><a href="#">{{ $user->name }}</a></h3>
                        <div class="text-muted">{{ $user->email }}</div>
                        <div class="mt-3">
                            <span
                                class="badge bg-purple-lt">{{ $user->roles[0]->name ?? 'tidak ada role yang terpilih' }}</span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a href="#" class="edit-btn card-btn" data-id="{{ $user->id }}">
                            <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                </path>
                                <path d="M16 5l3 3"></path>
                            </svg>
                            Edit
                        </a>
                        @if (!in_array('super admin', $user->getRoleNames()->toArray()))
                            <a href="#" class="card-btn delete-btn text-danger" data-id="{{ $user->id }}">
                                <!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="4" y1="7" x2="20" y2="7"></line>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                </svg>
                                Delete
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {!! $users->links() !!}
</div>
