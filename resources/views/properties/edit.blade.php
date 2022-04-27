@extends ('layouts.app')

@section('content')
<div class="container card">
        <form action="{{ route('properties.update') }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card-header">{{ __('Update Property') }}</div>

            <div class="card-body">

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="title">{{ __('Property name') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="name" name="name" value="{{$property->name}}" placeholder="{{ __('Property name') }}" required>

                        @error('name')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror </div>
                </div>


                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="description">{{ __('Property Description') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="description" name="description" value="{{$property->description}}" placeholder="{{ __('Property Description') }}" required>

                        @error('description')
 <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror</div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="description">{{ __('Property Address') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="address" name="address" value="{{$property->address}}"placeholder="{{ __('Property Address') }}" required>
                        @error('address')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="type">{{ __('Property Type') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="type" name="type" value="{{$property->type}}" placeholder="{{ __('Property Type') }}" required>
                        @error('type')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
                    </div>
                </div>


                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="price">{{ __('Property Price') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="price" name="price" value="{{$property->price}}" placeholder="{{ __('Property Price') }}" required>
                        @error('price')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
                    </div>
                </div>


                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="area">{{ __('Property area') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="area" name="area" value="{{$property->area}}"placeholder="{{ __('Property Area') }}" required>
                        @error('area')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="area">{{ __('Start date') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" id="startDate" name="startDate" value="{{$property->startDate}}" placeholder="{{ __('StartDate') }}" required>
                        @error('startDate')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="area">{{ __('End date') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" id="endDate" name="endDate" value="{{$property->startDate}}" placeholder="{{ __('EndDate') }}" required>
                        @error('endDate')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
                    </div>
                </div>


                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="image">{{ __('Property Image') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="file" id="image" name="image" placeholder="{{ __('Property Image') }}" >
                        @error('image')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-8 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">{{ __('Update property') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @endsection
