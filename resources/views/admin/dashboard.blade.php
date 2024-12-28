@extends('layouts.admin_dashboard')

@section('content')

        
<div class="px-4 container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="mb-4 breadcrumb">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="mb-4 text-white card bg-primary">
                <div class="card-body"></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="text-white small stretched-link" href="#"></a>
                    <div class="text-white small"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="mb-4 text-white card bg-warning">
                <div class="card-body"></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="text-white small stretched-link" href="#"></a>
                    <div class="text-white small"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="mb-4 text-white card bg-success">
                <div class="card-body"></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="text-white small stretched-link" href="#"></a>
                    <div class="text-white small"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="mb-4 text-white card bg-danger">
                <div class="card-body"></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="text-white small stretched-link" href="#"></a>
                    <div class="text-white small"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="mb-4 card">
        <div class="card-header" style="display: flex; justify-content: flex-end">
       <a href="{{ route('articles.create') }}" class="btn btn-primaary">Ajouter un produit</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Quantité</th>
                        <th>Actif</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Image</th>
                    </tr>
                </thead>
                {{-- <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot> --}}
                <tbody> 
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->nom_article }}</td>
                            <td>{{ $article->description }}</td>
                            <td>{{ $article->quantite_stock }}</td>
                            <td>{{ $article->active ? 'Oui' : 'Non' }}</td>
                            <td>{{ $article->prix }} FCFA</td>
                            <td>{{ $article->categorie->nom ?? 'Non définie' }}</td>
                            <td>
                                @if($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="Image" width="50">
                                @else
                                    Pas d'image
                                @endif
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection