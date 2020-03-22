<?php

namespace App\Http\Controllers\Panel\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Panel\ImagesController;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RestaurantController extends ImagesController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::paginate(5);
        return view('panel.restaurants.all', compact('restaurants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('panel.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $imagePath = "/upload/images/{$year}/{$month}/{$day}/";

        $menu = $request->file('menu');
        $filename = $menu->getClientOriginalName();
        $menu = $menu->move(public_path($imagePath) , $filename);
        $inputs['menu'] = $imagePath.$filename;

        $picture = $request->file('picture');
        $pictureName = $picture->getClientOriginalName();
        $picture = $picture->move(public_path($imagePath) , $pictureName);
        $inputs['picture'] = $imagePath.$pictureName;



//        if ($user->count() < 1) {
        $restaurant = Restaurant::updateOrCreate([
            'name' => $request->restaurantName,
            'title' => $request->title,
            'picture' => $inputs['picture'],
            'menu'=>$inputs['menu'],
            'location' => $request->location,
            'address' => $request->address,
            'description' => $request->description,
            'designerComment' => $request->designerComment,
            'phone' => $request->phone,
            'guild_id' => $request->guild_id,
            'city_id' => $request->city_id,
            'slug' => '1'
        ]);

//        $member = Member::updateOrCreate([
//            'user_id' => $member->id,
//            'birthday' => $request->birthday,
//            'cardNumber' => $request->cardNumber,
//        ]);

        return redirect(route('restaurant.index'));
//        }
//        return redirect()->back();  //todo fail it with sweet alert
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('panel.restaurants.edit',compact('restaurant'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $inputs = $request->except(['_token','_method','menu']);
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $imagePath = "/upload/images/{$year}/{$month}/{$day}/";

        $menu = $request->file('menu');
        $filename = $menu->getClientOriginalName();
        $menu = $menu->move(public_path($imagePath) , $filename);
        $inputs['menu'] = $imagePath.$filename;

        $picture = $request->file('picture');
        $pictureName = $picture->getClientOriginalName();
        $picture = $picture->move(public_path($imagePath) , $pictureName);
        $inputs['picture'] = $imagePath.$pictureName;


        $restaurant->whereId($restaurant->id)->update($inputs);
        return redirect(route('restaurant.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->back();
    }
}
