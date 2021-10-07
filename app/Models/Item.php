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
}
