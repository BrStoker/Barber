<template lang="pug">
SectionElement(classCss="service-main")
    DivElement(classCss="service-title")
        h2(class="service-title__first-item") {{'Наши'}}
        h2(class="service-title__second-item") {{'услуги'}}
    DivElement(classCss="service-nav")
        ul(class="service-nav-list")
            li(class="service-nav-item" v-for="(item, index) in services" :key="index")
                DivElement(classCss="service-item")
                    DivElement(classCss="service-item-ico")
                        ImageElement(:src="getImage(item.image)")
                    SpanElement(classCss="service-item-title") {{item.name}}
                    SpanElement(classCss="service-item-description" v-html="item.preview")

</template>

<script>
import SectionElement from "@/js/components/elements/Section";
import DivElement from "@/js/components/elements/Div";
import NavElement from "@/js/components/elements/Nav";
import ImageElement from "@/js/components/elements/Image";
import SpanElement from "@/js/components/elements/Span";
export default {
    name: "Service",
    data(){
        return{

            services: this.$store.state.data.app.services

        }
    },
    methods:{
        getImage(image){
            return '/storage/' + image
        }
    },
    components:{
        SectionElement,
        DivElement,
        NavElement,
        ImageElement,
        SpanElement
    }
}
</script>

<style scoped>

</style>
