<template lang="pug">
  EmptyElement
    DivElement(classCss="page")
    DivElement(classCss="profile-block")
      DivElement(classCss="image")
        UserImage
        UserInformation
      DivElement(classCss="information")
        UserAppoinments
</template>

<script>
import DivElement from '@/js/components/elements/Div'
import EmptyElement from "@/js/components/elements/Empty.vue";
import UserImage from "@/js/components/blocks/userImage.vue";
import UserInformation from '@/js/components/blocks/userInformation'
import UserAppoinments from "@/js/components/blocks/userAppoinments.vue";
export default {
  name: "Profile",
  props:['env'],
  data(){
    return{
      store: this.$store.state.data.app
    }
  },
  components:{
    UserAppoinments,
    UserImage,
    UserInformation,
    EmptyElement,
    DivElement
  }
}
</script>

<style scoped>
.profile-block{
  display: flex;
  flex-direction: row;
  width: 100%;
  height: 1000px;
}
.image{
  width: 50%;
  padding: 1.5em;
  display: flex;
  flex-direction: column;
  align-items: center;

}
.information{
  width: 50%;
  padding: 1.5em;
  display: flex;
  flex-direction: column;
  align-items: center;
}
</style>