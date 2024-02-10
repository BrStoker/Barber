<template lang="pug">
SectionElement(classCss="service-main")
    DivElement(classCss="service-title")
        h2(class="service-title__first-item") {{'Наши'}}
        h2(class="service-title__second-item") {{'услуги'}}
    DivElement(classCss="service-nav")
        ul(class="service-nav-list")
            li(:class="{'service-nav-item': true, 'active': item.active}" v-for="(item, index) in services" :key="index")
                DivElement(classCss="service-item")
                    DivElement(classCss="service-item-ico")
                        ImageElement(:src="item.icon")
                    SpanElement(classCss="service-item-title" :class="{'active': item.active}") {{item.title}}
                    SpanElement(classCss="service-item-description") {{item.description}}

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
            services:[
                {
                    title: 'Стрижка',
                    description: 'Наши опытные стилисты владеют мастерством создания индивидуальных стилей, учитывая не только форму вашего лица, но и ваш характер, предпочтения и образ жизни. Мы создаем стрижки, которые выделают вашу уникальность.',
                    icon: 'images/scissors.svg',
                    active: false
                },
                {
                    title: 'Стрижка Бороды',
                    description: 'Наши опытные барберы знают, что борода - это не просто обрамление лица, это часть вашего образа. Мы предоставляем индивидуальные стрижки бороды, учитывая форму лица, структуру волос и ваш стиль.',
                    icon: 'images/electric-razor.svg',
                    active: false
                },
                {
                    title: 'Уход за лицом',
                    description: 'Наши опытные эстетисты предлагают уход за кожей, учитывая уникальные потребности каждого клиента. Мы приветствуем вас в мире персонализированных процедур для достижения здоровой и сияющей кожи.',
                    icon: 'images/cleanser.svg',
                    active: false
                },
            ]
        }
    },
    methods:{

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
