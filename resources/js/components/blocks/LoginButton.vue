<template lang="pug">
EmptyElement
  button(class="btn btn-primary btn-lg main-button" @click="showAppointment" v-if="!user.auth") {{getButtonText()}}
  DivElement(classCss="header__menu, menu" v-else)
    DivElement(classCss="menu__list")
      DivElement(classCss="menu__item, dropdown-init")
        DivElement(classCss="menu__preview")
          LinkElement(:href="link" classCss="loginLink")
            ImageElement(:src="getUserImage()" classCss="loginAvatar")
        DivElement(classCss="menu__dropdown, layout__dropdown, dropdown")
          DivElement(classCss="dropdown__list")
            DivElement(classCss="dropdown__item" v-for="(item, index) in menu" :key="index")
              LinkElement(classCss="dropdown__link" :href="item.link")
                DivElement(classCss="dropdown__title, title")
                  SpanElement(classCss="title__text") {{item.text}}



</template>

<script>
import EmptyElement from "@/js/components/elements/Empty";
import DivElement from '@/js/components/elements/Div';
import ImageElement from "@/js/components/elements/Image";
import LinkElement from '@/js/components/elements/Link'
import SpanElement from "@/js/components/elements/Span";
import SvgElement from "@/js/components/elements/Svg";
export default {
  name: "LoginButton",
  data(){
    return{
      user: this.$store.state.data.app.user,
      image: '/storage/images/master.png',
      link: '/profile',
      menu: [
        {
          link: '/logout',
          text: 'Выйти'
        }
      ]
    }
  },
  components:{
    EmptyElement,
    ImageElement,
    LinkElement,
    SpanElement,
    SvgElement,
    DivElement
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
.menu__preview.loginLink{
  border: 3px solid #99BAED;
  border-radius: 50%;
  padding: 1px;
  transition: box-shadow 0.3s ease;
}
.menu__preview.loginLink:hover{
  /*text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);*/
}
.loginAvatar{
  width: 75px;
  height: 75px;
  border: 3px solid #FBB400;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
}
.header__menu .menu__list {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}
@media screen and (min-width: 768px) {
  .header__menu .menu__list {
    margin: -2rem 0;
  }
}
.header__menu .menu__item {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  position: relative;
}
@media screen and (min-width: 768px) {
  .header__menu .menu__item:hover .menu__preview {
    background-color: rgba(255, 255, 255, 0.1);
  }
}
.header__menu .menu__preview {
  padding: 0;
  height: 100%;
  background-color: transparent;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  position: relative;
  -webkit-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}
@media screen and (min-width: 768px) {
  .header__menu .menu__preview {
    padding: 2.25rem 0.75rem;
  }
}
.header__menu .menu__count {
  color: rgb(255, 255, 255);
  background-color: #F22A2A;
  border-radius: 0.75rem;
  height: 1.25rem;
  padding: 0 0.2rem;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  text-align: center;
  -webkit-transform: translate(-50%, calc(-50% + 0.125rem));
  transform: translate(-50%, calc(-50% + 0.125rem));
  min-width: 1.25rem;
}
.header__menu .menu__count .count__text {
  font-size: 0.75rem;
  line-height: 1rem;
  text-overflow: ellipsis;
  display: block;
  overflow: hidden;
  white-space: nowrap;
}
.header__menu .menu__media {
  width: 1.5rem;
  height: 1.5rem;
}
.header__menu .menu__media img,
.header__menu .menu__media svg {
  width: 100%;
  height: 100%;
}
.header__menu .menu__avatar {
  width: 3rem;
  height: 3rem;
  border-radius: 50%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
  overflow: hidden;
}
.header__menu .menu__avatar:not(:last-child) {
  margin-right: 0.5rem;
}
.header__menu .menu__avatar img,
.header__menu .menu__avatar svg {
  width: 100%;
  height: 100%;
}
.header__menu .menu__action {
  width: 1rem;
  height: 0.75rem;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
}
.header__menu .menu__action img,
.header__menu .menu__action svg {
  width: 100%;
  height: 100%;
}
</style>