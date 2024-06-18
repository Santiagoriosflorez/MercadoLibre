import './bootstrap';
import { createApp } from 'vue';
import vSelect from 'vue-select';

// Components ----------------------------------------
import TheCategoryList from './category/TheCategoryList.vue';


const app = createApp({
	components: {
		TheCategoryList
	}

});



app.component('v-select', vSelect);
app.mount('#app');
