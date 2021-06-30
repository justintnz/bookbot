import AppForm from '../app-components/Form/AppForm';

Vue.component('booking-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                customer_id:  '' ,
                end_at:  '' ,
                location_id:  '' ,
                note:  '' ,
                service_id:  '' ,
                staff_id:  '' ,
                start_at:  '' ,
                status:  '' ,
                
            }
        }
    }

});