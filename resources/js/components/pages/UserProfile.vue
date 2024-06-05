<template lang="pug">
  DivElement(classCss="layout_ready-load" :class="modalShown()")
    Header
    ProfileBlock
    FooterBlock(:env="env")
</template>

<script>
import DivElement from '@/js/components/elements/Div'
import Header from "@/js/components/blocks/Header.vue";
import ProfileBlock from "@/js/components/blocks/Profile.vue";
import FooterBlock from "@/js/components/blocks/Footer";
import ComputedIndex from '@/js/computed/pages/Index'
import AppMethods from "@/js/methods/App.js";
export default {
  name: "UserProfile",
  props: ['data'],
  data(){
    return{
      env: 'page',
    }
  },
  components:{
    DivElement,
    Header,
    ProfileBlock,
    FooterBlock
  },
  methods:{
    ...AppMethods,
    ...ComputedIndex
  },
  mounted(){
    this.appendUserToStore(this.data)
  }
}
</script>

<style scoped>

</style>