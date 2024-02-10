
import AppStore from '@/js/store/App'

import ModalLayoutStore from '@/js/store/blocks/ModalLayout'
import LoginFormSchema from '@/js/schems/blocks/LoginForm'
import RegisterFormSchema from '@/js/schems/blocks/RegisterForm'

const state  = {

    settings: {
    },
    schemas: {
        ...{ LoginFormSchema: LoginFormSchema },
        ...{ RegisterFormSchema: RegisterFormSchema }

    },
    data: {
        ...{ app: AppStore.state },

    }

}

const mutations  = {
    ...AppStore.mutations,
    ...ModalLayoutStore.mutations
}
const actions = {
}

export default {
    state: state,
    mutations: mutations
}
