<?php

namespace App\Http\Controllers;

use App\Restaurant;
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
 
    /**
	 * @apiDescription Search restaurants on parameters: name
	 * @api {get} /search/filter?name=the&sort=popularity Search restaurants
	 * @apiName Search restaurants
	 * @apiSuccessExample {json} Success-Response: This is a truncate example of what the method returns
	 * HTTP/1.1 200 OK
	 * {
                [
                   {
                       "id": 98001302,
                       "name": "The Nighttest",
                       "branch": "",
                       "phone": "053-4307449",
                       "email": "",
                       "logo": "images\/chains\/nl\/thuisbezorgdnl\/logo.png",
                       "address": "Lasondersingel",
                       "housenumber": "94",
                       "postcode": "7514BV",
                       "city": "Niemandsland",
                       "latitude": "52.2276290",
                       "longitude": "6.8947505",
                       "url": "thenighttest",
                       "open": 1,
                       "bestMatch": 249,
                       "newestScore": 824,
                       "ratingAverage": 0,
                       "popularity": 129,
                       "averageProductPrice": 25,
                       "deliveryCosts": 8.24,
                       "minimumOrderAmount": 8.24
                   },
                   {
                       "id": 98001225,
                       "name": "The Nightshop",
                       "branch": "",
                       "phone": "",
                       "email": "private-email@takeaway.com",
                       "logo": "\/nl\/R\/logo.png",
                       "address": "Lasondersingel",
                       "housenumber": "94",
                       "postcode": "7514BV",
                       "city": "Enschede",
                       "latitude": "52.2275177",
                       "longitude": "6.8947028",
                       "url": "thenightshopenschede",
                       "open": 2,
                       "bestMatch": 242,
                       "newestScore": 1731,
                       "ratingAverage": 4,
                       "popularity": 66,
                       "averageProductPrice": 18.75,
                       "deliveryCosts": 6.69,
                       "minimumOrderAmount": 6.69
                   },
                   {
                       "id": 98001322,
                       "name": "The Time",
                       "branch": "",
                       "phone": "020-6709301",
                       "email": "",
                       "logo": "\/nl\/003\/logo.png",
                       "address": "Tolstraat",
                       "housenumber": "200",
                       "postcode": "1074VN",
                       "city": "Amsterdam",
                       "latitude": "52.3530638",
                       "longitude": "4.9074755",
                       "url": "thetime",
                       "open": 0,
                       "bestMatch": 167,
                       "newestScore": 1026,
                       "ratingAverage": 0,
                       "popularity": 2,
                       "averageProductPrice": 25,
                       "deliveryCosts": 6.09,
                       "minimumOrderAmount": 6.09
                   }
               ]
	 * }
	 *
	 * @apiParamExample {get} Request-Example:
	 *     {
	 *       name=the 
	 *       sort=newestScore -or any field from restaurant db , default bestMatch
	 *     }
	 * @apiSampleRequest /search/filter?name=the&sort=popularity
	 * @apiParam (GET) {String} [name] Restaurant name
	 */
    public function filter(Request $request) {
        $restaurant = new Restaurant;
        $restaurantQuery = $restaurant->newQuery();

        // Search for a user based on their name.
        if ($request->has('name')) {
            $restaurantQuery->where('name', $request->input('name'))
                ->orWhere('name', 'like', '%' . $request->input('name') . '%');
        }

        // Search for a user based on their company.
        if ($request->has('open')) {
            $restaurantQuery->where('open', $request->input('open'));
        }
        $sort = 'bestMatch';
        if ($request->has('sort') && Schema::hasColumn($restaurant->getTable(), $request->input('sort'))) {
                $sort = $request->input('sort');
        }

        // Continue for all of the filters.

        // Get the results and return them.
        return $restaurantQuery->orderBy($sort, 'desc')->get();
    }
}
