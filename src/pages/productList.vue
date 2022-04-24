<template>
  <div class="productList-container">
    <div
        @click="$router.push({name: 'catalog', params: {id: $route.params.id, idCatalog: $route.params.idCatalog}})"
        class="titleCatalog-title">
      <svg  width="8" height="12" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 1L1 4L4 7" stroke="#363636  " stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      {{nameCatalog}}</div>
    <div class="productList-box">
      <product-list-item
          v-for="item in productList"
          :key="item"
          :item="item"
          class="productListItem"
      />
    </div>
  </div>
</template>

<script>
import productListItem from "@/components/productListItem";
export default {
  name: "productList",
  data() {
    return {
      productList: [],
      nameCatalog: '',
    }
  },
  mounted() {
    fetch('http://hokki/api/catalog/getProductList.php', {
      method: 'POST',
      mode: 'cors',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      body: `id=${this.$route.params.idCatalog}`
    })
        .then(res => res.json())
        .then(data => {
          if(data.message === 'ok'){
            this.productList = data.info.map(item => {
              return {
                id: item.id_product,
                name: item.name,
                img: require(`../assets/img/${item.img}`),
                price: item.price
              }
            })
            this.nameCatalog = data.nameCatalog;
          }
        })
  },
  components: {
    productListItem
  }
}
</script>

<style scoped lang="scss">

.productList-container{
  margin-top: 50px;
}
.titleCatalog-title{
  cursor: pointer;
  font-size: 22px;
  font-weight: 700;
}
.productList-box{
  margin-top: 30px;
  //display: grid;
  //grid-template-columns: repeat(3, 1fr);
  //grid-column-gap: 2vw;
  column-count: 3;
  column-gap: 1rem;
  width: 100%;
  .productListItem{
    break-inside: avoid;
    margin-bottom: 1rem;
  }
}

</style>