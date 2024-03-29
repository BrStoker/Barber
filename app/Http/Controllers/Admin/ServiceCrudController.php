<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ServiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ServiceCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Service::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/service');
        CRUD::setEntityNameStrings('', 'Наши услуги');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        CRUD::setColumns([
            [
                'name' => 'id',
                'label' => '#'
            ],
            [
                'name' => 'name',
                'label' => 'Наименование'
            ],
            [
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'image',
                'prefix' => 'storage/',
                'width' => '75px',
                'height' => '75px'
            ],
            [
                'name' => 'preview',
                'label' => 'Превью',
                'type' => 'html'
            ],
            [
                'name' => 'description',
                'type' => 'html',
                'label' => 'Описание'
            ],
            [
                'name' => 'cost',
                'type' => 'html',
                'label' => 'Цена'
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
        $values = [];
        if(isset($entity->id))
        {
            CRUD::addField([
                'name' => "html_id",
                'type'  => 'custom_html',
                'value' => '<b>#' . $entity->id . '</b>'
            ]);
        }


        CRUD::setValidation([
            // 'name' => 'required|min:2',
        ]);

        if($entity){
            if($entity->created_at)
            {
                CRUD::addField([
                    'name' => "html_created_at",
                    'type'  => 'custom_html',
                    'label' => 'Дата создания',
                    'value' => '<b>Дата добавления: '. $entity->created_at . '</b>'
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


        }
        CRUD::addField([
            'name' => 'name',
            'label' => 'Наименование',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => "image",
            'label' => 'Изображение',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public'
        ]);
        CRUD::addField([
            'name' => 'preview',
            'type' => 'summernote',
            'label' => 'Превью'
        ]);
        CRUD::addField([
            'name' => 'description',
            'type' => 'summernote',
            'label' => 'Описание'
        ]);
        CRUD::addField([
            'name' => 'cost',
            'type' => 'number',
            'label' => 'Цена за услугу'
        ]);

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
