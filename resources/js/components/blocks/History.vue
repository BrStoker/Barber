<template lang="pug">
    SectionElement(classCss="our-history" v-if="env !=='main' && store.user.auth")
        DivElement(classCss="page" v-if="env == 'page'")
        DivElement(classCss="our-history-wrapper")
            ImageElement(:src="historyImage" classCss="our-history-image")
            h2(class="our-history__title")
                SpanElement(classCss="our-history__title-first-item") {{'Наша'}}
                SpanElement(classCss="our-history__title-second-item") {{'история'}}
                SpanElement(classCss="our-history__title-description") {{'В нашей парикмахерской мы верим, что каждая прическа - это не просто стрижка, а уникальное выражение вашей индивидуальности. Мы стремимся создать не просто стиль, а историю, рассказанную вашими волосами.'}}
                button(class="btn btn-primary btn-lg main-button" @click="learnMore" v-if="env == 'main'") {{'Узнать больше'}}
    SectionElement(classCss="our-history" v-else-if="!store.user.auth")
      DivElement(classCss="page" v-if="env == 'page'")
      DivElement(classCss="our-history-wrapper")
        ImageElement(:src="historyImage" classCss="our-history-image")
        h2(class="our-history__title")
          SpanElement(classCss="our-history__title-first-item") {{'Наша'}}
          SpanElement(classCss="our-history__title-second-item") {{'история'}}
          SpanElement(classCss="our-history__title-description") {{'В нашей парикмахерской мы верим, что каждая прическа - это не просто стрижка, а уникальное выражение вашей индивидуальности. Мы стремимся создать не просто стиль, а историю, рассказанную вашими волосами.'}}
          button(class="btn btn-primary btn-lg main-button" @click="learnMore" v-if="env == 'main'") {{'Узнать больше'}}
</template>

<script>
import DivElement from "@/js/components/elements/Div";
import SectionElement from "@/js/components/elements/Section";
import ImageElement from "@/js/components/elements/Image";
import SpanElement from "@/js/components/elements/Span";
export default {
    name: "History",
    props: ['env'],
    data(){
        return{
          store: this.$store.state.data.app,
            historyImage: 'images/_13126_1.png'

        }
    },
    methods:{
        learnMore(e){
            e.preventDefault()
            window.location.href = '/history'
        }
    },
    components:{
        DivElement,
        SectionElement,
        ImageElement,
        SpanElement
    }
}
</script>

<style scoped>

</style>
