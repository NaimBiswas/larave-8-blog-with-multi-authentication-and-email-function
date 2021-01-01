@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2 style="font-size: 22px;"
            class="">All Author <span class="badge bg-blue ">{{ $author->count() }}</span></h2>
        @include('include.error')
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a class="btn btn-info btn-lg"
                        href="javascript:avoid()">Author List</a>

                </div>

                <div class="body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Images</th>
                                <th>email</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=''; ?>
                            @foreach ($author as $author)
                            <tr>
                                <td scope="row"><?php echo ++$i; ?></td>
                                <td>{{ $author->name }}</td>
                                <td>
                                    <img alt="Profile Image"
                                        style="height: 100px;width:100px;"
                                        class="img-thumbnail img-fluid"
                                        src="{{ asset('storage/users/'. $author->images) }}"
                                        alt="">
                                </td>
                                <td>{{ $author->email  }}</td>
                                <td>{{ $author->created_at }}</td>

                                <td>
                                    <form action="{{ route('admin.author.delete', $author->id) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-warning btn-lg">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if($author->count() == 0)
                            <tr>
                                <td class="text-danger text-center"
                                    colspan="5">No Author Found! </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')


@endpush
