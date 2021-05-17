<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items=Item::orderBy('name')->get();
        //$item_where=Item::where('type','gg')->get();
        //get all the items
        //$items = Item::all();
        //$items_latest=Item:latest();
        return View('items.index')
        ->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //error_log(request('item_name'));
        //error_log(request('item_type'));
        $item=new Item();
        $item->name=request('item_name');
        $item->type=request('item_type');
        $item->brand=request('item_brand');
        $item->weight=request('item_weight');
        error_log($item);
        $item->save();

       return redirect('/item')->with('message','Item created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $item=Item::findOrFail($id);
        return view('items.show',['item'=>$item] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::findOrFail($id);
        $item->delete();
    }
}
