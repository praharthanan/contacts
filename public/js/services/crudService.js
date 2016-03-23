var crud = angular.module('CRUDSrvc', []);

crud.factory("CRUD", function ($http) {

    return{
        all: function () {
            var request = $http({method: 'GET', url: 'api/contacts'});
            return request;
        },
        create: function (data) {
            var request = $http({method: 'GET', url: 'api/contacts/create', params: data});
            return request;
        },
        get: function (id) {
            var request = $http.get('api/contacts/' + id);
            return request;
        },
        update: function (id, data) {
            var request = $http.put('api/contacts/' + id, data);
            return request;
        },
        delete: function (id) {
            var request = $http.delete('api/contacts/' + id);
            return request;
        }
    };

});
