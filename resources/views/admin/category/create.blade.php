@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Create Tag</h2>
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
                    <form action="{{ route('admin.category.store') }} "
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text"
                                    id="email_address"
                                    class="form-control"
                                    name="name"
                                    value="{{ old('name') }}">
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
                        </div>
                        <button type="submit"
                            class="btn btn-primary m-t-15 waves-effect">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
