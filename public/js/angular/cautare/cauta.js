function CautaController ($scope,$http,$timeout, $filter) {

	$scope.show = function(){
		console.log('test');
		console.log($scope.valabilitate_oferta);
	}
}
angular.module('app', [])
    .controller('CautaController', CautaController) 
    .config(function($interpolateProvider) {
	    $interpolateProvider.startSymbol('{[');
	    $interpolateProvider.endSymbol(']}');
	});