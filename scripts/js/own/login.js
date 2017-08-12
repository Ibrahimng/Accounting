'use strict'

var login = angular.module("login",[]);
login.controller("loginController",function($scope, $window, $http, $templateCache){
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
    data: FormData,
    headers: {'Content-Type': 'application/json'},
    cache: $templateCache
  }).
  then(function(response) {
   if(response.status === 200){
     $window.location.href="main.html";
}else{
  //console.log("no redirect");
  $window.location.href="index.html?err=1";
}

  },function(err){

  });
  return false;
};

$scope.forgetPassword = function(){
alert("Contact accounting team for new password !");
};
});
