<template>
  <div class="productList-item" @click="goRouter">
    <img :src="item.img" alt="">
<!--    <div class="productList__title">{{item.name}}</div>-->
    <div class="productList__price">{{item.price}} ₽</div>
  </div>
</template>

<script>
export default {
  name: "productListItem",
  props: ['item'],
  methods: {
    goRouter(){
      this.$router.push({name: 'productCard', params: {id: this.$route.params.id, idProduct: this.item.id, idCatalog: this.$route.params.idCatalog}})
    }
  }
}
</script>

<style scoped lang="scss">
.productList-item{
  cursor: pointer;
  position: relative;
  margin-bottom: 40px;
  img{
    width: 100%;
    border-radius: 14px;

  }
  .productList__title{
    position: absolute;
    left: 10px;
    bottom: 10px;
    color: white;
    font-weight: 700;
  }
  .productList__price{
    position: absolute;
    border-radius: 7px;
    color: white;
    font-weight: 600;
    font-size: 12px;
    left: 10px;
    top: 10px;
    padding: 5px 8px;
    background-color: #FF6600;
  }
}
</style>