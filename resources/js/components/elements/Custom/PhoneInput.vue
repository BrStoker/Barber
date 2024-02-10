<template lang="pug">
    EmptyElement
        DivElement(:classCss="input.class" v-if="input.class")
            DivElement(classCss="form-item__field")
                VuePhoneNumberInput(v-model="input.value" :required="input.required")
</template>

<script>
import EmptyElement from "@/js/components/elements/Empty";
import DivElement from "@/js/components/elements/Div";
import VuePhoneNumberInput from 'vue-phone-number-input'
export default {
    name: "PhoneInput",
    props:['input'],
    data(){
        return{

        }
    },
    components:{
        DivElement,
        EmptyElement,
        VuePhoneNumberInput
    }
}
</script>

<style lang="scss" scoped>
.input-phone-number{
    color: rgb(8, 22, 14);
    background-color: rgb(255, 255, 255);
    font-size: 1rem;
    line-height: 1.25rem;
    font-weight: 500;
    font-family: "Advent Pro", sans-serif;
    padding: 1rem 1.25rem;
    width: 100%;
    border-radius: 0.5rem;
    border: 0.125rem solid rgba(8, 23, 14, 0.2);
    margin: 0;
    text-overflow: ellipsis;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    -webkit-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
}
</style>
