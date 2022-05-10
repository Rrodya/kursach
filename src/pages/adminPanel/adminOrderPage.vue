<template>
  <div class="order-content">
    <div class="order-content__title">Orders</div>
    <div class="order-list" v-if="orders">
      <div class="order-item" v-for="item in orders" :key="item">
          <div class="order-itemLeft">
            <p class="order-itemLeft__id">id заказа</p>
            <p class="order-itemLeft__id">id пользователя</p>
            <p class="order-itemLeft__id">Имя пользователя</p>
            <p class="order-itemLeft__id">Телефон</p>
            <p class="order-itemLeft__id">Почта</p>
            <p class="order-itemLeft__id">Цена</p>
            <p class="order-itemLeft__id">Артикул</p>
          </div>
        <div class="order-itemRight">
          <p class="order-itemLeft__id">{{ item[0] }}</p>
          <p class="order-itemLeft__id">{{ item[1] }}</p>
          <p class="order-itemLeft__id">{{ item[2] }}</p>
          <p class="order-itemLeft__id">{{ item[3] }}</p>
          <p class="order-itemLeft__id">{{ item[4] }}</p>
          <p class="order-itemLeft__id">{{ item[5] }}</p>
          <p class="order-itemLeft__id">{{ item[11] }}</p>
        </div>
      </div>
    </div>
    <div class="moreBtn">
      <button class="ordinaryButton" @click="seeMore">Еще</button>

    </div>
  </div>
</template>

<script>
export default {

  name: "adminOrderPage",
  data() {
    return {
      orders: '',
      str: 20
    }
  },
  methods: {
    seeMore(){
      this.str = this.str + 20;
      this.sendReq();

    },
    sendReq(){
      fetch('http://hokki/api/admin/getOrder.php', {
        method: 'POST',
        mode: 'cors',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: `str=${this.str}`
      })
          .then(res => res.json())
          .then(data => {
            this.orders = data.info;
          })
    }
  },
  created() {
    this.sendReq();
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
.order-item{
  display: flex;
  padding:20px;
  margin-bottom: 20px;
  background-color: #FFFFFF;
  border-radius: 10px;
  .order-itemLeft{
    width: 40%;
  }
}
.moreBtn{
  width: 250px;
  margin: 20px auto;
  .ordinaryButton{
    width: 100%;
    cursor: pointer;
    transition: all .1s linear;
  }
  .ordinaryButton:hover{
    transform: scale(1.1);
  }
}
</style>