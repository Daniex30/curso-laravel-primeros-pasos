@extends('dashboard.layout')

@section('content')
<h1>Actualizar Post: {{ $post->title}}</h1>
@include('dashboard.fragment._errors-form')

<form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data"><!--enctype es para subir imagen videos u otro archivo-->

    @method("PUT")
    @include('dashboard.post._form',["task" => "edit"])
    
        <br>
    <a href="{{ route("post.index")}}">Volver</a>
</form>


@endsection