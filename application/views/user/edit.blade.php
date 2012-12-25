@layout('layouts.main')

@section('content')
{{ HTML::link('admin/users', '&crarr; back to users') }}

@include('user.form')
@endsection