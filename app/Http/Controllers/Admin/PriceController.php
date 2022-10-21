<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Level;
use App\Models\Price;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();
        return view('admin.prices.index',compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'name'=>'required|unique:prices',
           'value'=>'required|numeric'

           ]);
       $request['slug']= Str::slug($request->name);
       $prices = Price::create($request->all());
       return redirect()->route('admin.prices.index')->with('info','Nivel creada satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  Price $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        return view('admin.prices.show',compact('price'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Price $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        return view('admin.prices.edit',compact('price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Price $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        $request->validate([
            'name'=>'required|unique:prices,name,'.$price->id,
            'value'=>'required|numeric'
            ]);
        $request['slug']= Str::slug($request->name);
        $price->update($request->all());
        return redirect()->route('admin.prices.index')->with('info','Nivel actualizada satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Price $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
       $price->delete();
       return redirect()->route('admin.prices.index')->with('info','Nivel eliminada satisfactoriamente');

    }
}
