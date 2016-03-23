var contact = angular.module('MainCtrl', []);

contact.controller('ContactController', function ($scope, CRUD) {
    var getPosts = CRUD.all();
    getPosts.success(function (response) {
        $scope.contacts = response;
    });

    $scope.submit = function () {
        var request = CRUD.create($scope.new);
        request.success(function (response) {
            if (response.success) {
                $scope.flashSuccess = response.message;
                successMsg();
                hidePopup();
            } else {
                if (typeof response.message['name'] != "undefined" || response.message['name'] != null) {
                    $scope.flashErrorName = response.message['name'];
                }
                if (typeof response.message['phone'] != "undefined" || response.message['phone'] != null) {
                    $scope.flashErrorPhone = response.message['phone'];
                }
                if (typeof response.message['address'] != "undefined" || response.message['address'] != null) {
                    $scope.flashErrorAddress = response.message['address'];
                }
                if (typeof response.message['email'] != "undefined" || response.message['email'] != null) {
                    $scope.flashErrorEmail = response.message['email'];
                }
            }
        });
    };

    $scope.remove = function (id, index) {
        var removePost = CRUD.delete(id);
        removePost.success(function (response) {
            $scope.flashSuccess = response.message;
            successMsg();
            $scope.contacts.splice(index, 1);
        });
    };
});

contact.controller('EditContactController', function ($scope, $routeParams, CRUD) {
    var getPost = CRUD.get($routeParams.id);
    getPost.success(function (response) {
        $scope.contact = response;
    });

    $scope.submit = function () {
        var request = CRUD.update($routeParams.id, $scope.contact);
        request.success(function (response) {
            if (response.success) {
                $scope.flashSuccess = response.message;
                successMsg();
                hidePopupEdit();
            } else {
                if (typeof response.message['name'] != "undefined" || response.message['name'] != null) {
                    $scope.flashErrorName = response.message['name'];
                }
                if (typeof response.message['phone'] != "undefined" || response.message['phone'] != null) {
                    $scope.flashErrorPhone = response.message['phone'];
                }
                if (typeof response.message['address'] != "undefined" || response.message['address'] != null) {
                    $scope.flashErrorAddress = response.message['address'];
                }
                if (typeof response.message['email'] != "undefined" || response.message['email'] != null) {
                    $scope.flashErrorEmail = response.message['email'];
                }
            }
        });
    };

});
