<template lang="pug">
//DivElement(classCss="form-item")
//  DivElement(classCss="form-item__main")
//    DivElement(classCss="form-item__field")
//      select(class="select" :name="data.name" select-one @change="onChange" :required="data.required" :value="data.value")
//      DivElement(classCss="error" v-if="data.error") {{data.error}}
</template>

<script>
import DivElement from '@/js/components/elements/Div'
export default{

	props:['data', 'onchange'],
  data(){
	  return{
      simpleSelect: {
        min_age: undefined,
        max_age: undefined,
        reason: undefined,
        gender: undefined,
        grade_max: undefined,
        grade_min: undefined,
        price_max: undefined,
        price_min: undefined,
        priority_index_add:undefined,
        priority_index_edit:undefined,
        hours: undefined,
        minutes: undefined,
        seconds: undefined
      }
    }
  },
  components: {
    DivElement
  },
  methods:{
    onChange(e) {
      this.data.value = e.detail.value
      if(this.data.name == 'priority_index_edit' || this.data.name == 'priority_index_add'){
        this.data.value = e.target[0].label
      }
      this.onchange(e)
    },
    removeItem(e){
      this.data.value = e.target.value
      this.onchange(e)
    },
    initSelect(){
      if(this.data.name == 'age_min'){
        let items = [],
            value = null,
            label = 'Укажите значение',
            obj = {value, label}
        obj.selected = true
        obj.hidden = true
        items.push(obj)
        for (let option in this.data.options){
            if (this.data.options.hasOwnProperty(option)){
              let value = this.data.options[option].value.toString()
              let label = this.data.options[option].label.toString()
              let obj = {value, label}
              if(this.data.value){
                if(this.data.options[option].value == this.data.value){
                  obj.selected = true
                }
              }
              items.push(obj)
            }
          }
        let selectMinAge = document.querySelector('.select[name="age_min"]')
        if(selectMinAge){
          if(this.simpleSelect.min_age == undefined){
            this.simpleSelect.min_age = new Choices(selectMinAge, {
              silent: true,
              removeItems: true,
              removeItemButton: true,
              searchEnabled: false,
              noChoicesText: 'Ничего не найдено',
              allowHTML: true,
              // placeholder: true,
              // placeholderValue: this.data.placeholder,
              itemSelectText: '',
              choices: items
            });
            selectMinAge.addEventListener('removeItem', (event)=> {
              this.removeItem(event)
                },
                false,);
          }else{
            this.simpleSelect.min_age.clearChoices()
            this.simpleSelect.min_age.setChoices(items, 'value',
                    'label',
                    false,)
          }
        }
      }
      if(this.data.name == 'age_max'){
        let items = [],
            value = null,
            label = 'Укажите значение',
            obj = {value, label}
        obj.selected = true
        obj.hidden = true
        items.push(obj)
        for (let option in this.data.options){
          if (this.data.options.hasOwnProperty(option)){
            let value = this.data.options[option].value.toString()
            let label = this.data.options[option].label.toString()
            let obj = {value, label}
            if(this.data.value){
              if(this.data.options[option].value == this.data.value){
                obj.selected = true
              }
            }
            items.push(obj)

          }
        }
        let selectMaxAge = document.querySelector('.select[name="age_max"]')
        if(selectMaxAge){
          if(this.simpleSelect.max_age == undefined){
            this.simpleSelect.max_age = new Choices(selectMaxAge, {
              silent: true,
              searchEnabled: false,
              noChoicesText: 'Ничего не найдено',
              allowHTML: true,
              placeholder: true,
              removeItems: true,
              removeItemButton: true,
              placeholderValue: this.data.placeholder,
              itemSelectText: '',
              choices: items
            });
            selectMaxAge.addEventListener('removeItem', (event)=> {
                  this.removeItem(event)
                },
                false,);
          }else{
            this.simpleSelect.max_age.clearChoices()
            this.simpleSelect.max_age.setChoices(items, 'value',
                'label',
                false,)
          }

        }

      }
      if(this.data.name == 'reason'){
        var items = []
        var value = null
        var label = 'Укажите значение'
        var obj = {value, label}
        obj.selected = true
        obj.hidden = true
        items.push(obj)
        for (let option in this.data.options){
          if (this.data.options.hasOwnProperty(option)){
            let value = this.data.options[option].value.toString()
            let label = this.data.options[option].label.toString()
            let obj = {value, label}
            if(this.data.value){
              if(this.data.options[option].value == this.data.value){
                obj.selected = true
              }
            }
            items.push(obj)

          }
        }
        var selectReason = document.querySelector('.select[name="reason"]')
        if(selectReason){
          if(this.simpleSelect.reason == undefined){
            this.simpleSelect.reason = new Choices(selectReason, {
              searchEnabled: false,
              noChoicesText: 'Ничего не найдено',
              allowHTML: false,
              placeholder: true,
              removeItems: true,
              removeItemButton: true,
              placeholderValue: this.data.placeholder,
              itemSelectText: '',
              choices: items
            });
          }else{
            this.simpleSelect.reason.clearChoices()
            this.simpleSelect.reason.setChoices(items, 'value',
                'label',
                false,)
          }

        }

      }
      if(this.data.name == 'grade_max'){
        // console.log(this.data.options)
        var items = []
        var value = null
        var label = 'Укажите значение'
        var obj = {value, label}
        obj.selected = true
        obj.hidden = true
        items.push(obj)
        for (let option in this.data.options){
          if (this.data.options.hasOwnProperty(option)){
            let value = this.data.options[option].value.toString()
            let label = this.data.options[option].label.toString()
            let obj = {value, label}
            if(this.data.value){
              if(this.data.options[option].value == this.data.value){
                obj.selected = true
              }
            }
            items.push(obj)

          }
        }
        var grade_max = document.querySelector('.select[name="grade_max"]')
        if(grade_max){
          if(this.simpleSelect.grade_max == undefined){
            this.simpleSelect.grade_max = new Choices(grade_max, {
              searchEnabled: false,
              noChoicesText: 'Ничего не найдено',
              allowHTML: false,
              placeholder: true,
              removeItems: true,
              removeItemButton: true,
              placeholderValue: this.data.placeholder,
              itemSelectText: '',
              choices: items
            });
          }else{
            this.simpleSelect.grade_max.clearChoices()
            this.simpleSelect.grade_max.setChoices(items, 'value',
                'label',
                false,)
          }

        }


      }
      if(this.data.name == 'grade_min'){
        var items = []
        var value = null
        var label = 'Укажите значение'
        var obj = {value, label}
        obj.selected = true
        obj.hidden = true
        items.push(obj)
        for (let option in this.data.options){
          if (this.data.options.hasOwnProperty(option)){
            let value = this.data.options[option].value.toString()
            let label = this.data.options[option].label.toString()
            let obj = {value, label}
            if(this.data.value){
              if(this.data.options[option].value == this.data.value){
                obj.selected = true
              }
            }
            items.push(obj)

          }
        }
        var grade_min = document.querySelector('.select[name="grade_min"]')
        if(grade_min){
          if(this.simpleSelect.grade_min == undefined){
            this.simpleSelect.grade_min = new Choices(grade_min, {
              searchEnabled: false,
              noChoicesText: 'Ничего не найдено',
              allowHTML: false,
              placeholder: true,
              removeItems: true,
              removeItemButton: true,
              placeholderValue: this.data.placeholder,
              itemSelectText: '',
              choices: items
            });
          }else{
            this.simpleSelect.grade_min.clearChoices()
            this.simpleSelect.grade_min.setChoices(items, 'value',
                'label',
                false,)
          }

        }


      }
      if(this.data.name == 'price_min'){
        var items = []
        var value = null
        var label = 'Укажите значение'
        var obj = {value, label}
        obj.selected = true
        obj.hidden = true
        items.push(obj)
        for (let option in this.data.options){
          if (this.data.options.hasOwnProperty(option)){
            let value = this.data.options[option].value.toString()
            let label = this.data.options[option].label.toString()
            let obj = {value, label}
            if(this.data.value){
              if(this.data.options[option].value == this.data.value){
                obj.selected = true
              }
            }
            items.push(obj)

          }
        }
        var price_min = document.querySelector('.select[name="price_min"]')
        if(selectGender){
          if(this.simpleSelect.price_min == undefined){
            this.simpleSelect.price_min = new Choices(price_min, {
              searchEnabled: false,
              noChoicesText: 'Ничего не найдено',
              allowHTML: false,
              placeholder: true,
              placeholderValue: this.data.placeholder,
              itemSelectText: '',
              choices: items
            });
          }else{
            this.simpleSelect.price_min.clearChoices()
            this.simpleSelect.price_min.setChoices(items, 'value',
                'label',
                false,)
          }

        }


      }
      if(this.data.name == 'price_max'){
        var items = [],
            value = null,
            label = 'Укажите значение',
            obj = {value, label}
        obj.selected = true
        obj.hidden = true
        items.push(obj)
        for (let option in this.data.options){
          if (this.data.options.hasOwnProperty(option)){
            let value = this.data.options[option].value.toString()
            let label = this.data.options[option].label.toString()
            let obj = {value, label}
            if(this.data.value){
              if(this.data.options[option].value == this.data.value){
                obj.selected = true
              }
            }
            items.push(obj)

          }
        }
        var price_max = document.querySelector('.select[name="price_max"]')
        if(selectGender){
          if(this.simpleSelect.price_max == undefined){
            this.simpleSelect.price_max = new Choices(price_max, {
              searchEnabled: false,
              noChoicesText: 'Ничего не найдено',
              allowHTML: false,
              placeholder: true,
              placeholderValue: this.data.placeholder,
              itemSelectText: '',
              choices: items
            });
          }else{
            this.simpleSelect.price_max.clearChoices()
            this.simpleSelect.price_max.setChoices(items, 'value',
                'label',
                false,)
          }

        }


      }
      if(this.data.name == 'gender'){
        var items = [],
            value = null,
            label = 'Укажите значение',
            obj = {value, label}
        obj.selected = true
        obj.hidden = true
        items.push(obj)
        for (let option in this.data.options){
          if (this.data.options.hasOwnProperty(option)){
            let value = this.data.options[option].value.toString()
            let label = this.data.options[option].label.toString()
            let obj = {value, label}
            if(this.data.value){
              if(this.data.options[option].value == this.data.value){
                obj.selected = true
              }
            }
            items.push(obj)

          }
        }
        var selectGender = document.querySelector('.select[name="gender"]')
        if(selectGender){
          if(this.simpleSelect.gender == undefined){
            this.simpleSelect.price_max = new Choices(selectGender, {
              searchEnabled: false,
              noChoicesText: 'Ничего не найдено',
              allowHTML: false,
              placeholder: true,
              placeholderValue: this.data.placeholder,
              itemSelectText: '',
              choices: items
            });
          }else{
            this.simpleSelect.price_max.clearChoices()
            this.simpleSelect.price_max.setChoices(items, 'value',
                'label',
                false,)
          }
        }
      }
      if(this.data.name == 'priority_index_edit'){

        let items = [],
            value = null,
            label = 'Укажите значение',
            obj = {value, label}
        obj.selected = true
        obj.hidden = true
        items.push(obj)
        for (let option in this.data.options){
          if (this.data.options.hasOwnProperty(option)){
            let value = this.data.options[option].value.toString(),
                label = this.data.options[option].label.toString(),
                obj = {value, label}

            // console.log(this.data.options[option].label, this.data.value)
            if(this.data.value){
              if(this.data.options[option].label == this.data.value){
                obj.selected = true
              }
            }
            items.push(obj)

          }

        }
        let selectPriorityEdit = document.querySelector('.select[name="priority_index_edit"]')
          if(selectPriorityEdit){
            if(this.simpleSelect.priority_index_edit === undefined){
              this.simpleSelect.priority_index_edit = new Choices(selectPriorityEdit, {
                searchEnabled: false,
                noChoicesText: 'Ничего не найдено',
                allowHTML: false,
                placeholder: true,
                placeholderValue: this.data.placeholder,
                itemSelectText: '',
                removeItems: true,
                removeItemButton: true,
                sorter: function(a, b) {
                  return b.label.length - a.label.length;
                },
                choices: items
              });
            }else{
              this.simpleSelect.priority_index_edit.clearChoices()
              this.simpleSelect.priority_index_edit.setChoices(items, 'value',
                  'label',
                  false,)
            }
          }

      }
      if(this.data.name == 'priority_index_add'){

        let items = [],
            value = null,
            label = 'Укажите значение',
            obj = {value, label}
        obj.selected = true
        obj.hidden = true
        items.push(obj)
        for (let option in this.data.options){
          if (this.data.options.hasOwnProperty(option)){
            let value = this.data.options[option].value.toString(),
                label = this.data.options[option].label.toString(),
                obj = {value, label}
            console.log(this.data.options[option].label, this.data.value)
            if(this.data.value){
              if(this.data.options[option].label == this.data.value){
                obj.selected = true
              }
            }
            items.push(obj)
          }
          console.log(items)
        }
        let selectPriorityAdd = document.querySelector('.select[name="priority_index_add"]')
        if(selectPriorityAdd){
          if(this.simpleSelect.priority_index_add === undefined){
            this.simpleSelect.priority_index_add = new Choices(selectPriorityAdd, {
              searchEnabled: false,
              noChoicesText: 'Ничего не найдено',
              allowHTML: false,
              placeholder: true,
              placeholderValue: this.data.placeholder,
              itemSelectText: '',
              removeItems: true,
              removeItemButton: true,
              sorter: function(a, b) {
                return b.label.length - a.label.length;
              },
              choices: items
            });
          }else{
            this.simpleSelect.priority_index_add.clearChoices()
            this.simpleSelect.priority_index_add.setChoices(items, 'value','label', false,)
          }
        }

      }
      if(this.data.name == 'hours'){
        let items = [],
            value = null,
            label = 'Укажите значение',
            obj = {value, label}
        obj.selected = true
        obj.hidden = true
        items.push(obj)
        for (let option in this.data.options){
          if (this.data.options.hasOwnProperty(option)){
            let value = this.data.options[option],
                label = this.data.options[option],
                obj = {value, label}
            if(this.data.value){
              if(this.data.options[option] == this.data.value){
                obj.selected = true
              }
            } else {
              if(this.data.options[option] == '00'){
                obj.selected = true
              }
            }
            items.push(obj)
          }

        }
        let selectHours = document.querySelector('.select[name="hours"]')
        if(selectHours){
          if(this.simpleSelect.hours == undefined){
            this.simpleSelect.hours = new Choices(selectHours, {
              searchEnabled: false,
              noChoicesText: 'Ничего не найдено',
              allowHTML: false,
              placeholder: true,
              placeholderValue: this.data.placeholder,
              itemSelectText: '',
              sorter: function(a, b) {
                return b.label.length - a.label.length;
              },
              choices: items
            });
          }else{
            this.simpleSelect.hours.clearChoices()
            this.simpleSelect.hours.setChoices(items, 'value',
                'label',
                false,)
          }
        }

      }

      if(this.data.name == 'minutes'){
        let items = [],
            value = null,
            label = 'Укажите значение',
            obj = {value, label}
        obj.selected = true
        obj.hidden = true
        items.push(obj)
        for (let option in this.data.options){
          if (this.data.options.hasOwnProperty(option)){
            let value = this.data.options[option],
                label = this.data.options[option],
                obj = {value, label}
            if(this.data.value){
              if(this.data.options[option] == this.data.value){
                obj.selected = true
              }
            } else {
              if(this.data.options[option] == '00'){
                obj.selected = true
              }
            }
            items.push(obj)

          }

        }
        let selectMinutes = document.querySelector('.select[name="minutes"]')
        if(selectMinutes){
          if(this.simpleSelect.minutes == undefined){
            this.simpleSelect.minutes = new Choices(selectMinutes, {
              searchEnabled: false,
              noChoicesText: 'Ничего не найдено',
              allowHTML: false,
              placeholder: true,
              placeholderValue: this.data.placeholder,
              itemSelectText: '',
              sorter: function(a, b) {
                return b.label.length - a.label.length;
              },
              choices: items
            });
          }else{
            this.simpleSelect.minutes.clearChoices()
            this.simpleSelect.minutes.setChoices(items, 'value',
                'label',
                false,)
          }
        }

      }

      if(this.data.name == 'seconds'){

        let items = [],
            value = null,
            label = 'Укажите значение',
            obj = {value, label}
        obj.selected = true
        obj.hidden = true
        items.push(obj)
        for (let option in this.data.options){
          if (this.data.options.hasOwnProperty(option)){
            let value = this.data.options[option],
                label = this.data.options[option],
                obj = {value, label}
            if(this.data.value){
              if(this.data.options[option] == this.data.value){
                obj.selected = true
              }
            } else {
              if(this.data.options[option] == '00'){
                obj.selected = true
              }
            }
            items.push(obj)

          }

        }
        let selectSeconds = document.querySelector('.select[name="seconds"]')
        if(selectSeconds){
          if(this.simpleSelect.seconds == undefined){
            this.simpleSelect.seconds = new Choices(selectSeconds, {
              searchEnabled: false,
              noChoicesText: 'Ничего не найдено',
              allowHTML: false,
              placeholder: true,
              placeholderValue: this.data.placeholder,
              itemSelectText: '',
              sorter: function(a, b) {
                return b.label.length - a.label.length;
              },
              choices: items
            });
          }else{
            this.simpleSelect.seconds.clearChoices()
            this.simpleSelect.seconds.setChoices(items, 'value',
                'label',
                false,)
          }
        }
      }
    }
  },
  mounted(){
    // console.log('initSelect mounted');
    this.initSelect()
  },
  // updated(){
  //   console.log('initSelect updated');
  //   this.initSelect()
  //
  // },
  // watch: {
  //   data: {
  //     deep: true,
  //     handler(newValue) {
  //       if (newValue) {
  //         this.initSelect()
  //       }
  //     }
  //   }
  // },
}

</script>

<style>
.choices{
  width: 100%;
  margin-top: 16px;
}
.choices__inner{
  color: rgb(8, 22, 14);
  background-color: rgb(255, 255, 255);
  font-size: 1rem;
  line-height: 1.25rem;
  font-weight: 500;
  font-family: "Montserrat", sans-serif;
  border-radius: 0.5rem;
  border: 0.125rem solid rgba(8, 23, 14, 0.2);

}
.is-open .choices__inner{
  color: rgb(8, 22, 14);
  background-color: rgb(255, 255, 255);
  font-size: 1rem;
  line-height: 1.25rem;
  font-weight: 500;
  font-family: "Montserrat", sans-serif;
  border-radius: 0.5rem;
  border: 0.125rem solid rgba(8, 23, 14, 0.2);

}
.is-focused .choices__inner{
  color: rgb(8, 22, 14);
  border-color: rgb(11, 118, 54);
}
.is-highlighted{
  background-color: rgb(11, 118, 54);
}

.choices__list--dropdown .choices__item--selectable,.choices__list[aria-expanded] .choices__item--selectable {
  padding-right: 10px
}

</style>
