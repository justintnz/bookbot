import AppForm from '../app-components/Form/AppForm';

Vue.component('job-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                booking_id:  '' ,
                charge:  '' ,
                customer_id:  '' ,
                data:  this.getLocalizedFormDefaults() ,
                end_at:  '' ,
                location_id:  '' ,
                service_id:  '' ,
                staff_id:  '' ,
                start_at:  '' ,
                status:  '' ,
                
            }
        }
    }

});