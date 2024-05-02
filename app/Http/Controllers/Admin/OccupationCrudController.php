<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OccupationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OccupationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OccupationCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Occupation::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/occupation');
        CRUD::setEntityNameStrings('', 'профессии');
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
                'name' => 'active',
                'label' => 'Статус',
                'type' => 'select_from_array',
                'options' => \App\Models\Occupation::$settingStatuses
            ],
            [
                'name' => 'title',
                'label' => 'Наименование',
                'type' => 'closure',
                'function' => function($entry){
                    return $entry->title;
                }
            ],
            [
                'name' => 'description',
                'label' => 'Описание',
                'type' => 'closure',
                'function' => function($entry){
                    return $entry->description;
                }
            ]
        ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
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
                    'value' => '<b>Дата создания: '. $entity->created_at . '</b>'
                ]);
            }

            CRUD::addField([
                'name' => "active",
                'label' => 'Статус',
                'type'        => 'switch'
            ]);

            CRUD::addField([
                'name' => 'title',
                'label' => 'Наименование',
                'type' => 'text'
            ]);

            CRUD::addField([
                'name' => 'description',
                'label' => 'Описание',
                'type' => 'summernote'
            ]);

        }
        CRUD::addField([
            'name'  => "active",
            'label' => 'Статус',
            'type'  => 'switch'
        ]);

        CRUD::addField([
            'name' => 'title',
            'label' => 'Наименование',
            'type' => 'text'
        ]);

        CRUD::addField([
            'name' => 'description',
            'label' => 'Описание',
            'type' => 'summernote'
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
