<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Review;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdatePropertyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //paginate(4)

        $properties=Property::query();



                    $startDate=$request->input('startDate');
                    if($startDate){
                        $properties->where("startDate",">=",$startDate);

                    }
                    $endDate=$request->input('endDate');
                    if($endDate){
                        $properties->where("endDate","<=",$endDate);

                    }
                    $address=$request->input('address');
                    if($address){
                        $properties->where("address","LIKE","%{$address}%");
                    }
                    $minprice=$request->input('minprice');
                    $maxprice=$request->input('maxprice');

                    if($minprice){

                            $properties->where("price",">",$minprice);
                        }
                        if($maxprice){

                            $properties->where("price","<",$maxprice);
                        }






 return view('properties.index', ['properties' => $properties->paginate(10)->withQueryString()]);
    }














    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('properties.create');


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePropertyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyRequest $request)
    {
        //create record

        Property::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'address'=>$request->address,
            'type'=>$request->type,

            'price'=>$request->price,
            'user_id'=>$request->user()->id,

            'area'=>$request->area,
            'image'=> $request->image->store('upload','public'),

            'startDate'=>$request->startDate,
            'endDate'=>$request->endDate,

        ]);

                //store the submitted task
                return redirect()->route('properties.index');



    }



    public function getPropertiesByOwner(){

             //dd(request()->user()->properties);



            return view('properties.propertiesByOwner',['properties'=>request()->user()->properties()->paginate(2)]);


        }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
        $reviews=Review::query()
        ->where('property_id','=',$property->id)->orderBy('created_at','DESC' )->get();


        return view('properties.show',compact('property','reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //

        return view('properties.edit',compact('property'));
   


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyRequest  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        //
        {


            $property->name=$request->name;
            $property->description=$request->description;
            $property->address=$request->address;
            $property->type=$request->type;

            $property->price=$request->price;


            $property->area=$request->area;
            $property->image= $request->image->store('upload','public');
            $property->user_id=$request->user()->id;
            $property->startDate=$request->startDate;
            $property->endDate=$request->endDate;

            $property->save();
            return redirect()->route('properties.owner');


            }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
        $property->delete();

        return redirect()->route('properties.owner');


    }

public function makeReservation(Property $property)
{
    if (Gate::allows('simpleUser')) {
    return view("properties.reservation",compact('property'));
}
else {return redirect()->route('login');}
}

public function book(StoreReservationRequest $request,Property $property){


    //check availability of dates
    $propertyStartDate=$property->startDate;
    $propertyEndDate=$property->endDate;
    $checkInDate=$request->check_in;
    $checkOutDate=$request->check_out;

    if(($checkInDate<$propertyStartDate)||($checkOutDate>$propertyEndDate)){
        $availabilityError="Sorry ! The property is not available on these dates!";
        return view("properties.reservation",compact('availabilityError','property'));

    }
    else {
        $availability="Congrats !!! Property is booked for the dates $checkInDate - $checkOutDate.";




    Reservation::create([
        'fullname'=>$request->fullname,
        'email'=>$request->email,
        'check_in'=>$request->check_in,
        'check_out'=>$request->check_out,
        'number_of_people'=>$request->number_of_people,
        'property_id'=>$property->id,
        'user_id'=>$userid=$request->user()->id,
      ]);
    return view("properties.reservation",compact('availability','property'));
    }

}


    //create review

    public function storeReview(Property $property, StoreReviewRequest $request){

        Review::create([
            'property_id'=>$property->id,
            'user_id'=>$request->user()->id,
            'content'=>$request->content,
        ]);
        $reviews=Review::query()
        ->where('property_id','=',$property->id)->orderBy('created_at','DESC' )->get();
        return view('properties.show',compact('property','reviews'));
    }

}
