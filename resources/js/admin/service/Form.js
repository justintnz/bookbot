import AppForm from '../app-components/Form/AppForm';

Vue.component('service-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                code:  '' ,
                data:  this.getLocalizedFormDefaults() ,
                description:  '' ,
                image:  '' ,
                name:  '' ,
                status:  '' ,
                
            }
        }
    }

});