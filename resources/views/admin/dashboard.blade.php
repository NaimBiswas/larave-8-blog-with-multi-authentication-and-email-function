@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">speaker_notes</i>
                </div>
                <div class="content">
                    <div class="text">ALL POST</div>
                    <div class="number count-to"
                        data-from="0"
                        data-to="{{ $posts->count() }}"
                        data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">report_off</i>
                </div>
                <div class="content">
                    <div class="text">ALL PENDING POST</div>
                    <div class="number count-to"
                        data-from="0"
                        data-to="{{ $total_pending_post }}"
                        data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-red hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">error</i>
                </div>
                <div class="content">
                    <div class="text">NOT PUBLISHED</div>
                    <div class="number count-to"
                        data-from="0"
                        data-to="{{ $total_notpublished_post }}"
                        data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-purple hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">visibility</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL POST VIEW</div>
                    <div class="number count-to"
                        data-from="0"
                        data-to="{{ $total_post_view }}"
                        data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-blue hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">groups</i>
                </div>
                <div class="content">
                    <div class="text">ALL ADMIN</div>
                    <div class="number count-to"
                        data-from="0"
                        data-to="{{ $admin }}"
                        data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-teal hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">group</i>
                </div>
                <div class="content">
                    <div class="text">ALL AUTHOR</div>
                    <div class="number count-to"
                        data-from="0"
                        data-to="{{ $authors }}"
                        data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">subscriptions</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL SUBSCRIBER</div>
                    <div class="number count-to"
                        data-from="0"
                        data-to="{{ $total_subscriber }}"
                        data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">comment</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL COMMENT</div>
                    <div class="number count-to"
                        data-from="0"
                        data-to="{{ $total_comment }}"
                        data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">favorite</i>
                        </div>
                        <div class="content">
                            <div class="text">USER FAVORITE</div>
                            <div class="number count-to"
                                data-from="0"
                                data-to="{{ Auth::user()->fav_to_posts()->count() }}"
                                data-speed="1000"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">category</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL CATEGORY</div>
                            <div class="number count-to"
                                data-from="0"
                                data-to="{{ $total_category }}"
                                data-speed="1000"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">tags</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL TAGS</div>
                            <div class="number count-to"
                                data-from="0"
                                data-to="{{ $total_tags }}"
                                data-speed="1000"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box bg-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">fiber_new</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW USERS</div>
                            <div class="number count-to"
                                data-from="0"
                                data-to="{{ $new_user }}"
                                data-speed="1000"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                {{-- POPULAR POST AREA  --}}
                <div class="col-xs-12 col-sm-3 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>POPULAR POSTS</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Views</th>
                                            <th>Comment</th>
                                            <th>Favorites</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($popular_posts as $key=>$post)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ Str::limit($post->title, 30)  }}</td>
                                            <td>{{ $post->view_count }}</td>
                                            <td>{{ $post->comments()->count() }}</td>
                                            <td>{{ $post->fav_to_users()->count() }}</td>
                                            <td>@if ($post->status == true)
                                                <span class="badge bg-light-green">Published</span>
                                                @else
                                                <span class="badge bg-orange">Not Published</span>
                                                @endif

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Active user area  --}}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>MOST ACTIVE USERS</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Post</th>
                                    <th>Comment</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($active_user as $key=>$user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Str::ucfirst($user->name)  }}</td>
                                    <td> <img class="img-fluid img-thumbnail"
                                            style="height:100px; width:100px;"
                                            src="{{ asset('storage/users/'.$user->images) }}"
                                            alt="Profile Images">
                                    </td>
                                    <td>{{ $user->posts()->count() }}</td>
                                    <td>{{ $user->comments()->count() }}</td>
                                    <td>@if ($user->role_id == 1)
                                        <span class="badge bg-purple">Admin</span>
                                        @else
                                        <span class="badge bg-teal">Author</span>
                                        @endif </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- #END# Widgets -->

</div>
@endsection
