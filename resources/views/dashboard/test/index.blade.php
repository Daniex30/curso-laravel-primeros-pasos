@extends('layout.master')

@section('content')
@include('fragment.subview')
    
{{$name}}
 @forelse($posts as $a)
 <div class="box item">
     <p>{{$a}}</p>
</div>
 @empty
     No hay datos en el array
 @endforelse   

@endsection