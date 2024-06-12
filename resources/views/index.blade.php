<x-app title="Tienda De Ropa | Home">

    <section class="d-flex flex-wrap justify-content-center">
        @foreach ($products as $product)
            <div class="card mx-2 my-3 card_size">
                <div class="card-header">
                    <h2 class="h5">{{ $product->name }}</h2>
                </div>
				<div class="card-body">
					<p>Category: {{ $product->category ? $product->category->name : 'No Category' }}</p> <!-- Verifica si la categoría existe -->
					<p>{{$product->description}}</p>
					<p>$: {{$product->worth}}</p>
					<p>{{$product->stock}}</p>
				</div>
            </div>
        @endforeach
    </section>
</x-app>
