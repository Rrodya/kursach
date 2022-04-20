<template>
  <div class="profile">
      <div class="profile-title">
        <p class="profile-title__name">Muchamed Abdul</p>
        <button
            type="button"
            class="profile-title__saveBtn ordinaryButton"
            v-if="isChange"
        >Save changes</button>
      </div>
      <div class="profile-personalInfo">
        <input type="text" placeholder="Name" class="ordinaryInput profile-personalInfo__name">
        <input type="text" placeholder="Mail" class="ordinaryInput profile-personalInfo__mail">
        <input type="text" placeholder="Phone" class="ordinaryInput profile-personalInfo__phone">
        <input type="text" placeholder="Password  " class="ordinaryInput profile-personalInfo__password">
      </div>
      <div class="profile__logOutBtn">
<!--        <div-->
<!--            class="circleLogout"-->
<!--            :class="{animateLogout: isOpenLog}"-->
<!--        ></div>-->
        <button class="ordinaryButton logOutBtn" @click="logOut">Logout</button>
      </div>
  </div>
</template>

<script>
export default {
  name: "profilePage.vue",
  data() {
    return {
      isChange: false,
      isOpenLog: false
    }
  },
  methods: {
    logOut(){
      this.isOpenLog = true;
      setTimeout(() => {
        this.$router.push({name: 'main', params: {isLogout: 1}})
      }, 500)
    }
  }
}
</script>

<style scoped lang="scss">
.profile{
  margin-top: 30px;
  .profile__logOutBtn{
    position: relative;
  }

  &-title{
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    &__name{
      font-size: 22px;
      color: #4A4646;
      font-weight: 700;
    }
    &__saveBtn{
      width: 200px;
      height: 40px;
      color: #4A4646;
      background-color: #FFFFFF;
      font-weight: 500;
      transition: all .2s ease;
      box-shadow: 0 5px 20px rgba(0, 0, 0, .1);
      position: absolute;
      right: 0;
      top:-5px;
      cursor: pointer;
    }
    &__saveBtn:hover{
      transform: scale(1.05);
      color: #FFFFFF;
      box-shadow: 0 5px 20px rgba(0, 0, 0, .1);
      background-color: #FF6600;
    }
  }

  &-personalInfo{
    display: flex;
    margin-top: 50px;
    justify-content: space-between;
    flex-wrap: wrap;
    .ordinaryInput{
      margin-bottom: 15px;
      color: #4A4646;
      font-weight: 600;

    }
  }
  &__logOutBtn{
    display: flex;
    justify-content: center;
    margin-top: 30px;
    transition: all .2s ease;
    cursor: pointer;
  }
  &__logOutBtn:hover{
    transform: scale(1.05);
  }
}
.ordinaryButton{
  cursor: pointer;
}

.circleLogout{
  position: fixed;
  top: 50%;
  left: 50%;
  z-index:-1;
  opacity: 0;
  height: 10px;
  width: 10px;
  border-radius: 500px;
  background-color: #FF6600;
}

.animateLogout{
  z-index: 2 !important;
  opacity: 1 !important;
  transition: transform .5s ease-in-out;
  transform: scale(200);
}
</style>