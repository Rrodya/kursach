<template>
 <div class="productCard-container">
   <div class="goBack" @click="$router.push({name: $route.params.backPath ? $route.params.backPath : 'productList', params: {id: $route.params.id, idCatalog: $route.params.idCatalog}})">
     <svg  width="8" height="12" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
       <path d="M4 1L1 4L4 7" stroke="#363636  " stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
     </svg>
   </div>
   <div class="productCard-mainPart">
     <img :src="productInfo.img" alt="">
     <div class="productCard-mainPartBox">
       <div class="productCard-mainPartBoxPrice">
         <p class="productCard-price">{{productInfo.price}} ₽</p>
         <p class="productCard-name">{{productInfo.name}}</p>
       </div>
       <button
           :class="{isAdded: isAdded}"
           @click="isAdded ? removeBasket() : addBasket()"
           class="ordinaryButton productCard-button"

        > {{isAdded ? 'Remove' : 'Add to the bakset'}}</button>
<!--       <button v-else @click="removeBasket" class="ordinaryButton productCard-button isAdded">Remove from bakset</button>-->
     </div>
   </div>
   <div class="productCard-descriptionPart"><p class="productCard__description">{{productInfo.description}}</p></div>
 </div>
</template>

<script>
export default {
  name: "productCard",
  data() {
    return {
      productInfo: [],
      isAdded: false
    }
  },
  methods: {
    removeBasket(){
      let localBasket = localStorage.basket.split(',').filter(item => item != this.productInfo.id_product);
      localStorage.basket = '';
      localStorage.basket = [...localBasket];
      this.isAdded = false;
    },
    addBasket(){
      if(localStorage.basket){
        localStorage.basket = [...localStorage.basket.split(','), this.productInfo.id_product];
      } else {
        console.log(this.productInfo.id_product);
        localStorage.basket = this.productInfo.id_product;
      }
      this.isAdded = true;
    }
  },
  mounted() {
    fetch('http://hokki/api/catalog/getOneProduct.php', {
      method: 'POST',
      mode: 'cors',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      body: `id=${this.$route.params.idProduct}`
    })
        .then(res => res.json())
        .then(data => {
          this.productInfo = Object.assign(data.info);
          this.productInfo.img = require(`../assets/img/${data.info.img}`);
          if(localStorage.basket){
            let hasAdded = localStorage.basket.split(',').filter(item => item == this.productInfo.id_product);
            if(hasAdded[0]){
              this.isAdded = true;
            } else {
              this.isAdded = false;
            }
          }

        });
  }
}
</script>

<style scoped lang="scss">
.productCard-container{
  margin-top: 50px;
  .goBack{
    margin-bottom: 3rem;
    width: 40px;
    height: 40px;
    cursor: pointer;
    display: flex;
    justify-content: flex-start;
    align-items: center;
  }
  .productCard-mainPart{
    display: flex;
    justify-content: space-between;
    img{
      border-radius: 14px;
      width: 50%;
    }
    .productCard-mainPartBox{
      width: 50%;
      padding: 20px 0 0 20px;
      display: flex;
      justify-content: space-between;
      flex-direction: column;
      .productCard-mainPartBoxPrice{
        .productCard-price{
          font-weight: 700;
          color: #FF6600;
          font-size: 28px;
        }
        .productCard-name{
          margin-top: 10px;
          font-size: 24px;
          font-weight: 600;
        }
      }
      .productCard-button{
        width: 100%;
        cursor: pointer;
        border-radius: 14px;
        transition: all .3s ease;
      }
    }
  }
  .productCard-descriptionPart{
    margin-top: 30px;
    p{
      color:  #706F6F;
      font-size: 14px;
    }
  }

  .isAdded{
    background-color: #FFFFFF;
    color: #363636;
  }
}
</style>