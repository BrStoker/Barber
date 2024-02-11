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

        CRUD::setColumns([

            [
                'name' => 'id',
                'label' => '#'
            ],
            [
                'name' => 'status',
                'label' => 'Статус',
                'type'  => 'select_from_array',
                'options' => \App\Models\User::$statuses
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
                'name' => 'email',
                'label' => 'Email'
            ],
            [
                'name' => 'phone',
                'label' => 'Телефон'
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
