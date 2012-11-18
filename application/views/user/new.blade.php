@layout('layouts.main')

@section('content')
{{ HTML::link('admin/users', '&crarr; back to users') }}

<h3>New user</h3>
@include('user.form')
@endsection