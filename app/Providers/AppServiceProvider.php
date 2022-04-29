<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Property;
use App\Models\Reservation;
use App\Models\Review;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
Gate::define("host",function(User $user){
    return ($user->role=="host");

});
Gate::define("simpleUser",function(User $user){
    return ($user->role=="simpleuser");

});
Gate::define("makeReview",function(User $user,Property $property){

    $reservation=Reservation::where('user_id','=',$user->id)
    ->where('property_id','=',$property->id)->first();
    $review=Review::where('user_id','=',$user->id)->where('property_id','=',$property->id)->first();
    if($review)
    {return false;}

    if($reservation)
    {
        if($reservation->check_out<now()->format('Y-m-d'))
        {return true;}
    }
    return false;

});

        Paginator::useBootstrap();
    }
}
