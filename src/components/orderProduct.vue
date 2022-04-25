<template>
  <div class="orderCard">
    <div class="orderCard-left">
      <div class="orderCard-left__image">
        <img :src="item.img" alt="">
      </div>
      <div class="orderCard-mainInfo">
        <p class="orderCard-mainInfo__name">{{item.name}}</p>
        <p class="orderCard-mainInfo__price">{{ getPrice }} $</p>
      </div>
    </div>
    <div class="orderCard-right">
      <p class="orderCard-countInfo__count">Count: <span>{{getCount}}</span></p>
    </div>
  </div>
</template>

<script>
export default {
  name: "orderProduct",
  data() {
    return {
      localBasket: ''
    }
  },
  props: ['item'],
  created() {
    this.localBasket = localStorage.basket.split(',');
  },
  mounted() {

  },
  computed: {
    getPrice() {
      return this.getCount * this.item.price;
    },
    getCount(){
      let basketCorr = this.localBasket.filter(item => item == this.item.id);
      return basketCorr.length;
    }
  }
}
</script>

<style scoped lang="scss">
.orderCard{
  width: 100%;
  border-radius: 10px;
  height: 5rem;
  padding: 4px;
  background-color: #FFFFFF;
  margin-bottom: 7px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  .orderCard-left{
    width: 60%;
    height: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    .orderCard-left__image{
      width: 30%;
      height: 100%;
      overflow: hidden;
      border-radius: 9px;
      img{
        width: 100%;
        min-height: 100%;
        object-fit: cover;
      }
    }
    .orderCard-mainInfo{
      width: 65%;

    }
    img{
      min-height: 100%;
      min-width: 100%;
    }
  }
  .orderCard-mainInfo{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 20px 0;
    &__name{
      font-size: 12px;
      font-weight: 600;
      color: #363636;
    }
    &__price{
      font-size: 15px;
      font-weight: 600;
      color: #FF6600;
    }
  }
  .orderCard-right{
    width: 25%;
    .orderCard-countInfo__count{
      font-weight: 500;
      span{
        color: #FF6600;
        font-weight: 600;
      }
    }
  }
}
</style>