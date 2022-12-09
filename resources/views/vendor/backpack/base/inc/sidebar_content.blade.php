{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('client.index') }}"><i class="la la-home nav-icon"></i> Go back to website</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-question"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('food') }}"><i class="nav-icon la la-question"></i> Food</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('order') }}"><i class="nav-icon la la-question"></i> Orders</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('oldorder') }}"><i class="nav-icon la la-question"></i> Oldorders</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('cart') }}"><i class="nav-icon la la-question"></i> Carts</a></li>
