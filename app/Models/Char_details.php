<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Char_details extends Model
{
    //primaryKeyの変更
    protected $primaryKey = "char_detail_id";
    protected $fillable = ['char_id','start_age','birthplace','father','mather','brother','relation'];
}
