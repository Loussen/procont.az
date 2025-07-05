{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> İdarə paneli</a></li>
@if(backpack_user()->hasPermissionTo('menyular siyahi'))
    <x-backpack::menu-item title='Menyular' icon='la la-list' :link="backpack_url('menu-item')" />
@endif
@if(backpack_user()->hasPermissionTo('sehifeler siyahi'))
    <x-backpack::menu-item title='Səhifələr' icon='la la-file-o' :link="backpack_url('page')" />
@endif
@if(backpack_user()->hasPermissionTo('kateqoriyalar siyahi'))
    <x-backpack::menu-item title="Kateqoriyalar" icon="la la-bars" :link="backpack_url('category')" />
@endif
@if(backpack_user()->hasPermissionTo('mehsullar siyahi'))
    <x-backpack::menu-item title="Məhsullar" icon="la la-hospital" :link="backpack_url('products')" />
@endif
@if(backpack_user()->hasPermissionTo('layiheler siyahi'))
    <x-backpack::menu-item title="Layihələr" icon="la la-list" :link="backpack_url('project')" />
@endif
{{--<x-backpack::menu-item :title="trans('backpack::crud.file_manager')" icon="la la-files-o" :link="backpack_url('elfinder')" />--}}
@if(backpack_user()->hasPermissionTo('slayderler siyahi'))
    <x-backpack::menu-item title="Slayderlər" icon="la la-images" :link="backpack_url('sliders')" />
@endif
@if(backpack_user()->hasPermissionTo('xeberler siyahi'))
    <x-backpack::menu-item title="Xəbərlər" icon="la la-newspaper" :link="backpack_url('blog')" />
@endif
@if(backpack_user()->hasPermissionTo('mushteriler siyahi'))
    <x-backpack::menu-item title="Müştərilərimiz" icon="la la-handshake" :link="backpack_url('client')" />
@endif
@if(backpack_user()->hasPermissionTo('foto qalereya siyahi'))
    <x-backpack::menu-item title="Foto qalereya" icon="la la-images" :link="backpack_url('photo-gallery/1/edit')" />
@endif
@if(backpack_user()->hasPermissionTo('sual-cavablar siyahi'))
    <x-backpack::menu-item title="Sual-Cavablar" icon="la la-question-circle" :link="backpack_url('faqs')" />
@endif
@if(backpack_user()->hasPermissionTo('elaqe mesajlar siyahi'))
    <x-backpack::menu-item title="Əlaqə mesajları" icon="la la-list-ul" :link="backpack_url('contact-requests')" />
@endif
@if(backpack_user()->hasPermissionTo('ayarlar siyahi'))
    <x-backpack::menu-item title="Ayarlar" icon="la la-cogs" :link="backpack_url('settings/1/edit')" />
@endif
@if(backpack_user()->hasRole('Super Admin'))
    <x-backpack::menu-dropdown title="Adminlər & İcazələr" icon="la la-puzzle-piece">
        <x-backpack::menu-dropdown-item title="Adminlər" icon="la la-user" :link="backpack_url('user')" />
        <x-backpack::menu-dropdown-item title="Rollar" icon="la la-group" :link="backpack_url('role')" />
        <x-backpack::menu-dropdown-item title="İcazələr" icon="la la-key" :link="backpack_url('permission')" />
    </x-backpack::menu-dropdown>
@endif

{{--<x-backpack::menu-dropdown title="Site settings" icon="la la-list">--}}
{{--    --}}
{{--</x-backpack::menu-dropdown>--}}