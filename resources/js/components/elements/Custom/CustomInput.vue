<template lang="pug">
  EmptyElement
    DivElement(:classCss="input.class" v-if="input.class")
      DivElement(classCss="form-item__field")
        input(:type="getType" v-model="input.value" :value="input.value" :name="input.name" :placeholder="input.placeholder" class="form-item__input" :class="{error: input.error}" :min="input.min" :max="input.max" :disabled="input.disabled" :pattern="input.regExp" :title="input.error" @input="onInputChange" :required="input.required" @blur="onBlur")
  //    DivElement(classCss="form-item__ico" v-if="input.type == 'password' || input.name == 'fio'")
  //      SvgElement(:image="input.image" :onclick="togglePasswordVisibility" v-if="input.type == 'password'")
  //      SvgElement(:image="input.images.search" v-else)
  //    DivElement(classCss="subsection__modal-init" v-if="input.name == 'fio'" :onclick="subsectionModal")
  //      SvgElement(:image="filterImage")
  //    DivElement(classCss="error" v-if="!errorDisable && input.error") {{input.error}}
  //  EmptyElement(v-else)
  //    input(:type="getType" v-model="input.value" :value="input.value" :name="input.name" :placeholder="input.placeholder" class="form-item__input" :class="{error: input.error}" :min="input.min" :max="input.max" :disabled="input.disabled" :pattern="input.regExp" :title="input.error" @input="onInputChange" :required="input.required")
  //    DivElement(classCss="error" v-if="!errorDisable && input.error") {{input.error}}
  //  DivElement(classCss="form-item__ico" v-if="input.type == 'password' || input.name == 'fio'")
  //    SvgElement(:image="input.image" :onclick="togglePasswordVisibility" v-if="input.type == 'password'")
  //    SvgElement(:image="input.images.search" v-else)
  //  DivElement(classCss="subsection__modal-init" v-if="input.name == 'fio'" :onclick="subsectionModal")
  //    SvgElement(:image="filterImage")

</template>

<script>

  import ComputedElements from '@/js/computed/elements/Index'
  import ComputedInput from '@/js/computed/elements/Input'
  import MethodsElements from '@/js/methods/elements/Input'
  import EventsInput from '@/js/events/elements/Input'


  import ImageElement from '@/js/components/elements/Image'
  import LabelElement from '@/js/components/elements/Label'
  import EmptyElement from '@/js/components/elements/Empty'
  import DivElement from '@/js/components/elements/Div'
  import SvgElement from '@/js/components/elements/Svg'


  export default {
    name: 'CustomInputElement',
    props: ['input', 'onchange', 'onblur', 'errorDisable'],
    data(){
      return{
        show: false,
        filterImage: '/image/svg/sprite.svg#filter'
      }
    },
    components:{
      ImageElement, LabelElement, DivElement, SvgElement, EmptyElement
    },
    computed:
    {
      ...ComputedElements,
      ...ComputedInput
    },
    methods: {
      ...MethodsElements,
      ...EventsInput,
      togglePasswordVisibility() {
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
      onBlur(event){
        if(this.element !== undefined){
          if(typeof this.onblur === 'function'){
            this.onblur(null, event)
          }
        }else{
          if(typeof this.onblur === 'function'){
            this.onblur(null, event)
          }
        }
      },
      subsectionModal() {
        $(".layout__section").on('click', '.subsection__modal-init', function () {
          $(this).closest(".layout__section").find(".section__subsection_modal").addClass("modal_active");
        });
        $(".section__subsection").on('click', '.modal__remove', function () {
          $(this).closest(".section__subsection_modal").removeClass("modal_active");
        });
      }
    }
  }
</script>

<style lang="scss">
.compact .form-item__input {
    padding: 0 1.25rem;
}
</style>
