<template>
  <div class="background-login" @click="click">
    <div class="content" :class="{show: isShow}" >
      <p class="mainLogo">HOKKI</p>
      <div class="reg-form">
        <div class="form-inputs">
          <input type="text" class="ordinaryInput inputMail" placeholder="Mail">
          <input type="text" class="ordinaryInput inputPassword" placeholder="Number">
          <input type="password" class="ordinaryInput inputPassword" placeholder="Password">
          <input type="password" class="ordinaryInput inputPassword" placeholder="Confirm password">
        </div>
        <div class="form-buttons">
          <button type="button" class="ordinaryButtonWhite signUp">Sign Up</button>
          <button type="button" class="login" @click="goLogin">Login</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "loginPage",
  methods: {
    goLogin(){
      this.$router.push({name: 'login'})
    },
    click(event){
      console.log(event);
    }
  },
  data() {
    return {
      isShow: false,
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