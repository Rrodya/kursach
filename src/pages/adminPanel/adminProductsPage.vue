<template>
  <div class="order-content">
    <div class="order-content__title">
      <p class="title">Продукты</p>
      <button class="adminButton" @click="$router.push({name: 'addProduct'})">Добавить</button>
    </div>
    <div class="order-list" v-if="products">
      <div class="orderItem" v-for="item in products" :key="item">
        <div class="productTop">
          <div class="productTop-img">
            <img :src="item.img" alt="">
          </div>
          <div class="productTop-info">
            <p class="productTop__name"><span class="call">id:</span> <span>{{item.id}}</span></p>
            <p class="productTop__name"><span class="call">Имя:</span> <span>{{item.name}}</span></p>
            <p class="productTop__name"><span class="call">Артикуль:</span> <span>{{item.articul}}</span></p>
            <p class="productTop__name"><span class="call">Цена:</span> <span>{{item.price}}</span></p>
            <p class="productTop__name"><span class="call">Популярный:</span> <span>{{item.isPopular ? 'Да' : 'Нет'}}</span></p>
            <button class="adminButton" @click="deletProd(item.id)">Удалить</button>
          </div>
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
  name: "adminProductsPage",
  data() {
    return {
      products: '',
      str: 10,
    }
  },
  mounted() {
    this.getProduts();
  },
  methods: {
    seeMore(){
      this.str = this.str + 10;
      this.getProduts();
    },
    deletProd(id){
      fetch('http://hokki/api/admin/deleteProd.php', {
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
              this.getProduts();
            }
          });
    },
    getProduts() {
      fetch('http://hokki/api/admin/getProducts.php', {
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
            this.products = data.info;
            this.products = data.info.map(item => {
              return {
                id: item[0],
                idCatalog: item[1],
                articul: item[2],
                name: item[3],
                price: item[4],
                img: require(`../../assets/img/${item[5]}`),
                description: item[6],
                isPopular: item[7],
              }
            })
          });
    }
  }
}
</script>

<style scoped lang="scss">
.order-content__title{
  display: flex;
  justify-content: space-between;
  align-items: center;
  .title{
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 40px;
    margin-top: 30px;
  }
  button{
    font-weight: 600;
    cursor: pointer;
  }

}
.order-list{
  .orderItem{
    width: 100%;
    margin-bottom: 100px;
    border-radius: 10px;
    background-color: #F4F4F4;
    padding: 20px;
    .productTop{
      display: flex;
      justify-content: space-between;
      .productTop-img{
        width: 50%;
        img{
          max-width: 100%;
        }
      }
      .productTop-info{
        width: 50%;
        display: flex;
        .productTop__name{
          display: flex;
          justify-content: space-between;
        }
        .adminButton{
          background-color: #FF6600;
          color: white;
          margin-left: 20px;
          margin-top: 50px;
          width: 50%;
          cursor: pointer;
        }
        flex-direction: column;
        span{
          margin-left: 20px;
        }
      }
    }
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