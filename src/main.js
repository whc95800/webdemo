import {createApp} from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import ElementUI from 'element-plus'
import 'element-plus/dist/index.css'
import AOS from 'aos'
import 'aos/dist/aos.css'

AOS.init({
    offset: 20,
    delay: 300, // values from 0 to 3000, with step 50ms
    duration: 800 // values from 0 to 3000, with step 50ms
});


createApp(App).use(store).use(router).use(ElementUI).use(AOS).mount('#app')

