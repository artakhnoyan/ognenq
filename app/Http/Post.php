<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     public function type()
     {
          return $this->hasOne("App\Type");
     }

     public function categories()
     {
          return $this->hasMany("App\Category");
     }

     public function user()
     {
          return $this->hasOne("App\User");
     }
}
