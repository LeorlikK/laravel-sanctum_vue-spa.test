<template>
    <div class="w-25">
        <label for="exampleFormControlSelect" class="form-label">Category</label>
        <select id="exampleFormControlSelect" class="form-select" aria-label="Default select example" v-model="categoryID">
            <option 
            v-for="(category) in categoryAll"
            :key="category.id"
            :value="category.id"
            >{{ category.name }}</option>
        </select>
        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input v-model="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea v-model="text" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Text"></textarea>
        </div>
        <div class="mb-3">
            <button :disabled="disabledButton" type="submit" class="btn btn-success" @click.prevent="createPost()">Add</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { useAttrs } from 'vue';
import router from '../../router';

export default {
    data(){
        return {
            categoryAll: null,
            categoryID: null,
            title: null,
            text: null,
        }
    },
    methods: {
        createPost(){
            console.log({category_id: this.categoryID, title: this.title, text: this.text})
            axios.post('http://127.0.0.1:8000/api/post', {category_id: this.categoryID, title: this.title, text: this.text})
            .then(data => {
                console.log(data.data.data.id)
                if(data.status == 201) () => router.push({name: 'show.post', params: {id: data.data.data.id}})
            })
        },
        getCategory(){
            axios.get('http://127.0.0.1:8000/api/categories')
            .then(data => {
                console.log(data.data.data)
                this.categoryAll = data.data.data
            })
            .catch(console.error())
        },

    },
    computed: {
        disabledButton(){
            if(this.categoryID && this.title && this.text) return false
            else return true
        }
    },
    mounted(){
        this.getCategory()
    },
    updated(){
        console.log('UPDATED!')
    }
}
</script>