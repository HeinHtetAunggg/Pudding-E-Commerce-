<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pudding extends Model
{
    use HasFactory;


    public function scopeFilter($query,$filter)
    {
        $query->when($filter['search']??false,function($query,$search){
             $query->where(function($query) use($search){
                $query->where('name','LIKE','%'.$search.'%')
                       ->orWhere('price','LIKE','%'.$search.'%');
             });
        });

       
        $query->when($filter['category']??false,function($query,$slug){
            $query->whereHas('category',function ($query) use($slug) {
                $query->where('slug',$slug);
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
