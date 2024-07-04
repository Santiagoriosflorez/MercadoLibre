<x-app title="Detalle del Producto">
    <section class="container">
        <div class="d-flex justify-content-center my-3">
        </div>
    </section>

    <section class="d-flex flex-wrap justify-content-center">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card caja">
                    <div class="row no-gutters">
                        <div class="col-4">
                            <img src="{{ $product->url_imagen }}" alt="{{ $product->name }}" class="img-fluid cover-image">
                        </div>
                        <div class="col-8">
                            <div class="mx-2 my-4">
                                <h2>{{ $product->name }}</h2>
                            </div>
                            <div class="card-body">
                                <p>{{ $product->description }}</p>
                                <p class="h5"><strong>${{ $product->worth }}</strong></p>
                                <p>Cantidad: {{ $product->stock }} <strong>Disponible</strong></p>
                            </div>
							<form action="{{ route('cart.add', $product->id) }}" method="POST">
								@csrf
								<button type="submit" class="btn btn-primary btn-lg">Añadir al carrito</button>
							</form>
							<button type="button" class="btn btn-success btn-lg my-2">Comprar Ahora</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>
