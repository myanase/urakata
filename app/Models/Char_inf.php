<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Char_inf extends Model
{
    //primaryKeyの変更
    protected $primaryKey = "char_id";
    protected $fillable = ['group_name','last_name','middle_name','first_name'];
}
