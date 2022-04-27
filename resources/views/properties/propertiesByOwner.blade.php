@extends ('layouts.app')
@section ('content')
<div class="row">
@foreach($properties as $property)

<div class="card col-md-3" style="width: 18rem;">
  <img class="card-img-top" src="{{asset('storage/'.$property->image)}}" alt="Image here">
  <div class="card-body">
    <h5 class="card-title">{{$property->name}}</h5>
    <p class="card-text">{{$property->description}}</p>
    <a href="{{route('properties.show'
,['property'=>$property->id])}}"   class="btn btn-primary">Details</a>
<br><br>

        <form method="post" action="{{ route('properties.destroy',['property'=>$property->id]) }}">
    @method("delete")
    @csrf
    <button class="btn btn-danger">Delete</button>
    </form>
       
        <form method="get" action="{{ route('properties.edit',['property'=>$property->id]) }}">
<br>
    @csrf
    <button class="btn btn-info">Update</button>
    </form>


  </div>
</div>


@endforeach
</div>

{{ $properties->links() }}

    @endsection
