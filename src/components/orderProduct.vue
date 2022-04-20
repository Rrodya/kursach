<template>
  <div class="orderCard">
    <div class="orderCard-left">
      <div class="orderCard-left__image">
        <img src="../assets/example6.png" alt="">
      </div>
      <div class="orderCard-mainInfo">
        <p class="orderCard-mainInfo__name">Sofa Namel</p>
        <p class="orderCard-mainInfo__price">300 $</p>
      </div>
    </div>
    <div class="orderCard-right">
      <p class="orderCard-countInfo__count">Count: <span>4</span></p>
    </div>
  </div>
</template>

<script>
export default {
  name: "orderProduct"
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