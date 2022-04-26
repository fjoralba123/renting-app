<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


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






 return view('properties.index', ['properties' => $properties->paginate(3)]);
    }














    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

if(Auth::user()->is_owner)
        {return view('properties.create');}
        else {return view('properties.accessDenied');}

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
        //only logged
             //dd(request()->user()->properties);
             if(Auth::user()->is_owner)
        {

            return view('properties.propertiesByOwner',['properties'=>request()->user()->properties()->paginate(1)]);

        }
        else {return view('properties.accessDenied');}}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //

        return view('properties.show',compact('property'));
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
        $property=Property::findOrFail(\request()->id);

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



}
