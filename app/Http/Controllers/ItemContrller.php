<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with(['category:id,name'])->get();

        return view('item.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('item.create',[
            'categories'=> $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request());
         $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'condition' => 'required',
            'type' => 'required',
            'is_published' =>'required',
            'owner_name' =>'required',
            'owner_phone' =>'required',
            'owner_address' => 'required',
            'latitude' => 'required',
            'longtitude' => 'required',
            'is_published' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);


        $image_path = '';

        // if ($request->hasFile('image')) {
        //     $image_path = $request->file('image')->store('images/items', 'public');
        // }


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = md5(time()) . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images/items', $image_path);
        }


        Item::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'condition' => $request->condition,
            'type' => $request->type,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'owner_address' => $request->owner_address,
            'latitude' => $request->latitude ,
            'longtitude' => $request->longtitude,
            'is_published' => $request->is_published ? 1 : 0,
            'image' => $image_path,
        ]);

        return redirect()->route('items.index')->with('success','Item has been created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('item.show', [
            'item' => $item
        ]);
    }

    public function changeStatus(Request $request, $id)
    {
        // dd($request->status);
        $item = Item::find($id);
        $item->is_published = $request->status == "on" ? 1 : 0;
        $item->save();
        return redirect()->back()->with('success', 'Status has been updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        // return $item;
        $categories = Category::all();
        return view('item.edit', [
            'item' => $item,
            'categories'=> $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'condition' => 'required',
            'type' => 'required',
            'is_published' =>'required',
            'owner_name' =>'required',
            'owner_phone' =>'required',
            'owner_address' => 'required',
            'latitude' => 'required',
            'longtitude' => 'required',
            'is_published' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        // if ($request->hasFile('image')) {
        //     $image_path = $request->file('image')->store('images/items', 'public');
        //     $item->image = $image_path;
        // }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = md5(time()) . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images/items', $image_path);
            $item->image = $image_path;
        }



        $item->name = $request->name;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->condition = $request->condition;
        $item->type = $request->type;
        $item->owner_name = $request->owner_name;
        $item->owner_phone = $request->owner_phone;
        $item->owner_address = $request->owner_address;
        $item->latitude = $request->latitude ;
        $item->longtitude = $request->longtitude;
        $item->is_published = $request->is_published ? 1 : 0;
        $item->save();



        return redirect()->route('items.index')->with('success','Item Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success','Item has been deleted successfully');
    }

}