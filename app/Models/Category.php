<?php

namespace App\Models;

use App\Models\Items;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'item_id'
    ];

    public function items(){
        return $this->hasMany(Items::class);
    }
}
