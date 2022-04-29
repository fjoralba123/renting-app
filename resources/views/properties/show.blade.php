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
  <a href="{{route('properties.reservation'
,['property'=>$property->id])}}"   class="btn btn-primary">Book property</a>
<br><br>
    <a href="{{route('properties.index'
)}}" class="card-link">Go to All properties</a>





  </div>
    </div>

    <div style="width: 30rem; ">
  <div >
      @can('makeReview',$property)
      <!-- review form -->
<form method="post" action="{{route('properties.review'
,['property'=>$property->id])}}">
@csrf
@method('put')
    <label for="content" >Your review</label><br>
<textarea cols="40" rows="4" name="content" id="content" class="form-control">Leave a review</textarea>
@error('content')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
<button type="submit" class="btn btn-primary">Post review</button>

</form>
@endcan


<!-- end review form -->
      @if(count($reviews)==0)
      <div class="text-center">
      <h3 class="mb-4">No reviews yet</h3>
      <hr>
    </div>
    @else

    <div class="text-center">

      <h3 class="mb-4">Reviews</h3>
      <hr>
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
     <b>{{ App\Models\User::getNameByID($review->user_id)}}</b>
     <br><br>

      <p class="px-xl-3">
        <p class="fas fa-quote-left pe-2">{{$review->content}}</p>
      </p>
      <i class="fas fa-quote-left pe-2">Created at {{$review->created_at}}</i>
    </div>

      <br><br><hr>
      @endforeach
  </div>
  @endif
    </div>
</div>



@endsection
