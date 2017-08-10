'use strict'
var app = angular.module("signup",[]);
app.controller("signupController",function($scope,$http,$templateCache){
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

   $scope.codeStatus = response.status;
   if(response.status === 200){
     console.log(JSON.stringify(response.data));
     //$window.location.href="main.html";
  }else{
  console.log("no redirect");
  }

  },function(err){

  });
  return false;
};
});
