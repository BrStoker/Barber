<template lang="pug">
    DivElement(classCss="modal__layout, modal__layout_tiny, modal__layout_authorization" :class="isLoginFormShown()")
        DivElement(classCss="modal__action, action")
            SvgElement(:image="close" :onclick="showForm")
        DivElement(classCss="modal__main")
            DivElement(classCss="wysiwyg")
                h3 {{schema.title}}
            DivElement(classCss="formular, mb-0")
                DivElement(classCss="formular__main")
                    FormElement(:onsubmit="login")
                        fieldset
                            DivElement(classCss="form__group, group")
                                DivElement(classCss="group__main")
                                    EmptyElement(v-for="(step, index) in schema.steps" :key="index")
                                        DivElement(classCss="col, col_12" v-if="step.group")
                                            DivElement(classCss="col, col_12")
                                                RowElement
                                                    DivElement(:classCss="step.class" style="margin-bottom: 1.25rem;" v-for="(input, subIndex) in step.inputs" :key="subIndex")
                                                        InputElement(:data="input" :onchange="onchange" :onclick="onclick")
                                        DivElement(:classCss="step.class" style="margin-bottom: 1.25rem;" v-else)
                                            FormInput(:data="step")

</template>

<script>
import DivElement from "@/js/components/elements/Div";
import SvgElement from "@/js/components/elements/Svg";
import FormElement from "@/js/components/elements/Form";
import RowElement from "@/js/components/elements/Row";
import InputElement from "@/js/components/elements/Input";
import FormInput from "@/js/components/elements/FormInput";

import ComputedModalLayout from "@/js/computed/blocks/modals/ModalLayout.js";
import EmptyElement from "@/js/components/elements/Empty.vue";
import HttpClass from "@/js/classes/Http.js";
export default {
    name: "LoginModal",
    data(){
        return{
            state: this.$store.state.data.app.modals,
            close: 'images/svg/sprite.svg#close',
            title: 'Авторизация',
            schema: this.$store.state.schemas.LoginFormSchema
        }
    },
    methods:{
        ...ComputedModalLayout,
        ...HttpClass,
        showForm(){
            this.$store.commit('showLoginForm')
        },
        login(e){
            e.preventDefault()
            this.sendRequest({
                url: this.schema.action,
                method: this.schema.method,
                data: this.SchemasToFormData(this.schema),
                success: this.loginSuccess,
                error: this.loginError
            })

        },
        loginSuccess(response){
            console.log(response)
            if(response.data.code !== undefined && response.data.code == 0){
                if (response.data.location)
                {
                    console.log(response.data.location)
                    location.href = response.data.location
                }
                else
                {
                    if(response.data.desc !== undefined && response.data.desc.length)
                    {
                        this.success = response.data.desc
                    }
                }
            }
        },
        loginError(response){
            console.error(response)
        },
        onchange(e){
            console.log(e);
        },
        onclick(e){
            e.preventDefault()
            this.$store.commit('showRegisterForm')
        }
    },
    components:{
        EmptyElement,
        DivElement,
        SvgElement,
        FormElement,
        RowElement,
        InputElement,
        FormInput
    }
}
</script>

<style scoped>
fieldset{
  border: 0;
}
</style>
