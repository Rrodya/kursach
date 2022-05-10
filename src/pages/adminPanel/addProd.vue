<template>
  <div class="addProd-content">
    <div class="addProd-head">
      <p class="backBtn" @click="$router.push({name: 'adminProductsPage'})">Назад</p>
    </div>
    <div class="addProd-container">
      <div class="inputImg-box inputBox">
        <input type="file" id="inputFile" class="inputImg-input" ref="inputImg">
        <label for="inputFile" class="adminButton">{{textImg}}</label>
      </div>
      <div  class="inputName-box inputBox">
        <input v-model="sendData.name" placeholder="Имя товара" type="text" class="ordinaryInput">
      </div>
      <div  class="inputPrice-box inputBox">
<!--        <label v-if="!priceUncorrect" for="price" class="articul">Введите правильно</label>-->
        <input name="price" v-model="sendData.price"  placeholder="Цена " type="text" class="ordinaryInput">
      </div>
      <div class="inputArticul-box inputBox">
        <label v-if="!articulUncorrect" for="articul" class="articulUncorrect">Артикуль должен содержать меншье 5  символов</label>
        <input v-model="sendData.articul" @input="validInfo" placeholder="Артикуль" input="articul" type="text" class="ordinaryInput">
      </div>
      <div class="input-catalog inputBox">
        <div class="input-catalog__item" v-for="item in catalog" :key="item">
          <button class="adminButton" :class="{activeCatalog: sendData.catalog == item.id}" @click="sendData.catalog = item.id">{{item.name}}</button>
        </div>
      </div>
      <div class="inputDescription-box inputBox">
        <textarea placeholder="Описание товара" v-model="sendData.description" class="ordinaryInput"></textarea>
      </div>
      <div class="inputIsPopular">
        <input id="isPopular" name="isPopular" type="checkbox" v-model="isPopular">
        <label for="isPopular">Этот товар популярный?</label>
      </div>
      <p v-if="selectCatalog" class="unCorrectCatalog">Ошибка в заполненных данных</p>
      <button class="ordinaryButton" @click="sendDataInfo">Добавить товар</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "addProd",

  methods: {
    validInfo(){
      let regArt = /^\d{6}$/;
      let regPrice = /^\d{1,10}$/;
      console.log(this.sendData.articul.length);
      console.log(this.sendData.articul);
      if(this.sendData.articul.match(regArt) === null && this.sendData.articul.length < 7){
        this.articulUncorrect = true
        this.selectCatalog = true;
        console.log('art');

      } else if(this.sendData.price.match(regPrice)){
        this.priceUncorrect = true;
        this.selectCatalog = true;
        this.articulUncorrect = false;
        console.log('price');

        console.log('un');
      }
      else {
        this.selectCatalog = false;
        console.log('ok');

        this.priceUncorrect = false;
        this.articulUncorrect = false;
      }
    },
    sendDataInfo(){
      let {name, img, price, description, articul, catalog, isPopular} = this.sendData;
      if(!catalog || !name || !price || !description || !articul || !img || !this.articulUncorrect){
        this.selectCatalog = true;
      } else {
        this.selectCatalog = false;
      console.log(this.sendData);
      fetch('http://hokki/api/admin/addProd.php', {
        method: 'POST',
        mode: 'cors',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: `name=${name}&img=${img}&price=${price}&description=${description}&articul=${articul}&catalog=${catalog}&popular=${isPopular}`
      })
          .then(res => res.json(res))
          .then(data => {
            if(data.message === 'ok'){
              this.$router.push({name: 'adminProductsPage'});
            }
          });}
    },
    eventImg(){
      this.sendData.img = this.$refs.inputImg.files[0].name;
      this.textImg = this.sendData.img.slice(0, 20) + '...';
    },

  },
  data() {
    return {
      priceUncorrect: false,
      articulUncorrect: true,
      selectCatalog: false,
      catalog: false,
      textImg: 'Выбрать изображение',
      sendData: {
        name: '',
        price: '',
        description: '',
        articul: '',
        img: '',
        catalog: '',
        isPopular: false,

      }
    }
  },
  mounted() {
    this.$refs.inputImg.addEventListener('change', this.eventImg);
    fetch('http://hokki/api/catalog/getCatalog.php', {
      method: 'POST',
      mode: 'cors',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },

    }).then(res => res.json()).then(data => {
      this.catalog = data.info.map(item => {
        return {
          id: item.id_catalog,
          name: item.name
        }
      })
    });

  }
}
</script>

<style scoped lang="scss">
.unCorrectCatalog{
  color: #FF6600;
  font-size: 13px;
}
.articulUncorrect{
  color: #FF6600;
  position: absolute;
  top: 2px;
  left: 7px;
  font-size: 10px;
}
.addProd-content{
  .addProd-head{
    p{
      font-size: 20px;
      cursor: pointer;
      font-weight: 600;
      margin-top: 30px;
    }
  }
  .addProd-container{
    margin-top: 40px;
    .inputBox{
      margin-top: 10px;
    }
    .inputImg-box{
      position: relative;
      input{
        opacity: 0;
      }
      label{
        position: absolute;
        font-size: 15px;
        top: 0;
        cursor: pointer;
        left: 0;
        padding: 0 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-width: 300px;
        height: 50px;
        font-weight: 600;
      }
    }
    .inputName-box{
      margin-top: 40px;
      input{
        width: 100%;
        color: #363636;
      }
    }
    .inputDescription-box{
      margin-top: 0;
      textarea{
        resize: none;
        height: 150px;
        padding: 10px 20px;
        width: 100%;
        color: #363636;
      }
    }
    .inputArticul-box{
      position: relative;
      input{
        width: 100%;
        color: #363636;

      }
    }
    .inputPrice-box{
      input{
        width: 100%;
        color: #363636;

      }
    }
    .input-catalog{
      width: 100%;
      display: flex;
      flex-wrap: wrap;
      div{
        margin-right: 10px;
        cursor: pointer;
        margin-bottom: 10px;
        button{
          cursor: pointer;
          transition: all .2s linear;
          min-width: 100px;
          padding: 0 10px;
        }
      }
    }
    .ordinaryButton{
      margin-top: 30px;
      cursor: pointer;
    }


  }
}

.activeCatalog{
  background-color: #FF6600;
  color: white;
}

.inputIsPopular{
  margin-top: 20px;
  display: flex;
  align-items: center;
  input{
    width: 15px;
    height: 15px;
  }
  label{
    margin-left: 20px;
  }
}
</style>