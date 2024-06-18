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
import Http from "@/js/classes/Http";

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
      ...Http,
      ...ComputedModalLayout,
      showForm(){
        this.$store.commit('closeRegisterForm')
      },
      register(e){
        e.preventDefault()
        let error = this.validateForm();
        if(!error){
          let form = this.SchemasToFormData(this.schema)
          this.sendRequest({
            url: this.schema.action,
            method: this.schema.method,
            data: form,
            success: this.registerSuccess,
            error: this.registerError
          })
        }else{

        }
      },
      registerSuccess(response){
        let data = response.data
        if(data.code === 0 && _.has(data, 'location')){
          location.href = data.location
        }
      },
      registerError(response){
        console.error(response)
      },
      validateForm() {
        let error = false;

        this.schema.steps.forEach(step => {
          step.inputs.forEach(input => {
            if (input.validate && !input.hidden) {
              if (input.required && !input.value) {
                input.error = 'Это поле обязательно для заполнения';
                error = true;
              } else {
                input.error = '';
              }

              if (input.type === 'email' && !this.validateEmail(input.value)) {
                input.error = 'Введите корректный адрес электронной почты';
                error = true;
              } else if (input.type === 'tel' && !this.validatePhone(input.value)) {
                input.error = 'Введите корректный номер телефона';
                error = true;
              } else if (input.type === 'password' && input.name === 'password_confirm' && input.value !== this.getPasswordValue()) {
                input.error = 'Пароли не совпадают';
                error = true;
              } else {
                input.error = '';
              }
            }
          });
        });

        return error;
      },
      validateEmail(email) {
        const re = /\S+@\S+\.\S+/;
        return re.test(email);
      },
      validatePhone(phone) {
        const re = /^[0-9\-\+]{9,15}$/;
        return re.test(phone);
      },
      getPasswordValue() {
        const passwordInput = this.schema.steps.flatMap(step => step.inputs).find(input => input.name === 'password');
        return passwordInput ? passwordInput.value : '';
      },

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
