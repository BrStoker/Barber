
export default {

    state: {
        init: false,
        load: false,
        modals:{
            isModalShown: false,
            loginFormShown: false,
            registerFormShown: false
        },
        user:{
            auth: false,
            data:{
                first_name: '',
                last_name: '',
                phone: '',
                email: ''
            }
        },
        services: []
    },
    mutations: {

    }

}
