<template>
    <div class="modal fade" id="category_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ is_create ? 'Crear' : 'Editar' }} Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Formulario -->
                <Form @submit="saveProduct" :validation-schema="schema">
                    <div class="modal-body">
                        <section class="row">

                            <!-- Name -->
                            <div class="col-12">
                                <label for="name">Nombre del producto</label>
                                <Field name="name" v-slot="{ errorMessage, field }" v-model="product.name">
                                    <input type="text" id="title" v-model="product.name" :class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field">
                                    <span class="invalid-feedback">{{ errorMessage }}</span>
                                </Field>
                            </div>

                            <!-- Category -->
                            <div class="col-12 mt-2" v-if="load_category">
                                <Field name="category_id" v-slot="{ errorMessage, field, valid }" v-model="category">
                                    <label for="category">Categoria</label>

                                    <v-select id="category" :options="categories_data" v-model="category" :reduce="category => category.id" v-bind="field" label="name" placeholder="Selecciona categoria" :clearable="false" :class="`${errorMessage ? 'is-invalid' : ''}`">
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
import Swal from 'sweetalert2';

export default {
    props: ['categories_data'],
    components: { Field, Form },
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
            load_category: true
        };
    },
    created() {
        this.index();
    },
    methods: {
        async index() {
            // Aquí puedes cargar categorías o cualquier otra lógica necesaria al crear el componente.
        },
        async saveProduct() {
            try {
                // Asignar category_id al producto
                this.product.category_id = this.category;

                // Enviar datos al backend
                await axios.post('/category', this.product);

                // Mostrar mensaje de éxito
                await Swal.fire('Éxito', 'Producto creado con éxito', 'success');
				this.$parent.CloseModal();
                // Recargar la página
                window.location.reload();
            } catch (error) {
                console.error(error);
                await Swal.fire('Error', 'Ocurrió un error al crear el producto', 'error');
            }
        },
    }
};
</script>