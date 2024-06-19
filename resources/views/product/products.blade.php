<x-app title="Detalle del Producto {{ $product->name }}">
    <section class="container">
        <div class="d-flex justify-content-center my-3">
            <h1>Detalle del Producto</h1>
        </div>
    </section>

    <section class="d-flex flex-wrap justify-content-center">
        <div class="card mx-2 my-3 card_size">
            <div class="card-header">
                <h2 class="h6">{{ $product->name }}</h2>
                <img src="{{ $product->url_imagen }}" alt="{{ $product->name }}">
            </div>
            <div class="card-body">
                <p>{{ $product->description }}</p>
                <p class="h5"><strong>${{ $product->worth }}</strong></p>
                <p>{{ $product->stock }}</p>
            </div>
        </div>
    </section>
</x-app>