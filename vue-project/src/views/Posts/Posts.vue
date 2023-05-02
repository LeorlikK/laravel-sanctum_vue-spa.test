<template>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <template v-for="post, key in posts" :key="key">
        <tr>
            <th scope="row">{{ post.id }}</th>
            <td><RouterLink :to="{ name:'show.post', params: {id:post.id }}">{{ post.title }}</RouterLink></td>
            <td>{{ post.category.name }}</td>
            <td><button class="btn btn-success" @click.prevent="updatePost(post.id)">Update</button></td>
            <td><button class="btn btn-danger" @click.prevent="deletePost(post.id, key)">Delete</button></td>
            <!-- <td><button class="btn btn-danger"><RouterLink :to="{ name:'edit.post', params: {id:post.id }}">Delete</RouterLink></button></td> -->
        </tr>
    </template>
  </tbody>
</table>
</template>

<script>
import axios from 'axios'
import router from '../../router'
export default {
    data(){
        return {
            posts: null,
        }
    },
    methods:{
        getPosts(){
            axios.get('http://127.0.0.1:8000/api/posts')
            .then(data => {
                console.log(data.data.data)
                this.posts = data.data.data
            }).catch(error => {
                console.log(error)
            })
        },
        updatePost(id){
            router.push({name: 'edit.post', params:{id: id}})
        },
        deletePost(id, key){
            this.posts.splice(key, 1)
            // axios.delete(`http://127.0.0.1:8000/api/post/${id}/delete`)
            // .then(data => {
            //     console.log(data)
                // this.getPosts()
            // })
        }
    },
    computed:{
        test(){
            console.log('COMPUTED')
        }
    },
    created(){
        this.test
        this.getPosts()
    },
    updated(){
        console.log('UPDATED!')
    }
}
</script>