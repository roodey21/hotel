/*
 Template Name: Urora - Bootstrap 4 Admin Dashboard
 Author: Mannatthemes
 Website: www.mannatthemes.com
 File: upload. Js
 */


!function($) {
    "use strict";


    // Basic
    $('.dropify').dropify({
        tpl: {
            wrap:            '<div class="dropify-wrapper"></div>',
            loader:          '<div class="dropify-loader"></div>',
            message:         '<div class="dropify-message"><span class="file-icon" /> <h4>{{ default }}</h4></div>',
            preview:         '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
            filename:        '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
            clearButton:     '<button type="button" class="dropify-clear">{{ remove }}</button>',
            errorLine:       '<p class="dropify-error">{{ error }}</p>',
            errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
        }
    });

    // Translated
    $('.dropify-fr').dropify({
        messages: {
            default: '',
            replace: 'Ganti',
            remove:  'Hapus',
            error:   'error'
        }
    });

    // Used events
    var drEvent = $('#input-file-events').dropify();

    drEvent.on('dropify.beforeClear', function(event, element){
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element){
        alert('File deleted');
    });

    drEvent.on('dropify.errors', function(event, element){
        console.log('Has Errors');
    });

    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e){
        e.preventDefault();
        if (drDestroy.isDropified()) {
            drDestroy.destroy();
        } else {
            drDestroy.init();
        }
    })
}
(window.jQuery);



