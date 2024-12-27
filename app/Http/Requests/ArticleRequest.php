<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Validation pour le champ 'nom_article' :
            // - Ce champ est requis et doit être une chaîne de caractères (required|string).
            // - Il doit être unique dans la colonne 'nom_article' de la table 'articles' (unique:articles,nom_article).
            // - La longueur maximale de ce champ est limitée à 255 caractères (max:255).
            'nom_article' => [
                'required',        // Ce champ est obligatoire.
                'string',          // Il doit être une chaîne de caractères.
                'unique:articles,nom_article', // Le nom de l'article doit être unique dans la table `articles`.
                'max:255',         // La longueur maximale est de 255 caractères.
                'regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9]+$/' // Autorise seulement des lettres ou un mélange de lettres et de chiffres. Les chiffres seuls sont refusés.
                //'regex:/^[a-zA-Z]+$/' // N'autorise que des lettres (a-z et A-Z), sans aucun chiffre ni caractères spéciaux.
            ],
            'image'=> "image|max:2000",

            'quantite_stock' => "required|numeric|min:1",
            'prix' => "required|numeric|min:1",
            'categorie_id' => [
                'required', // Le champ est obligatoire
                'integer',  // Il doit être un entier
                'exists:categories,id', // Doit exister dans la table `categories` (colonne `id`)
            ],

        ];
    }

    public function messages(): array
{
    return [
        'nom_article.required' => 'Le nom de l\'article est obligatoire.',
        'nom_article.unique' => 'Ce nom d\'article existe déjà.',
        'quantite_stock.required' => 'La quantité en stock est obligatoire.',
        'quantite_stock.numeric' => 'La quantité doit être un nombre.',
        'prix.required' => 'Le prix de l\'article est obligatoire.',
        'categorie_id.required' => 'Veuillez sélectionner une catégorie.',
        'categorie_id.exists' => 'La catégorie sélectionnée est invalide.',
    ];
}

}
