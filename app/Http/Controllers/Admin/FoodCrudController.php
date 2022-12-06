<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FoodRequest;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FoodCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FoodCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Food::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/food');
        CRUD::setEntityNameStrings('food', 'food');
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
        CRUD::column('name');
        CRUD::addColumn([
            'name' => 'image',
            'label' => 'image',
            'type' => 'image',
            'disk' => 'public'
        ]);
        CRUD::column('des');
        CRUD::addColumn([
            'name'  => 'price', // The db column name
            'label' => 'price', // Table column heading
            'type'  => 'number',
            'prefix' => '$',
            'decimals' => 2,
            'dec_point' => ',',
        ]);
        CRUD::column('is_active');
        CRUD::column('created_at');
        CRUD::column('updated_at');

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
            'price' => ['required', 'numeric', 'gt:0'],
            'des' => ['required', 'min:10', 'max:255'],
            'image' => ['required', 'image'],
            'restaurant_id' => [
                'required', 'exists:users,id',
                function ($attribute, $value, $fail) {
                    if (User::find((int) $value)->rule !== 'restaurant') {
                        $fail('user ' . $attribute . ' is not restaurant');
                    }
                }
            ],
            'is_active' => ['required', 'Boolean']
        ]);

        CRUD::addField([
            'label' => 'Restaurant',
            'type' => 'select',
            'name' => 'restaurant_id',
            'entity' => 'restaurant',
            'model' => "App\Models\User",
            'attribute' => 'name',
            'options' => (function ($query) {
                return $query->where('rule', 'restaurant')->get();
            })
        ]);

        CRUD::field('name');
        CRUD::addField([
            'name' => 'image',
            'label' => 'image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public'
        ]);

        CRUD::field('des');
        CRUD::addField([
            'name' => 'price',
            'label' => 'price',
            'type' => 'number',
            'attributes' => ["step" => "any"],
            'prefix'     => "$",
            'suffix'     => ".00",
        ]);
        CRUD::addField([
            'name'  => 'is_active',
            'type'  => 'switch',
            'label'    => 'Active',
            'default' => true
        ],);

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

        CRUD::setValidation([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric', 'gt:0'],
            'des' => ['required', 'min:10', 'max:255'],
            'image' => ['image'],
            'restaurant_id' => [
                'required', 'exists:users,id',
                function ($attribute, $value, $fail) {
                    if (User::find((int) $value)->rule !== 'restaurant') {
                        $fail('user ' . $attribute . ' is not restaurant');
                    }
                }
            ]
        ]);
    }
}
