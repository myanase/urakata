<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //primaryKeyの変更
    protected $primaryKey = "project_no";
    protected $fillable = ['project_name','user_id','genre','nendai','memo','color','series','del_flg'];
}
