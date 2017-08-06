'use strict'

var login = angular.module("login",[]);
login.controller("loginController",function($scope, $window, $http){
$scope.submit = function(){

if($scope.userName === "vp.msdos@gmail.com" && $scope.pwd === "test"){
   $window.location.href="main.html";
   //Once deployed on server use ajax as mentioned below.
   /*$http.get("main.html").then(function(response){
  $scope.res = response.data;
});*/
}
};
});
