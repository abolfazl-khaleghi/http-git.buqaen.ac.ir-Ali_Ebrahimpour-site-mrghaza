<?php

namespace App\Http\Controllers\Panel\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Panel\ImagesController;
use App\Models\Comment;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RestaurantController extends ImagesController
{
    /**
     * accept comment in panel by admin
     **/
    public function accept($id)
    {
        $comment = Restaurant::where('id', $id)->first();
        $comment->update(['enabled' => 1]);
        return redirect()->back();

    }

    /**
     * reject comment in panel by admin
     **/
    public function unAccept($id)
    {
        $comment = Restaurant::where('id', $id)->first();
        $comment->update(['enabled' => 0]);
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::with('servant')->paginate(10);
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

        //todo use image controoler parent
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $imagePath = "/upload/images/{$year}/{$month}/{$day}/";

        $menu = $request->file('menu');
        $filename = $menu->getClientOriginalName();
        $menu = $menu->move(public_path($imagePath), $filename);
        $inputs['menu'] = $imagePath . $filename;

        $picture = $request->file('picture');
        $pictureName = $picture->getClientOriginalName();
        $picture = $picture->move(public_path($imagePath), $pictureName);
        $inputs['picture'] = $imagePath . $pictureName;


        $restaurant = Restaurant::create([
            'name' => $request->restaurantName,
            'title' => $request->title,
            'picture' => $inputs['picture'],
            'menu' => $inputs['menu'],
            'location' => $request->location,
            'address' => $request->address,
            'description' => $request->description,
            'designerComment' => $request->designerComment,
            'phone' => $request->phone,
            'guild_id' => $request->guild_id,
            'city_id' => $request->city_id,
            'servant_id' => $request->servant_id,
            'slug' => $request->restaurantName,
            'day' => $request->day,
            'hour' => $request->hour,
        ]);


        return redirect(route('restaurant.index'));
//        return redirect()->back();  //todo fail it with sweet alert
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $restaurant =  $restaurant->with('servant')->whereId($restaurant->id)->first();
        return view('panel.restaurants.edit', compact('restaurant'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $inputs = $request->except(['_token', '_method', 'menu']);
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $imagePath = "/upload/images/{$year}/{$month}/{$day}/";

        $menu = $request->file('menu');
        $filename = $menu->getClientOriginalName();
        $menu = $menu->move(public_path($imagePath), $filename);
        $inputs['menu'] = $imagePath . $filename;

        $picture = $request->file('picture');
        $pictureName = $picture->getClientOriginalName();
        $picture = $picture->move(public_path($imagePath), $pictureName);
        $inputs['picture'] = $imagePath . $pictureName;


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
        Comment::whereCommentable_id($restaurant->id)->delete();
        $restaurant->delete();
        return redirect()->back();
    }
}

