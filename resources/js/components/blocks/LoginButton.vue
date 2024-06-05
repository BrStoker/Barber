<template lang="pug">
EmptyElement
  button(class="btn btn-primary btn-lg main-button" @click="showAppointment" v-if="!user.auth") {{getButtonText()}}
  LinkElement(:href="link" v-else classCss="loginLink")
    ImageElement(:src="getUserImage()" classCss="loginAvatar")
</template>

<script>
import EmptyElement from "@/js/components/elements/Empty";
import ImageElement from "@/js/components/elements/Image";
import LinkElement from '@/js/components/elements/Link'
export default {
  name: "LoginButton",
  data(){
    return{
      user: this.$store.state.data.app.user,
      image: '/storage/images/master.png',
      link: '/profile'
    }
  },
  components:{
    EmptyElement,
    ImageElement,
    LinkElement
  },
  methods:{
    showAppointment(e){
      e.preventDefault()
      if(this.user.auth){
        location.href = '/logout'
      }else{
        this.$store.commit('showLoginForm')
      }

    },
    getButtonText(){
      return this.user.auth ? 'Выйти' : 'Авторизация'
    },
    getUserImage(){

      if(this.user.data.image){
        return '/storage/images/' + this.user.data.image
      }else{
        return this.image
      }
    }
  }
}
</script>

<style scoped>
.loginLink{
  border: 3px solid #99BAED;
  border-radius: 50%;
  padding: 1px;
}
.loginLink:hover{
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
.loginAvatar{
  width: 75px;
  height: 75px;
  border: 3px solid #FBB400;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
}
</style>