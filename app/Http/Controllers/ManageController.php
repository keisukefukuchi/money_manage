<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ManageController extends Controller
{
    public function index(Request $request)
    {
        if (!empty($request['start_date']) && !empty($request['last_date'])) {
            //ハッシュタグの選択されたxxxx/xx/xx ~ xxxx/xx/xxのレポート情報を取得
            $items = Item::getDate($request['start_date'], $request['last_date']);
        }else {
            //今月のデータだけを新しい順に表示
            $start_month = Carbon::now()->startOfMonth();
            $end_month = Carbon::now()->endOfMonth();
            $items = Item::whereBetween('buy_date',[$start_month, $end_month])->latest('buy_date')->get();
        }
        return view('manage',['items' => $items]);
    }
    // public function find()
    // {
    //     $items = Item::latest('buy_date')->get();
    //     return view('manage', ['items' => $items]);
    // }
    public function create(Request $request)
    {
        $this->validate($request, Item::$rules);
        $todo = new Item();
        $form = $request->all();
        unset($form['_token_']);
        $todo->fill($form)->save();
        return redirect('/');
    }
    // public function search(Request $request)
    // {
    //     $start_date = $request->input("start_date");
    //     $last_date = $request->input("last_date");
    //     $query = Item::query();

    //     if (!empty($start_date)) {
    //         $query->whereDate("buy_date", ">=", Carbon::parse($start_date));
    //     }
    //     if (!empty($last_date)) {
    //         $query->whereDate("buy_date", ">=", Carbon::parse($last_date));
    //     }

    //     return redirect('/')->with('items',$query)
    //     ->with('start_date',$start_date)
    //     ->with('last_date',$last_date);
    // }
    public function update(Request $request)
    {
        $this->validate($request, Item::$rules);
        $todo = Item::find($request->id);
        $form = $request->all();
        unset($form['_token_']);
        $todo->fill($form)->save();
        return redirect('/');
    }
    public function delete(Request $request)
    {
        Item::find($request->id)->delete();
        return redirect('/');
    }
}
