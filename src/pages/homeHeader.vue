<template>
  <div class="homeSection-container">
    <div class="salesContent">
      <p class="title">Популярные</p>
      <div class="salesContent-box" v-if="popularProd">
        <div
            class="salesContent-item"
            v-for="(product, index) in popularProd"
            :key="product"
            @click="goRoute(index)"
        >
          <p>{{popularProd.id}}</p>
          <img :src="product.img" alt="noImg">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    goRoute(index){
      this.$router.push({name: 'productCard', params: {id: this.$route.params.id, idProduct: this.popularProd[index].id, backPath: 'home'}})
    }
  },
  mounted() {
    fetch('http://hokki/api/home/popular.php', {
      method: 'POST',
      mode: 'cors',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      body: `str=${this.str}`
    }).then(res => res.json()).then(data => {
      const arrData = data.info;
      this.popularProd = arrData.map(item => {
        return {
          id: item.id_product,
          img: require(`../assets/img/${item.img}`)
        }
      })
    });
  },

  name: "homeHeader.vue",
  data() {
    return {
      str: 1,
      popularProd: false,
    }
  },
}
</script>

<style scoped lang="scss">
.homeSection-container{
  margin-top: 30px;
  padding-bottom: 30px;
}
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
    column-count: 3;
    column-gap: 1rem;
    width: 100%;
    .salesContent-item{
      cursor: pointer;
      break-inside: avoid;
      margin-bottom: 1rem;
      img{
        border-radius: 10px;
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