<template>
<div class="basketCard-container">
  <div class="deleteCard" @click="deleteElement">Удалить</div>
  <div class="basketCard-img">
    <img :src="item.img" alt="">
  </div>
  <div class="basketCard-info">
    <p class="basketCard-info__price">{{item.price}} ₽</p>
    <p class="basketCard-info__name">{{item.name}}</p>
    <p class="basketCard-info__description">{{item.description}}...</p>
  </div>
  <div class="basketCard-counter">
    <div class="basketCard-counter__minus" @click="removeBasket">
      <svg width="8" height="2" viewBox="0 0 8 2" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="8" height="2" rx="1" fill="white"/>
      </svg>
    </div>
    <p class="basketCard-counter__count">{{getCount}}</p>
    <div class="basketCard-counter__plus" @click="addBasket">
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
  props: ['item', 'count'],
  emits: ['remove', 'checkTotal'],
  data() {
    return {
      localBasket: []
    }
  },
  name: "basketProductCard",
  methods: {
    deleteElement(){
      this.$emit('remove', this.item.id);
    },
    removeBasket(){
      if(this.getCount > 1){
        this.localBasket = localStorage.basket.split(',');
        let idx = this.localBasket.indexOf(this.item.id);
        this.localBasket.splice(idx, 1);
        localStorage.basket = this.localBasket;
      }
      this.$emit('checkTotal');
    },
    addBasket() {
      this.localBasket = localStorage.basket.split(',')

      this.localBasket.push(this.item.id);

      localStorage.basket = this.localBasket;
      this.$emit('checkTotal');
    }
  },

  computed: {
    getCount(){
      let basketCorr = this.localBasket.filter(item => item == this.item.id);
      return basketCorr.length;
    }
  },
  created() {
    this.localBasket = localStorage.basket.split(',');
  }
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
  position: relative;
  .deleteCard{
    position: absolute;
    font-size: 14px;
    cursor: pointer;
    right: 10px;
    top: 10px;
    padding: 5px 10px;
    background-color: #F4F4F4;
    color: #FF6600;
    border-radius: 10px;
  }
  .basketCard-img{
    max-width: 30%;
    overflow: hidden;
    border-radius: 10px;
    img{
      width: 100%;
      min-height: 100%;
      object-fit: cover;
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
      font-size: 18px;
      font-weight: 600;
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

p::selection {
  background: transparent;
}
p::-moz-selection {
  background: transparent;
}

img::selection {
  background: transparent;
}
img::-moz-selection {
  background: transparent;
}
</style>