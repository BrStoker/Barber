<template lang="pug">
DivElement(classCss="layout__modal")
    LoginModal(v-if="!user.auth")
    RegisterModal
</template>

<script>
import DivElement from "@/js/components/elements/Div";
import LoginModal from "@/js/components/blocks/modals/LoginModal";
import RegisterModal from '@/js/components/blocks/modals/RegisterModal'
export default {
    name: "ModalLayout",
    data(){
        return{
            user: this.$store.state.data.app.user
        }
    },
    methods:{

    },
    components:{
        DivElement,
        LoginModal,
        RegisterModal
    }
}
</script>

<style scoped>

</style>
