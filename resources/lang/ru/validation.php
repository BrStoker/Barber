<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Атрибут :attribute должен быть принят.',
    'active_url' => ':attribute не является допустимым URL-адресом.',
    'after' => ':attribute должен быть датой после :date.',
    'after_or_equal' => ':attribute должен быть датой, следующей за :date или равной ей.',
    'alpha' => ':attribute может содержать только буквы.',
    'alpha_dash' => 'Атрибут :attribute может содержать только буквы, цифры, тире и подчеркивания.',
    'alpha_num' => ':attribute может содержать только буквы и цифры.',
    'array' => ':attribute должен быть массивом.',
    'before' => ':attribute должен быть датой перед :date.',
    'before_or_equal' => ':attribute должен быть датой, предшествующей :date или равной ей.',
    'between' => [
        'numeric' => ':attribute должно быть между :min и :max.',
        'file' => ':attribute должно быть между :min и :max килобайт.',
        'string' => ':attribute должно быть между :min и :max символов.',
        'array' => ':attribute должно иметь от :min до :max элементов.',
    ],
    'boolean' => 'Поле :attribute должно быть true или false.',
    'confirmed' => 'Подтверждение :attribute не совпадает.',
    'date' => ':attribute не является допустимой датой.',
    'date_equals' => ':attribute должно быть датой, равной :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'different' => ':attribute и :other должны отличаться.',
    'digits' => ':attribute должно содержать :digits цифр.',
    'digits_between' => ':attribute должно быть между :min и :max цифрами.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute содержит дублирующееся значение.',
    'email' => ':attribute должно быть действительным адресом электронной почты.',
    'ends_with' => ':attribute должно заканчиваться одним из следующих: :values.',
    'exists' => 'Выбранное :attribute недействительно.',
    'file' => ':attribute должно быть файлом.',
    'filled' => 'Поле :attribute должно иметь значение.',
    'gt' => [
        'numeric' => ':attribute должно быть больше :value.',
        'file' => ':attribute должно быть больше :value килобайт.',
        'string' => ':attribute должно быть больше :value символов.',
        'array' => ':attribute должно иметь более :value элементов.',
    ],
    'gte' => [
        'numeric' => ':attribute должно быть больше или равно :value.',
        'file' => ':attribute должно быть больше или равно :value килобайт.',
        'string' => ':attribute должно быть больше или равно :value символов.',
        'array' => ':attribute должно иметь :value элементов или более.',
    ],
    'image' => ':attribute должно быть изображением.',
    'in' => 'Выбранное :attribute недействительно.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => ':attribute должно быть целым числом.',
    'ip' => ':attribute должно быть действительным IP-адресом.',
    'ipv4' => ':attribute должно быть действительным IPv4-адресом.',
    'ipv6' => ':attribute должно быть действительным IPv6-адресом.',
    'json' => ':attribute должно быть действительной JSON-строкой.',
    'lt' => [
        'numeric' => ':attribute должно быть меньше :value.',
        'file' => ':attribute должно быть меньше :value килобайт.',
        'string' => ':attribute должно быть меньше :value символов.',
        'array' => ':attribute должно иметь менее :value элементов.',
    ],
    'lte' => [
        'numeric' => ':attribute должно быть меньше или равно :value.',
        'file' => ':attribute должно быть меньше или равно :value килобайт.',
        'string' => ':attribute должно быть меньше или равно :value символов.',
        'array' => ':attribute не должно иметь более :value элементов.',
    ],
    'max' => [
        'numeric' => ':attribute не может быть больше :max.',
        'file' => ':attribute не может быть больше :max килобайт.',
        'string' => ':attribute не может быть больше :max символов.',
        'array' => ':attribute не может иметь более :max элементов.',
    ],
    'mimes' => ':attribute должно быть файлом типа: :values.',
    'mimetypes' => ':attribute должно быть файлом типа: :values.',
    'min' => [
        'numeric' => ':attribute должно быть не менее :min.',
        'file' => ':attribute должно быть не менее :min килобайт.',
        'string' => ':attribute должно быть не менее :min символов.',
        'array' => ':attribute должно иметь не менее :min элементов.',
    ],
    'not_in' => 'Выбранное :attribute недействительно.',
    'not_regex' => 'Формат :attribute недействителен.',
    'numeric' => ':attribute должно быть числом.',
    'password' => 'Неверный пароль.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => 'Формат :attribute недействителен.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_if' => 'Поле :attribute обязательно, если :other равно :value.',
    'required_unless' => 'Поле :attribute обязательно, если :other не входит в :values.',
    'required_with' => 'Поле :attribute обязательно, когда присутствует :values.',
    'required_with_all' => 'Поле :attribute обязательно, когда присутствуют :values.',
    'required_without' => 'Поле :attribute обязательно, когда :values отсутствует.',
    'required_without_all' => 'Поле :attribute обязательно, когда отсутствуют все :values.',
    'same' => ':attribute и :other должны совпадать.',
    'size' => [
        'numeric' => ':attribute должно быть размером :size.',
        'file' => ':attribute должно быть размером :size килобайт.',
        'string' => ':attribute должно быть размером :size символов.',
        'array' => ':attribute должно содержать :size элементов.',
    ],
    'starts_with' => ':attribute должно начинаться с одного из следующих: :values.',
    'string' => ':attribute должно быть строкой.',
    'timezone' => ':attribute должно быть допустимой зоной.',
    'unique' => ':attribute уже занято.',
    'uploaded' => ':attribute не удалось загрузить.',
    'url' => 'Формат :attribute недействителен.',
    'uuid' => ':attribute должно быть действительным UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
