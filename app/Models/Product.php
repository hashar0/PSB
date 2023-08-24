<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable=['id','name','image','age','description','price_id','type_id','country_id','state_id','city_id','url','street_id','user_id','cat_id','subcat_id'];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

}
