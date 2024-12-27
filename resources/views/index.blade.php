@include('layouts.includes.head')
    <body>
        <!-- Navigation-->
@include('layouts.includes.menu')
        <!-- Header-->
        <header class="py-5 bg-dark">
            <div class="container px-4 my-5 px-lg-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">SkyShop</h1>
                    <p class="mb-0 lead fw-normal text-white-50">Nous sommes une entreprise de vente de produit de surmesure</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 mt-5 px-lg-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    @foreach ($articles as $article)

                            <div class="mb-5 col">
                                <div class="card h-100">
                                    <!-- Product image-->
                                     <p>{{ $article->active }}</p>
                                            @if($article->image)
                                                <img src="{{ asset('storage/' . $article->image) }}" alt="Image" width="100%" height="100%">
                                            @else
                                                    <img src="{{ asset('images/logo.png') }}" alt="Logo" width="100%" height="100%">

                                            @endif
                                    {{-- <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." /> --}}
                                    <!-- Product details-->
                                    <div class="p-4 card-body">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{ $article->nom_article }}</h5>
                                            <!-- Product price-->
                                           Prix : {{number_format($article->prix, 0, ',', ' ')}} Fcfa
                                        </div>
                                    </div>
                                    <form action="" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="product_id" value="{{ $article->id }}">

                                        <select name="payment_method" class="w-full p-2 mb-4 border rounded">
                                            <option value="ORANGE_MONEY">Orange Money</option>
                                            <option value="MOMO">MTN MoMo</option>
                                            <option value="CREDIT_CARD">Carte bancaire</option>
                                            <option value="PAYCARD">Paycard</option>
                                        </select>
                                            <!-- Product actions-->

                                            <div class="p-4 pt-0 bg-transparent card-footer border-top-0">
                                                <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                                                    Payer maintenant
                                                </button>
                                            </div>

                                    </form>

                                </div>
                            </div>

                    @endforeach



                </div>
            </div>
        </section>
        <!-- Footer-->
@include('layouts.includes.footer')
