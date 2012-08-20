<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script>
function EventDispatcher() {

}

EventDispatcher.prototype.addListener = function (eventName, listener) {
    this.dispatcher.bind(eventName, listener)
}
EventDispatcher.prototype.removeListener = function (eventName, listener) {
    this.dispatcher.unbind(eventName, listener)
}
EventDispatcher.prototype.dispatch = function (eventName, data) {
    this.dispatcher.trigger(eventName, data);
}

EventDispatcher.prototype.dispatcher = jQuery(document);


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


LoginController.prototype.login = function() {
    var self = this;
    var username = jQuery('#loginForm .email').val()
    var password = jQuery('#loginForm .password').val()
    var data = {
        username:username,
        password:password,
    };
    jQuery.ajax({
        url:'login.php',
        async:true,
        service:'login',
        type:'post',
        dataType:'json',
        data:data
    });
}


function LoginController() {
    var self = this;
    jQuery(document).ready(function() {
        self.onLoad();
    })
}

LoginController.prototype = new BaseController();

LoginController.prototype.onLoad = function() {
    var self = this;
    this.addListener('userLoginFailed', function(event, result) {
        self.onLoginFailed(result);
    })
}

LoginController.prototype.onLoginFailed = function(result) {
    jQuery('#errorDisplay').html(result.errors[0]);
}


function AppController() {
    var self = this;
    jQuery(document).ready(function() {
        self.onLoad();
    })
}

AppController.prototype = new BaseController();

AppController.prototype.onLoad = function () {
    this.addListener('refreshPage', function(event, user) {
        window.location.reload()
    })
}


</script>
</head>

<body>
Hello
<form id="loginform">
<input type="text" id="email" /><br />
<input type="text" id="password" /><br />
<input type="submit" />
</form>
</body>
</html>
