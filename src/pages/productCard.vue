<template>
 <div class="productCard-container">
   <div class="productCard-mainPart">
     <img src="../assets/example4.png" alt="">
     <div class="productCard-mainPartBox">
       <div class="productCard-mainPartBoxPrice">
         <p class="productCard-price">300 $</p>
         <p class="productCard-name">Nulla Lorem </p>
       </div>
       <button class="ordinaryButton productCard-button">Add to basket</button>
     </div>
   </div>
   <div class=" productCard-descriptionPart"><p class="productCard__description">Nulla Lorem mollit cupidatat irure. Laborum magna nulla duis ullamco cillum dolor. Voluptate exercitation incididunt aliquip deserunt reprehenderit elit laborum. Nulla Lorem mollit cupidatat irure. Laborum magna nulla duis ullamco cillum dolor. Voluptate exercitation incididunt aliquip deserunt reprehenderit elit laborum. Nulla Lorem mollit cupidatat irure. Laborum magna nulla duis ullamco cillum dolor. Voluptate exercitation incididunt aliquip deserunt reprehenderit elit laborum.  </p></div>
 </div>
</template>

<script>
export default {
  name: "productCard"
}
</script>

<style scoped lang="scss">
.productCard-container{
  margin-top: 50px;
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
        border-radius: 14px;
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
}
</style>