<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable=['id','name','image','age','description','price_id','type_id','country_id','state_id','city_id','url','street_id','user_id','cat_id','subcat_id','price'];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'product_id');
    }

    // protected $append = ['sub_category_name'];

    // public function getSubCategoryNameAttribute(){

    //     $sub=SubCategory::find($this->subcat_id);
    //     if(!$sub)
    //     {
    //         return;
    //     }
    //     return $sub->sub_category_name;

    // }
}
