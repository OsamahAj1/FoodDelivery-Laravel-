<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Order::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order');
        CRUD::setEntityNameStrings('order', 'orders');
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
        CRUD::column('is_active');
        CRUD::column('is_sent');
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
            'restaurant_id' => [
                'required', 'exists:users,id',
                function ($attribute, $value, $fail) {
                    if (User::find((int) $value)->rule !== 'restaurant') {
                        $fail('user ' . $attribute . ' is not restaurant');
                    }
                }
            ],
            'delivery_id' => [
                function ($attribute, $value, $fail) {
                    $user = User::find((int) $value);
                    if ($user !== null) {
                        if ($user->rule !== 'delivery') {
                            $fail('user ' . $attribute . ' is not delivery');
                        }
                    }
                }
            ],
            'client_id' => [
                'required', 'exists:users,id',
                function ($attribute, $value, $fail) {
                    if (User::find((int) $value)->rule !== 'client') {
                        $fail('user ' . $attribute . ' is not client');
                    }
                }
            ],
            'order' => ['required', 'max:255', 'min:3'],
            'sum_order' => ['required', 'numeric', 'gt:0'],
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
        CRUD::addField([
            'label' => 'Delivery',
            'type' => 'select',
            'name' => 'delivery_id',
            'entity' => 'delivery',
            'model' => "App\Models\User",
            'attribute' => 'name',
            'options' => (function ($query) {
                return $query->where('rule', 'delivery')->get();
            })
        ]);
        CRUD::addField([
            'label' => 'Client',
            'type' => 'select',
            'name' => 'client_id',
            'entity' => 'client',
            'model' => "App\Models\User",
            'attribute' => 'name',
            'options' => (function ($query) {
                return $query->where('rule', 'client')->get();
            })
        ]);
        CRUD::addField([
            'label' => 'Order',
            'type' => 'textarea',
            'name' => 'order'
        ]);
        CRUD::addField([
            'name' => 'sum_order',
            'label' => 'Sum Order',
            'type' => 'number',
            'attributes' => ["step" => "any"],
            'prefix'     => "$",
            'suffix'     => ".00",
        ]);
        CRUD::field('is_active');
        CRUD::field('is_sent');

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
