<template>
  <div v-if="!basketEmpty" class="basketPage-container">
    <div class="basketPage-top">
      <div class="basketPage-top__title">Basket</div>
      <div class="top-totalPrice">
        <p class="top-totalPrice__text">Price:</p>
        <div class="top-totalPrice__price">
          <p class="top-totalPrice__priceText">1800 $</p>
          <button
              type="button"
              @click="$router.push({name: 'order', params: {id: $route.params.id}})"
              class="ordinaryButtonWhite top-totalPrice__buyBtn">Booking</button>
        </div>
      </div>
    </div>
    <div class="basketPage-productList">
      <basket-product-card
          v-for="item in basketListInfo"
          :key="item"
          :item="item"
      />
    </div>
  </div>
  <div v-else class="basketPage-container">
    <p class="emptyTitle">
      Basket is empty
    </p>
  </div>
</template>

<script>
import basketProductCard from "@/components/basketProductCard";
export default {
  name: "basketHeader.vue",
  data() {
    return {
      basketListStr: [],
      basketListInfo: [],
      basketEmpty: true
    }
  },
  computed: {

  },

  mounted() {
    if(localStorage.basket){
      this.basketListStr = [...localStorage.basket.split(',')];
      let basketSendData = this.basketListStr.filter((item, index) => this.basketListStr.indexOf(item) == index);
      this.basketEmpty = false
      console.log(basketSendData);
      let sendBody = basketSendData.join(',');

      fetch('http://hokki/api/basket/getBasket.php', {
        method: 'POST',
        mode: 'cors',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: `str=${sendBody}`
      }).then(res => res.json()).then(data => {
        if(data.message === 'ok'){
          this.basketListInfo = data.info;
          this.basketListInfo = data.info.map(item => {
            return {
              id: item.id_product,
              name: item.name,
              price: item.price,
              img: require(`../assets/img/${item.img}`),
              description: item.description
            }
          })
        }
      });
    } else {
      this.basketEmpty = true;
    }
  },
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
.emptyTitle{
  text-align: center;
  margin-top: 50px;
  font-size: 32px;
  font-weight: 700;
  color: #363636;
}

</style>