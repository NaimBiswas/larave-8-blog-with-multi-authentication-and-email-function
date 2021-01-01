@if ($errors->any())
@foreach ($errors->all() as $error)

<ol>
    <li style="list-style: none;"
        class="alert alert-warning">{{ $error }}</li>
</ol>


@endforeach
@endif
@if (Session('success'))
<div class="alert alert-success">
    <strong>Well done! </strong>{{ Session('success') }}
</div>
</div>
@endif

@if (Session('warning'))
<div class="alert alert-warning">
    <strong>Stooop! </strong>{{ Session('warning') }}
</div>
</div>
@endif
