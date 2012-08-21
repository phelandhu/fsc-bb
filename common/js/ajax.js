// JavaScript Document
jQuery(document).ajaxComplete(function(event, request, settings) {
    if (settings.dataType == 'json') {
        var dispatcher = new EventDispatcher();
        var result = jQuery.parseJSON(request.responseText);
        if (result) {
            if (result.success == true && result.onSuccessEvent) {
                dispatcher.dispatch(result.onSuccessEvent, result)
            } else if (result.onErrorEvent) {
                dispatcher.dispatch(result.onErrorEvent, result)
            }
        }
    }
})