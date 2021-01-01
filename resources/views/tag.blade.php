@push('css')
<link href="{{ asset('assets/fontend') }}/front-page-tag/css/styles.css"
    rel="stylesheet">

<link href="{{ asset('assets/fontend') }}/front-page-tag/css/responsive.css"
    rel="stylesheet">

<link href="{{ asset('assets/fontend') }}/common-css/bootstrap.css"
    rel="stylesheet">

<link href="{{ asset('assets/fontend') }}/common-css/ionicons.css"
    rel="stylesheet">


<link href="{{ asset('assets/fontend') }}/single-post-1/css/styles.css"
    rel="stylesheet">

<link href="{{ asset('assets/fontend') }}/single-post-1/css/responsive.css"
    rel="stylesheet">


<style>
    .fav_post {
        color: red;
    }

    .header-bg {
        background-image: url("{{ asset('storage/tag/images/tag.png') }}");
        height: 479px;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        color: #3aff40;
    }

</style>
@endpush


@extends('layouts.fontend.app')
@section('title' , 'Welcome to My New ')



@section('content')
<div class="header-bg"
    class="slider">
    <div class="display-table  center-text">
        <h1 class="title display-table-cell"><b>{{ Str::upper($tag->name)  }}</b></h1>
    </div>
</div>
@include('include.error')


<section class="recomended-area section">
    <div class="container">
        <div class="row">
            @if ( $posts->count() > 0 )
            @foreach ( $posts as $post)

            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="{{asset('storage/post/images/'. $post->images)}}"
                                alt="Blog Image"></div>

                        <a class="avatar"
                            href="#"><img style="height: 60px; width:60px;"
                                src="{{asset('storage/users/'.$post->user->images)}}"
                                alt="Profile Image"></a>

                        <div class="blog-info">

                            <h4 class="title"><a
                                    href="{{ route('post', ['slug' => $post->slug]) }}"><b>{{ $post->title }}</b></a>
                            </h4>

                            <ul class="post-footer">

                                <li>
                                    @guest
                                    <a href="javascript::avoid(0)"><i
                                            class="ion-heart"></i>{{ $post->fav_to_users->count() }}</a>
                                    @else
                                    <a href="javascript::avoid(0)"
                                        onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();"
                                        class="{{ !Auth::user()->fav_to_posts->where('pivot.post_id', $post->id)->count() == 0 ? 'fav_post': '' }}"><i
                                            class="ion-heart"></i>{{ $post->fav_to_users->count() }}</a>
                                    <form id="favorite-form-{{ $post->id }}"
                                        action="{{ route('post.favorite' , $post->id) }}"
                                        method="post"
                                        style="display:none;">
                                        @csrf
                                    </form>
                                    @endguest
                                </li>
                                <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                            </ul>

                        </div><!-- blog-info -->
                    </div><!-- single-post -->
                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->
            @endforeach
            @else
            <H2 class="text-danger"><strong>Sorry! This tag have no post</strong></H2>
            @endif



        </div><!-- row -->

    </div><!-- container -->
</section>

@endsection
@push('js')
<script src="{{ asset('assets/fontend') }}/common-js/jquery-3.1.1.min.js"></script>

<script src="{{ asset('assets/fontend') }}/common-js/tether.min.js"></script>

<script src="{{ asset('assets/fontend') }}/common-js/bootstrap.js"></script>

<script src="{{ asset('assets/fontend') }}/common-js/scripts.js"></script>
@endpush
