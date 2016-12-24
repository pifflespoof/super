var app = angular.module('myApp',[]);
app.controller ('appCtrl',function($scope){
$scope.btn=true;
$scope.but=false;
$scope.click1=function(){
   	$scope.img = {"display":"block"}
    $scope.img1 = {"display":"block"}
    $scope.img2= {"display":"block"}
    $scope.img3= {"display":"block"}
    $scope.btn=false;
    $scope.but=true;
   };
});