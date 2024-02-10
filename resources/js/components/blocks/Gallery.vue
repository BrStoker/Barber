<template lang="pug">
SectionElement(classCss="galery-main")
    DivElement(classCss="galery-title")
        h2(class="galery-title__first-item") {{'Наша'}}
        h2(class="galery-title__second-item") {{'галерея'}}
    NavElement(classCss="galery-nav")
        ul(class="galery-nav-list")
            li(class="galery-nav-item" v-for="(item, index) in images" :key="index")
                ImageElement(:src="item.image")
    button(class="btn btn-primary btn-lg main-button gallery-button" @click="viewGallery") {{'Больше фото'}}
</template>

<script>
import SectionElement from "@/js/components/elements/Section";
import DivElement from "@/js/components/elements/Div";
import ImageElement from "@/js/components/elements/Image";
import NavElement from "@/js/components/elements/Nav.vue";

export default {
    name: "Gallery",
    data(){
        return{
            images:[
                {
                    image: 'images/mask_group.png'
                },
                {
                    image: 'images/mask_group_ek1.png'
                },
                {
                    image: 'images/mask_group_ek2.png'
                },
                {
                    image: 'images/mask_group_ek3.png'
                },
                {
                    image: 'images/mask_group_ek4.png'
                },
                {
                    image: 'images/mask_group_ek5.png'
                },
            ]

        }
    },
    methods:{
        viewGallery(e){
            e.preventDefault()
            console.log(e)
        }
    },
    components:{
        NavElement,
        SectionElement,
        ImageElement,
        DivElement
    }
}
</script>

<style scoped>

</style>
