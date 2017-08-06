'use strict'

var login = angular.module("login",[]);
login.controller("loginController",function($scope, $window, $http,$templateCache){
$scope.codeStatus="";
$scope.submit = function(){
  var method = 'POST';
  var url = 'php/login.php';
  var FormData = {
    'name' : $scope.userName,
    'password' : $scope.pwd
  };

  $http({
    method: method,
    url: url,
    data: FormData,
    headers: {'Content-Type': 'application/json'},
    cache: $templateCache
  }).
  then(function(response) {

   $scope.codeStatus = response.status;
   if(response.status === 200){
     $window.location.href="main.html";
}else{
  console.log("no redirect");
}

  },function(err){

  });
  return false;
};

/*if($scope.userName === "vp.msdos@gmail.com" && $scope.pwd === "test"){
   //$window.location.href="main.html";
   //Once deployed on server use ajax as mentioned below.
   $http.get("main.html").then(function(response){
  $scope.res = response.data;
});*/
});
