function CautaController ($scope,$http,$timeout, $filter) {
	$scope.valabilitate = 1;	
	$scope.changeValabilitate = function() {
		$scope.valabilitate = $scope.valabilitate == 1 ? 0 : 1;
	}
	$scope.is_agentie = 0;	
	$scope.changeAgentie = function() {
		$scope.is_agentie = $scope.is_agentie == 1 ? 0 : 1;
	}
	$scope.is_dezvoltator = 0;	
	$scope.changeDezvoltator = function() {
		$scope.is_dezvoltator = $scope.is_dezvoltator == 1 ? 0 : 1;
	}
	$scope.is_credit = 0;	
	$scope.changeCredit = function() {
		$scope.is_credit = $scope.is_credit == 1 ? 0 : 1;
	}

	$scope.show = function(){
		console.log('test');
		console.log($scope.valabilitate_oferta);
	}

}
var app = angular.module('app', []) 
    .controller('CautaController', CautaController) 
    .config(function($interpolateProvider) {
	    $interpolateProvider.startSymbol('{[');
	    $interpolateProvider.endSymbol(']}');
	});
app.filter('pretFilter', function() {
  return function( imobil, pretMin, pretMax) {
    var filtered = [];
    if( pretMin && pretMax ){
    	angular.forEach(imobil, function(item) {
	      if(pretMax >= item.pret_vanzare_euro && pretMin <= item.pret_vanzare_euro) {
	        filtered.push(item);
	      }
	    });
	    return filtered;
    }else{
    	if( pretMin ){
    		angular.forEach(imobil, function(item) {
    		  if(pretMin <= item.pret_vanzare_euro) {
    		    filtered.push(item);
    		  }
    		});
    		return filtered;
    	}else if( pretMax ){
    		angular.forEach(imobil, function(item) {
		      if(pretMax >= item.pret_vanzare_euro) {
		        filtered.push(item);
		      }
		    });
		    return filtered;
    	}else{
    		angular.forEach(imobil, function(item) {
		        filtered.push(item);
		    });
		    return filtered;
    	}
    }
  };
});
app.filter("dateFilter", function() {
  return function(items, from, to) {
    var result = [];        
    if( from && to){
    	var df = parseDate(from);
        var dt = parseDate(to);
        console.log(df);
        console.log(dt);
        for (var i=0; i<items.length; i++){
            var tf = new Date(items[i].data_ultimei_actualizari);
                console.log(tf);
            if (tf > df && tf < dt)  {
                result.push(items[i]);
            }
        }            
        return result;
    }else{
    	for (var i=0; i<items.length; i++)
	        result.push(items[i]);
    	return result;
    }
  };
});
function parseDate(input) {
  var parts = input.split('.');
  return new Date(parts[2], parts[1]-1, parts[0]); 
}
