export default{
    method: 'POST',
    action: '/register',
    title: 'Регистрация',
    steps: [
        {
            type: 'input',
            classChild: 'form-item',
            class: 'col, col_12',
            inputs: [
                {
                    name: 'first_name',
                    placeholder: 'Имя',
                    required: true,
                    type: 'text',
                    value: '',
                    validate: true,
                    class: 'col, col_12',
                    classParent: 'form-item',
                    inputType: 'input',
                    hidden: false,
                    error: ''
                },

            ]
        },
        {
            classChild: 'form-item',
            class: 'col, col_12',
            inputs:[
                {
                    name: 'last_name',
                    placeholder: 'Фамилия',
                    required: true,
                    type: 'text',
                    inputType: 'input',
                    class: 'col, col_12',
                    classParent: 'form-item',
                    validate: true,
                    hidden: false,
                    error: '',
                    value: ''
                },
            ]
        },
        {
            classChild: 'form-item',
            class: 'col, col_12',
            inputs:[
                {
                    name: 'email',
                    placeholder: 'E-mail',
                    required: true,
                    type: 'email',
                    inputType: 'input',
                    class: 'col, col_12',
                    classParent: 'form-item',
                    hidden: false,
                    validate: true,
                    error: '',
                    value: ''
                },
            ]
        },
        {
            classChild: 'form-item',
            class: 'col, col_12',
            inputs:[
                {
                    name: 'phone',
                    placeholder: 'Телефон',
                    required: true,
                    type: 'tel',
                    inputType: 'input',
                    class: 'col, col_12',
                    classParent: 'form-item',
                    validate: true,
                    hidden: false,
                    error: '',
                    value: ''
                },
            ]
        },
        {
            classChild: 'form-item, form-item_after',
            class: 'col, col_12',
            inputs:[
                {
                    name: 'password',
                    placeholder: 'Пароль',
                    required: true,
                    type: 'password',
                    inputType: 'input',
                    class: 'col, col_12',
                    classParent: 'form-item',
                    hidden: false,
                    validate: true,
                    error: '',
                    image: '/image/svg/sprite.svg#eye',
                    value: ''
                },
            ]
        },
        {
            classChild: 'form-item, form-item_after',
            class: 'col, col_12',
            inputs:[
                {
                    name: 'password_confirm',
                    placeholder: 'Повторите пароль',
                    required: true,
                    type: 'password',
                    hidden: false,
                    validate: true,
                    class: 'col, col_12',
                    classParent: 'form-item, form-item_after',
                    error: '',
                    inputType: 'input',
                    image: '/image/svg/sprite.svg#eye',
                    value: ''
                }
            ]
        },
        {
            classChild: 'form-item',
            class: 'col, col_12',
            type: 'checkbox',
            inputs: [
                {
                    send: false,
                    name: 'checkbox',
                    text: 'Я согласен с условиями пользовательского соглашения',
                    required: true,
                    type: 'checkbox',
                    class: 'form-item__main',
                    checkboxAfter: "/images/svg/sprite.svg#checkboxAfter",
                    checkboxBefore: "/images/svg/sprite.svg#checkboxBefore",
                    hidden: false,
                    classCss: 'col, col_12',
                    classParent: 'form-item__main',
                    error: '',
                    validate: true,
                    inputType: 'checkbox',
                    value: ''
                },
            ]
        },
        {
            class: 'col, col_12',
            type: 'submit',
            inputs: [

                {
                    inputType: 'submit',
                    type: 'submit',
                    placeholder: 'Регистрация',
                    classParent: '',
                    class: 'btn w-100 btn-primary btn-lg main-button',
                    required: false,
                    validate: false,
                    value: '',
                    rules: [
                    ]
                },
            ]
        },
        // {
        //     type: 'supportLink',
        //     class: 'col, col_12',
        //     inputs: [
        //         {
        //             send: false,
        //             name: 'button',
        //             placeholder: 'Обратиться в техподдержку',
        //             required: true,
        //             type: '',
        //             inputType: 'supportLink',
        //             value: 'Обратиться в техподдержку',
        //             rules: []
        //         }
        //     ]
        // }
    ]
}
