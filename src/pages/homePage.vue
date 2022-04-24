<template>
  <div v-if="$route.params.id" class="backgroundImage">
      <div class="background-home">
      <div class="home-header">
        <ul class="header-container">
          <li class="itemHeader itemHome" @click="goRoute('home')">Home</li>
          <li class="itemHeader itemCatalog" @click="goRoute('catalog')">Catalog</li>
          <li class="itemHeader itemLogo">HOKKI</li>
          <li class="itemHeader itemBasket" @click="goRoute('basket')">Basket</li>
          <li class="itemHeader itemProfile" @click="goRoute('profile')">Profile</li>
        </ul>
      </div>
      <div class="section-container">
        <router-view/>
      </div>
  </div>
  </div>
</template>

<script>
export default {
  name: "homePage",
   mounted() {

    if(this.$route.params.id){
      console.log(this.$route.params.id);
    } else {
      // const res = await fetch('http://hokki/api/home/checkAuth.php', {
      //   method: 'POST',
      //   mode: 'cors',
      //   headers: {
      //     'Accept': 'application/json',
      //     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      //   },
      //   body: `id=${localStorage.authId}&mail=${localStorage.mail}&password=${localStorage.password}`
      // })
      // const data = await res.json();
      // if(data.message !== 'ok'){
        this.$router.push({name: 'main'});
      // } else {
      //   this.$router.push({name: 'home', params: {id: localStorage.authId}});
      // }
    }
      //ч  else {
    //   if(localStorage.authId){
    //     if(!this.checkAuth()){
    //       this.$router.push({name: 'main'});
    //       console.log('cor')
    //
    //     }
    //   } else {
    //    this.$router.push({name: 'main'});
    //     console.log('coddr')
    //   }
    // }
  },

  methods: {
    goRoute(route){
      this.$router.push({name: route, params: {id: this.$route.params.id}});
    },

  }
}
</script>

<style scoped lang="scss">

.section-container{
  width: 40%;
  min-width: 600px;
  margin: 0 auto;
}
.backgroundImage{
  background-color: #EDEDED;
  min-height: 100vh;
  height: 100%;
}
.home-header{
  height: 80px;
  .header-container{
    width: 40%;
    min-width: 600px;
    height: 100%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    li{
      list-style: none;
      font-weight: 500;
      cursor: pointer;
    }
    .itemLogo{
      font-size: 28px;
      font-weight: 700;
      cursor: default;
      padding: 0 20px;
    }
  }
}
</style>