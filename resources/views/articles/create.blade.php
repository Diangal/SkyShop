@extends('layouts.admin_dashboard')
    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="/admin/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="order-1 btn btn-link btn-sm order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="my-2 d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Mes Articles
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('articles.index') }}">Liste</a>
                                    <a class="nav-link" href="{{ route('articles.create') }}">Ajouter</a>
                                </nav>
                            </div>
                            
                            
                            <div class="sb-sidenav-menu-heading">Transactions</div>
                            
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Paiements
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Connecté en tant que :</div>
                        {{ Auth::user()->name }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    
                                                        
                        <div class="px-4 container-fluid">
                            <h1 class="mt-4">Mes Articles</h1>
                            <ol class="mb-4 breadcrumb">
                                <li class="breadcrumb-item active">Ajouter un article</li>
                            </ol>
                                  
                                <div class="p-3 my-4 card">
                                    <div class="card-header">Formulaire d'ajout</div>
                                        <div class="card body">
                                            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3 form-group">
                                                    
                                                    <label for="nom_article">Nom de l'article :</label>
                                                    <input type="text" name="nom_article" id="nom_article" required class="form-control">
                                                </div>
                                            
                                                <div>
                                                    <label for="description">Description :</label>
                                                    <textarea name="description" id="description" class="form-control"></textarea>
                                                </div>
                                            
                                                <div>
                                                    <label for="quantite_stock">Quantité en stock :</label>
                                                    <input type="number" name="quantite_stock" id="quantite_stock" required class="form-control">
                                                </div>
                                            
                                                <div>
                                                    <label for="active">Actif :</label>
                                                    <select name="active" id="active">
                                                        <option value="1">Oui</option>
                                                        <option value="0">Non</option>
                                                    </select>
                                                </div>
                                            
                                                <div>
                                                    <label for="prix">Prix :</label>
                                                    <input type="number" step="0.01" name="prix" id="prix" required class="form-control">
                                                </div>
                                            
                                                <div>
                                                    <label for="categorie_id">Catégorie :</label>
                                                    <select name="categorie_id" id="categorie_id">
                                                        @foreach($categories as $categorie)
                                                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            
                                                <div>
                                                    <label for="image">Image :</label>
                                                    <input type="file" name="image" id="image" class="form-control">
                                                </div>
                                            
                                                <button type="submit" class="btn btn-primary" style="display: flex; justify-content:center; align-items:center">Ajouter l'article</button>
                                                <button><a href="{{ route('articles.index') }}">Retour à la liste</a></button>
                                            </form>
                                            
                                        </div>

                                </div>
                           
                        </div>



                </main>
               