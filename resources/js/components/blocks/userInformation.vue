<template lang="pug">
  DivElement()
    SpanElement(classCss="username") {{getUserName()}}
    DivElement(classCss="userInfo" v-for="(item, index) in images" :key="index")
      SvgElement(:image="getImage(item)" classCss="icon")
      SpanElement() {{getUserInfo(item)}}
    DivElement(classCss="button")
      button(class="btn btn-primary btn-lg main-button" @click="editProfile") {{getButtonText()}}

</template>

<script>
import DivElement from '@/js/components/elements/Div'
import SpanElement from "@/js/components/elements/Span.vue";
import SvgElement from "@/js/components/elements/Svg.vue";
import ButtonElement from "@/js/components/elements/Custom/Button.vue";
export default {
  name: "userInformation",
  data(){
    return{
      user: this.$store.state.data.app.user.data,
      images:[
        {
          name: 'phone',
          image: 'telephone'
        },
        {
          name: 'email',
          image: 'envelope-at'
        }
      ],
      baseImage: '/images/svg/userInformation.svg'
    }
  },
  methods:{
    getUserName(){
      return [this.user.first_name, this.user.last_name].join(' ')
    },
    getImage(item){
      return [this.baseImage, item.image].join('#')
    },
    getUserInfo(item){
      return this.user[item.name]
    },
    editProfile(e){
      e.preventDefault();
    },
    getButtonText(){
      return 'Редактировать профиль'
    }
  },
  components:{
    SpanElement,
    DivElement,
    SvgElement,
    ButtonElement
  }
}
</script>

<style scoped>
.username{
  font-size: 40px;
  font-weight: bold;
}
.userInfo{
  margin-top: 0.5em;
}
.userInfo span{
  margin-left: 1.5em;
}
.icon{
  width: 20px;
  height: 20px;
  color: #99BAED;
}
.button{
  margin-top: 1.5em;
}
</style>