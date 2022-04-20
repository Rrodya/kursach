<template>
    <div class="background">
<!--      <div v-if="$route.params.isLogout" class="isOpenMain" :class="{isLogOutAnimate: isOpenMain}"></div>-->
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
                  class="ordinaryButton loginBtn"
                  @click="goRouter('login')"
              >Login</button>
            </div>
            <div class="btnBox-sign">
              <div
                  class="circleSign"
                  :class="{animateLogin: isOpenSign}"
              ></div>
              <button
                  type="button"
                  class="ordinaryButtonWhite signBtn"
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
      isOpenSign: false,
      isOpenMain: false
    }
  },
  mounted() {
    this.isOpenMain = true;
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
    overflow: hidden;
    background: url('../assets/background.png') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    height: 100vh;
    //.startCircle{
    //  position: fixed;
    //  overflow: hidden;
    //  width: 100px;
    //  height: 100px;
    //  border-radius: 200px;
    //}
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
    .circleLogin{
      background-color: $orange;
    }
    .circleSign {
      background-color: #EDEDED;

    }
  }


  .circleLogin, .circleSign{
    position: absolute;
    top: 50%;
    left: 50%;
    z-index:-1;
    opacity: 0;
    height: 10px;
    width: 10px;
    border-radius: 500px;
  }
  .animateLogin{
    z-index: 2 !important;
    opacity: 1 !important;
    transition: transform .5s ease-in-out;
    transform: scale(200);
  }
  .animateSign{
    z-index: 2 !important;

    opacity: 1 !important;
    transition: transform .5s ease-in-out;
    transform: scale(200);
  }

  .ordinaryButtonWhite{
    background-color: $darkLight;
  }

.isOpenMain{
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(200);
  width: 10px;
  height: 10px;
  border-radius: 1000px;
  background-color: #FF6600;
  transition: transform 20s ease-in-out;
  z-index: 5;
}

.isLogOutAnimate{
  transition: transform 20s ease-in-out;

  transform: translate(-50%, -50%) scale(1);
}



</style>