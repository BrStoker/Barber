<template lang="pug">
DivElement(classCss="layout_ready-load" :class="modalShown()")
    Header
    HistoryBlock(:env="env")
    FooterBlock
    ModalLayout
</template>

<script>
import DivElement from "@/js/components/elements/Div";
import Header from "@/js/components/blocks/Header";
import HistoryBlock from "@/js/components/blocks/History";
import FooterBlock from "@/js/components/blocks/Footer";
import ModalLayout from "@/js/components/blocks/ModalLayout";
import ComputedIndex from '@/js/computed/pages/Index'
import AppMethods from "@/js/methods/App.js";
export default {
    name: "History",
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
        HistoryBlock,
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
