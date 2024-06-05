<template lang="pug">
  DivElement(classCss="userImage")
    ImageElement(:src="getUserImage()" classCss="userAvatar")
</template>

<script>
import DivElement from '@/js/components/elements/Div'
import ImageElement from "@/js/components/elements/Image.vue";

export default {
  name: "userImage",
  data(){
    return{
      store: this.$store.state.data.app,
      image: '/public/images/master.png'
    }
  },
  methods: {
    getUserImage() {
      if(this.store.user.data.image){
        return '/storage/images/' + this.store.user.data.image
      }else{
        return this.image
      }
    }
  },
  components:{
    ImageElement,
    DivElement
  }
}
</script>

<style scoped>
.userImage{
  border: 3px solid #99BAED;
  border-radius: 50%;
  padding: 1px;
}
.userAvatar{
  max-width: 300px;
  border-radius: 50%;
  border: 3px solid #FBB400;
}
.userAvatar:hover {
  box-shadow: 0px 5px 10px rgba(153, 186, 237, 0.5);
  /*cursor: pointer;*/
}
</style>