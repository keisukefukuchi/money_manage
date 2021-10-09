<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    protected $fillble = [
        'content',
        'price',
        'buy_date',
    ];
    public static $rules = array(
        'content' => 'required',
        'price' => 'required',
        'buy_date' => 'required',
    );
    public static function getDate($start_date, $last_date)
    {
        //buy_dateがxxxx/xx/xx ~ xxxx/xx/xxのデータを取得
        $items = Item::whereBetween('buy_date', [$start_date, $last_date])->latest('buy_date')->get();
        return $items;
    }
}
