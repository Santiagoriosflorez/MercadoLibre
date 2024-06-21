<template>
	<div class="input-group mb-3">
		<input v-model="buscador" @keyup.enter="buscarproducto" class="form-control" aria-label="Example text with button addon" aria-describedby="button-addon1" placeholder="Buscar producto..." />
		<button @click="buscarproducto" type="button" id="button-addon1" class="btn btn-outline-secondary">Buscar</button>
	</div>
	<div v-if="results.length">
			<h3>Resultados de búsqueda:</h3>
			<ul>
				<li v-for="result in results" :key="result.id">{{ result.name }}</li>
			</ul>
		</div>
</template>

<script>
	import axios from 'axios'

	export default {
		data() {
			return {
				buscador: '',
				results: []
			}
		},
		methods: {
			buscarproducto() {
				if (this.buscador.trim() === '') {
					return
				}
				axios
					.get(`/search`, { params: { query: this.buscador } })
					.then(response => {
						this.results = response.data
					})
					.catch(error => {
						console.error('Error fetching search results:', error)
					})
			}
		}
	}
</script>
<style >
.input-group{
	margin:  10px 75px;
	width: 500px;
}
</style>
