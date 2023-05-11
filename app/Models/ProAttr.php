<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProAttr extends Model
{
    use HasFactory;

    protected $fillable = ['pro_id', 'attr_id'];

    
    public function attr_name()
    {
        return $this->hasOne(Attribute::class, 'id', 'attr_id');
    }
}
