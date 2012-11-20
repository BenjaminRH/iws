@layout('layouts.main')

@section('content')
{{ HTML::link('admin/tags', '&crarr; back to tags') }}

<h3>New tag</h3>
@include('tag.form')
@endsection