<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/services') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.service.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/customers') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.customer.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/locations') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.location.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/staff') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.staff.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/bookings') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.booking.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/jobs') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.job.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
