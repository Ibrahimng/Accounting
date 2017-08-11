'use strict'
var app = angular.module("signup",[]);
app.controller("signupController",function($scope,$http,$templateCache,$window){
$scope.adminList = ['vp.msdos@gmail.com','prad33p.verma@gmail.com','nripendra.bajpai@gmail.com'];
$scope.save = function(){
  var method = 'POST';
  var url = 'php/signup.php';
  var FormData = {
    'name' : $scope.name,
    'email' : $scope.email,
    'password':$scope.password,
    'mobile':$scope.mobile,
    'updatedBy':$scope.selectedAdmin
  };

  $http({
    method: method,
    url: url,
    data: FormData,
    headers: {'Content-Type': 'application/json'},
    cache: $templateCache
  }).
  then(function(response) {

   if(response.status === 200){
     console.log(JSON.stringify(response.data));
     $window.location.href="../accounting/main.php";
  }else{
  console.log("no redirect");
  }

  },function(err){

  });
  return false;
};

$scope.validateEmail = function($event){
  var method = 'POST';
  var url = 'php/validateEmail.php';
  var FormData = {
    'email' : $scope.email
  };

  $http({
    method: method,
    url: url,
    data: FormData,
    headers: {'Content-Type': 'application/json'},
    cache: $templateCache
  }).
  then(function(response) {

    console.log(JSON.stringify(response));

     if(response.data){

       $scope.codeStatus = "Already Exists!";

     }else{

       $scope.codeStatus ="";
     }

  },function(err){

  });
  return false;
};
});
