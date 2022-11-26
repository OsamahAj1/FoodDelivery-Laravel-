<x-restaurant.layout>
    <x-slot name='title'>
        Add food
    </x-slot>
</x-restaurant.layout>

<x-flash type='message' />

<x-form.form action="{{ route('restaurant.food') }}" method="post" enctype="multipart/form-data">
    @csrf

    <h2 class="mb-3">Add Food</h2>

    <x-form.input name='name' type='text' label='food name' />

    <x-form.input name='price' type='number' label='price' step='.01'/>

    <x-form.text name='des' label='description' />

    <x-form.input name='image' type='file' label='image' accept='image/*' />

    <x-form.button value='add' />


</x-form.form>
