<template lang="pug">
    DivElement(classCss="modal__layout, modal__layout_tiny, modal__layout_registration" :class="isRegisterFormShown()")
        DivElement(classCss="modal__action, action")
            SvgElement(:image="close" :onclick="showForm")
        DivElement(classCss="modal__main")
            DivElement(classCss="wysiwyg")
                h3 {{schema.title}}
            DivElement(classCss="formular, mb-0")
                DivElement(classCss="formular__main")
                    FormElement(:onsubmit="register")
                        fieldset
                            DivElement(classCss="form__group, group")
                                DivElement(classCss="group__main")
                                    EmptyElement(v-for="(step, index) in schema.steps" :key="index")
                                        DivElement(:classCss="step.class" style="margin-bottom: 1.25rem;")
                                            FormInput(:data="step")
</template>

<script>
import EmptyElement from "@/js/components/elements/Empty";
import DivElement from '@/js/components/elements/Div'
import SvgElement from '@/js/components/elements/Svg'
import FormInput from "@/js/components/elements/FormInput";
import FormElement from '@/js/components/elements/Form'

import ComputedModalLayout from "@/js/computed/blocks/modals/ModalLayout.js";

export default {
    name: "RegisterModal",
    data(){
        return{
            schema: this.$store.state.schemas.RegisterFormSchema,
            close: 'images/svg/sprite.svg#close',
        }
    },
    methods:{
        ...ComputedModalLayout,
        showForm(){
            this.$store.commit('closeRegisterForm')
        },
        register(e){
            e.preventDefault()
            console.log(e)
        }
    },
    components:{
        DivElement,
        SvgElement,
        EmptyElement,
        FormInput,
        FormElement
    }
}
</script>

<style scoped>
fieldset{
  border: 0;
}
</style>
