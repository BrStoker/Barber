<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SettingsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SettingsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Settings::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/settings');
        CRUD::setEntityNameStrings('', 'Настройки сайта');
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
                'label' => '#',
                'type' => 'html'
            ],
            [
                'name' => 'name',
                'label' => 'Наименование',
                'type' => 'text'
            ],
            [
                'name' => 'value',
                'label' => 'Значение',
                'type' => 'html'
            ],
            [
                'name' => 'active',
                'label' => 'Статус',
                'type' => 'select_from_array',
                'options' => \App\Models\Settings::$settingStatuses
            ]

    ]);
//        CRUD::column('key');



//        CRUD::column('active');

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
        CRUD::setValidation([
            // 'name' => 'required|min:2',
        ]);

        $entity = CRUD::getCurrentEntry();

        if(isset($entity->id))
        {
            CRUD::addField([
                'name' => "html_id",
                'type'  => 'custom_html',
                'value' => '<b>#' . $entity->id . '</b>'
            ]);
        }
        if($entity){


            CRUD::addField([
                'name' => "html_created_at",
                'type'  => 'custom_html',
                'label' => 'Дата создания',
                'value' => '<b>Дата добавления: '. $entity->created_at . '</b>'
            ]);
            CRUD::addField([
                'name' => 'active',
                'type' => 'switch',
                'label' => 'Активно'
            ]);
            CRUD::addField([
                'name' => 'name',
                'label' => 'Название',
                'type' => 'text'
            ]);
            CRUD::addField([
                'name' => 'key',
                'label' => 'Символьный код (уникальный)',
                'type' => 'text'
            ]);
            CRUD::addField([
                'name' => 'value',
                'label' => 'Значение',
                'type' => 'text'
            ]);

        }
        CRUD::addField([
            'name' => 'active',
            'type' => 'switch',
            'label' => 'Активно'
        ]);
        CRUD::addField([
            'name' => 'name',
            'label' => 'Название',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => 'key',
            'label' => 'Символьный код (уникальный)',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => 'value',
            'label' => 'Значение',
            'type' => 'text'
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
