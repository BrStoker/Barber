<template lang="pug">
  DivElement(classCss="appoinments")
    SpanElement(classCss="title") {{title}}
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
export default {
  name: "userAppoinments",
  data(){
    return{
      user: this.$store.state.data.app.user.data,
      title: 'Информация о записях',
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
    SpanElement
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