<template>
  <div class="catalogList">
    <p class="catalogList-title">
      Catalog</p>
    <div class="catalogList-page">
      <div
          class="catalogItem"
          v-for="catalogItem in catalogList"
          :key="catalogItem"
          @click="$router.push({name: 'productList', params: {id: $route.params.id, idCatalog: catalogItem.id}})"
      >
        <p>{{catalogItem.name}}</p>
        <svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 1L4 4L1 7" stroke="#706F6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "catalogHeader.vue",
  mounted() {
    fetch('http://hokki/api/catalog/getCatalog.php', {
      method: 'POST',
      mode: 'cors',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },

    }).then(res => res.json()).then(data => {
      this.catalogList = data.info.map(item => {
        return {
          id: item.id_catalog,
          name: item.name
        }
      })
    });
  },
  data() {
    return {
      catalogList: []
    }
  },
  methods: {

  }
}
</script>

<style scoped lang="scss">
.catalogList{
  margin-top: 30px;
  .catalogList-title{
    font-size: 22px;
    font-weight: 700;
    color: #4A4646;
    cursor: pointer;
  }
  .catalogList-page{
    margin-top: 30px;
  }
  .catalogItem{
    width: 100%;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-radius: 14px;
    padding: 0 20px;
    background-color: #FFFFFF;
    margin-top: 10px;
    cursor: pointer;
    p{
      color: #706F6F;
      font-weight: 500;
    }
  }
}
</style>