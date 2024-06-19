<x-app title="Tienda De Ropa | Home">

    <section class="d-flex flex-column">
        @foreach ($categories as $category)
            <div class="card mx-2 my-4">
                <div class="card-header">
                    <h2 class="h4">{{ $category->name }}</h2>
                    <a href="{{ route('product.page') }}">Ir a mas Productos</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($category->products as $product)
                            <div class="col-sm-6 col-lg-3 mb-2">
                                <img class="image" src="{{ $product->url_imagen }}" alt="{{ $product->name }}">
                                <div class="card-item">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{ $product->description }}</li>
                                            <li class="list-group-item">Precio ${{ $product->worth }}</li>
                                            <li class="list-group-item">Stock: {{ $product->stock }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </section>
</x-app>
