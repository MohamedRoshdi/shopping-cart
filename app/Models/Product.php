<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getImage()
    {
        if (!is_null($this->image)) {
            $image = url($this->image);
        } else {
            $image = url('images/default.png');
        }
        return $image;
    }

    public function productType()
    {
        return $this->hasOne('\App\Models\ProductType','id', 'product_type_id');
    }
}
