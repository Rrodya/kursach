<template>
  <div class="homeSection-container">
    <div class="salesContent">
      <p class="title">Sales</p>
      <div class="salesContent-box">
        <div class="salesContent-item" v-for="product in salesProducts" :key="product">
          <img :src="product.img" alt="">
        </div>
      </div>
      <p class="seeMore">
        See more
      </p>
    </div>
    <div class="popularContent">
      <p class="title">Sales</p>
      <div class="popularContent-box">
        <div class="salesContent-item" v-for="product in popularProducts" :key="product">
          <img :src="product.img" alt="">
        </div>
      </div>
      <p class="seeMore">
        See more
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "homeHeader.vue",
  data() {
    return {
      salesProducts: [
        {id: 1, img: require('../assets/expample.png')},
        {id: 2, img: require('../assets/expample.png')},
        {id: 3, img: require('../assets/expample.png')},
        {id: 4, img: require('../assets/expample.png')},
        {id: 5, img: require('../assets/expample.png')},
        {id: 6, img: require('../assets/expample.png')},
      ],
      popularProducts: [
        {id: 1, img: require('../assets/example2.png')},
        {id: 2, img: require('../assets/example2.png')},
        {id: 3, img: require('../assets/example2.png')},
        {id: 4, img: require('../assets/example2.png')},
        {id: 5, img: require('../assets/example2.png')},
        {id: 6, img: require('../assets/example2.png')},
      ]
    }
  },
}
</script>

<style scoped lang="scss">
.salesContent, .popularContent{
  position: relative;
  .title{
    font-size: 20px;
    font-weight: 600;
  }
  .seeMore{
    position: absolute;
    right: 10px;
    bottom: -10px;
    font-size: 14px;
    cursor: pointer;
    font-weight: 600;
    color: #FF6600;
  }
  .salesContent-box, .popularContent-box{
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;

    .salesContent-item{
      width: 30%;
      margin-bottom: 20px;
      img{
        width: 100%;
      }
    }
  }
}

.popularContent{
  margin-top: 30px;
  margin-bottom: 40px;
}
</style>