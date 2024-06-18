<template lang="pug">
  DivElement(classCss="appoinments")
    DivElement(classCss="appointments_title")
      SpanElement(classCss="title") {{title}}
      LinkElement(classCss="add_appointment_link, btn-primary" href="#" :onclick="addAppointment")
        SvgElement(:image="addButton" classCss="add_appointment_image")
    table(class="table table-striped")
      tr
        td(v-for="(item, index) in schema.cols" :key="index")
          SpanElement(classCss="table_header") {{item.title}}
      tr(v-for="(item, index) in appointments" :key="index")
        td(v-for="(subItem, subIndex) in schema.cols" :key="subIndex")
          SpanElement(:class="{ error: isDateInPast(item['appointment_date']) }") {{item[subItem['name']]}}
</template>

<script>
import DivElement from '@/js/components/elements/Div'
import SpanElement from "@/js/components/elements/Span";
import HttpClass from "@/js/classes/Http";
import LinkElement from '@/js/components/elements/Link';
import SvgElement from '@/js/components/elements/Svg'
export default {
  name: "userAppoinments",
  data(){
    return{
      user: this.$store.state.data.app.user.data,
      title: 'Информация о записях',
      addButton: '/images/svg/sprite.svg#courseAdd',
      schema: {
        url: '/get-appointments',
        method: 'GET',
        cols: [
          {
            name: 'appointment_date',
            title: 'Дата записи'
          },
          {
            name: 'service_name',
            title: 'Услуга'
          },
          {
            name: 'service_cost',
            title: 'Цена'
          }
        ],
      },
      appointments: []
    }
  },
  components:{
    DivElement,
    SpanElement,
    LinkElement,
    SvgElement
  },
  methods:{
    ...HttpClass,
    getData(){
      let sendData = new FormData;
      this.sendRequest({
        method: this.schema.method,
        url: this.schema.url,
        data: sendData,
        success: this.confirmSuccess,
        error: this.handelErrorResponse
      })

    },
    addAppointment(event){
      event.preventDefault()
      console.log(event)
    },
    confirmSuccess(response) {
      if(response.data.appointments.length !== 0){
        this.appointments = response.data.appointments
      }
    },
    handlerErrorResponse(response){
      console.log(response)
    },
    isDateInPast(dateString) {
      const appointmentDate = new Date(dateString);
      const currentDate = new Date();
      return appointmentDate < currentDate;
    }
  },
  mounted(){
    this.getData()
  }
}
</script>

<style scoped>
.appoinments{
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.appoinments .title{
  font-size: 45px;
  color: #99BAED;
  font-weight: bold;
  text-shadow: 0px 5px 10px rgba(153, 186, 237, 0.5);
}
.appointments_title{
  display: flex;
  align-items: center;
  gap: 0.5rem;
  justify-content: space-between;
  width: 100%;
}
.add_appointment_link{
  border-radius: 0.2em;
  width: 2em;
  height: 2em;
  padding: 0.2em;
  background-color: rgb(153, 186, 237);
  color: #FBB400;
  fill: #FBB400;
}
.add_appointment_image{
  fill: #FBB400;
}
.table_header{
  font-weight: bold;
}
.table-striped{
  max-height: 250px;
}
.error{
  color: red;
}

</style>