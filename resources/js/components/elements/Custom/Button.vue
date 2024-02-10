<template lang="pug">
DivElement(classCss="form-item__main")
  DivElement(classCss="form-item__field")
    DivElement(:classCss="data.parentClass" v-if="data.parentClass")
      button(@click="Onclick" :type="data.type" :name="data.name" :placeholder="data.placeholder" :class="data.class" :style="styleCss")
        SpanElement(classCss="btn__text") {{data.placeholder}}
    button(@click="Onclick" :type="data.type" :name="data.name" :placeholder="data.placeholder" :class="data.class" :style="styleCss" v-else)
      SpanElement(classCss="btn__text") {{data.placeholder}}

</template>

<script>
  
  import ComputedElements from '@/js/computed/elements/Index'
  import DivElement from '@/js/components/elements/Div'
  import SpanElement from '@/js/components/elements/Span'

  export default {
    name: 'ButtonElement',
    props:[ 'data','classCss', 'type', 'name', 'value', 'placeholder', 'styleCss', 'onclick' ],
    computed:
    {
      ...ComputedElements
    },
    components:{
      DivElement, SpanElement
    },
    methods:{
      Onclick(e){
        if(typeof(this.onclick) == 'function') {


          this.onclick(e)
          
        }

      }
    }
  }

</script>

<style lang="scss">

</style>