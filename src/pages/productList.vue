<template>
  <div class="productList-container">
    <p class="titleCatalog-title">Kitchen</p>
    <div class="productList-box">
      <product-list-item v-for="item in 43" :key="item" :item="item"/>
    </div>
  </div>
</template>

<script>
import productListItem from "@/components/productListItem";
export default {
  name: "productList",
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
  font-size: 22px;
  font-weight: 700;
}
.productList-box{
  margin-top: 30px;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-column-gap: 2vw;
}

</style>