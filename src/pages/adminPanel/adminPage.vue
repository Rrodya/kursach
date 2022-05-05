<template>
  <div class="adminPage-container">
    <div class="adminPage-content">
      <div class="adminPage-header">
        <div @click="goRoute('adminOrderPage')" class="admin-header__item orders">Заказы</div>
        <div @click="goRoute('adminProductsPage')" class="admin-header__item products">Продукты</div>
        <div @click="goRoute('adminUsersPage')" class="admin-header__item users">Пользователи</div>
        <button @click="$router.push({name: 'main'})" class="adminButton">Выйти</button>

      </div>
      <router-view/>

    </div>
  </div>
</template>

<script>
export default {
  name: "adminPage",
  methods: {
    goRoute(route){
      this.$router.push({name: route, params: {id: this.$route.params.id}});
    },
  }
}
</script>

<style scoped lang="sass">
.adminPage-container
  background-color: #EDEDED
  min-height: 100vh
  height: 100%
  padding-bottom: 50px

  .adminPage-content
    width: 40%
    margin: 0 auto
    min-width: 600px

    .adminPage-header
      width: 100%
      display: flex
      align-items: center
      justify-content: space-between
      padding: 15px 0
      padding-top: 20px
      adminButton
        cursor: pointer
      li
        list-style: none
        font-weight: 600
        font-size: 17px
        cursor: pointer


</style>