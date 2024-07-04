<template>
	<div class="modal fade" id="category_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{ is_create ? 'Crear' : 'Editar' }} Producto</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<backend-error :errors="back_errors" />

				<!-- Formulario -->
				<Form @submit="saveProduct" :validation-schema="schema" ref="form">
					<div class="modal-body">
						<section class="row">

							<!-- Image -->
							<div class="col-12 d-flex justify-content-center mt-1">
								<img :src="image_preview" alt="Imagen del producto" class="img-thumbnail" width="170" height="170">
							</div>

							<!-- Load Image-->
							<div class="col-12 mt-1">
								<label for="label" class="form-label">Image</label>

								<input type="file" :class="`form-control ${back_errors['file'] ? 'is_invalid' : ''} `" id="file" accept="image/*" @change="previewImage">

								<span class="invalid-feedback" v-if="back_errors['file']">{{ back_errors['file'] }}</span>
							</div>

							<!-- Name -->
							<div class="col-12 mt-2">
								<label for="name">Nombre del producto</label>
								<Field name="name" v-slot="{ errorMessage, field }" v-model="product.name">
									<input type="text" id="title" v-model="product.name" :class="`form-control ${errorMessage || back_errors['name'] ? 'is-invalid' : ''}`" v-bind="field">
									<span class="invalid-feedback">{{ errorMessage }}</span>
									<span class="invalid-feedback">{{ back_errors['name'] }}</span>
								</Field>
							</div>

							<!-- Category -->
							<div class="col-12 mt-2" v-if="load_category">
								<Field name="category_id" v-slot="{ errorMessage, field, valid }" v-model="product.category_id">
									<label for="category">Categoria</label>

									<v-select id="category" :options="categories_data" v-model="product.category_id" :reduce="category => Number(category.id)" v-bind="field" label="name" placeholder="Selecciona categoria" :clearable="false" :class="`${errorMessage ? 'is-invalid' : ''}`">
									</v-select>
									<span class="invalid-feedback" v-if="!valid">{{ errorMessage }}</span>

								</Field>
							</div>

							<!-- Stock -->
							<div class="col-12 mt-2">
								<Field name="stock" v-slot="{ errorMessage, field }" v-model="product.stock">
									<label for="stock">Cantidad</label>
									<input type="number" id="stock" v-model="product.stock" :class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field">
									<span class="invalid-feedback">{{ errorMessage }}</span>
								</Field>
							</div>

							<!-- Precio -->
							<div class="col-12">
								<label for="worth">Precio</label>
								<Field name="worth" v-slot="{ errorMessage, field }" v-model="product.worth">
									<input type="text" id="title" v-model="product.worth" :class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field">
									<span class="invalid-feedback">{{ errorMessage }}</span>
								</Field>
							</div>
						</section>
					</div>

					<!-- Buttons -->
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Almacenar</button>
					</div>
				</Form>
			</div>
		</div>
	</div>
</template>

<script>
import { Field, Form } from 'vee-validate';
import * as yup from 'yup';
import axios from 'axios';
import { successMessage, handlerErrors } from '@/helpers/Alert.js';

export default {
    props: ['categories_data', 'category_data'],
    components: { Field, Form },
    watch: {
        category_data(new_value) {
            if (new_value.id) {
                this.is_create = false;
                this.product = { ...new_value };
                this.category = new_value.category_id;
                this.image_preview = this.product.url_image ? `/storage/${this.product.url_image}` : '/storage/images/product/Default.png';
            }
        }
    },
    computed: {
        schema() {
            return yup.object({
                name: yup.string().required(),
                category_id: yup.number().required().positive().integer(),
                worth: yup.string().required(),
                stock: yup.number().required().positive().integer()
            });
        }
    },
    data() {
        return {
            is_create: true,
            product: {
                name: '',
                category_id: null,
                stock: null,
                worth: null
            },
            category: null,
            load_category: true,
            back_errors: {},
            file: null,
            image_preview: '/storage/images/product/Default.png'
        };
    },
    methods: {
        previewImage(event) {
            this.file = event.target.files[0];
            this.image_preview = URL.createObjectURL(this.file);
        },
        async saveProduct() {
            try {
                const product = this.createFormData(this.product);
                if (this.is_create) await axios.post('/category/store', product);
                else await axios.post(`/category/update/${this.product.id}`, product);
                await successMessage({ reload: true });
            } catch (error) {
                this.back_errors = await handlerErrors(error);
            }
        },
        createFormData(data) {
            const formData = new FormData();
            if (this.file) {
                formData.append('url_image', this.file, this.file.name);
            }
            for (const prop in data) {
				console.log(prop, data[prop]);
                formData.append(prop, data[prop]);
            }
            return formData;
        },
        reset() {
            this.is_create = true;
            this.product = {};
            this.category = null;
            this.load_category = true;
            this.$parent.category = {};
            this.back_errors = {};
            this.file = null;
            this.image_preview = '/storage/images/product/Default.png';
            document.getElementById('file').value = '';
            setTimeout(() => this.$refs.form.resetForm(), 100);
        }
    }
};
</script>
