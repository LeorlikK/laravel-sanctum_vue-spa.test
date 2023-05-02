import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'

// import './assets/main.css'

const app = createApp(App)
app.use(router)

// const cors = require('cors')
// app.use(cors({ origin: 'http://127.0.0.1:8000'}))

app.mount('#app')
// createApp(App).mount('#app')
