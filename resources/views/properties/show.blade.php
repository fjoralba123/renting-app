@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div style="width: 30rem; ">


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

    <div style="width: 30rem; ">
  <div >
      @if(count($reviews)==0)
      <div class="text-center">
      <h3 class="mb-4">No reviews yet</h3>
    </div>
    @else

    <div class="text-center">
      <h3 class="mb-4">Reviews</h3>
    </div>
    </div>

  <div id="reviews" class="row text-center">

      @foreach($reviews as $review)
      <div >
      <div class="d-flex justify-content-center mb-4">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp"
          class="rounded-circle shadow-1-strong" width="150" height="150" />
      </div>
      <i>Review by </i>
      <h5 class="mb-3"> <b>{{ App\Models\User::getNameByID($review->user_id)}}</b></h5>

      <p class="px-xl-3">
        <i class="fas fa-quote-left pe-2">{{$review->content}}</i>
      </p>
    </div>

      <br><br>
      @endforeach
  </div>
  @endif
    </div>
</div>



@endsection
