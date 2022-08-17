@extends('dashboard.layout')

@section('content')
<h1>Crear Post</h1>
@include('dashboard.fragment._errors-form')

<form action="{{ route('post.store') }}" method="post">
        @include('dashboard.post._form')
        <br>
   
<a href="{{ route("post.index")}}">Volver</a>
</form>
@endsection