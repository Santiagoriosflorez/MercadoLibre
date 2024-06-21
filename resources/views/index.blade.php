<x-app title="Tienda De Ropa | Home">
    <section class="d-flex flex-column">
        @foreach ($categories as $category)
            <div class="card mx-2 my-4">
                <div class="mx-2" style="background-color: white">
                    <h2 class="h5">{{ $category->name }}:<a href="{{ route('product.page',['category_id' => $category->id ]) }}">Ir a mas Productos</a>
                    </h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($category->products as $product)
                            <div class="col-sm-3">
                                <img class="images" src="{{ $product->url_imagen }}" alt="{{ $product->name }}">
                                <div class="body-content">
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
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </section>
</x-app>
