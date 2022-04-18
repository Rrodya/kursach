<template>
    <div class="background">
      <div class="container">
        <div class="mainApp-content">
          <p class="mainLogo">HOKKI</p>
          <div class="mainApp-btnBox">
            <div class="btnBox-login">
              <div
                  class="circleLogin"
                  :class="{animateLogin: isOpenLog}"
              ></div>
              <button
                  type="button"
                  class="ordinaryButtonWhite loginBtn"
                  @click="goRouter('login')"
              >Login</button>
            </div>
            <div class="btnBox-sign">
              <div
                  class="circleSign"
                  :class="{animateSign: isOpenSign}"
              ></div>
              <button
                  type="button"
                  class="ordinaryButton signBtn"
                  @click="goRouter('sign')"
              >Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  name: "mainApp",
  data() {
    return {
      isOpenLog: false,
      isOpenSign: false
    }
  },
  methods: {
    goRouter(router){
      console.log(router);
      if(router == 'login'){
        this.isOpenLog = true;
      } else {
        this.isOpenSign = true;
      }
      setTimeout(() => {
        this.$router.push({name: router});

      }, 500);
    }
  }
}
</script>

<style scoped lang="scss">
@import '../css/app';



  .background{
    background: url('../assets/background.png') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
      height: 100vh;
    .container{
      width: 70%;
      margin: 0 auto;
      .mainApp-content{
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-bottom: 5rem;
        .mainLogo{
          color: $whiteLight;
          font-size: 50px;
          font-weight: 800;
          text-align: center;
          margin-bottom: 2rem;
        }
        .mainApp-btnBox{
          margin-top: 3rem;
          display: flex;
          align-items: center;
          flex-direction: column;
          .signBtn{
            margin-top: 1rem;
          }
          .loginBtn{
            background-color: $darkLight;
          }
          button{
            cursor: pointer;
            z-index: 1;
          }
        }
      }

    }
  }

  .btnBox-login, .btnBox-sign{
    position: relative;
    z-index: 1;
    .circleLogin{
      background-color: $darkLight;
    }
    .circleSign {
      background-color: $orange;
    }
  }
  .circleLogin, .circleSign{
    position: absolute;
    top: 50%;
    left: 50%;
    z-index:4;
    opacity: 0;
    height: 10px;
    width: 10px;
    border-radius: 500px;
  }
  .animateLogin{
    opacity: 1 !important;
    transition: transform .5s ease-in-out;
    transform: scale(200);

  }
  .animateSign{
    opacity: 1 !important;
    transition: transform .5s ease-in-out;
    transform: scale(200);
  }



</style>