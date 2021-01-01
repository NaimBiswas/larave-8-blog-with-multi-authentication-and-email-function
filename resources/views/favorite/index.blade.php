@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2 style="font-size: 22px;"
            class="">All Favorite Posts <span class="badge bg-blue ">{{ $posts->count() }}</span></h2>
        @include('include.error')
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-red">
                    <a class="btn btn-danger btn-lg "
                        href="javascript:avoid(0)">Favorite Posts</a>
                </div>

                <div class="body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th style="color: red;"><span class="material-icons">favorite</span></th>
                                {{-- <th><span class="material-icons">comment </span></th> --}}
                                <th style="color: blue;"><span class="material-icons">visibility</span></th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=''; ?>
                            @foreach ($posts as $post)
                            <tr>
                                <td scope="row"><?php echo ++$i; ?></td>
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->fav_to_users()->count() }}</td>
                                <td>{{ $post->view_count }}</td>
                                <td>
                                    @if (Auth::user()->role_id == 1)
                                    <form action="{{ route('admin.favorite.delete', $post->id) }} "
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-warning btn-lg">Remove</button>
                                    </form>
                                    @else

                                    <form action="{{ route('author.favorite.delete', $post->id) }} "
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-warning btn-lg">Remove</button>
                                    </form>
                                    @endif

                                </td>
                            </tr>

                            @endforeach
                            @if($posts->count() == 0)
                            <tr>
                                <td class="text-danger text-center"
                                    colspan="5">No Favorite Post Found! </td>
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
