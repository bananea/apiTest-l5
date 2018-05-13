<?php

namespace App\Http\Controllers\Api\v512300;

use App\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Restaurant::all();
        
        return $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
 
    public function filter(Request $request, Restaurant $restaurant) {
       $restaurant = new Restaurant;
        $restaurantQuery = $restaurant->newQuery();

        // Search for a restaurant based on their name.
        if ($request->has('name')) {
            $restaurantQuery
                    ->where('name', $request->input('name'))
                ->orWhere('name', 'like', '%' . $request->input('name') . '%')
                ;
        }

        if ($request->has('open')) {
            $restaurantQuery->where('open', $request->input('open'));
        }
        $sort = 'bestMatch';
        if ($request->has('sort') && Schema::hasColumn($restaurant->getTable(), $request->input('sort'))) {
                $sort = $request->input('sort');
        }
        return $restaurantQuery->orderBy($sort, 'desc')->select('id', 'name as RestaurantName',  'branch', 'phone', 'email', 'logo', 'address', 'housenumber', 'postcode', 'city', 'latitude', 'longitude', 'url', 'open', 'bestMatch', 'newestScore', 'ratingAverage', 'popularity', 'averageProductPrice', 'deliveryCosts', 'minimumOrderAmount')->get();
    }
}
