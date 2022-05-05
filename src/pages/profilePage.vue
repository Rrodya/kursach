<template>
  <div class="profile">
      <div class="profile-title">
        <p class="profile-title__name">{{messageText ? messageText : (profileInfo.name ? profileInfo.name : 'Добрай день, как вас зовут?')}}</p>
        <button
            type="button"
            class="profile-title__saveBtn ordinaryButton"
            v-if="isChange"
            @click="sendChanges"
        >Сохранить</button>
      </div>
      <p v-if="isWarning">Введите все необходимые поля</p>
      <div class="profile-personalInfo">
        <input
            v-model="sendProfileInfo.name"
            @input="setPersonalInfo()"
            type="text"
            :placeholder="profileInfo.name ? profileInfo.name : 'Name'"
            class="ordinaryInput profile-personalInfo__name">
        <input
            v-model="sendProfileInfo.email"
            @input="setPersonalInfo()"
            :placeholder="profileInfo.email ? profileInfo.email : 'Mail'"
            type="text"
            class="ordinaryInput profile-personalInfo__mail">
        <input
            v-model="sendProfileInfo.phone"
            @input="setPersonalInfo()"
            type="text"
            :placeholder="profileInfo.phone ? profileInfo.phone : 'Phone'"
            class="ordinaryInput profile-personalInfo__phone">
        <input
            v-model="sendProfileInfo.password"
            @input="setPersonalInfo()"
            type="password"
            placeholder="Password"
            class="ordinaryInput profile-personalInfo__password">
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
      isOpenLog: false,
      profileInfo: '',
      messageText: '',
      sendProfileInfo: {
        name: null,
        email: null,
        phone: null,
        password: null
      },
      isWarning: false
    }
  },

  mounted() {
    let id = localStorage.authId;
    fetch('http://hokki/api/profile/getInfoUser.php', {
      method: 'POST',
      mode: 'cors',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      body: `id=${id}`
    })
        .then(res => res.json())
        .then(data => {
          if(data.message === 'ok'){
            this.profileInfo = data.info;
          } else {
            this.messageText = data.text;
          }
        });
  },
  methods: {
    logOut(){
      this.isOpenLog = true;
      localStorage.authId = '';
      localStorage.password = '';
      localStorage.mail = '';
      localStorage.basket = '';

      setTimeout(() => {
        this.$router.push({name: 'main', params: {isLogout: 1}})
        localStorage.mail = '';
        localStorage.password = '';
        localStorage.authId = '';
        localStorage.basket = '';
      }, 500)
    },
    setPersonalInfo(){
      console.log('true');
      this.isChange = true;
    },
    sendChanges(){
      if(!this.sendProfileInfo.email){
        this.isWarning = true;
      } else if(!this.sendProfileInfo.phone){
        this.isWarning = true;
      } else if(!this.sendProfileInfo.password){
        this.isWarning = true;
      } else {
        this.sendData();
      }
    },
    sendData(){
      this.isWarning = false;
      let {name, email, phone, password} = this.sendProfileInfo;
      if(!name){
        name = this.profileInfo.name;
      } else if(email == '' && email == null){
        email = this.profileInfo.email;
      } else if(phone == '' && phone == null){
        phone = this.profileInfo.phone;
      } else if(password == '' && password == null){
        password = this.profileInfo.password;
      }
      let id = localStorage.authId
      fetch('http://hokki/api/profile/insertInfo.php', {
        method: 'POST',
        mode: 'cors',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: `id=${id}&name=${name}&email=${email}&phone=${phone}&password=${password}`
      })
          .then(res => res.json())
          .then(data => {
            if(data.message === 'ok'){
              location.reload();
            }
          })
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
      width: 48%;
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