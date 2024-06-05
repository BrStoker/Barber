<template lang="pug">
  DivElement(classCss="layout_ready-load" :class="modalShown()")
    Header
    GalleryBlock(:env="env")
    FooterBlock
    ModalLayout
</template>

<script>
import DivElement from '@/js/components/elements/Div'
import GalleryBlock from "@/js/components/blocks/Gallery";
import ComputedIndex from '@/js/computed/pages/Index'
import AppMethods from "@/js/methods/App.js";
import Header from "@/js/components/blocks/Header";
import FooterBlock from "@/js/components/blocks/Footer";
import ModalLayout from "@/js/components/blocks/ModalLayout";

export default {
  name: "Gallery",
  props: ['data'],
  data(){
    return {
      env: 'page'
    }
  },
  components:{
    DivElement,
    GalleryBlock,
    Header,
    FooterBlock,
    ModalLayout
  },
  methods:{
    ...ComputedIndex,
    ...AppMethods
  },
  created() {
    this.appendUserToStore(this.data)
  },
}
</script>

<style scoped>

</style>