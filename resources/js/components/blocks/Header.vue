<template lang="pug">
header
    DivElement(classCss="content-container")
        DivElement(classCss="header_wrapper")
            DivElement(classCss="nav-wrapper")
                LinkElement(classCss="header_logo" :href="links.main")
                    ImageElement(:src="images.logo")
                NavElement(classCss="nav")
                    ul(class="list")
                        li(v-for="(item, index) in items" :key="index" class="list-item")
                            LinkElement(:href="item.link" classCss="list-item-link" :class="linkActive(item)")
                                SpanElement(classCss="title_link") {{item.title}}
            DivElement(classCss="control-bar")
                LinkElement(:href="links.profile" v-show="user.auth")
                    ImageElement(:src="images.profile")
                LinkElement(:href="links.notification" v-show="user.auth")
                    ImageElement(:src="images.notification")
                button(class="btn btn-primary btn-lg main-button" @click="showAppointment") {{getButtonText()}}
                //LanguageChange


</template>

<script>
import DivElement from "@/js/components/elements/Div";
import SpanElement from "@/js/components/elements/Span";
import LinkElement from "@/js/components/elements/Link";
import ImageElement from "@/js/components/elements/Image";
import NavElement from "@/js/components/elements/Nav";
import LanguageChange from "@/js/components/blocks/languageChange";


export default {
    name: "Header",
    data(){
        return{
            user: this.$store.state.data.app.user,
            images:{
                logo: '/images/logo.svg',
                profile: '/images/profile-icon.svg',
                notification: '/images/notification-icon.svg'
            },
            links: {
                main: '/',
                profile: '/profile',
                notification: '#'
            },
            items:[
                {
                    title: 'Главная',
                    link: '/'
                },
                {
                    title: 'История',
                    link: '/history'
                },
                {
                    title: 'Сервисы',
                    link: '/service'
                },
                {
                    title: 'Галерея',
                    link: '/gallery'
                },
            ]
        }
    },
    methods:{
        linkActive(item){
            if(window.location.pathname === item.link){
                return 'active'
            }else{
                return ''
            }
        },
        showAppointment(e){
            e.preventDefault()
            if(this.user.auth){
                location.href = '/logout'
            }else{
                this.$store.commit('showLoginForm')
            }

        },
        getButtonText(){
            return this.user.auth ? 'Выйти' : 'Авторизация'
        }
    },
    components:{
      DivElement,
      SpanElement,
      LinkElement,
      ImageElement,
      NavElement,
      LanguageChange
    }
}
</script>

<style scoped>

</style>
