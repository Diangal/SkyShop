<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom_article',
        'description',
        'quantite_stock',
        'active',
        'prix',
        'categorie_id',
        'image',


    ];



    public function categorie()
{
    return $this->belongsTo(Categorie::class);
}


    
    

}