@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Edite Category Name Or Images</h2>
    </div>

    @include('include.error')
    <div class="row clearfix">
        <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a href="{{ route('admin.category.index') }}"
                        class="btn  btn-lg">Go Back</a>
                </div>
                <div class="body">
                    <form action="{{ route('admin.category.update', $category->id) }} "
                        method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text"
                                    id="email_address"
                                    class="form-control"
                                    name="name"
                                    value="{{ $category->name }}">
                                <label class="form-label">Enter Category Name</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="file"
                                    id="images"
                                    class="form-control"
                                    name="images">
                            </div>
                            <div class="">
                                <img class="img-thumbnail"
                                    src="{{ asset('storage/category/images/'. $category->images) }}"
                                    alt="">
                            </div>

                        </div>

                        <button type="submit"
                            class="btn btn-primary m-t-15 waves-effect">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
