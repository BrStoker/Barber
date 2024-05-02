<?php


namespace App\Http\Controllers\Admin;

//use App\Http\Requests\AdminUserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

class UsersCrudController extends CrudController{

    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \App\Traits\AdminController;
    use \App\Traits\Fields;

    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/users');
        CRUD::setEntityNameStrings('','Пользователи');
    }

    protected function setupListOperation(){
        $allUsers = [
            'type'  => 'progress',
            'class'       => 'card text-white bg-success mb-2',
            'value' => \App\Models\User::where('status', 2)->count(),
            'description' => 'Новых пользователей за неделю',
            'hint'        => \App\Models\User::all()->count()
        ];
        $maleUsers = [
            'type'  => 'progress',
            'class'       => 'card text-white bg-warning mb-2',
            'value' => \App\Models\User::where('status', 2)->where('gender', 1)->count() . ' парень',
            'description' => 'Новых пользователей за неделю',
            'hint'        => \App\Models\User::all()->count()
        ];
        $femaleUsers = [
            'type'  => 'progress',
            'class'       => 'card text-white bg-primary mb-2',
            'value' => \App\Models\User::where('status', 2)->where('gender', 2)->count() . ' девушка',
            'description' => 'Новых пользователей за неделю',
            'hint'        => \App\Models\User::all()->count()
        ];
        $unknownUsers = [
            'type'  => 'progress',
            'class'       => 'card text-white bg-danger mb-2',
            'value' => \App\Models\User::where('status', 2)->where('gender', 0)->count() . ' пол не указан',
            'description' => 'Новых пользователей за неделю',
            'hint'        => \App\Models\User::all()->count()
        ];

        $card = [
            'type' => 'div',
            'class' => 'row',
            'content' => [
                $allUsers,
                $maleUsers,
                $femaleUsers,
                $unknownUsers
            ]
        ];

        Widget::add($card)->to('before_content');
        CRUD::setColumns([

            [
                'name' => 'id',
                'label' => '#'
            ],
            [
                'name' => 'first_name',
                'label' => 'Имя',
                'type' => 'closure',
                'function' => function($entry) {
                    return $entry->first_name;
                }
            ],
            [
                'name' => 'last_name',
                'label' => 'Фамилия',
                'type' => 'closure',
                'function' => function($entry){
                    return $entry->last_name;
                }
            ],
            [
                'name' => 'gender',
                'label'=> 'Пол',
                'type' => 'select_from_array',
                'options' => \App\Models\User::$gender
            ],
            [
                'name' => 'status',
                'label' => 'Статус',
                'type'  => 'select_from_array',
                'options' => \App\Models\User::$statuses
            ],
            [
                'name' => 'phone',
                'label' => 'Телефон'
            ],
            [
                'name' => 'created_at',
                'label' => 'Дата регистрации',
                'type' => 'date',
                'format' => 'd.MM.Y'
            ]
        ]);


    }

    protected function setupCreateOperation(){
        $entity = CRUD::getCurrentEntry();

        $values = [];

        if(isset($entity->id))
        {
            CRUD::addField([
                'name' => "html_id",
                'type'  => 'custom_html',
                'value' => '<b>#' . $entity->id . '</b>'
            ]);
        }

        if($entity){

            if($entity->created_at)
            {
                CRUD::addField([
                    'name' => "html_created_at",
                    'type'  => 'custom_html',
                    'label' => 'Дата создания',
                    'value' => '<b>Дата регистрации: '. $entity->created_at . '</b>'
                ]);
            }
            if($entity->updated_at)
            {
                CRUD::addField([
                    'name' => "html_updated_at",
                    'type'  => 'custom_html',
                    'value' => '<b>Дата обновления: '. $entity->updated_at . '</b>'
                ]);
            }
            if($entity->deleted_at)
            {
                CRUD::addField([
                    'name' => "html_deleted_at",
                    'type'  => 'custom_html',
                    'value' => '<b>Дата удаления: '. $entity->deleted_at . '</b>'
                ]);
            }
            CRUD::addField([
                'name' => "status",
                'label' => 'Статус',
                'type'        => 'select_from_array',
                'options'     => \App\Models\User::$statuses,
                'allows_null' => false,
                'allows_multiple' => false,
                'default' => 0
            ]);
            CRUD::addField([
                'name' => 'gender',
                'label' => 'Пол',
                'type' => 'select_from_array',
                'options' => \App\Models\User::$gender,
                'allow_null' => false,
                'allow_multiple' => false,
                'default' => 0
            ]);
            CRUD::addField([
                'name' => "first_name",
                'label' => 'Имя',
                'type' => 'text'
            ]);

            CRUD::addField([
                'name' => "last_name",
                'label' => 'Фамлия',
                'type' => 'text'
            ]);

            CRUD::addField([
                'name' => "email",
                'label' => 'Email',
                'type' => 'text'
            ]);

            CRUD::addField([
                'name' => "phone",
                'label' => 'Телефон',
                'type' => 'text'
            ]);



        }
        CRUD::addField([
            'name' => "first_name",
            'label' => 'Имя',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => "last_name",
            'label' => 'Фамлия',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => "email",
            'label' => 'Email',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => "phone",
            'label' => 'Телефон',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => "status",
            'label' => 'Статус',
            'type'        => 'select_from_array',
            'options'     => \App\Models\User::$statuses,
            'allows_null' => false,
            'allows_multiple' => false,
            'default' => 0
        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }


}
