<template>
	<section>
		<div class="card">
			<div class="card-header d-flex justify-content-end">
				<button class="btn btn-primary">Crear Categorias</button>
			</div>
			<div class="card-body">
				<div class="table-responsive my-4 mx-2">
					<table class="table table-bordered" id="product_table">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Categoria</th>
								<th>Cantidad</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(product,index) in product" :key="index">
								<td>{{product.name}}</td>
								<td>{{product.category.name}}</td>
								<td>{{product.stock}}</td>
								<td>
									<button class="btn btn-primary">Hola</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		props: ['product'],
		data() {},
		mounted() {
			this.index()
		},

		methods:{
				async index() {
					$('#product_table').DataTable()
				}
			}
	}
</script>

<style>
</style>