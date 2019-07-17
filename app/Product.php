<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function sortByTitle()
    {
        return $this->orderBy('name');
    }
}
