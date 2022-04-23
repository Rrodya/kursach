<template>
  <div class="background-login">
    <div class="content" :class="{show: isShow}">
      <p class="mainLogo">HOKKI</p>
      <div class="login-form">
        <div class="form-inputs">
          <input v-model="mail" type="text" class="ordinaryInput inputMail" placeholder="Mail">
          <input v-model="password" type="password" class="ordinaryInput inputPassword" placeholder="Password">
        </div>
        <div class="form-buttons">
          <button type="button" class="ordinaryButtonWhite login" @click="goLogin">Login</button>
          <button type="button" class="sign" @click="goSignUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "loginPage",
  methods:{
    goSignUp(){
      this.$router.push({name: 'sign'})
    },
    goLogin(){
      if(this.mail && this.password){
        fetch('http://hokki/auth/auth.php', {
          method: 'POST',
          mode: 'cors',
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          },

          body: `mail=${this.mail}&password=${this.password}`
        }).then(res => res.json()).then(data => this.goAuth(data));
      }
    },
    goAuth(data){
      console.log(data);
    }

  },
  data() {
    return {
      isShow: false,
      mail: '',
      password: ''
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
  background-color: $orange;
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
      color: $whiteLight;
      margin-top: 150px;
      font-size: 50px;
      font-weight: 800;
      text-align: center;
      margin-bottom: 2rem;
    }
    .login-form{
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
      }
      .form-buttons{
        display: flex;
        align-items: center;
        flex-direction: column;
        margin-top: 70px;
        .login{
          cursor: pointer;
        }
        .sign{
          outline: none;
          border: none;
          background: transparent;
          font-family: 'Montserrat', sans-serif;
          font-size: 12px;
          font-weight: 600;
          color: white;
          margin-top: 5px;
          cursor: pointer;
          width: 100px;
          height: 25px;
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

.show{
  opacity: 1;
  animation: fadeIn .4s ease-in-out;
}
</style>