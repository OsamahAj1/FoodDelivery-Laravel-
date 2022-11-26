<x-delivery.layout>
    <x-slot name="title">
        Register
    </x-slot>
    <h2 class="ms-4">Register</h2>

    <x-flash type='message' />

    <x-form.form method="post" action="{{ route('delivery.register') }}" enctype="multipart/form-data">
        @csrf
        <x-form.input name='name' type='text' label='name' />

        <x-form.input name='email' type='email' label='email' />

        <x-form.input name='number' type='text' value='+966' label='phone number' />

        <x-form.input name='car' type='text' label='car' />

        <x-form.input name='image' type='file' label='image' accept='image/*' />

        <x-form.input name='password' type='password' label='password' />

        <x-form.button value='register' />

    </x-form.form>
    <div class="p-4">Already have an account? <a href="{{ route('delivery.login') }}">Log In here.</a></div>
</x-delivery.layout>
