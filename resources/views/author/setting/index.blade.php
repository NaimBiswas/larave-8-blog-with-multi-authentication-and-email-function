@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2 style="font-size: 22px;"
            class="">Profile Setting
        </h2>
        @include('include.error')
    </div>


    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Update Your Profile
                    </h2>
                </div>
                <div class="body">
                    <form action="{{ route('author.profile.update', Auth::user()->id) }}"
                        method="post"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <label for="name">Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text"
                                    id="name"
                                    class="form-control"
                                    name="name"
                                    value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <label for="email_address">Email Address</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="email"
                                    id="email_address"
                                    class="form-control"
                                    name="email"
                                    placeholder="Enter your email address"
                                    value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <label for="pp">Profile Picture</label>
                        <div class="form-group">
                            <div class="">
                                <input type="file"
                                    id="pp"
                                    name="images"
                                    class="form-control">
                            </div>
                            <td>
                                <img style="height: 276px; width: 400px;"
                                    class="img-thumbnail"
                                    src="{{ asset('storage/users/'.Auth::user()->images)  }}"
                                    alt="">
                            </td>
                        </div>

                        <br>
                        <button type="submit"
                            class="btn btn-primary m-t-15 waves-effect">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Update Your Passowrd
                    </h2>
                </div>
                <div class="body">
                    <form action="{{ route('author.password.update', Auth::user()->id) }}"
                        method="post">
                        @method('PUT')
                        @csrf
                        <label for="oldpassowrd">Enter Your Current Password</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password"
                                    id="oldpassowrd"
                                    class="form-control"
                                    name="oldpassword"
                                    placeholder="Enter Your Current Password">
                            </div>
                            <br>
                            <label for="newpassowrd">Enter Your New Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password"
                                        id="newpassowrd"
                                        class="form-control"
                                        name="password"
                                        placeholder="Enter Your New Password">
                                </div>
                                <br>
                                <label for="compassowrd">Comfirm New Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password"
                                            id="compassowrd"
                                            class="form-control"
                                            name="comfirm_password"
                                            placeholder="Comfirm Your Password">
                                    </div>
                                    <br>
                                    <button type="submit"
                                        class="btn btn-primary m-t-15 waves-effect">Update Passowrd
                                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')


@endpush
