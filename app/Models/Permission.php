<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id', 'key_code'];

    public function permiss_children()
    {
        return $this->hasMany(Permission::class, 'parent_id');
    }

}
