<template>
<div class="basketCard-container">
  <div class="basketCard-img">
    <img src="../assets/example5.png" alt="">
  </div>
  <div class="basketCard-info">
    <p class="basketCard-info__price">300 $</p>
    <p class="basketCard-info__name">Nulla Lorem </p>
    <p class="basketCard-info__description">Nulla Lorem mollit cupidatat irure...Nulla Lorem mollit cupidatat irure...</p>
  </div>
  <div class="basketCard-counter">
    <div class="basketCard-counter__minus">
      <svg width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="8" height="2" rx="1" fill="white"/>
      </svg>
    </div>
    <p class="basketCard-counter__count">1</p>
    <div class="basketCard-counter__plus">
      <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect y="3" width="8" height="2" rx="1" fill="white"/>
        <rect x="5" width="8" height="2" rx="1" transform="rotate(90 5 0)" fill="white"/>
      </svg>

    </div>
  </div>
</div>
</template>

<script>
export default {
  name: "basketProductCard"
}
</script>

<style scoped lang="scss">
.basketCard-container{
  background-color: #FFFFFF;
  border-radius: 10px;
  height: 10rem;
  width: 100%;
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
  .basketCard-img{
    max-width: 30%;
    overflow: hidden;
    border-radius: 10px;

    img{
        min-width: 100%;
        min-height: 100%;
    }
  }
  .basketCard-info{
    width: 40%;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    padding: 20px 0 20px 20px;
    align-items: flex-start;
    &__price{
      color: #FF6600;
      font-size: 24px;
      font-weight: 600;
    }
    &__name{
      color: #4A4646;
      font-size: 14px;
    }
    &__description{
      color: #706F6F;
      font-size: 12px;
    }
  }
  .basketCard-counter{
    width: 30%;
    display: flex;
    justify-content: space-around;
    align-items: center;
    &__minus, &__plus{
      cursor: pointer;
      width: 26px;
      height: 26px;
      border-radius: 5px;
      background-color: #FF6600;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    &__count{
      font-size: 16px;
      font-weight: 600;
      color: #FF6600;
    }
  }

}
</style>