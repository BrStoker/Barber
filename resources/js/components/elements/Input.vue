<template lang="pug">
EmptyElement(v-if="data.inputType == 'input'")
    CustomInput(:input="data")
EmptyElement(v-else-if="data.inputType == 'checkbox'")
  DivElement(:classCss="data.classCss")
    CheckboxInput(:data="data" :onchange="onchange")
EmptyElement(v-else-if="data.inputType == 'link'")
    LinkElement(:href="data.url" :onclick="onclick") {{data.placeholder}}
EmptyElement(v-else-if="data.inputType == 'submit'")
  DivElement(classCss="form-item")
    CustomButton(:data="data")
EmptyElement(v-else-if="data.inputType == 'phone'")
    PhoneInput(:input="data")



</template>

<script>

  import ComputedElements from '@/js/computed/elements/Index'
  import MethodsElements from '@/js/methods/elements/Input'
  import EventsInput from '@/js/events/elements/Input'


  import ImageElement from '@/js/components/elements/Image'
  import LabelElement from '@/js/components/elements/Label'
  import EmptyElement from '@/js/components/elements/Empty'
  import LinkElement from "@/js/components/elements/Link.vue";
  import DivElement from '@/js/components/elements/Div'
  import SvgElement from '@/js/components/elements/Svg'
  import SpanElement from '@/js/components/elements/Span'
  import RadioInput from '@/js/components/elements/Custom/RadioInput'
  import CheckboxInput from '@/js/components/elements/Custom/Checkbox'
  import CustomInput from '@/js/components/elements/Custom/CustomInput'
  import CustomButton from '@/js/components/elements/Custom/Button'
  import CustomSelect from '@/js/components/elements/Custom/CustomSelect'
  import SimpleSelect from '@/js/components/elements/Custom/SimpleSelect'
  import Editor from '@/js/components/elements/Custom/EditorArea'
  import btnDeleteUser from '@/js/components/elements/Custom/ButtonDeleteUser'
  import PhoneInput from "@/js/components/elements/Custom/PhoneInput";

  export default {
    name: 'InputElement',
    props: ['data', 'step', 'onclick', 'user', 'onchange', 'errorDisable'],
    components:{
        ImageElement,
        LabelElement,
        DivElement,
        SvgElement,
        EmptyElement,
        RadioInput,
        CheckboxInput,
        CustomInput,
        CustomButton,
        CustomSelect,
        SimpleSelect,
        SpanElement,
        Editor,
        btnDeleteUser,
        LinkElement,
        PhoneInput
    },
    computed:
    {
      ...ComputedElements
    },
    methods: {
      ...MethodsElements,
      ...EventsInput,
      ...{togglePasswordVisibility() {
        this.show = !this.show;
      },
      onInputChange(event) {
        if (this.element !== undefined) {
          if (typeof this.onchange === 'function') {
            this.onchange(event, this.element);
          }
        } else {
          if (typeof this.onchange === 'function') {
            this.onchange(event);
          }
        }
      },
        onClick(event){
          if(typeof this.onclick == 'function'){
            this.onclick(event)
          }
        }
      }
    }
  }
</script>

<style lang="scss">
</style>
