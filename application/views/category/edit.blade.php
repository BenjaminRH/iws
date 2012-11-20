@layout('layouts.main')

@section('content')
{{ HTML::link('admin/categories', '&crarr; back to categories') }}

<h3>Edit category {{ $category->name }}</h3>
@include('category.form')
@endsection