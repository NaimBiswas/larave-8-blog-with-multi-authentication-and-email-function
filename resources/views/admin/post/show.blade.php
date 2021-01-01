@extends('layouts.backend.app')
@push('css')

<!-- Dropzone Css -->
<link href="{{ asset('assets/backend') }}/plugins/dropzone/dropzone.css"
    rel="stylesheet">

<!-- Multi Select Css -->
<link href="{{ asset('assets/backend') }}/plugins/multi-select/css/multi-select.css"
    rel="stylesheet">

<!-- Bootstrap Spinner Css -->
<link href="{{ asset('assets/backend') }}/plugins/jquery-spinner/css/bootstrap-spinner.css"
    rel="stylesheet">

<!-- Bootstrap Tagsinput Css -->
<link href="{{ asset('assets/backend') }}/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css"
    rel="stylesheet">

<!-- Bootstrap Select Css -->
<link href="{{ asset('assets/backend') }}/plugins/bootstrap-select/css/bootstrap-select.css"
    rel="stylesheet" />

<!-- noUISlider Css -->
<link href="{{ asset('assets/backend') }}/plugins/nouislider/nouislider.min.css"
    rel="stylesheet" />
@endpush
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Show Post</h2>

    </div>
    @include('include.error')
    <div class="row clearfix">

        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-red">
                    <a href="{{ route('admin.post.index') }}"
                        class="btn bg-pink  btn-lg">Go Back</a>
                    @if($post->is_approved == true )

                    <button name="approved"
                        style="float:right"
                        type="submit"
                        class="btn btn-success btn-lg float-right">Approved</button>
                    @else
                    <a style="float:right"
                        href="{{ route('admin.post.approved', $post->id)  }}"
                        class="btn btn-warning btn-lg"> Approve
                    </a>
                    @endif
                </div>
                <div class="body">
                    <div class="form-group form-float">
                        <div class="row">
                            <label class="col-sm-3">Post Title:</label>
                            <div class="col-sm-9">
                                <p class="">{{ $post->title }}</p>
                                <span>Published By <b>{{ $post->user->name }}.
                                        on {{ $post->created_at->format('D-M-y') }}</b></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float row">
                        <label class='col-sm-3'
                            for="images">Post Image</label>
                        <div class="col-sm-9">
                            <img style="height: 276px; width: 400px;"
                                class="img-thumbnail"
                                src="{{ asset('storage/post/images/'.$post->images) }}"
                                alt="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <span class="row">
                            <label class="col-sm-3">Post Status:</label>
                            <div class="col-sm-9 fw-blod">
                                {{ $post->status == true ? 'Published' : 'Not Publishsed' }}
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-purple">
                    <H2>Categories</H2>
                </div>
                <div class="body">
                    <div class="form-group ">
                        <span class="row">
                            @foreach ($post->categories as $pc)
                            <div class=" badge bg-purple">{{ $pc->name }}</div>
                            @endforeach
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-teal">
                    <H2>Tags</H2>
                </div>
                <div class="body">
                    <div class="form-group ">
                        <span class="row">
                            @foreach ($post->tags as $pt)
                            <div class=" badge bg-teal">{{ $pt->name }}</div>
                            @endforeach
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card ">
                <div class="header bg-pink">
                    <H2>Post Description</H2>
                </div>
                <span class="row">
                    <label class="col-sm-2"
                        for="categories">Description:</label>
                    <div class="col-sm-10">
                        <p>{!! $post->description !!}</p>
                    </div>
                </span>
            </div>
        </div>

    </div>
</div>
</div>

@endsection
@push('js')
<!-- Dropzone Plugin Js -->

<!-- Input Mask Plugin Js -->
<script src="{{ asset('assets/backend') }}/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<!-- Multi Select Plugin Js -->
<script src="{{ asset('assets/backend') }}/plugins/multi-select/js/jquery.multi-select.js"></script>


@endpush
