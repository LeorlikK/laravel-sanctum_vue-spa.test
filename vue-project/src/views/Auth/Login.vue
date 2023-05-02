<template>
  <div class="w-25">
    <div class="mb-3">
      <label for="exampleFormControlEmail" class="form-label">Email</label>
      <input v-model="email" type="email" class="form-control" id="exampleFormControlEmail">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlUserName" class="form-label">UserName</label>
      <input v-model="username" type="text" class="form-control" id="exampleFormControlUserName">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlPassword" class="form-label">Password</label>
      <input v-model="password" type="password" class="form-control" id="exampleFormControlPassword">
    </div>
    <button class="btn btn-success" @click.prevent="loginSanctum()">Login</button>
    <RouterLink :to="{name: 'main'}">Back</RouterLink>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Login",

  data(){
    return {
      email:null,
      username:null,
      password:null,
    }
  },
  methods: {
    loginSanctum(){
      axios.get('http://127.0.0.1:8000/sanctum/csrf-cookie').then(response => {
          console.log(response)
          }
      ).catch(error => {
        console.log(error);
      })
    },
    loginForty(){
      console.log(this.email, this.username, this.password)
      axios.post('http://127.0.0.1:8000/login', {email:this.email, username:this.username, password:this.password})
          .then(response => {
            console.log(response)
          }).catch(error => {
        console.log(error);
      })
    },
    loginAll(){
      axios.get('http://127.0.0.1:8000/sanctum/csrf-cookie').then(response => {
        console.log(response)
        // localStorage.setItem('X-XSRF-TOKEN', 'LALALALA')
        // console.log('Start')
        // console.log(localStorage.getItem('X-XSRF-TOKEN'))
        // console.log('End')
        console.log(this.email, this.username, this.password)
        axios.post('http://127.0.0.1:8000/login', {email:this.email, username:this.username, password:this.password},{headers:{Accept:'application/json'}})
        //     {headers: {Accept:'application/json',
        //         'Access-Control-Allow-Origin': true}}
      })
          .then(data => {
            console.log(data);
          }).catch(error => {
        console.log(error);
      })
    }
  }
}
</script>

<style scoped>

</style>