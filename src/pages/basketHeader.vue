<template>
  <div class="basketPage-container">
    <div class="basketPage-top">
      <div class="basketPage-top__title">Basket</div>
      <div class="top-totalPrice">
        <p class="top-totalPrice__text">Price:</p>
        <div class="top-totalPrice__price">
          <p class="top-totalPrice__priceText">1800 $</p>
          <button type="button" class="ordinaryButtonWhite top-totalPrice__buyBtn">Booking</button>
        </div>
      </div>
    </div>
    <div class="basketPage-productList">
      <basket-product-card v-for="item in 10" :key="item" :item="item"/>
    </div>
  </div>
</template>

<script>
import basketProductCard from "@/components/basketProductCard";
export default {
  name: "basketHeader.vue",
  components: {
    basketProductCard
  }
}
</script>

<style scoped lang="scss">
.basketPage-top{
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  &__title{
    font-size: 22px;
    font-weight: 700;
    color: #4A4646;
    width: 20%;
  }
  .top-totalPrice{
    display: flex;
    background-color: #FF6600;
    border-radius: 14px;
    justify-content: space-between;
    align-items: center;
    width: 80%;
    padding: 10px;
    .top-totalPrice__text{
      font-weight: 600;
      color: #FFFFFF;
    }
    .top-totalPrice__price{
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 70%;
      .top-totalPrice__priceText{
        font-weight: 600;
        color: #FFFFFF;

      }
      .top-totalPrice__buyBtn{
        font-size: 14px;
        cursor: pointer;
        height: 35px;
      }
    }
  }
}

.basketPage-container{
  margin-top: 30px
}
.basketPage-productList{
  margin-top: 30px;
}


</style>