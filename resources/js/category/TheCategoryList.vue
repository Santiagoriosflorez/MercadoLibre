<template>
	<section>
		<div class="card">
			<div class="card-header d-flex justify-content-end">
				<button class="btn btn-primary" @click="OpenModal">Crear Categorias</button>
			</div>
			<div class="card-body">
				<div class="table-responsive my-4 mx-2">
					<table class="table table-bordered" id="product_table">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Categoria</th>
								<th>Cantidad</th>
								<th>Precio</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(product,index) in product" :key="index">
								<td>{{product.name}}</td>
								<td>{{product.category.name}}</td>
								<td>{{product.stock}}</td>
								<td>{{product.worth}}</td>
								<td>
									<button class="btn btn-warning">Editar</button>
									<button class="btn btn-danger">Eliminar</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div>
				<category-modal :categories_data="categories_data" />
			</div>
		</div>
	</section>
</template>

<script>
	import CategoryModal from './CategoryModal.vue'
	export default {
		components: {
			CategoryModal
		},
		props: ['product', 'categories_data'],
		data() {
			return {
				modal: null,
				category: null
			}
		},
		mounted() {
			this.index()
		},

		methods: {
			async index() {
				$('#product_table').DataTable()
				const modal_id = document.getElementById('category_modal')
				this.modal = new bootstrap.Modal(modal_id)
				modal_id.addEventListener('hidden.bs.modal', e => {
				this.$refs.category_modal.reset()
				})
			},
			OpenModal() {
				this.modal.show()
			},

			CloseModal() {
				this.modal.hide()
			},

			reset() {
				;(product = this.product),
					(category = this.category),
					(SaveProduct = this.saveProduct),
					(load_category = this.load_category)
			}
		}
	}
</script>

<style>
</style>
