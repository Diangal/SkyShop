<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',       // Ajoutez ce champ
        'name',    // Autres champs que vous souhaitez rendre accessibles
        'quantity',

    ];
    public function add($id, $name, $quantity)
    {
        return $this->create([
            'id' => $id,
            'name' => $name,
            'quantity' => $quantity,
        ]);
        $panier = new Panier();
        $panier->add($id, $name, $quantity);
    }
}