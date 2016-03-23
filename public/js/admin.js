(function () {

    $('.ui-component-tooltip').tooltip();

    $('.ui-action-delete').on('click', function () {
        return confirm('Delete this record?');
    });

})(jQuery);

function hidePopup() {
    $('#create').modal('hide');
    $('#create').attr("aria-hidden", "true");
}
function hidePopupEdit() {
    $('#edit').modal('hide');
    $('#edit').attr("aria-hidden", "true");
}
function successMsg() {
    $('#messageSuccess').show();
}

$(function () {
    $('li a[href="' + window.location.href + '"]').parent().addClass('active');
});


var app = angular.module('contactApp', ['ngRoute', 'LoginCtrl', 'MainCtrl', 'AuthSrvc', 'CRUDSrvc']);

app.run(function ($rootScope, $location, Login) {
    $rootScope.$on('$routeChangeStart', function () {
        var whiteList = ['/']; //the login is the only unguarded route - everything else needs to check session auth
        var loggedIn = Login.checkLoginStatus();//boolean - if user is logged in
        var routeSafe = !$.inArray($location.path(), whiteList);//boolean - is route safe or protected
        if (!loggedIn && !routeSafe) {
            $location.path('/');
            alert('You must be logged in to view this page!');
        }
    });
});


//This will handle all of routing
app.config(function ($routeProvider, $locationProvider) {
    $routeProvider.when('/', {
        templateUrl: 'template/login.html',
        controller: 'LoginController'
    });

    $routeProvider.when('/contacts', {
        templateUrl: 'template/contact.html',
        controller: 'ContactController'
    });

    $routeProvider.when('/add', {
        templateUrl: 'template/contact.html',
        controller: 'ContactController'
    });

    $routeProvider.when('/edit/:id', {
        templateUrl: 'template/contact.html',
        controller: 'EditContactController'
    });

});
