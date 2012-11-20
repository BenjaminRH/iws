@layout('layouts.main')

@section('content')
{{ HTML::link('admin/categories', '&crarr; back to categories') }}

<h3>New category</h3>
@include('category.form')
@endsection