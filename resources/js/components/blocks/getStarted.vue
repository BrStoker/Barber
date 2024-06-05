<template lang="pug">
    SectionElement(classCss="starter-wraper" v-if="!store.user.auth")
        h1
            SpanElement {{'Прическа '}}
            | отражает вашу внутреннюю личность
        p {{'Ваши волосы - ваш характер: стиль, который говорит за вас.'}}
        button(class="btn btn-primary btn-lg main-button" @click="getStarted" v-if="!store.user.auth") {{'Измениться'}}
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
          store: this.$store.state.data.app
        }
    },
    methods:{
        getStarted(e){
            e.preventDefault()
            this.$store.commit('showLoginForm')
        }

    },
  mounted(){
    console.log(this.store)
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
