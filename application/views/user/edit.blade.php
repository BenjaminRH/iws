@layout('layouts.main')

@section('content')
{{ HTML::link('admin/users', '&crarr; back to users') }}

<h3>Edit user {{ $user->name }}</h3>
@include('user.form')
@endsection