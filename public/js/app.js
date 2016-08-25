/**
 * Created by K on 6/18/2016.
 */
var jobApp = angular.module('jobApp',['ngRoute', 'jobAppControllers',  'TodoService', 'ManagerService',  'MoneyService'] );

jobApp.config(['$routeProvider', function($routeProvider){

    $routeProvider.
    when('/',{
        templateUrl: 'patrials/index.html',
        controller:'MainController'
    }).when('/applyview',{
        templateUrl: 'patrials/applyview.html',
        controller:'ApplyviewController'
    }).when('/money',{
        templateUrl: 'patrials/moneyview.html',
        controller:'MoneyController'
    }).
        otherwise({redirectTo:'/'
    });
}]);
jobApp.filter("status", function() {
    return function(item) {
        if((item.status=='accept')||(item.status=='wait')){
            return item;
        }

        return null;
    }

});
