<template lang="pug">

EmptyElement()
//  select(:value="data.value" id="country_id" @choice="change" @change="onchange" @removeItem="removeItem")
//  DivElement(classCss="error" v-if="data.error") {{data.error}}
//EmptyElement(v-else-if="data.name == 'courses_type_id'")
//  select( id="courses_type_id" :value="data.value" @search="fetchOptions" @change="onchange" multiple='true')
//  DivElement(classCss="error" v-if="data.error") {{data.error}}
//EmptyElement(v-else-if="data.name == 'courses_subject_id'")
//  select(id="courses_subject_id" :value="data.value" @search="fetchOptions" @choice="change" @change="onchange")
//  DivElement(classCss="error" v-if="data.error") {{data.error}}
//EmptyElement(v-else-if="cities")
//  select(id="city_id" :value="data.value" @search="fetchOptions" @choice="change" @change="onchange")
//  DivElement(classCss="error" v-if="data.error") {{data.error}}
//
//EmptyElement
//  select(v-if="data.name == 'country_id'" :value="data.value" id="country_id" @choice="change" @change="onchange"  @removeItem="removeItem")
//  select(v-else-if="data.name == 'courses_type_id'" required :name="data.name" id="courses_type_id" :value="data.value" @search="fetchOptions" @change="onchange" multiple='true')
//  select(v-else-if="data.name == 'courses_subject_id'" required :name="data.name" id="courses_subject_id" :value="data.value" @search="fetchOptions" @choice="change" @change="onchange")
//  DivElement(v-else-if="data.name == 'category_add' || data.name == 'category_edit'" classCss="col, col_12")
//    select(:id="data.name" :value="data.value" @choice="change")
//    DivElement(classCss="error" v-if="data.error") {{data.error}}
//  select(v-else-if="cities" id="city_id" :value="data.value" @search="fetchOptions" @choice="change" @change="onchange" @removeItem="removeItem")

</template>

<script>

  import EmptyElement from '@/js/components/elements/Empty';
  import DivElement from '@/js/components/elements/Div';
  import HttpClass from '@/js/classes/Http';

  export default {
    components: {
        EmptyElement,
        DivElement},
    props:['data','cities', 'onchange'],
    data() {

      return{
          countries:  this.$store.state.data.app.countries,
          coursesTypes: this.$store.state.data.app.courseTypes,
          coursesSubject: this.$store.state.data.app.courseSubject,
          purposeCategories: this.$store.state.data.app.purposeCategories,
          myValue: '',
          city: this.cities,
          tempChoices: {
              country: undefined,
              city: undefined,
              courses_type_id: undefined,
              courses_subject_id: undefined,
              category_add: undefined,
              category_edit: undefined
          },
          settings: '{width: -webkit-fill-available}',
          key: 0,
      }

    },
		methods:{
			...HttpClass,
			selectCity(e){
				this.data.value=e.code
        this.onchange(e)
			},
			fetchOptions(e){
				this.data.value=e.code
				const form_data= new FormData();
        form_data.append('country_id',this.$store.state.schemas.filter.steps[2].inputs[0].value);
				form_data.append('q', e.detail.value);
				this.sendRequest({
						method:'post',
						url: '/city',
						data: form_data,
						success: this.RegisterSuccess,
						error: this.handelErrorResponse
					})
				},

        change(e){

          if(this.data.name == 'category_add' || this.data.name == 'category_edit'){
            this.data.value = e.detail.choice.label
          }else{
            this.data.value = e.detail.choice.value
          }
        },
      removeItem(e){
        this.data.value = ''
      },

      RegisterSuccess(result) {


          const cities =  result.data.data.map(item=>{
            return {
              code:item.id,
              label:item.value
            }
          })
          this.$store.commit('setCities',cities)
          let selectCity = document.querySelector('#city_id')
          if(this.tempChoices.city == undefined) {

            this.tempChoices.city = new Choices(selectCity, {
              silent: true,
              choices: this.$store.state.data.app.cities,
              noChoicesText: 'Ничего не выбрано',
              noResultsText: 'Ничего не найдено',
              searchEnabled: true,
              searchChoices: true,
              searchFloor: 1,
              removeItems: true,
              removeItemButton: true,
              loadingText: 'Поиск...',
              searchResultLimit: 4,
              searchFields: ['label'],
              placeholder: true,
              placeholderValue: 'Город',
              itemSelectText: '',
              allowHTML: false
            })
            this.tempChoices.city.removeActiveItems()

          }else{
            this.tempChoices.city.removeActiveItems()
            this.tempChoices.city.clearChoices()
            this.tempChoices.city.setChoices(this.$store.state.data.app.cities, 'value', 'label', true)
          }
			},
			selectCountry(e){
			  if(e){
          this.data.value = e.target.value
        }else{
          this.data.value = ''
        }
        const form_data= new FormData();
        form_data.append('country_id', this.data.value)
        this.sendRequest({
            method:'post',
            url: '/city',
            data: form_data,
            success: this.RegisterSuccess,
            error: this.handelErrorResponse
          })
			},

			handelErrorResponse(result) {
				console.error('RegisterError -> ', result)
			},
      clearCities(){
			  this.$store.commit('clearCities')
        this.onchange()
      },
      initCountry(){

        if(this.data.name == 'country_id'){

          const selectCountry = document.querySelector('#country_id')

          let countries = this.countries
          let items = []
          let value = null
          let label = 'Укажите значение'
          let obj = {value, label}
          obj.selected = true
          obj.hidden = true
          items.push(obj)
          for(let country in countries){
            let value = countries[country].value.toString()
            let label = countries[country].label.toString()
            let obj = {value, label}
            if(countries[country].value == this.data.value){
              obj.selected = true
            }
            items.push(obj)
          }

          if(this.tempChoices.country == undefined) {

            this.tempChoices.country = new Choices(selectCountry,{
              silent: true,
              choices: items,
              noChoicesText: 'Ничего не выбрано',
              noResultsText: 'Ничего не найдено',
              placeholder: true,
              placeholderValue: 'Укажите значение',
              itemSelectText: '',
              removeItems: true,
              removeItemButton: true,
              loadingText: 'Загрузка...',
              allowHTML: false
            })

          }
          if(this.tempChoices.country.getValue() != undefined){
            this.initCity(this.tempChoices.country.getValue().value)
          }

          selectCountry.addEventListener('change', (event)=>{
            if(this.tempChoices.city != undefined){
              this.tempChoices.city.removeActiveItems()
            }
            this.initCity(event.target.value)
          })
          selectCountry.addEventListener('removeItem', (event)=>{
            if(this.tempChoices.country != undefined){
              const event = new Event('change');
              selectCountry.dispatchEvent(event);
            }
          })

        }else if (this.data.name == 'courses_type_id'){

          const courses_type_id = document.querySelector('#courses_type_id')

          let types = this.coursesTypes
          let items = []
          let value = null
          let label = 'Укажите значение'
          let obj = {value, label}
          obj.selected = true
          obj.hidden = true
          items.push(obj)
          for(let type in types){
            let value = types[type].value.toString()
            let label = types[type].label.toString()
            let obj = {value, label}
            if(types[type].value == this.data.value){
              obj.selected = true
            }
            items.push(obj)
          }

          if(this.tempChoices.courses_type_id == undefined) {

            this.tempChoices.courses_type_id = new Choices(courses_type_id,{
              silent: true,
              choices: items,
              removeItems: true,
              removeItemButton: true,
              noChoicesText: 'Ничего не выбрано',
              noResultsText: 'Ничего не найдено',
              placeholder: true,
              placeholderValue: 'Укажите тип курса',
              itemSelectText: '',
              loadingText: 'Загрузка...',
              allowHTML: false,

            })

          }

          courses_type_id.addEventListener(
              'addItem',
              (event)=> {
                this.data.value = this.tempChoices.courses_type_id.getValue(true)
              },
              false,
          );
          courses_type_id.addEventListener('removeItem',(event)=>{
            this.data.value = this.tempChoices.courses_type_id.getValue(true)
          },false)
        }else if(this.data.name == 'courses_subject_id'){

          const courses_subject_id = document.querySelector('#courses_subject_id')

          let coursesSubject = this.coursesSubject
          let items = []
          let value = null
          let label = 'Укажите значение'
          let obj = {value, label}
          obj.selected = true
          obj.hidden = true
          items.push(obj)
          for(let subject in coursesSubject){
            let value = coursesSubject[subject].value.toString()
            let label = coursesSubject[subject].label.toString()
            let obj = {value, label}
            if(coursesSubject[subject].value == this.data.value){
              obj.selected = true
            }
            items.push(obj)
          }
          if(this.tempChoices.courses_subject_id == undefined) {

            this.tempChoices.courses_subject_id = new Choices(courses_subject_id,{
              silent: true,
              choices: items,
              removeItems: true,
              removeItemButton: true,
              noChoicesText: 'Ничего не выбрано',
              noResultsText: 'Ничего не найдено',
              placeholder: true,
              placeholderValue: 'Укажите тематику',
              itemSelectText: '',
              loadingText: 'Загрузка...',
              allowHTML: false,
            })
          }

          courses_subject_id.addEventListener('removeItem', (event)=>{
            this.data.value = this.tempChoices.courses_subject_id.getValue(true)
          })
        }else if(this.data.name == 'category_add'){

          const purposeCategoryAdd = document.querySelector('#category_add')

          let items = []
          let value = null,
              label = 'Укажите значение',
              obj = {value, label}
          obj.selected = true
          obj.hidden = true
          items.push(obj)

          for(let subject in this.purposeCategories){
            let value = this.purposeCategories[subject].value.toString()
            let label = this.purposeCategories[subject].label.toString()
            let obj = {value, label}
            if(this.purposeCategories[subject].label == this.data.value){
              obj.selected = true
            }
            items.push(obj)
          }
          if(this.tempChoices.category_add == undefined) {

            this.tempChoices.category_add = new Choices(purposeCategoryAdd,{
              silent: true,
              choices: items,
              searchEnabled: false,
              placeholder: true,
              placeholderValue: 'Укажите категорию',
              itemSelectText: '',
              loadingText: 'Загрузка...',
              allowHTML: false,
              position: 'bottom'
            })
          }

        }else if(this.data.name == 'category_edit'){
          const purposeCategoryEdit = document.querySelector('#category_edit')

          let items = [],
              value = null,
              label = 'Укажите значение',
              obj = {value, label}
          obj.selected = true
          obj.hidden = true
          items.push(obj)

          for(let subject in this.purposeCategories){
            let value = this.purposeCategories[subject].value
            let label = this.purposeCategories[subject].label
            let obj = {value, label}

            if(this.purposeCategories[subject].label == this.data.value){
              obj.selected = true
            }
            items.push(obj)
          }

          // console.log(items,this.purposeCategories)

          if(this.tempChoices.category_edit == undefined) {

            this.tempChoices.category_edit = new Choices(purposeCategoryEdit,{
              silent: true,
              choices: items,
              searchEnabled: false,
              placeholder: true,
              placeholderValue: 'Укажите категорию',
              itemSelectText: '',
              loadingText: 'Загрузка...',
              allowHTML: false,
              position: 'bottom',
            })
            this.tempChoices.category_edit.removeActiveItems()
          } else {
            this.tempChoices.category_edit.clearChoices()
            this.tempChoices.category_edit.setChoices(items, 'value', 'label', false)
          }

        }
      },

      initCity(country_id){

        let sendData = new FormData()
        sendData.append('country_id', country_id)
        this.sendRequest({
          method: 'POST',
          url: '/city',
          data: sendData,
          success: this.citySuccess,
          error: this.cityError
        })

      },

      citySuccess(result){
			  var city_id
        if(this.data.hasId){
          city_id = this.$store.state.data.app.user.data.city_id
        }

        let items = []
        let value = null
        let label = 'Укажите значение'
        let obj = {value, label}
        obj.selected = true
        items.push(obj)

        const cities =  result.data.data.map(item=>{
          if (city_id == item.id){
            return {
              value: item.id,
              label: item.value,
              selected: true
            }
          }else{
            return {
              value: item.id,
              label: item.value
            }
          }
        })

        this.$store.commit('setCities', cities)

        let selectCity = document.querySelector('#city_id')
        if(this.tempChoices.city == undefined) {

          this.tempChoices.city = new Choices(selectCity, {
            choices: this.$store.state.data.app.cities,
            noChoicesText: 'Ничего не выбрано',
            noResultsText: 'Ничего не найдено',
            placeholder: true,
            removeItems: true,
            removeItemButton: true,
            placeholderValue: 'Укажите значение',
            itemSelectText: '',
            position: 'bottom',
            allowHTML: false
          })
          this.tempChoices.city.removeActiveItems()

        }
        this.tempChoices.city.clearChoices()
        this.tempChoices.city.setChoices(this.$store.state.data.app.cities, 'value',
            'label',
            false,)
      },
      cityError(result){
			  console.error(result)
      }

		},
    mounted(){
      this.initCountry()
      // console.log('this.tempChoices.category_edit 0',this.tempChoices.category_edit)
    },
    updated(){
      this.initCountry()
    }
  }

</script>

<style lang="scss" scoped>
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 100;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 100;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 100;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 100;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
  unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 100;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 200;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 200;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 200;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 200;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
  unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 200;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
  unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
  unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
  unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 600;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 600;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 600;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 600;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
  unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 600;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 700;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 700;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 700;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 700;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
  unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 700;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 800;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 800;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 800;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 800;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
  unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 800;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 900;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 900;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* vietnamese */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 900;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 900;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
  unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 900;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
.choices{
  margin-top: 16px;
}
.choices__list--multiple .choices__item{
  background-color: rgb(10, 123, 55);
  border-color: rgb(10, 123, 55);
}
.choices__list--dropdown {
  z-index: 3000;
}
.modal__layout.modal__layout_active {
  //transform: translateY(0%);
  overflow: visible;
}
.choices__list--dropdown .choices__item--selectable.is-highlighted, .choices__list[aria-expanded] .choices__item--selectable.is-highlighted {
  background-color: rgb(10, 123, 55);
  color: white;
}
.choices__list .choices__list--dropdown .is-active{
  border-bottom-left-radius: 0.5rem;
  border-bottom-right-radius: 0.5rem;
}
.is-open .choices__list--dropdown,.is-open .choices__list[aria-expanded]{
  border: 0.125rem solid rgb(10, 123, 55);
  border-radius: 0.5rem
}
.choices__inner{
  position:relative;
}
.choices [hidden][name=courses_type_id],
.choices [hidden][name=courses_subject_id] {
  display:block!important;
  height: 0;
  width: 0!important;
  opacity: 0;
  position: absolute;
}

</style>
