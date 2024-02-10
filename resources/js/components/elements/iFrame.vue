<template lang="pug">
  iframe(:class="className" :style="styleCss" :src="src")
    slot
</template>

<script>

  import ComputedElements from '@/js/computed/elements/Index'

  export default {
    name: 'iFrameElement',
    props:[ 'classCss', 'styleCss', 'onclick', 'src'],
    computed:
    {
      ...ComputedElements
    },
    methods:{

      OnClick(e)
      {
        if(this.element != undefined)
        {

          if(typeof this.onclick == 'function')
          {

            this.onclick(e, this.element)
          }

        } else {

          if(typeof this.onclick == 'function')
          {

            this.onclick(e)
          }

        }

      }
    },
    created(){
      // console.log(this.class)
    }
  }
</script>

<style lang="scss">

</style>