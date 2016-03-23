angular.module('contactService', [])

        .factory('Contact', function ($http) {

            return {
                // get all the contacts
                get: function () {
                    return $http.get('/api/contacts');
                },
                // save a contact (pass in contact data)
                save: function (contactData) {
                    return $http({
                        method: 'POST',
                        url: '/api/contacts',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                        data: $.param(contactData)
                    });
                },
                // destroy a contact
                destroy: function (id) {
                    return $http.delete('/api/contacts/' + id);
                }
            };

        });
