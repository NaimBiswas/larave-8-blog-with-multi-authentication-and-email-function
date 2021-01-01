@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">library_books</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL POST</div>
                    <div class="number count-to"
                        data-from="0"
                        data-to="{{ $posts->count() }}"
                        data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">favorite</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL FAVORITE POST</div>
                    <div class="number count-to"
                        data-from="0"
                        data-to="{{ Auth::user()->fav_to_posts()->count() }}"
                        data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">visibility</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL VIEW</div>
                    <div class="number count-to"
                        data-from="0"
                        data-to="{{ $all_views }}"
                        data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">privacy_tip</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL PENDING POST</div>
                    <div class="number count-to"
                        data-from="0"
                        data-to="{{ $all_panding_posts }}"
                        data-speed="1000"
                        data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
@endsection
