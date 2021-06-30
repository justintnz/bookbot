<div class="row form-inline" style="padding-bottom: 10px;" v-cloak>
    <div :class="{'col-xl-10 col-md-11 text-right': !isFormLocalized, 'col text-center': isFormLocalized, 'hidden': onSmallScreen }">
        <small>{{ trans('brackets/admin-ui::admin.forms.currently_editing_translation') }}<span v-if="!isFormLocalized && otherLocales.length > 1"> {{ trans('brackets/admin-ui::admin.forms.more_can_be_managed') }}</span><span v-if="!isFormLocalized"> | <a href="#" @click.prevent="showLocalization">{{ trans('brackets/admin-ui::admin.forms.manage_translations') }}</a></span></small>
        <i class="localization-error" v-if="!isFormLocalized && showLocalizedValidationError"></i>
    </div>

    <div class="col text-center" :class="{'language-mobile': onSmallScreen, 'has-error': !isFormLocalized && showLocalizedValidationError}" v-if="isFormLocalized || onSmallScreen" v-cloak>
        <small>{{ trans('brackets/admin-ui::admin.forms.choose_translation_to_edit') }}
            <select class="form-control" v-model="currentLocale">
                <option :value="defaultLocale" v-if="onSmallScreen">@{{defaultLocale.toUpperCase()}}</option>
                <option v-for="locale in otherLocales" :value="locale">@{{locale.toUpperCase()}}</option>
            </select>
            <i class="localization-error" v-if="isFormLocalized && showLocalizedValidationError"></i>
            <span>|</span>
            <a href="#" @click.prevent="hideLocalization">{{ trans('brackets/admin-ui::admin.forms.hide') }}</a>
        </small>
    </div>
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_{{ $locale }}'), 'has-success': fields.data_{{ $locale }} && fields.data_{{ $locale }}.valid }">
                <label for="data_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.job.columns.data') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.data.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('data_{{ $locale }}'), 'form-control-success': fields.data_{{ $locale }} && fields.data_{{ $locale }}.valid }" id="data_{{ $locale }}" name="data_{{ $locale }}" placeholder="{{ trans('admin.job.columns.data') }}">
                    <div v-if="errors.has('data_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('data_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('booking_id'), 'has-success': fields.booking_id && fields.booking_id.valid }">
    <label for="booking_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.job.columns.booking_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.booking_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('booking_id'), 'form-control-success': fields.booking_id && fields.booking_id.valid}" id="booking_id" name="booking_id" placeholder="{{ trans('admin.job.columns.booking_id') }}">
        <div v-if="errors.has('booking_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('booking_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('charge'), 'has-success': fields.charge && fields.charge.valid }">
    <label for="charge" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.job.columns.charge') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.charge" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('charge'), 'form-control-success': fields.charge && fields.charge.valid}" id="charge" name="charge" placeholder="{{ trans('admin.job.columns.charge') }}">
        <div v-if="errors.has('charge')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('charge') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('customer_id'), 'has-success': fields.customer_id && fields.customer_id.valid }">
    <label for="customer_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.job.columns.customer_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.customer_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('customer_id'), 'form-control-success': fields.customer_id && fields.customer_id.valid}" id="customer_id" name="customer_id" placeholder="{{ trans('admin.job.columns.customer_id') }}">
        <div v-if="errors.has('customer_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('customer_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end_at'), 'has-success': fields.end_at && fields.end_at.valid }">
    <label for="end_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.job.columns.end_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.end_at" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('end_at'), 'form-control-success': fields.end_at && fields.end_at.valid}" id="end_at" name="end_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('end_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('location_id'), 'has-success': fields.location_id && fields.location_id.valid }">
    <label for="location_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.job.columns.location_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.location_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('location_id'), 'form-control-success': fields.location_id && fields.location_id.valid}" id="location_id" name="location_id" placeholder="{{ trans('admin.job.columns.location_id') }}">
        <div v-if="errors.has('location_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('location_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('service_id'), 'has-success': fields.service_id && fields.service_id.valid }">
    <label for="service_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.job.columns.service_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.service_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('service_id'), 'form-control-success': fields.service_id && fields.service_id.valid}" id="service_id" name="service_id" placeholder="{{ trans('admin.job.columns.service_id') }}">
        <div v-if="errors.has('service_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('service_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('staff_id'), 'has-success': fields.staff_id && fields.staff_id.valid }">
    <label for="staff_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.job.columns.staff_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.staff_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('staff_id'), 'form-control-success': fields.staff_id && fields.staff_id.valid}" id="staff_id" name="staff_id" placeholder="{{ trans('admin.job.columns.staff_id') }}">
        <div v-if="errors.has('staff_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('staff_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_at'), 'has-success': fields.start_at && fields.start_at.valid }">
    <label for="start_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.job.columns.start_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.start_at" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('start_at'), 'form-control-success': fields.start_at && fields.start_at.valid}" id="start_at" name="start_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('start_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <label for="status" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.job.columns.status') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.status" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('status'), 'form-control-success': fields.status && fields.status.valid}" id="status" name="status" placeholder="{{ trans('admin.job.columns.status') }}">
        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status') }}</div>
    </div>
</div>


