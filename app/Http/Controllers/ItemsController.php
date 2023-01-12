<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Category;
use App\Models\CategoryList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Throwable;
use Event;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Items::with('categorys')->get();
        return response()->json($item);
    }

    public function getCategory(){
        $category = CategoryList::all();
        return response()->json($category);
    }

    public function withStocks(){
        $item = Items::with('categorys')->where('quantity', '!=', 0 )->get();
        return response()->json($item);
    }

    public function noStocks(){
        $item = Items::with('categorys')->where('quantity', '=', 0 )->get();
        return response()->json($item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $item = Items::with('categorys')->where('name',$request->keywords)->get();
        return response()->json($item);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Items([
            'name'          => $request->name,
            'description'   => $request->description,
            'price'         => $request->price,
            'quantity'      => $request->quantity,
        ]);
        $item->save();

        $category = new Category([
            'item_id'       => $item->id,
            'name'          => $request->category,
        ]);
        $category->save();
        
        return response()->json('items successfully added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Items::with('categorys')->find($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $item = Items::find($id);
        $item->update($request->all());

        $category = Category::where('id', $id);
        $category->update([
            'name' => $request->input('categorys')[0]['name'],
        ]);
        return response()->json('successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Items::find($id);
        $items->delete();
 
        return response()->json('The item successfully deleted');
    }
}
