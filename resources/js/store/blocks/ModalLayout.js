export default {

    state:{

    },
    mutations:{
        showLoginForm(){
            this.state.data.app.modals.isModalShown = !this.state.data.app.modals.isModalShown
            this.state.data.app.modals.loginFormShown = !this.state.data.app.modals.loginFormShown
        },
        showRegisterForm(){
            // this.state.data.app.modals.isModalShown = !this.state.data.app.modals.isModalShown
            this.state.data.app.modals.loginFormShown = !this.state.data.app.modals.loginFormShown
            this.state.data.app.modals.registerFormShown = !this.state.data.app.modals.registerFormShown
        },
        closeRegisterForm(){
            this.state.data.app.modals.isModalShown = !this.state.data.app.modals.isModalShown
            this.state.data.app.modals.registerFormShown = !this.state.data.app.modals.registerFormShown
        }
    }

}
