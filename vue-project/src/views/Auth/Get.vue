<template>
  <h1>Get</h1>
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
    loginPost(){
      axios.post('http://127.0.0.1:8000/login', {email:this.email, username:this.username, password:this.password},
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