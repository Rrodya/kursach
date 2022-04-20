<template>
  <div class="backgroundImage">
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
  methods: {
    goRoute(route){
      this.$router.push({name: route});
    }
  }
}
</script>

<style scoped lang="scss">
.section-container{
  width: 40%;
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