{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('users') }}"><i class="nav-icon bi bi-people"></i> Пользователи</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('service') }}"><i class="nav-icon bi bi-chat-dots"></i> Наши услуги</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('settings') }}"><i class="nav-icon bi bi-sliders"></i> Настройки</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('roles') }}"><i class="nav-icon la la-question"></i> Roles</a></li>