<template>
    <div class="w-25">
        <label for="exampleFormControlSelect" class="form-label">Category</label>
        <select id="exampleFormControlSelect" class="form-select" aria-label="Default select example" v-model="categoryID">
            <option 
            v-for="(category, key) in categories"
            :key="key"
            :value="category.id"
            :selected="category.id == categoryID ? 'selected' : '' "
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
            <button :disabled="disabledButton" type="submit" class="btn btn-success" @click.prevent="editPost()">Update</button>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import router from '../../router';

export default {
    data(){
        return {
            categories: null,
            categoryID: null,
            id: null,
            title: null,
            text: null,
        }
    },
    methods: {
        showPost(){
            axios.get(`http://127.0.0.1:8000/api/post/${this.$route.params.id}`)
            .then(data => {
                console.log(data.data.data)
                data = data.data.data
                this.categoryID = data.category.id
                this.id = data.id
                this.title = data.title
                this.text = data.text
            })
            .catch(console.error())
        },
        getCategories(){
            axios.get('http://127.0.0.1:8000/api/categories')
            .then(data => {
                this.categories = data.data.data
                console.log(data.data.data)
            }).catch(error => {
                console.log(error)
            })
        },
        editPost(){
            axios.post(`http://127.0.0.1:8000/api/post/${this.id}/edit`, {category_id: this.categoryID, title: this.title, text: this.text})
            .then(data => {
                console.log(data)
                router.push({name:'posts'})
            })
            .catch(error => {
                console.log(error)
            })
        },
    },
    computed: {
        disabledButton(){
            if(this.categoryID && this.title && this.text) return false
            else return true
        }
    },
    mounted(){
        this.showPost()
        this.getCategories()
    }
}
</script>