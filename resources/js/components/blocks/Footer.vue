<template lang="pug">
SectionElement(classCss="footer-main")
    LinkElement(classCss="footer-logo" :href="links.main")
        ImageElement(:src="logo")
    SpanElement(classCss="footer-copyright" v-if="env == 'main'") {{'Мы не просто создаем образы – мы воплощаем вашу индивидуальность в каждой линии, волосе и моменте ухода за лицом. Откройте двери в мир утонченного стиля и заботы о себе, где натуральная красота и индивидуальность становятся главными акцентами. Доверьтесь нам, и давайте вместе создадим неповторимый образ и раскроем вашу уникальность.'}}
    NavElement(classCss="footer-social")
        ul(class="footer-social-list")
            li(class="footer-social-item" v-for="(item, index) in socials" :key="index")
                LinkElement(:href="item.link")
                    ImageElement(:src="item.image")
    DivElement(classCss="footer-line")
    SpanElement(classCss="footer-year") {{getYear()}}

</template>

<script>
import SectionElement from "@/js/components/elements/Section";
import LinkElement from "@/js/components/elements/Link";
import ImageElement from "@/js/components/elements/Image";
import SpanElement from "@/js/components/elements/Span";
import NavElement from "@/js/components/elements/Nav";
import DivElement from "@/js/components/elements/Div.vue";
export default {
    name: "Footer",
    props:['env'],
    data(){
        return{
            links:{
                main: '/'
            },
            logo: 'images/logo.svg',
            socials:[
                {
                    name: 'facebook',
                    image: 'images/facebook-ico.svg',
                    link: 'https://facebook.com'
                },
                {
                    name: 'twitter',
                    image: 'images/twitter-ico.svg',
                    link: 'https://twitter.com'
                },
                {
                    name: 'google',
                    image: 'images/google-ico.svg',
                    link: 'https://google.com'
                }
                ]
        }
    },
    methods:{
        getYear(){
            return ['©', ['2022', new Date().getFullYear()].join(' - ')].join(' ')
        }
    },
    components:{
        DivElement,
        SectionElement,
        LinkElement,
        ImageElement,
        SpanElement,
        NavElement
    }
}
</script>

<style scoped>

</style>
