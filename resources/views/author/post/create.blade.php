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
        <h2>Create Post</h2>
    </div>

    @include('include.error')
    <div class="row clearfix">
        <form action="{{ route('author.post.store') }} "
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <a href="{{ route('admin.post.index') }}"
                            class="btn  btn-lg">Go Back</a>
                    </div>
                    <div class="body">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text"
                                    id="email_address"
                                    class="form-control"
                                    name="title"
                                    value="{{ old('title') }}"
                                    required>
                                <label class="form-label">Enter Post Title</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label for="images">Post Image</label>
                            <div class="form-line">
                                <input type="file"
                                    id="images"
                                    class="form-control"
                                    name="images"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="">
                                <input type="checkbox"
                                    class="filled-in"
                                    id="ig_checkbox"
                                    value="1"
                                    name="status">
                                <label class="fw-bold"
                                    for="ig_checkbox">Publish</label>
                            </span>
                        </div>
                        <button type="submit"
                            class="btn btn-primary m-t-10 waves-effect">Submit</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <H2>Select Tag & Category</H2>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            <label for="category">Select Category</label>
                            <select multiple
                                class="form-control"
                                name="categories[]"
                                id="category"
                                required>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ Str::ucfirst($category->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tag">Select Tags</label>
                            <select multiple
                                class="form-control"
                                name="tags[]"
                                id="tag"
                                required>
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ Str::ucfirst($tag->name)  }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <H2>Post Description</H2>
                    </div>
                    <textarea class="form-control"
                        name="description"
                        id="summernote"
                        cols="30"
                        rows="10"
                        required>{{ old('description') }}</textarea>
                </div>
            </div>
    </div>
    </form>
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
