<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'detail'];

    public static $rules = array(
        'category_id' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'gender' => 'required',
        'email' => 'required',
        'tel' => 'required',
        'tel2' => 'required',
        'tel3' => 'required',
        'address' => 'required',
        'detail' => 'required'
    );

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
