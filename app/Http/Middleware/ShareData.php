<?php

namespace App\Http\Middleware;

use App\Models\Article;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShareData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Partager les données avec toutes les vues
        // $categories = Categorie::all();
        $articles = Article::with('categorie')->get();
        
        view()->share('categories', $articles);
        
        return $next($request);
    }
}