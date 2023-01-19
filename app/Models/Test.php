<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    public $timestamps  = false;
    protected $fillable = [
        'name',
        'last_name',
        'age',
        'address',
        'fecha',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
