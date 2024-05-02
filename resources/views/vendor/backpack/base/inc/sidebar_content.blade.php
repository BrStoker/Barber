{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('users') }}"><i class="nav-icon bi bi-people"></i> Пользователи</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('service') }}"><i class="nav-icon bi bi-chat-dots"></i> Наши услуги</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('settings') }}"><i class="nav-icon bi bi-sliders"></i> Настройки</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('roles') }}"><i class="nav-icon la la-question"></i> Roles</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon bi bi-building"></i> Работники</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('master') }}"><i class="nav-icon bi bi-people"></i> Наши мастера</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('occupation') }}"><i class="nav-icon bi bi-briefcase"></i> Профессии</a></li>
    </ul>
</li>
