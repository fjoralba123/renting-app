@extends ('layouts.app')

@section ('content')
<style>
        .pagination{
            float: right;
            margin-top: 10px;
        }
</style>

<form method="get" action="{{ route('properties.index') }}">
<div class="d-flex align-items-center">
<div class="d-inline-block">
<label >Start Date:&nbsp; </label>
  <input type="date" class="custom-select" id="startDate" name="startDate">



</div>

<div class="d-inline-block">
<label >End Date: &nbsp; </label>
  <input type="date" class="custom-select" id="endDate" name="endDate">


    </div>
    </div>
<br>
<!-- <div class="input-group mb-3">

  <select class="custom-select" id="priceRange" name="price">
    <option selected >Price Range</option>
    <option value="99">less than 100</option>
    <option value="100">100-1000</option>
    <option value="1001">more than 1000</option>
  </select>
</div> -->
<div class="d-flex align-items-center">
<div class="d-inline-block">
<label >Min Price :&nbsp; </label>
  <input type="number" class="custom-select"  name="minprice" min="0">

</div>
<div class="d-inline-block">
<label >Max Price :&nbsp; </label>
  <input type="number" class="custom-select"  name="maxprice" min="0">

</div>
    </div>
    <br>

Filter by location:<input type="text" name="address" placeholder="Location">
<button type="submit" class="btn btn-primary" name="search" >Search</button>
<br>
<br>

    </form>

<div class="row">
@foreach($properties as $property)

<div class="card col-md-3" style="width: 18rem;">
  <img class="card-img-top" src="{{asset('storage/'.$property->image)}}" alt="Image here">
  <div class="card-body">
    <h5 class="card-title">{{$property->name}}</h5>
    <p class="card-text">{{$property->description}}</p>
    <a href="{{route('properties.show'
,['property'=>$property->id])}}"   class="btn btn-primary">Details</a>
  </div>
</div>


@endforeach



    </div>

    {{ $properties->links() }}




@endsection