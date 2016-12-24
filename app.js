var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope,$http) {
	$scope.login=false;
	$scope.text = [];
	$scope.error = false;
  $scope.stage=false;

	$scope.loginClick = function(){
		$scope.login=!$scope.login;
		$scope.login1=!$scope.login1;
		}
	 $scope.close = function() {
   		$scope.login = false;
   		$scope.login1 = false;
   		$scope.error = false;
      $scope.stage=false;
    }
	$scope.enter =function(){
		if($scope.area1 == "" || $scope.area2 == "" || $scope.area1==undefined || $scope.area2 ==undefined){
			$scope.error = !$scope.error
         }
         else {
         	var url = "http://localhost/project/mail.php";
         	$http.get(url + "?mail=" +$scope.area1 + "&password=" + $scope.area2 ).then(function(response) {
         		if(response.data == "ok"){
         			console.log("hello");
         			$scope.login=false;

              $scope.login1=true;
              $scope.stage=true;      				
       			}
       			else {
       				$scope.error = true;
       			}
    		})
         	}
         }
    });
	
