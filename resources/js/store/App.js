
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
                id: '',
                first_name: '',
                last_name: '',
                phone: '',
                email: '',
                image: ''
            }
        },
        services: []
    },
    mutations: {

    }

}
