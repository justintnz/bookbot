import AppForm from '../app-components/Form/AppForm';

Vue.component('staff-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                data:  this.getLocalizedFormDefaults() ,
                name:  '' ,
                phone:  '' ,
                status:  '' ,
                
            }
        }
    }

});