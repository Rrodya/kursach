<template>
  <div class="adminPage-container">
    <div class="adminPage-header">
      <div @click="goRoute('adminOrderPage')" class="admin-header__item orders">Заказы</div>
      <div @click="goRoute('adminProductsPage')" class="admin-header__item products">Продукты</div>
      <div @click="goRoute('adminUsersPage')" class="admin-header__item users">Пользователи</div>
      <button @click="getInfo" class="adminButton getInfoOrder">Получить журнал заказов за последний месяц</button>
      <button @click="$router.push({name: 'main'})" class="adminButton">Выйти</button>
    </div>
    <div class="adminPage-content">

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
    getInfo(){
      document.location.href = `http://hokki/api/order/getInfoOrders.php`;

      //
      // fetch('http://hokki/api/admin/getInfoOrders.php', {
      //   method: 'GET',
      //   mode: 'cors',
      //   headers: {
      //     'Accept': 'application/json',
      //     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      //   },
      // })
    }
  },
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
    width: 60%
    display: flex
    min-width: 600px
    margin: 0 auto
    align-items: center
    justify-content: space-between
    padding: 15px 0
    padding-top: 20px
    .getInfoOrder
      padding: 0 15px
    .adminButton
      cursor: pointer
    li
      list-style: none
      font-weight: 600
      font-size: 17px
      cursor: pointer
    .admin-header__item
      cursor: pointer

</style>