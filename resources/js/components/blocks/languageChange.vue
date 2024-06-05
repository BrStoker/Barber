<template lang="pug">
  DivElement(id="container")
    NavElement
      ul
        li
          LinkElement(href="#") {{'Язык'}}
          ul
            li(v-for="(item, index) in langs" :key="index")
              SpanElement(classCss="fi" :class="'fi-' + item.flag + ' fib'")
              LinkElement(:href="item.link") {{item.title}}
</template>

<script>
import DivElement from '@/js/components/elements/Div';
import SpanElement from '@/js/components/elements/Span';
import NavElement from '@/js/components/elements/Nav'
import LinkElement from '@/js/components/elements/Link'
export default {
  name: "languageChange",
  data(){
    return{
      langs: {
        'ru':{
          title: 'Русский',
          flag: 'ru',
          link: '#'
        },
        'en': {
          title: 'English',
          flag: 'gb',
          link: '#'
        }
      }
    }
  },
  components: {
    SpanElement,
    DivElement,
    NavElement,
    LinkElement
  },
  methods:{

  }
}
</script>

<style scoped>
#container {
  justify-content: end;
  max-width: fit-content;
  width: fit-content;
}
nav {
  margin: 50px 0;
  /*background-color: #E64A19;*/
}
nav ul {
  padding: 0;
  margin: 0;
  list-style: none;
  position: relative;
}

nav ul li {
  display:inline-block;
  /*background-color: #E64A19;*/
}

nav a {
  display:block;
  padding:0 10px;
  /*color:#FFF;*/
  font-size:20px;
  line-height: 60px;
  text-decoration:none;
}

nav a:hover {
  /*background-color: #000000;*/
}

/* Hide Dropdowns by Default */
nav ul ul {
  display: none;
  position: absolute;
  top: 60px; /* the height of the main nav */
}

/* Display Dropdowns on Hover */
nav ul li:hover > ul {
  display:inherit;
}

/* Fisrt Tier Dropdown */
nav ul ul li {
  width:170px;
  float:none;
  display:flex;
  flex-direction: row;
  padding: 0 0.5em;
  position: relative;
  border: 1px solid #99BAED;
  background-color: #ffffff;
}

/* Second, Third and more Tiers	*/
nav ul ul ul li {
  position: relative;
  top:-60px;
  left:170px;
}

</style>