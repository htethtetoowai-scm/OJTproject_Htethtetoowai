<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'description','status','create_user_id','updated_user_id','deleted_id','created_at','updated_at','deleted_at'
    ];

   
}
