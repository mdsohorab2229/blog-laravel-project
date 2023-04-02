<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded=[];

    const ACTIVE=1;
    const INACTIVE=0;

    public function sub_categories(){
        return $this->hasMany(SubCategory::class);
    }
}
