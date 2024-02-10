export default {

    title: 'Авторизация',
    method: 'POST',
    action: '/login',
    images: {
        eye: "/image/svg/sprite.svg#eye"
    },
    steps: [
        {
            class: 'col, col_12',
            type: 'input',
            classChild: 'form-item',
            group: false,
            inputs:[
                {
                    name: 'email',
                    inputType: 'input',
                    type: 'text',
                    placeholder: 'E-mail',
                    required: true,
                    classParent: 'form-item',
                    id: 'email',
                    class: 'col, col_12',
                    value: '',
                    send: true,
                    validate: true,
                    error: ''
                },
            ]
        },
        {
            class: 'col, col_12',
            type: 'input',
            classChild: 'form-item, form-item_after',
            group: false,
            inputs:[
                {
                    name: 'password',
                    inputType: 'input',
                    type: 'password',
                    placeholder: 'Пароль',
                    classParent: 'form-item',
                    id: 'password',
                    class: 'col, col_12',
                    required: true,
                    send: true,
                    validate: true,
                    image: '/image/svg/sprite.svg#eye',
                    value: '',
                    error: ''
                }
            ],
        },
        {
            class: 'col, col_6, align-end',
            type: 'checkbox',
            classChild: 'form-item',
            group: true,
            inputs:[
                {
                    name: 'rememberMe',
                    inputType: 'checkbox',
                    type: 'checkbox',
                    text: 'Запомнить меня',
                    classParent: '',
                    classCss: 'form-item__main',
                    checkboxAfter: "/images/svg/sprite.svg#checkboxAfter",
                    checkboxBefore: "/images/svg/sprite.svg#checkboxBefore",
                    required: false,
                    send: true,
                    value: '',
                    rules: [
                    ]
                },
                // {
                //     inputType: 'link',
                //     url: '/auth/remember',
                //     placeholder: 'Забыли пароль?',
                //     classParent: 'form-item',
                //     class: '',
                //     required: false,
                //     type: '',
                //     onclick: 'showForgotForm',
                //     value: '',
                //     rules: [
                //     ]
                // },
                {
                    inputType: 'link',
                    url: '/auth/remember',
                    type: 'link',
                    placeholder: 'Регистрация',
                    classParent: 'form-item',
                    class: 'w-100',
                    required: false,
                    validate: false,
                    value: '',
                    rules: [
                    ]
                }

            ],
        },
        {
            class: 'col, col_12',
            type: 'submit',
            group: false,
            inputs:[
                {
                    inputType: 'submit',
                    type: 'submit',
                    placeholder: 'Войти',
                    classParent: '',
                    class: 'btn w-100 btn-primary btn-lg main-button',
                    required: false,
                    validate: false,
                    value: '',
                    rules: [
                    ]
                },
            ],
        }
    ]

}
