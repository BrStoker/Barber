export default{

    isLoginFormShown(){
        return this.$store.state.data.app.modals.loginFormShown ? 'modal__layout_active' : ''
    },
    isRegisterFormShown(){
        return this.$store.state.data.app.modals.registerFormShown ? 'modal__layout_active' : ''
    }


}
