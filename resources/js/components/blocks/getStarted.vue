<template lang="pug">
    SectionElement(classCss="starter-wraper")
        h1
            SpanElement {{'Прическа '}}
            | отражает вашу внутреннюю личность
        p {{'Ваши волосы - ваш характер: стиль, который говорит за вас.'}}
        button(class="btn btn-primary btn-lg main-button" @click="getStarted") {{'Измениться'}}
</template>

<script>
import DivElement from "@/js/components/elements/Div.vue";
import ImageElement from "@/js/components/elements/Image";
import SectionElement from "@/js/components/elements/Section";
import LinkElement from "@/js/components/elements/Link";
import SpanElement from "@/js/components/elements/Span";
export default {
    name: "getStarted",
    data(){
        return{

        }
    },
    methods:{
        getStarted(e){
            e.preventDefault()
            console.log(e)
        }

    },
    components:{
        DivElement,
        ImageElement,
        SectionElement,
        LinkElement,
        SpanElement
    }
}
</script>

<style scoped>

</style>
