@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2 style="font-size: 22px;"
            class="">All Subscribers <span class="badge bg-blue ">{{ $subscribers->count() }}</span></h2>
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
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=''; ?>
                            @foreach ($subscribers as $sb)
                            <tr>
                                <td scope="row"><?php echo ++$i; ?></td>
                                <td>{{ $sb->email }}</td>

                                <td>{{ $sb->created_at->format('D - m - y') }}</td>
                                <td>{{ $sb->updated_at->format('D - m - y') }}</td>
                                <td>
                                    <form action="{{ route('admin.subscribers.delete', $sb->id) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-warning btn-lg">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                            @if($subscribers->count() == 0)
                            <tr>
                                <td class="text-danger text-center"
                                    colspan="5">No Tag Found! </td>
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
