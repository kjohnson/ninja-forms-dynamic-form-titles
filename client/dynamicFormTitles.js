jQuery( document ).ready( function() {
    var kbjDynamicFormTitles = Marionette.Object.extend( {

        initialize: function() {
            this.listenTo( nfRadio.channel( 'fields' ), 'change:modelValue', this.maybeOnFieldChange );
        },

        maybeOnFieldChange: function( fieldModel )
        {
            var formID = fieldModel.get( 'formID' );
            var formModel = Backbone.Radio.channel( 'app' ).request( 'get:form', formID );

            if( 'undefined' == typeof formModel ) return;

            if( fieldModel.get( 'key' ) != formModel.get( 'kbj_dynamic_form_title' ) ) return;

            var title = formModel.get( 'title' );
            var value = fieldModel.get( 'value' );

            if( 'undefined' != typeof fieldModel.get( 'options' ) ){
                var selected = fieldModel.get( 'options' ).find( function( option ){
                    return value == option.value;
                });

                if( 'undefined' != typeof selected.label ){
                    var value = selected.label;
                }
            }

            if( ! value ) return;

            jQuery( '#nf-form-' + formID + '-cont .nf-form-title h3' ).html( title + ' ' + value );
        }

    });

    new kbjDynamicFormTitles();
} );
