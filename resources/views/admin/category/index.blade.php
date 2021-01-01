@extends('layouts.backend.app');
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2 style="font-size: 22px;"
            class="">All Category <span class="badge bg-blue ">{{ $categories->count() }}</span></h2>
    </div>
    @include('include.error')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a class="btn btn-info btn-lg"
                        href="{{ route('admin.category.create') }}">Create Category</a>
                </div>

                <div class="body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Posts</th>
                                <th>Images</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=''; ?>
                            @foreach ($categories as $category)

                            <tr>
                                <td scope="row"><?php echo ++$i; ?></td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td class="badge bg-teal">{{ $category->posts->count() }}</td>
                                <td>
                                    <img style="height: auto; width:100px;"
                                        class="img-thumbnail"
                                        src="{{ asset('storage/category/images/' . $category->images) }}"
                                        alt="">
                                </td>
                                <td>{{ $category->created_at->format('D - m - y') }}</td>
                                <td>{{ $category->updated_at->format('D - m - y') }}</td>
                                <td>
                                    <form action="{{ route('admin.category.destroy', $category->id) }}"
                                        method="POST">
                                        <a href="{{ route('admin.category.edit',base64_encode($category->id)  ) }}"
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
                            @if($categories->count() == 0)
                            <tr>
                                <td class="text-danger text-center"
                                    colspan="7">No Category Found! </td>
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
