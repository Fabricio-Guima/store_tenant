<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsTenantScope;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, BelongsTenantScope;

    protected $fillable = ['name','description', 'body', 'price', 'slug'];

    public function store() {
        return $this->belongsTo(Store::class);
    }

    //como se fosse um observer para criar um slug
    public function setNameAttribute($prop)
    {
        $this->attributes['name'] = $prop;
        $this->attributes['slug'] = Str::slug($prop);
    }

    //transforma a string formatada com padrao BRL em um inteiro (ex: 1.990,00 para 1990)
    public function setPriceAttribute($prop)
    {
        $price = str_replace(['.', ','], ['','.'], $prop);
        $this->attributes['price'] = $price * 100;
       
    }

    // joga para o front o preço formatado em brl (ex: 1990 para 1.990,00)
    public function getPriceAttribute()
    {       
        return $this->attributes['price'] / 100;
       
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
