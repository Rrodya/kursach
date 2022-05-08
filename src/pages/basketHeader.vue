<template>
  <div v-if="!basketEmpty" class="basketPage-container">
    <div class="basketPage-top">
      <div class="basketPage-top__title">Корзина</div>
          <button
              type="button"
              @click="$router.push({name: 'order', params: {id: $route.params.id}})"
              class="ordinaryButtonWhite top-totalPrice__buyBtn">Заказать <span>{{totalPrice}}₽</span></button>
    </div>
    <div class="basketPage-productList">
      <basket-product-card
          v-for="item in basketListInfo"
          :key="item"
          :item="item"
          @remove="removeElement"
          @checkTotal="getTotalPrice"
      />
    </div>
  </div>
  <div v-else class="basketPage-container">
    <p class="emptyTitle">
      Корзина пуста
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
      basketEmpty: true,
      totalPrice: 0,
    }
  },
  computed: {

  },
  methods: {
    getTotalPrice(){
      let total = 0;
      this.basketListInfo.forEach(item => {
        let price = Number(item.price);
        localStorage.basket.split(',').forEach(itemLocal => {
          if(itemLocal == item.id){
            total = total + price;
          }
        })
      })
      // let total = this.basketListInfo.reduce((sum, item) => sum + Number(item.price), 0);
      this.totalPrice = total;
    },
    removeElement(id){
      let localBasket = localStorage.basket.split(',');
      let newBasket = localBasket.filter(item => item !== id);
      localStorage.basket = newBasket.join(',');
      if(localStorage.basket){
        this.request()
      } else {
        this.basketEmpty = true;
      }
      this.getTotalPrice();
    },
    request(){
      this.basketListStr = [...localStorage.basket.split(',')];
      let basketSendData = this.basketListStr.filter((item, index) => this.basketListStr.indexOf(item) == index);
      this.basketEmpty = false
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
              description: item.description.slice(1, 30)
            }
          })
        }
        this.getTotalPrice();

      });
    }
  },

  mounted() {
    if(localStorage.basket){
      this.request()
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
  .top-totalPrice__buyBtn{
    font-size: 14px;
    cursor: pointer;
    height: 35px;
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

.ordinaryButtonWhite{
  background-color: #FF6600;
  color: white;
  font-weight: 600;

}


</style>