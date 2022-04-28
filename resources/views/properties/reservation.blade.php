@extends ('layouts.app')

@section('content')

<section class="h-100 h-custom" style="background-color: #8fc4b7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
        <div class="card mb-3">
  <img class="card-img-top" src="{{asset('storage/'.$property->image)}}"alt="Card image cap">
  <div class="card-body">
    

  </div>
</div>

          <div class="card-body p-4 p-md-5 ">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 text-center">Make reservation</h3>

            <form class="px-md-2" method="post" action="{{ route('properties.book',['property'=>$property->id]) }}">
@csrf
@isset($availabilityError)
<div class="alert alert-danger" role="alert"><h3>
{{$availabilityError}}</h3>
</div>

@endisset
@isset($availability)
<div class="alert alert-success" role="alert"><h3>
{{$availability}}</h3>
</div>

@endisset


              <div class="form-outline mb-4">

                <label class="form-label" for="form3Example1q" name="fullname">Full Name</label>
                <input type="text" id="form3Example1q" class="form-control" name="fullname"/>
                @error('fullname')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
              </div>
              <div class="form-outline mb-4">

                <label class="form-label" for="form3Example1q" >Email</label>
                <input type="text" id="form3Example1q" class="form-control" name="email"/>
                @error('email')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline datepicker">

                    <label for="exampleDatepicker1" class="form-label" name="check_in">Select a date</label>
                    <input type="date" class="form-control" id="exampleDatepicker1" name="check_in" />

                    @error('check_in')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
                  </div>

                </div>
                <div class="col-md-6 mb-4">
                <div class="form-outline datepicker">

                    <label for="exampleDatepicker1" class="form-label" name="check_out">Select a date</label>
                    <input type="date" class="form-control" id="exampleDatepicker1" name="check_out" />
                    @error('check_out')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
                  </div>


                </div>
              </div>

              <div class="mb-4">
              <label for="exampleDatepicker1" class="form-label" >Number of people</label>
                <input type="number" name="number_of_people" min="0" class="form-control">
                @error('number_of_people')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
              </div>



              <button type="submit" class="btn btn-success btn-lg mb-1 text-right">Book property</button>


            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
