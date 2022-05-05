<template>
  <router-view/>
</template>

<script>

export default {
  mounted() {

  },
  methods: {
    checkAuth(){
      let id = localStorage.authId;
      let email = localStorage.mail;
      let password = localStorage.password;
      fetch('http://hokki/api/home/checkAuth.php', {
        method: 'POST',
        mode: 'cors',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: `id=${id}&mail=${email}&password=${password}`
      })
          .then(res => res.json())
          .then(data => {
            if(data.message === 'no'){
              this.$router.push({name: 'main'});
            }
          })
    }
  },
  name: 'App',
  components: {
  }
}
</script>

<style>

</style>
