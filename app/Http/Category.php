<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     public function posts()
     {
          return $this->belongsTo("App\Post");
     }

     public function parent()
     {
          return $this->belongsToOne(static::class, 'parent_id');
     }

     public function children()
     {
          return $this->hasMany(static::class, 'parent_id');
     }

     public static function getAllCategories()
     {
          return Category::with(['children' => function ($query) {
               $query->orderby(DB::raw("case name when 'Այլ' then 1 else 0 end"));
          }])->whereNull('parent_id')->get();
     }
}
