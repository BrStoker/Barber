<template lang="pug">
DivElement(classCss="layout_ready-load" :class="modalShown()")
    Header
    ServiceBlock(:env="env")
    FooterBlock(:env="env")
    ModalLayout
</template>

<script>
import DivElement from "@/js/components/elements/Div";
import Header from "@/js/components/blocks/Header";
import GetStartedBlock from '@/js/components/blocks/getStarted'
import HistoryBlock from "@/js/components/blocks/History";
import ServiceBlock from "@/js/components/blocks/Service";
import GalleryBlock from "@/js/components/blocks/Gallery";
import FooterBlock from "@/js/components/blocks/Footer";
import ModalLayout from "@/js/components/blocks/ModalLayout";

import ComputedIndex from '@/js/computed/pages/Index'
import AppMethods from "@/js/methods/App.js";
export default {
    name: "Service",
    props: ['data'],
    data(){
        return {
            env: 'page'
        }
    },
    methods:{
        ...ComputedIndex,
        ...AppMethods
    },
    components:{
        DivElement,
        Header,
        GetStartedBlock,
        HistoryBlock,
        ServiceBlock,
        GalleryBlock,
        FooterBlock,
        ModalLayout
    },
    created() {
        this.appendUserToStore(this.data)
    },
    mounted(){

    }
}
</script>

<style scoped>

</style>
