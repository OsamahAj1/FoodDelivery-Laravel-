<x-client.layout>
    <x-slot name='title'>
        Live Order
    </x-slot>

    <x-flash type='message' />

    <div id="app">

        <order
        :order="{{ json_encode($order) }}"
        :index-route="'{{ route('client.index') }}'"
        :destroy-order-route="'{{ route('client.destroyOrder') }}'"
        :url="'{{ asset('storage') }}'"
        :csrf="'{{ csrf_token() }}'"
        />

    </div>
</x-client.layout>
