<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolePermiss extends Model
{
    use HasFactory;

    protected $fillable = ['role_id', 'permiss_id'];

}
