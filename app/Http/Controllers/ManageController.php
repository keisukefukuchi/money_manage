<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = Item::Paginate(10);
        $items = Item::where('buy_date',$items)->orderby('buy_date','desc')->get();
        return view('manage',['items' => $items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Item::$rules);
        $todo = new Item();
        $form = $request->all();
        unset($form['_token_']);
        $todo->fill($form)->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $start_date = $request->input("start_date");
        $last_date = $request->input("last_date");
        $query = Item::query();

        if (!empty($start_date)) {
            $query->whereDate("buy_date", ">=", Carbon::parse($start_date));
        }
        if (!empty($last_date)) {
            $query->whereDate("buy_date", ">=", Carbon::parse($last_date));
        }
        $items = $query->paginate(10);
        return view('manage')->with('items',$items)
        ->with('start_date',$start_date)
        ->with('last_date',$last_date);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $this->validate($request, Item::$rules);
        $todo = Item::find($request->id);
        $form = $request->all();
        unset($form['_token_']);
        $todo->fill($form)->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Item $item)
    {
        Item::find($request->id)->delete();
        return redirect('/');
    }
}
