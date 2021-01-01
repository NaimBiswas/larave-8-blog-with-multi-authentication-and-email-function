@push('css')
<link href="{{ asset('assets/fontend') }}/front-page-category/css/styles.css"
    rel="stylesheet">

<link href="{{ asset('assets/fontend') }}/front-page-category/css/responsive.css"
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
        background-image: url("{{ asset('storage/post/images/'.$post->images) }}");
        height: 479px;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        color: #3aff40;
    }

    .ct-bg {
        background: #820202;
        color: #fff;
    }

</style>
@endpush


@extends('layouts.fontend.app')
@section('title' , 'Welcome to My New Blog')



@section('content')
<div class="header-bg"
    class="slider">
    <div class="display-table  center-text">
        <h1 class="title display-table-cell"><b class="ct-bg">@foreach ($post->categories as $pc)
                {{ Str::upper($pc->name)   }}
                @endforeach</b></h1>
    </div>
</div>
@include('include.error')

<section class="post-area section">
    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-md-12 no-right-padding">

                <div class="main-post">

                    <div class="blog-post-inner">

                        <div class="post-info">

                            <div class="left-area">
                                <a class="avatar"
                                    href="#"><img style="height: 60px; width:60px;"
                                        src="{{ asset('storage/users/'.$post->user->images) }}"
                                        alt="Profile Image"></a>
                            </div>

                            <div class="middle-area">
                                <a class="name"
                                    href="#"><b>{{ $post->user->name }} </b></a>
                                <h6 class="date">on {{ $post->created_at->diffForHumans()  }}</h6>
                            </div>

                        </div><!-- post-info -->

                        <h3 class="
                                        title"><a href="#"><b>{{ $post->title }}</b></a></h3>

                        <p class="para">{!! $post->description !!}</p>
                        <ul class="tags">
                            @foreach ($post->tags as $pt)

                            <li><a target="blank"
                                    href="{{ route('tag', $pt->slug) }}">{{ $pt->name }}</a></li>

                            @endforeach

                        </ul>
                    </div><!-- blog-post-inner -->

                    <div class="post-icons-area">

                        <ul class="post-icons">
                            @guest
                            <li>
                                <a href="javascript::avoid(0)"><i
                                        class="ion-heart"></i>{{ $post->fav_to_users->count() }}</a>
                            </li>


                            @else
                            <li>
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
                            </li>

                            @endguest
                            <li><a href="#"><i class="ion-chatbubble"></i>{{ $post->comments->count() }}</a></li>
                            <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                        </ul>


                        <ul class="icons">
                            <li>SHARE : </li>
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                        </ul>
                    </div>

                    <div class="post-footer post-info">

                        <div class="left-area">
                            <a class="avatar"
                                href="#"><img style="height: 60px; width:60px;"
                                    src="{{ asset('storage/users/'.$post->user->images) }}"
                                    alt="Profile Image"></a>
                        </div>

                        <div class="middle-area">
                            <a class="name"
                                href="#"><b>{{ $post->user->name }}</b> Posted at</a>
                            <h6 class="date">{{ $post->created_at->format('D.M.Y') }}</h6>
                        </div>

                    </div><!-- post-info -->


                </div><!-- main-post -->
            </div><!-- col-lg-8 col-md-12 -->

            <div class="col-lg-4 col-md-12 no-left-padding">

                <div class="single-post info-area">

                    <div class="sidebar-area about-area">
                        @if ($post->user->description)
                        <h4 class="title"><b>ABOUT {{ $post->user->name }}</b></h4>
                        <p>{{ $post->user->description }}</p>
                        @else
                        <h4 class="title"><b>ABOUT {{ $post->user->name }}</b></h4>
                        <span class="text-danger">NO DESCRIPTION FOUND!</span>
                        @endif
                    </div>

                    <div class="sidebar-area subscribe-area">

                        <h4 class="title"><b>SUBSCRIBE</b></h4>
                        <div class="input-area">
                            <form action="{{ route('add.subscriber') }}">
                                <input class="email-input"
                                    name="email"
                                    type="email"
                                    required
                                    placeholder="Enter your email">
                                <button class="submit-btn"
                                    type="submit"><i class="icon ion-ios-email-outline"></i></button>
                            </form>
                        </div>
                    </div><!-- subscribe-area -->

                    <div class="tag-area">

                        <h4 class="title"><b>TAG CLOUD</b></h4>
                        <ul>

                            @foreach ($tags as $tag)
                            <li><a target="blank"
                                    href="{{ route('tag', $tag->slug) }}">{{ Str::upper($tag->name)  }}</a></li>
                            @endforeach


                        </ul>

                    </div><!-- subscribe-area -->
                    <br>
                    <br>

                    <div class="tag-area">

                        <h4 class="title"><b>CATEGORY CLOUD</b></h4>
                        <ul>

                            @foreach ($categories as $category)
                            <li><a target="blank"
                                    href="{{ route('category', $category->slug) }}">{{ Str::upper($category->name)  }}</a>
                            </li>
                            @endforeach


                        </ul>

                    </div><!-- subscribe-area -->

                </div><!-- info-area -->

            </div><!-- col-lg-4 col-md-12 -->

        </div><!-- row -->

    </div><!-- container -->
</section>
<section class="recomended-area section">
    <div class="container">
        <div class="row">
            @foreach ($randomPost as $rP)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="{{asset('storage/post/images/'. $rP->images)}}"
                                alt="Blog Image"></div>

                        <a class="avatar"
                            href="#"><img style="height: 60px; width:60px;"
                                src="{{asset('storage/users/'.$rP->user->images)}}"
                                alt="Profile Image"></a>

                        <div class="blog-info">

                            <h4 class="title"><a
                                    href="{{ route('post', ['slug' => $rP->slug]) }}"><b>{{ $rP->title }}</b></a>
                            </h4>

                            <ul class="post-footer">

                                <li>
                                    @guest
                                    <a href="javascript::avoid(0)"><i
                                            class="ion-heart"></i>{{ $rP->fav_to_users->count() }}</a>
                                    @else

                                    <a href="javascript::avoid(0)"
                                        onclick="document.getElementById('favorite-form-{{ $rP->id }}').submit();"
                                        class="{{ !Auth::user()->fav_to_posts->where('pivot.post_id', $rP->id)->count() == 0 ? 'fav_post': '' }}"><i
                                            class="ion-heart"></i>{{ $rP->fav_to_users->count() }}</a>
                                    <form id="favorite-form-{{ $rP->id }}"
                                        action="{{ route('post.favorite' , $rP->id) }}"
                                        method="post"
                                        style="display:none;">
                                        @csrf
                                    </form>
                                    @endguest
                                </li>
                                <li><a href="#"><i class="ion-chatbubble"></i>{{ $rP->comments->count() }}</a></li>
                                <li><a href="#"><i class="ion-eye"></i>{{ $rP->view_count }}</a></li>
                            </ul>

                        </div><!-- blog-info -->
                    </div><!-- single-post -->
                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

            @endforeach
        </div><!-- row -->

    </div><!-- container -->
</section>
<section class="comment-section">
    <div class="container">
        <h4><b>POST COMMENT</b></h4>
        <div class="row">

            <div class="col-lg-8 col-md-12">
                <div class="comment-form">
                    @guest
                    <h5>Please! <span style="color: blue; text-decoration: underline; font-size:19px; "><a
                                href="{{ route('login') }}">LOG-IN </a>
                        </span> First To Comment This Post</h5>
                    @else
                    <form method="post"
                        action="{{ route('comment.store', $post->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <textarea name="comment"
                                    rows="2"
                                    class="text-area-messge form-control"
                                    placeholder="Enter your comment"
                                    aria-required="true"
                                    aria-invalid="false"></textarea>
                            </div><!-- col-sm-12 -->
                            <div class="col-sm-12">
                                <button class="submit-btn"
                                    type="submit"
                                    id="form-submit"><b>POST COMMENT</b></button>
                            </div><!-- col-sm-12 -->

                        </div><!-- row -->
                    </form>
                    @endguest
                </div><!-- comment-form -->

                <h4><b>COMMENTS({{ $post->comments->count() }})</b></h4>

                <div class="commnets-area">
                    @foreach ($post->comments as $comment)
                    <div class="comment">

                        <div class="post-info">

                            <div class="left-area">
                                <a class="avatar"
                                    href="#"><img src="{{ asset('storage/users/'.$comment->user->images) }}"
                                        alt="Profile Image"></a>
                            </div>

                            <div class="middle-area">
                                <a class="name"
                                    href="#"><b>{{ $comment->user->name }}</b></a>
                                <h6 class="date"> commented on {{ $comment->created_at->diffForHumans() }}</h6>
                            </div>



                        </div><!-- post-info -->

                        <p>{{ $comment->comment }}</p>

                    </div>
                    @endforeach

                    <a class="more-comment-btn"
                        href="javascript:avoid()"><b>@if ($post->comments->count() == 0 )No Comment
                            Found!@endif</b></a><b>

                    </b>
                </div><!-- col-lg-8 col-md-12 --><b>

                </b>
            </div><!-- row --><b>

            </b>
        </div><!-- container --><b>
        </b>
</section>
@endsection
@push('js')
<script src="{{ asset('assets/fontend') }}/common-js/jquery-3.1.1.min.js"></script>

<script src="{{ asset('assets/fontend') }}/common-js/tether.min.js"></script>

<script src="{{ asset('assets/fontend') }}/common-js/bootstrap.js"></script>

<script src="{{ asset('assets/fontend') }}/common-js/scripts.js"></script>
@endpush
