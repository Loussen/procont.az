{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<x-backpack::menu-item title='Menyular' icon='la la-list' :link="backpack_url('menu-item')" />
<x-backpack::menu-item title='Səhifələr' icon='la la-file-o' :link="backpack_url('page')" />
<x-backpack::menu-item title="Kateqoriyalar" icon="la la-bars" :link="backpack_url('category')" />
<x-backpack::menu-item title="Məhsullar" icon="la la-hospital" :link="backpack_url('products')" />
{{--<x-backpack::menu-item :title="trans('backpack::crud.file_manager')" icon="la la-files-o" :link="backpack_url('elfinder')" />--}}
<x-backpack::menu-item title="Slayderlər" icon="la la-images" :link="backpack_url('sliders')" />
<x-backpack::menu-item title="Xəbərlər" icon="la la-newspaper" :link="backpack_url('blog')" />
<x-backpack::menu-item title="Müştərilərimiz" icon="la la-handshake" :link="backpack_url('client')" />
<x-backpack::menu-item title="Sual-Cavablar" icon="la la-question-circle" :link="backpack_url('faqs')" />
<x-backpack::menu-item title="Əlaqə mesajları" icon="la la-list-ul" :link="backpack_url('contact-requests')" />
<x-backpack::menu-item title="Ayarlar" icon="la la-cogs" :link="backpack_url('settings/1/edit')" />

{{--<x-backpack::menu-dropdown title="Site settings" icon="la la-list">--}}
{{--    --}}
{{--</x-backpack::menu-dropdown>--}}