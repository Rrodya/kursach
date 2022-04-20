<template>
  <div class="makingOrder">
    <div class="makingOrder-container">
      <div class="nameOrder">
        <svg width="8" height="12" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 1L1 4L4 7" stroke="#363636  " stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <p>Some order</p>
      </div>

      <div class="makingOrder-info">
        <div class="nameOrderItem nameOrder-name">
          <p class="nameOrder-nameDesc">Name:</p>
          <p class="nameOrder-nameText nameOrder-text">Rodion</p>
        </div>
        <div class="nameOrderItem nameOrder-email">
          <p class="nameOrder-nameDesc">Email:</p>
          <p class="nameOrder-nameText nameOrder-text">rodjaolast002@gmail.com</p>
        </div>
        <div class="nameOrderItem nameOrder-phone">
          <p class="nameOrder-nameDesc">Phone:</p>
          <p class="nameOrder-nameText nameOrder-text">+79950202042</p>
        </div>
      </div>
      <div class="makingOrder-infoAddress">
        <div class="infoAddress-address makingOrder-infoAddress">
          <p class="makingOrder-address inputAddress">Input your address</p>
          <input type="text" class="inputAddress ordinaryInput" placeholder="Address">
          <p class="showAddress makingOrder-address">Ufa street Puskin dom 1</p>
        </div>
        <div class="makingOrder-postIndex makingOrder-infoAddress">
          <p class="makingOrder-postIndex__text">Input your post index</p>
          <input type="text" class="inputPostIndex ordinaryInput" placeholder="Post index">
          <p class="showPostIndex">453020</p>
        </div>
      </div>
      <div class="orderList">
        <p class="orderList-name">Your order</p>
        <div class="orderList-orders">
          <order-product v-for="item in 17" :key="item" :item="item"/>
        </div>
      </div>
      <div class="orderList-totalPrice">
        <p class="orderList-totalPrice__text">Price</p>
        <p class="orderList-totalPrice__price">3000 $</p>
      </div>
      <button
          type="button"
          class="orderList-totalPrice__bookingButton ordinaryButton">Booking</button>
    </div>
  </div>
</template>

<script>
import orderProduct from "@/components/orderProduct";
export default {
  name: "orderPage",
  components: {
    orderProduct
  }
}
</script>

<style scoped lang="scss">
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
    transition: transform .2s ease-in-out;
    font-size: 16px;
  }
  .orderList-totalPrice__bookingButton:hover{
    transform: scale(1.05);
  }
}
</style>