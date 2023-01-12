<?php

namespace App\Http\Controllers;

use App\Models\CategoryList;
use Illuminate\Http\Request;

class CategoryListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = CategoryList::all();
        return response()->json($list);
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
        $category = new CategoryList([
            'name'   => $request->input('category'),
        ]);

        $category->save();

        return response()->json('category successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryList  $categoryList
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryList $categoryList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryList  $categoryList
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryList $categoryList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryList  $categoryList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryList $categoryList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryList  $categoryList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = CategoryList::find($id);
        $items->delete();
 
        return response()->json('The category successfully deleted');
    }
}
