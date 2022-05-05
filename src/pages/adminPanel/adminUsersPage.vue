<template>
  <div class="order-content">
    <div class="order-content__title">Пользователи</div>
    <div class="order-list" v-if="users">
      <div class="orderItem" v-for="item in users" :key="item">
        <div class="orderItem-info">
          <div class="orderItem__call">
            <li>Айди</li>
            <li>Имя</li>
            <li>Телефон</li>
            <li>Почта</li>
            <li>Пароль</li>
          </div>
          <div class="orderItem__value">
            <p class="orderItem__id">{{item[0]}}</p>
            <p class="orderItem__name">{{item[1]}}</p>
            <p class="orderItem__phone">{{item[2]}}</p>
            <p class="orderItem__gmail">{{item[3]}}</p>
            <p class="orderItem__password">{{item[4]}}</p>
          </div>
        </div>
<!--        <div class="orderItem-edit">-->
<!--          <div class="btn">-->
<!--            <button class="adminButton" @click="goDelete(item[0])">Удалить</button>-->
<!--          </div>-->
<!--        </div>-->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "adminUsersPage",
  data() {
    return {
      users: ''
    }
  },
  methods: {
    goDelete(id){
      fetch('http://hokki/api/admin/deleteUser.php', {
        method: 'POST',
        mode: 'cors',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: `id=${id}`
      })
          .then(res => res.json())
          .then(data => {
            if(data.check){
              this.getUsers();
            }
          });
    },
    getUsers(){
      fetch('http://hokki/api/admin/getUsers.php', {
        method: 'GET',
        mode: 'cors',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
      })
          .then(res => res.json())
          .then(data => {
            if(data.message === 'ok'){

              this.users = data.info;
              this.users = this.users.filter(item => item[5] != 1);
            } else {
              this.isError = true;
            }
          })
    }
  },
  mounted() {
      this.getUsers();
  }
}
</script>

<style scoped lang="scss">
.order-content__title{
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 40px;
  margin-top: 30px;
}
.order-list{

  width: 100%;
  .orderItem{
    display: flex;
    margin-bottom: 20px;
    background-color: #F4F4F4;
    border-radius: 10px;
    padding: 20px;
    justify-content: space-between;
    .orderItem-info{
      width: 70%;
      display: flex;
      justify-content: flex-start;
      .orderItem__call{
        list-style: none;

      }
      .orderItem__value{
        margin-left: 55px;
      }
    }

  }
}
</style>