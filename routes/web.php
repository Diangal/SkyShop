<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategorieController;

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaiementPaytechController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\PayDunyaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;










/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::post('/paiement',[PaiementPaytechController::class, 'paiement'])->name('paiement');
Route::get('/success',[PaiementPaytechController::class, 'success'])->name('success');
Route::get('/cancel',[PaiementPaytechController::class, 'cancel'])->name('cancel');


// // Afficher les articles
// Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Ajouter un article au panier
Route::get('/panier/add', [PanierController::class, 'add'])->name('panier_add');
Route::get('/panier', [PanierController::class, 'index'])->name('panier_index');

// // Afficher le panier
// Route::get('/panier', [PanierController::class, 'voir'])->name('panier.voir');
// // Passer à la page de paiement
// Route::post('/panier/paiement', [PanierController::class, 'paiement'])->name('panier.paiement');

// Route::get('/cart', [PayDunyaController::class, 'cart'])->name('cart.index');
// Route::post('/pay', [PayDunyaController::class, 'initiatePayment'])->name('pay.initiate');
// Route::get('/payment/callback', [PayDunyaController::class, 'paymentCallback'])->name('pay.callback');




Route::get('/', [HomeController::class, 'index'])->name('home');

//route nous permet d'avoir accés aux articles a n'importe qu'elle view dans le projet
Route::get('/articles/{id}', function ($id) {
    $article = Article::findOrFail($id);
    return view('/', compact('article'));
});

// // // // Route pour le tableau de bord
// Route::get('/', [WebsiteController::class, 'index']);
// Route::get('/home', [WebsiteController::class, 'index']);

// Route::get("/", [ArticleController::class, 'affichage'])->name('home');
// Route::get("/home", [ArticleController::class, 'Affichage']);

// Groupe de routes avec le préfixe 'articles'
Route::prefix('articles')->name('articles.')->group(function () {
    //Route::get('{article}', [ArticleController::class, 'show'])->where('article', '[0-9]+')->name('articles.show');
    Route::get('{id}', [ArticleController::class, 'show'])->where('id', '[0-9]+')->name('show');
    Route::get('index', [ArticleController::class, 'index'])->name('index');
    Route::get('create', [ArticleController::class, 'create'])->name('create');
    Route::post('store', [ArticleController::class, 'store'])->name('store');
    Route::get('{article}/edit', [ArticleController::class, 'edit'])->name('edit');
    Route::put('{article}', [ArticleController::class, 'update'])->name('update');
    Route::delete('{article}', [ArticleController::class, 'destroy'])->name('destroy');

});

Route::resource('categories', CategorieController::class);


// Route::get('/', function () {
//     return view('index');
// })->middleware(['auth', 'verified'])->name('/');


Route::middleware('guest')->group(function () {
Route::get('/register', [RegisteredUserController::class, 'register'])->name('register');
});


Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google_auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

require __DIR__.'/auth.php';