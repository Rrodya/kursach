<template>
  <div class="background-login">
    <div class="content" :class="{show: isShow}" >
      <p class="mainLogo">HOKKI</p>
      <div class="reg-form">
        <div class="form-inputs">
          <input
              v-model="mail"
              type="text"
              class="ordinaryInput inputMail"
              :class="{notCorrect: unCorrectMail}"
              placeholder="Почта">
          <input
              v-model="phone"
              type="text"
              class="ordinaryInput inputPassword"
              :class="{notCorrect: unCorrectPhone}"
              placeholder="Телефон">
          <input v-model="name" type="text" class="ordinaryInput inputName" placeholder="Имя">
          <input v-model="password" type="password" id="pass" class="ordinaryInput inputPassword" placeholder="Пароль">
          <input
              v-model="confirmPassword"
              type="password"
              class="ordinaryInput confirmPassword inputPassword"
              placeholder="Подтвердите пароль"
              :class="{notCorrect: isConfirmPassword}"
          >
          <label v-if="unCorrectPass" class="labelPass" for="pass">Пароль должен содержить минимум 1 заглавную букву и число</label>

        </div>
<!--        <p class="confirmPassword" v-if="isConfirmPassword">Input the same password</p>-->

        <div class="form-buttons">
          <button type="button" class="ordinaryButtonWhite signUp" @click="validEmail">Регистрация</button>
          <button type="button" class="login" @click="goLogin">Авторизация</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "regPage",
  methods: {
    validEmail(){

      let regMail = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
      let regPhone = /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/;
      let regPass = /(?=.*[0-9])(?=.*[a-z])[0-9a-z]/g;

      if(this.mail.match(regMail) === null) {
        console.log('mail');
        this.unCorrectMail = true;
        return false;
      } else if(this.phone.match(regPhone) === null) {
        this.unCorrectMail = false;
        this.unCorrectPhone = true;
        console.log('phone');
        return false
      } else if(this.password.match(regPass) === null){
        console.log(this.password.match(regPass));
        console.log(this.password);
        this.unCorrectMail = false;
        this.unCorrectPhone = false;
        this.unCorrectPass = true;

        return false
      }
      else {
        this.unCorrectMail = false;
        this.unCorrectPhone = false;
        this.signUp();
      }
    },
    goLogin(){
      this.$router.push({name: 'login'})
    },
    click(event){
      console.log(event);
    },
    signUp(){
      if(this.mail && this.password && this.phone){
        fetch('http://hokki/api/auth/reg.php', {
          method: 'POST',
          mode: 'cors',
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          },

          body: `mail=${this.mail}&phone=${this.phone}&password=${this.password}&name=${this.name}`
        }).then(res => res.json()).then(data => this.goSignUp(data));
      }
    },
    goSignUp(data){
      if(data.message === 'ok'){
        this.$router.push({name: 'main'})
      }
    }
  },
  watch: {
    confirmPassword(val){
      if(val !== this.password){
        this.isConfirmPassword = true;
      } else {
        this.isConfirmPassword = false;

      }
    }
  },
  data() {
    return {
      isShow: false,
      mail: '',
      phone: '',
      password: '',
      confirmPassword: '',
      isConfirmPassword: false,
      name: '',
      unCorrectMail: false,
      unCorrectPhone: false,
      unCorrectPass: false
    }
  },
  mounted() {
    this.isShow = true;
  }
}
</script>

<style scoped lang="scss">

@import '../css/app';
.background-login{
  overflow: hidden;
  background-color: $darkLight;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  height: 100vh;
  .content{
    transition: all .4s ease;
    width: 70%;
    margin: 0 auto;
    .mainLogo{
      color: $darkBlack;
      margin-top: 120px;
      font-size: 50px;
      font-weight: 800;
      text-align: center;
      margin-bottom: 2rem;
    }
    .reg-form{
      margin-top: 100px;
      .form-inputs{
        display: flex;
        align-items: center;
        flex-direction: column;
        input{
          color: $darkBlack
        }
        .inputPassword{
          margin-top: 10px;
        }
        .inputName{
          margin-top: 10px;
        }
      }
      .form-buttons{
        display: flex;
        align-items: center;
        flex-direction: column;
        margin-top: 70px;
        .login{
          cursor: pointer;
        }
        .signUp{
          color: white;
          background-color: $orange;
        }

        .login{
          outline: none;
          border: none;
          background: transparent;
          font-family: 'Montserrat', sans-serif;
          font-size: 12px;
          font-weight: 600;
          color: $orange;
          margin-top: 5px;
          cursor: pointer;
          width: 100px;
          height: 25px;
        }
        .confirmPassword{
          transition: all .5s ease;
        }
      }
    }
  }
}

@keyframes fadeIn {
  0%{
    opacity: 0
  }
  100%{
    opacity: 1;
  }
}

.notCorrect{
  transition: all .5s ease;

  border: solid 1px #FF6600;

}

//.confirmPassword{
//  text-align: center;
//  color: #FF6600;
//  font-weight: 500;
//  font-size: 14px;
//  margin-top: 10px;
//}

.show{
  opacity: 1;
  animation: fadeIn .4s ease-in-out;
}


.labelPass{
  margin-top: 10px;
  font-size: 12px;
  font-weight: 400;
  color: #FF6600;
}
</style>