/**
 * Created by K on 6/18/2016.
 */
var jobAppControllers = angular.module('jobAppControllers',['ngResource']);



jobAppControllers.controller('MainController', ['$scope',  '$location', '$http', '$resource', 'Todo', '$routeParams',function ($scope, $location, $http, $resource, Todo,$routeParams) {

    $scope.applyresource=$resource("http://localhost:8085/gamemoney/public/apply/:id", { id: "@id" });

    $scope.create = function () {
        var apply = new Todo({
            'uid' : this.currentUid,
            'money' : this.currentMoney
        });

        apply.$save(function (res) {
            alert('success');
            $scope.refresh();

        }, function (err) {
            alert('error');
            console.log(err);
        });
    };

    $scope.remove = function(id){

        if(confirm('Are you sure to remove this book from your wishlist?')){
            $scope.applyresource.delete({'id': id});

        }
        $scope.refresh();

    }

    $scope.refresh = function(){

        $scope.applys = Todo.query();
    }

    $scope.refresh();

}]);

jobAppControllers.controller('MoneyController', ['$scope',  '$location', '$http', '$resource', 'Money', '$routeParams',function ($scope, $location, $http, $resource, Money,$routeParams) {

    $scope.applyresource=$resource("http://localhost:8085/gamemoney/public/money/:id", { id: "@id" });

    $scope.create = function () {
        var apply = new Money({
             'money' : this.currentMoney
        });

        apply.$save(function (res) {
            alert('success');
            $scope.refresh();

        }, function (err) {
            alert('error');
            console.log(err);
        });
    };

    $scope.remove = function(id){

        if(confirm('Are you sure to remove this book from your wishlist?')){
            $scope.applyresource.delete({'id': id});

        }
        $scope.refresh();

    }

    $scope.refresh = function(){

        $scope.moneys = Money.query();
    }

    $scope.refresh();

}]);
jobAppControllers.controller('ApplyviewController', ['$scope',  '$location', '$http', '$resource', 'Manager', '$routeParams',function ($scope, $location, $http, $resource, Manager ,$routeParams) {

    $scope.refresh = function(){

        $scope.applys = Manager.query();
    }
    $scope.accept = function(id){

        $http.post('accept',{

            id : id

        }).then(function(response){
            $scope.refresh();
            alert('acceptsuccess');
        },function(response){

            alert('accepterror');
        });
    }

    $scope.wait = function(id){

        $http.post('wait',{

            id : id

        }).then(function(response){
            $scope.refresh();
            alert('wait');
        },function(response){

            alert('waiterror');
        });
    }

    $scope.cancel = function(id){

        $http.post('cancel',{

            id : id

        }).then(function(response){
            $scope.refresh();
            alert('cancelsuccess');
        },function(response){

            alert('cancelerror');
        });
    }
    $scope.delete = function(id){

        $http.post('delete',{

            id : id

        }).then(function(response){
            $scope.refresh();
            alert('deletesuccess');
        },function(response){

            alert('deleteerror');
        });
    }
    $scope.refresh();

}]);
