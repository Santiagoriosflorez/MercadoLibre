import './bootstrap';
import { createApp } from 'vue';
import vSelect from 'vue-select';

// Components ----------------------------------------
import TheCategoryList from './category/TheCategoryList.vue';
import Cart from './components/Cart.vue'


const app = createApp({
	components: {
		TheCategoryList,
		Cart
	}

});



app.component('v-select', vSelect);
app.mount('#app');
