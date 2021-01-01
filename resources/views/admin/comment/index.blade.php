@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2 style="font-size: 22px;"
            class="">All Comment <span class="badge bg-blue ">{{ $cmnt->count() }}</span></h2>
        @include('include.error')
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-red">
                    <a class="btn btn-danger btn-lg "
                        href="javascript:avoid(0)">All Comment</a>
                </div>

                <div class="body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Post Title</th>
                                <th>Commet</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=''; ?>
                            @foreach ($cmnt as $comment)
                            <tr>
                                <td scope="row"><?php echo ++$i; ?></td>
                                <td>{{ $comment->user->name }}</td>
                                <td>{{ $comment->post->title }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>
                                    @if (Auth::user()->role_id == 1)
                                    <form action="{{ route('admin.comment.delete', $comment->id) }} "
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-warning btn-lg">Remove</button>
                                    </form>
                                    @else
                                    <form action="{{ route('author.favorite.delete', $comment->id) }} "
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
                            @if($cmnt->count() == 0)
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
