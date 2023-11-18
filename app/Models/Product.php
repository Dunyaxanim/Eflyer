<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    protected $fillable = ['img', 'price', 'category_id'];
    public $translationModel = ProductTranslation::class;
    protected $translatedAttributes = ['name'];
    public  function category()
    {
        return $this->belongsTo(Category::class);
    }
}