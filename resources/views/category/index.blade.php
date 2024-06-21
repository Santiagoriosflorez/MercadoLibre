<x-app title="Categorias">
    <section class="container">
        <div class="d-flex justify-content-center my-4">
            <h1>Listado de Categorias y productos</h1>
        </div>
        <the-category-list :product="{{ $product}}" :categories_data="{{$categories}}" />
    </section>
</x-app>
