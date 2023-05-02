<template>
  <div class="w-25">
    <div class="mb-3">
      <label for="exampleFormControlEmail" class="form-label">Email</label>
      <input type="email" class="form-control" id="exampleFormControlEmail" placeholder="Title">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlUserName" class="form-label">UserName</label>
      <input type="text" class="form-control" id="exampleFormControlUserName" placeholder="Title">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlPassword" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleFormControlPassword" placeholder="Title">
    </div>
    <button class="btn btn-success" @click.prevent="registrationPost()">Registration</button>
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
    registrationPost(){
      axios.post('http://127.0.0.1:8000/register', {email:this.email, username:this.username, password:this.password},
        {headers: {
            Accept: 'application/json',
            // 'Access-Control-Allow-Origin:'
          }}
      )
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