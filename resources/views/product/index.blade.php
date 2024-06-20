<x-app title="Productos">
    <section class="container">
        <div class="d-flex justify-content-center my-3">
            <h1>Listado de productos</h1>
        </div>
    </section>

    <section class="d-flex flex-wrap justify-content-center">
        @foreach ($product as $product)
            <div class="card mx-2 my-3 card_size" style="background-color: white">
                <a href="{{ route('product.products', ['id' => $product->id]) }}"
                    style="text-decoration: none; color: inherit; cursor: pointer;">
                    <div class="card-header">
                        <h2 class="h6">{{ $product->name }}</h2>
                    </div>
					<div>
						<img  class="image" src="{{ $product->url_imagen }}" alt="{{ $product->name }}">
					</div>
                </a>
                <div class="card-body">
                    <p>{{ $product->description }}</p>
                    <p class="h5"><strong>${{ $product->worth }}</strong></p>
                    <p>{{ $product->stock }}</p>
                </div>
            </div>
        @endforeach
    </section>
</x-app>
