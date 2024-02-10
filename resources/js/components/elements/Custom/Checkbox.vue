<template lang="pug">
EmptyElement
  DivElement(classCss="form-item__field" :class="{'hide': data.type == 'hidden'}")
    DivElement(classCss="custom-check")
      LabelElement(classCss="custom-check__label")
        input(:type="getType()" :name="data.name" class="custom-check__input" :data-checked="isChecked" @change="change" :class="{error: data.error}" :checked="isChecked" :pattern="data.regExp")
        SvgElement(classCss="custom-check__ico, custom-check__ico_before" :image="getImage(true)")
        SvgElement(classCss="custom-check__ico, custom-check__ico_after" :image="getImage(false)")
        SpanElement(classCss="custom-check__text") {{data.text}}
</template>

<script>
  import DivElement from '@/js/components/elements/Div'
  import SvgElement from '@/js/components/elements/Svg'
  import SpanElement from '@/js/components/elements/Span'
  import LabelElement from '@/js/components/elements/Label'
  import EmptyElement from '@/js/components/elements/Empty'
  export default{
    components: {DivElement, SvgElement, SpanElement, LabelElement, EmptyElement},
    props:['data', 'onchange'],
    data(){
      return {
        step: this.data,
        value: this.data.checked == 'true',
        checkboxBefore: '/image/svg/sprite.svg#checkboxBefore',
        checkboxAfter: '/image/svg/sprite.svg#checkboxAfter'
      }
    },
    computed:{
      isChecked(){
        return this.data.value
      },
    },
    methods:{
      change(e){
        this.value = ( e.target.checked ? 'true' : '')
        this.data.value = ( e.target.checked ? 'true' : '')
        this.data.checked = ( e.target.checked ? 'true' : '')
        this.error = ''
        this.onchange(e)
      },
      getImage(before){
        if(before == true){
          if(this.data.checkboxBefore){
            return this.data.checkboxBefore
          }else{
            return this.checkboxBefore
          }
        }else{
          if(this.data.checkboxAfter){
            return this.data.checkboxAfter
          }else{
            return this.checkboxAfter
          }
        }

      },
      getType(){
        if(this.data.type){
          return this.data.type
        }else{
          return 'checkbox'
        }
      }
    }
  }

</script>
