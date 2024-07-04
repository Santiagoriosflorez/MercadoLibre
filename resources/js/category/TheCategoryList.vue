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
									<div class="d-flex justify-content-center">
									<button type="button" class="btn btn-warning btn-sm " @click="editProduct(product)" title="Editar">
										<i class="fa-solid fa-pencil"></i>
									</button>
									<button type="button" class="btn btn-danger btn-sm ms-2 " title="Eliminar" @click="deletProduct(product)">
										<i class="fa-solid fa-trash-can"></i>
									</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div>
				<category-modal :categories_data="categories_data" :category_data="category" ref="category_modal"/>
			</div>
		</div>
	</section>
</template>

<script>
	import CategoryModal from './CategoryModal.vue'
	import { successMessage,deleteMessage} from '@/helpers/Alert.js'

	export default {
		components: {
			CategoryModal
		},
		props: ['product', 'categories_data'],
		data() {
			return {
				modal: null,
				category: {}
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
			editProduct(product){
				this.category = product
				this.OpenModal()
			},
			async deletProduct({id}){
			  if(!await deleteMessage ()) return
				try{
					await axios.delete(`/category/${id}`)
					await successMessage({is_delete:true,reload:true})
				} catch (error) {
					console.error(error);
				}
			},
			OpenModal() {
				this.modal.show()
			},
		}
	}
</script>

<style>
</style>
