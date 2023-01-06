<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dishes.index',['dishes'=>Dish::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dishes.create', ['restaurants'=>Restaurant::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dish = new Dish();
        $dish ->name=$request->name;
        $dish ->description=$request->description;
        $dish ->image=$request->image;
        $dish->restaurant_id=$request->restaurant_id;

        $dish ->save();
        return redirect()->route('dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('dishes.update', ['dish'=>$dish, 'restaurants'=>Restaurant::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $dish ->name=$request->name;
        $dish ->description=$request->description;
        $dish ->image=$request->image;
        $dish->restaurant_id=$request->restaurant_id;

        $img=$request->file('image');
        $img->storeAs('public/dishes',$dish->id.'.'.$img->extension());

        $dish ->save();
        return redirect()->route('dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dishes.index');
    }

    public function restaurantDishes($id)
    {
        return view('dishes.index',['dishes'=>Dish::where('restaurant_id',$id)->get()]);
    }
}
