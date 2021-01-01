@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2 style="font-size: 22px;"
            class="">{{ Str::ucfirst(Auth::user()->name) }} Posts <span style="font-size: 18px;"
                class="badge bg-purple">{{ $posts->count() }}</span></h2>
        @include('include.error')
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-red">
                    <a style="color:#fff;"
                        class="btn btn-pink btn-lg"
                        href="{{ route('author.post.create') }}">Create post</a>
                </div>

                <div class="body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th> <span class="material-icons"> remove_red_eye</span></th>
                                <th>Status</th>
                                <th>Is Approve</th>
                                <th>Photo</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=''; ?>
                            @foreach ($posts as $post)
                            <tr>
                                <td scope="row"><?php echo ++$i; ?></td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ Str::limit($post->title, 25) }}</td>
                                <td class="badge bg-teal">{{ $post->view_count }}</td>
                                <td>
                                    @if ($post->status == true)
                                    <span class="badge bg-blue">Published</span>
                                    @else
                                    <span class="badge bg-red">Not Published</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($post->is_approved == true)
                                    <span class="badge bg-blue">Approved</span>
                                    @else
                                    <span class="badge bg-red">Pendding</span>
                                    @endif
                                </td>
                                <td>
                                    <img style="height: auto; width:100px;"
                                        class="img-thumbnail"
                                        src="{{ asset('storage/post/images/' . $post->images) }}"
                                        alt="">
                                </td>
                                <td>{{ $post->created_at->format('D - m - y') }}</td>
                                <td>
                                    <form action="{{ route('author.post.destroy', $post->id) }}"
                                        method="POST">
                                        <a href="{{ route('author.post.edit', $post->id  ) }}">
                                            <span style="padding:0;"
                                                class="material-icons ">mode_edit</span></a>

                                        <a href="{{ route('author.post.show', $post->id) }}"><span
                                                class="material-icons">remove_red_eye</span></a>

                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            class=""><span class="material-icons">delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if($posts->count() == 0)
                            <tr>
                                <td class="text-danger text-center"
                                    colspan="9">{{ Str::ucfirst(Auth::user()->name)  }} Have Post Found! </td>
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
