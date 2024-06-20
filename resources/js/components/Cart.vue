<template>
	<div class="justify-content-center">
		<h1>Carrito de compra</h1>
	</div>
	<div class="card">
		<div class="card-header d-flex justify-content-end">
			<!-- Puedes añadir un botón de actualizar carrito aquí si es necesario -->
		</div>
		<div class="card-body">
			<div class="table-responsive my-4 mx-2">

				<table class="table">
					<thead>
						<tr>
							<th scope="col">Producto</th>
							<th scope="col">Cantidad</th>
							<th scope="col">Precio</th>
							<th scope="col">Subtotal</th>
							<th scope="col">Acciones</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="item in cartItems" :key="item.id">
							<th>{{item.product.name}}</th>
							<td><button @click="decrement(item)">-</button>
								{{ item.stock }}
								<button @click="increment(item)">+</button>
							</td>
							<td>{{item.product.worth}}</td>
							<td>{{formatNumber(itemSubtotal(item))}}</td>
							<td></td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="3">Total:</th>
							<th>${{formatNumber(cartTotal)}}</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios'

	export default {
		props: ['cartItems'],
		methods: {
			increment(item) {
				item.stock++
				console.log(item)
				this.updateCartItem(item) // Actualizar el backend
			},
			decrement(item) {
				if (item.stock > 1) {
					item.stock--
					this.updateCartItem(item) // Actualizar el backend
				}
				console.log('Decrementing item:', item)
			},
			updateCartItem(item) {
				axios
					.put(`/cart/item/${item.id}`, { stock: item.stock })
					.then(response => {
						console.log('CartItem updated successfully', response.data)
						window.location.reload()
					})
					.catch(error => {
						console.error('Error updating cart item', error.response)
					})
			},
			itemSubtotal(item) {
				return (item.stock * item.product.worth).toFixed(2)
			},
			formatNumber(value) {
				if (!value) return ''
				return parseFloat(value).toLocaleString('es-Es', {
					minimumFractionDigits: 3,
					maximumFractionDigits: 3
				})
			}
		},
		computed: {
			cartTotal() {
				return this.cartItems
					.reduce((total, item) => {
						return total + item.stock * item.product.worth
					}, 0)
					.toFixed(2)
			}
		}
	}
</script>

<style scoped>
button {
	margin: 0 5px;
}
.list {
	font-family: 'Courier New', Courier, monospace;
	list-style: none;
}

.item {
	counter-increment: detail-counter;
}
</style>