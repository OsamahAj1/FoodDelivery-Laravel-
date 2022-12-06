<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Validation\Rule;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
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
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name');
        CRUD::column('email');
        CRUD::column('rule');
        CRUD::addColumn([
            'name' => 'image',
            'label' => 'image',
            'type' => 'image',
            'disk' => 'public'
        ]);
        CRUD::column('address');
        CRUD::column('car');
        CRUD::column('des');
        CRUD::column('number');


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
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'rule' => ['required', Rule::in(['client', 'delivery', 'restaurant'])],
            'password' => ['required', 'min:8', 'max:255'],
            'number' => ['nullable', 'regex:/^((?:[+?0?0?966]+)(?:\s?\d{2})(?:\s?\d{7}))$/'],
            'address' => ['nullable', 'min:20', 'max:255'],
            'car' => ['nullable', 'min:3', 'max:255'],
            'des' => ['nullable', 'min:10', 'max:255'],
            'image' => ['nullable', 'image'],
        ]);

        CRUD::field('name');
        CRUD::field('email');
        CRUD::field('password');
        CRUD::addField([
            'name'        => 'rule',
            'label'       => "rule",
            'type'        => 'select_from_array',
            'options'     => ['client' => 'Client', 'delivery' => 'Delivery', 'restaurant' => 'Restaurant'],
            'allows_null' => false,
        ]);
        CRUD::addField([
            'name' => 'image',
            'label' => 'image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public'
        ]);
        CRUD::field('address');
        CRUD::field('car');
        CRUD::field('des');
        CRUD::field('number');

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
