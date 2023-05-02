<template>
    <div class="w-25" v-if="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category</label>
            <input type="text" class="form-control" readonly id="exampleFormControlInput1" :placeholder="post.category.name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control disabled" readonly id="exampleFormControlInput1" :placeholder="post.title">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control disabled" readonly id="exampleFormControlTextarea1" rows="3" :placeholder="post.text"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success" @click.prevent="editPost()">Update</button>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import router from '../../router';

export default {
    data(){
        return {
            post: null
        }
    },
    methods: {
        showPost(){
            axios.get(`http://127.0.0.1:8000/api/post/${this.$route.params.id}`)
            .then(data => {
                console.log(data)
                this.post = data.data.data
            })
            .catch(console.error())
        },
    },
    mounted(){
        this.showPost()
    }
}
</script>