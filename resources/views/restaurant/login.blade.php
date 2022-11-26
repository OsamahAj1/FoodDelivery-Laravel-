<x-restaurant.layout>
    <x-slot name="title">
        Login
    </x-slot>
    <h2 class="ms-4">Login</h2>

    <x-flash type='message' />

    <x-form.form method="post" action="{{ route('restaurant.login') }}">
        @csrf
        <x-form.input name='email' type='email' label='email'/>
        <x-form.input name='password' type='password' label='password'/>
        <x-form.button value='Login' />
    </x-form.form>
    <div class="p-4">Don't have an account? <a href="{{ route('restaurant.register') }}">Register here.</a></div>
</x-restaurant.layout>
