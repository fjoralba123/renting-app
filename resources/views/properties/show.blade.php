@extends('layouts.app')

@section('content')
<div class="card mx-auto" style="width: 40rem; ">
  <img class="card-img-top" src="{{asset('storage/'.$property->image)}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$property->name}}</h5>
    <p class="card-text">{{$property->description}}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><b>Address :</b>{{$property->address}}</li>
    <li class="list-group-item"><b> Area:</b>{{$property->area}} m2</li>
    <li class="list-group-item"><b>Category :</b> {{$property->type}}</li>
    <li class="list-group-item"><b>Price :</b> {{$property->price}} $</li>
  </ul>
  <div class="card-body">
    <a href="{{route('properties.index'
)}}" class="card-link">Go to All properties</a>

  </div>
</div>



@endsection
