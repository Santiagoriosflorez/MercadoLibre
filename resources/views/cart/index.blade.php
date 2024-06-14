<x-app>
    <section>
        <div class="justifiy-content-center">
            <h1>Carrito de compra</h1>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-end">
            </div>
            <div class="card-body">
                <div class="table-responsive my-4 mx-2">
                    <ul>
                        @foreach ($cartItems as $item)
                            <li>{{ $item->product->name }} - Cantidad: {{ $item->stock }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

</x-app>
