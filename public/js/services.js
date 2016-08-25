/**
 * Created by K on 6/18/2016.
 */
var jobAppServices = angular.module('jobAppServices', ['LocalStorageModule','ngResource']);


angular.module('TodoService', []).factory('Todo', ['$resource',
    function ($resource) {
        return $resource('http://localhost:8085/gamemoney/public/apply/:id', {
            id: '@id'
        }, {
            update: {
                method: 'PUT'
            }
        });
    }
]);
angular.module('ManagerService', []).factory('Manager', ['$resource',
    function ($resource) {
        return $resource('http://localhost:8085/gamemoney/public/mana/:id', {
            id: '@id'
        }, {
            update: {
                method: 'PUT'
            }
        });
    }
]);
angular.module('MoneyService', []).factory('Money', ['$resource',
    function ($resource) {
        return $resource('http://localhost:8085/gamemoney/public/money/:id', {
            id: '@id'
        }, {
            update: {
                method: 'PUT'
            }
        });
    }
]);
