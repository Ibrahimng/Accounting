'use strict'

var login = angular.module("login",[]);
login.controller("loginController",function($scope, $window, $http, $templateCache,$httpParamSerializerJQLike){
$scope.submit = function(){
  var method = 'POST';
  var url = 'php/login.php';
  var FormData = {
    'email' : $scope.email,
    'password' : $scope.password
  };

  $http({
    method: method,
    url: url,
    paramSerializer: '$httpParamSerializerJQLike',
    data: $httpParamSerializerJQLike(FormData),
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    cache: $templateCache
  }).
  then(function(response) {
    var resData = JSON.stringify(response.data);
    console.log(resData.length);
   if(response.status === 200 && resData.length === 28){
     $window.location.href="main.html";
   }else{

     alert("Either Email id or Password is wrong !");

  }

  },function(err){
    $window.location.href="php/login.php";
    console.log(JSON.stringify(err));

  });
  return false;
};

$scope.forgetPassword = function(){
alert("Contact accounting team for new password !");
};
});
