<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MasterRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Master;

/**
 * Class MasterCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MasterCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Master::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/master');
        CRUD::setEntityNameStrings('', 'Наши мастера');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        CRUD::addColumns([
            [
                'name' => 'id',
                'label' => '#',
                'type' => 'row_number'
            ],
            [
                'name' => 'photo',
                'label' => 'Фото',
                'type' => 'image',
                'prefix' => 'storage/',
                'width' => '75px',
                'height' => '75px'

            ],
            [
                'name' => 'active',
                'label' => 'Работает',
                'type' => 'boolean'
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
                'name' => 'occupation_id',
                'label' => 'Профессия',
                'type' => 'model_function',
                'function_name' => 'getOcupations'
            ]

        ]);

    }


    protected function setupCreateOperation()
    {
        $entity = CRUD::getCurrentEntry();
        CRUD::setValidation([
            // 'name' => 'required|min:2',
        ]);

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
                    'value' => '<b>Работает с: '. $entity->created_at . '</b>'
                ]);

                CRUD::addField([
                    'name' => "active",
                    'label' => 'Работает',
                    'type'  => 'switch'
                ]);
                if(!empty($entity->photo))
                {
                    CRUD::addField([
                        'name' => "html_image",
                        'type'  => 'custom_html',
                        'value' => "<img src='/storage/{$entity->photo}' style='height:100px;' />"
                    ]);
                }
                CRUD::addField([
                    'name' => "photo",
                    'label' => 'Фото',
                    'type' => 'upload',
                    'upload' => true,
                    'disk' => 'public'
                ]);

                CRUD::addField([
                    'name' => 'first_name',
                    'label' => 'Имя',
                    'type' => 'text'
                ]);

                CRUD::addField([
                    'name' => 'last_name',
                    'label' => 'Фамилия',
                    'type' => 'text'
                ]);

//                CRUD::addField([
//                    'name' => 'occupations_id',
//                    'label' => 'Профессия',
//                    'entity' => 'getAllOccupations',
//                    'type' => 'select',
//                    'attribute' => 'title',
//                    'model' => '\App\Models\Occupation',
//                    'options'   => (function ($query) {
//                        return $query->orderBy('title', 'ASC')->where('active', 1)->get();
//                    })
//                ]);


            }


        }
        CRUD::addField([
            'name' => "active",
            'label' => 'Работает',
            'type'        => 'switch'
        ]);

        if(!empty($entity->photo))
        {
            CRUD::addField([
                'name' => "html_image",
                'type'  => 'custom_html',
                'value' => "<img src='/storage/{$entity->photo}' style='height:100px;' />"
            ]);
        }

        CRUD::addField([
            'name' => "photo",
            'label' => 'Фото',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public'
        ]);


        CRUD::addField([
            'name' => 'first_name',
            'label' => 'Имя',
            'type' => 'text'
        ]);

        CRUD::addField([
            'name' => 'last_name',
            'label' => 'Фамилия',
            'type' => 'text'
        ]);

        CRUD::addField([
            'name' => 'occupations_id',
            'label' => 'Профессия',
            'type' => 'select_from_array',
            'options'     => \App\Models\Occupation::arrayForSelect(),
//            'allows_multiple' => false,
//            'value' => (isset($entity->occupations_id) == true && empty($entity->occupations_id) == false ? $entity->occupations_id : [])
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
