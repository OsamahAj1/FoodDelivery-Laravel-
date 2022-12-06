<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OldorderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OldorderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OldorderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Oldorder::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/oldorder');
        CRUD::setEntityNameStrings('oldorder', 'oldorders');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('restaurant_id');
        CRUD::column('delivery_id');
        CRUD::column('client_id');
        CRUD::column('order');
        CRUD::addColumn([
            'name'  => 'sum_order', // The db column name
            'label' => 'Sum Order', // Table column heading
            'type'  => 'number',
            'prefix' => '$',
            'decimals' => 2,
            'dec_point' => ',',
        ]);
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }
}
