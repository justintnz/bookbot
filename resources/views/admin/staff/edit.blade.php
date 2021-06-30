@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.staff.actions.edit', ['name' => $staff->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <staff-form
                :action="'{{ $staff->resource_url }}'"
                :data="{{ $staff->toJsonAllLocales() }}"
                :locales="{{ json_encode($locales) }}"
                :send-empty-locales="false"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.staff.actions.edit', ['name' => $staff->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.staff.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </staff-form>

        </div>
    
</div>

@endsection