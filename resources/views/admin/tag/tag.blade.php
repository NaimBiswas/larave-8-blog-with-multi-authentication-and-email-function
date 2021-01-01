@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2 style="font-size: 22px;"
            class="">All Tag <span class="badge bg-blue ">{{ $tags->count() }}</span></h2>
        @include('include.error')
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a class="btn btn-info btn-lg"
                        href="{{ route('admin.tag.create') }}">Create Tag</a>

                </div>

                <div class="body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Posts</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=''; ?>
                            @foreach ($tags as $tag)
                            <tr>
                                <td scope="row"><?php echo ++$i; ?></td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->slug }}</td>
                                <td class="badge bg-pink">{{ $tag->posts->count() }}</td>
                                <td>{{ $tag->created_at->format('D - m - y') }}</td>
                                <td>{{ $tag->updated_at->format('D - m - y') }}</td>
                                <td>
                                    <form action="{{ route('admin.tag.destroy', $tag->id) }}"
                                        method="POST">
                                        <a href="{{ route('admin.tag.edit',base64_encode($tag->id)  ) }}"
                                            class="
                                            btn
                                            bg-teal
                                            btn-lg
                                            waves-effect">Edite</a>

                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-warning btn-lg">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                            @if($tags->count() == 0)
                            <tr>
                                <td class="text-danger text-center"
                                    colspan="7">No Tag Found! </td>
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
