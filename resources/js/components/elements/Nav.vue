<template lang="pug">
nav(:class="className" :style="styleCss")
  slot
</template>

<script>

  import ComputedElements from '@/js/computed/elements/Index'

  export default {
    name: 'NavElement',
    props:[ 'classCss', 'styleCss'],
    computed:
    {
      ...ComputedElements
    },
    methods:{

    }
  }
</script>

<style lang="scss">

</style>
