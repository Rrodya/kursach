<template>
  <div class="makingOrder">
    <div v-if="isComplete" class="orderComplete">
      <p>Thank you, your order has been placed, after 10 calendar days you can come to the nearest warehouse and pick it up.<br/> Your order's ID is "{{idOrder}}"</p>
      <button
          type="button"
          class="ordinaryButton"
          @click="$router.push({name: 'home', params: {id: $route.params.id}})"
      >Go home!</button>
    </div>
    <div v-else class="makingOrder-container">
      <div class="nameOrder">
        <svg width="8" height="12" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 1L1 4L4 7" stroke="#363636  " stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <p>Some order</p>
      </div>

      <div class="makingOrder-info">
        <div class="nameOrderItem nameOrder-name">
          <p class="nameOrder-nameDesc">Name:</p>
          <p class="nameOrder-nameText nameOrder-text">{{ orderInfo.name }}</p>
        </div>
        <div class="nameOrderItem nameOrder-email">
          <p class="nameOrder-nameDesc">Email:</p>
          <p class="nameOrder-nameText nameOrder-text">{{ orderInfo.email }}</p>
        </div>
        <div class="nameOrderItem nameOrder-phone">
          <p class="nameOrder-nameDesc">Phone:</p>
          <p class="nameOrder-nameText nameOrder-text">{{orderInfo.phone}}</p>
        </div>
      </div>
      <div class="orderList">
        <p class="orderList-name">Your order</p>
        <div class="orderList-orders">
          <order-product v-for="item in basketInfo" :key="item" :item="item"/>
        </div>
      </div>
      <div class="orderList-totalPrice">
        <p class="orderList-totalPrice__text">Price</p>
        <p class="orderList-totalPrice__price">{{ getTotalPrice }} $</p>
      </div>
      <button
          type="button"
          @click="sendOrder"
          class="orderList-totalPrice__bookingButton ordinaryButton">Booking</button>
    </div>
  </div>
</template>

<script>
import orderProduct from "@/components/orderProduct";
export default {
  name: "orderPage",
  methods: {
    sendOrder(){
      let {id, name, email, phone} = this.orderInfo;
      let idProducts = localStorage.basket.split(',');
      fetch('http://hokki/api/order/setOrder.php', {
        method: 'POST',
        mode: 'cors',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: `id=${id}&name=${name}&email=${email}&phone=${phone}&idProducts=${idProducts}&price=${this.getTotalPrice}`
      })
          .then(res => res.json())
          .then(data => {
            if(data.message === 'ok'){
              this.isComplete = true;
              this.idOrder = data.idOrder;
            }
          });
    }
  },
  computed: {
    getTotalPrice(){
      let totalPrice = 0;
      localStorage.basket.split(',').forEach(item => {
        this.basketInfo.forEach(el => {
          if(item == el.id){
            let elPrice = Number(el.price);
            totalPrice = totalPrice + elPrice;
          }
        })
      })
      return totalPrice;
    },
  },
  data() {
    return {
      orderInfo: '',
      basketInfo: [],
      isComplete: false,
      idOrder: null
    }
  },
  created() {
    this.basketListStr = [...localStorage.basket.split(',')];
    let basketSendData = this.basketListStr.filter((item, index) => this.basketListStr.indexOf(item) == index);
    this.basketEmpty = false
    console.log(basketSendData);
    let sendBody = basketSendData.join(',');
    const id = localStorage.authId;
    fetch('http://hokki/api/order/getInfoOrder.php', {
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
          if(data.message === 'ok'){
            this.orderInfo = data.info;
            console.log('ok');
          }
        });
    fetch('http://hokki/api/basket/getBasket.php', {
      method: 'POST',
      mode: 'cors',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      body: `str=${sendBody}`
    })
        .then(res => res.json())
        .then(data => {
            if(data.message === 'ok'){
              this.basketInfo = data.info;
              this.basketInfo = data.info.map(item => {
                return {
                  id: item.id_product,
                  name: item.name,
                  price: item.price,
                  img: require(`../assets/img/${item.img}`)
                }
              })
            }
        })
  },
  components: {
    orderProduct
  },

}
</script>

<style scoped lang="scss">
.orderComplete{
  width: 400px;
  margin: 0  auto;
  padding-top: 100px;
}
.makingOrder{
  background-color: #EDEDED;
  min-height: 100vh;
  height: 100%;
  padding-bottom: 100px;
  .makingOrder-container{
    //width: 30%;
    width: 400px;
    margin: 0  auto;
    padding-top: 100px;
    .nameOrder{
      color: #363636;
      font-weight: 700;
      cursor: pointer;
      font-size: 22px;
      display: flex;
      align-items: center;
      p{
        margin-left: 10px;
      }
    }
    .ordinaryInput{
      width: 100%;
    }
    .makingOrder-info{
      margin-top: 50px;
      .nameOrderItem{
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 15px;
        margin-bottom: 10px;
        font-weight: 600;
        .nameOrder-text{
          width: 50%;
        }
      }
    }
    .makingOrder-infoAddress{
      .makingOrder-postIndex{
        margin-top: 20px;
      }
      .inputAddress{
        color: #FF6600;
      }
      margin-top: 30px;
      .infoAddress-address{
        margin-top: 10px;
        .makingOrder-address{
          font-weight: 600;
        }
        .showAddress{
          margin-top: 10px;
        }
      }
      .showAddress{
        font-weight: 500;
      }
      .showPostIndex{
        margin-top: 10px;
      }
      .ordinaryInput{
        margin-top: 10px;
      }
      .makingOrder-postIndex{
        font-weight: 600;
      }
      .makingOrder-postIndex__text{
        color: #FF6600;
      }
    }
    .orderList{
      margin-top: 30px;
      .orderList-name{
        font-size: 17px;
        font-weight: 700;
      }
      .orderList-orders{
        margin-top: 20px;
      }
    }
  }
  .orderList-totalPrice{
    width: 100%;
    padding: 20px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 10px;
    margin-top: 30px;
    background-color: #FFFFFF;
    &__text{
      font-size: 17px;
      font-weight: 600;
      color: #FF6600;
    }
    &__price{
      font-size: 20px;
      font-weight: 700;
      color: #FF6600;
    }
  }
  .orderList-totalPrice__bookingButton{
    width: 100%;
    margin-top: 20px;
    cursor: pointer;
    height: 50px;
    transition: transform .1s linear;
    font-size: 16px;
  }
  .orderList-totalPrice__bookingButton:hover{
    transform: scale(1.05);
  }
}

.orderComplete{
  padding-top: 50px;
  display: flex;
  flex-direction: column;
  align-items: center;
  p{
    text-align: center;
    font-size: 22px;
    font-weight: 600;
  }
  button{
    margin-top: 30px;
    font-size: 13px;
    cursor: pointer;
    transition: all .1s linear;
  }
  button:hover{
    transform: scale(1.05);
  }

}
</style>