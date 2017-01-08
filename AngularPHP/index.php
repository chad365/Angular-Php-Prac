<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Angular DB excercise</title>
    <script src="Scripts/angular.js"></script>
   
</head>
<body>
    <div ng-app="myApp" ng-controller="cntrl">
        <form>
            Student ID : <input type="text" ng-model="studentId" name="studentId" ng-disabled="obj.studentIdDisabled"/>
            Student Name : <input type="text" ng-model="studentName" name="studentName" />
            <input type="button" value="{{btnName}}" ng-click="insertData()" />
            {{msg}}
        </form>
		<p>&nbsp;</p>
        <table width="500">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead> 
            <tbody>
                <tr ng-repeat="student in Students">
                    <td>{{student.studentId}}</td>
                    <td>{{student.studentName}}</td>
                    <td><input type="button" ng-click="deleteStudent(student.studentId)" value="Delete"></td>
                    <td><input type="button" ng-click="editStudent(student.studentId,student.studentName)" value="Edit"></td>
                </tr>
            </tbody>
        </table>
        <script>

        var app = angular.module('myApp', []);
        app.controller('cntrl', function ($scope, $http) {
			
			// Declarations
        	$scope.obj = { 'studentIdDisabled': false };
        	$scope.btnName = 'Insert';

			// Insert data into DB function
        	$scope.insertData = function () {
        		$http.post("insert.php", {'studentId': $scope.studentId, 'studentName': $scope.studentName, 'btnName':$scope.btnName })
				.then(function () {					
					$scope.msg = "Data inserted";
					$scope.displayStudent();
				});
        	}

			// Display DB rows function
        	$scope.displayStudent = function () {
        		$http.get('select.php')
				.then(function (response) {
					$scope.Students = response.data;
					console.log($scope.Students);
				});
        	}
			// Delete DB row item function
        	$scope.deleteStudent = function (studentId) {
        		$http.post('delete.php', {'studentId': studentId })
				.then(function () {
					$scope.msg = "Selected data has been deleted.";
					$scope.displayStudent();
				});
        	}
        	// Edit DB row item function
        	$scope.editStudent = function (studentId, studentName) {

        		$scope.studentId = studentId;
        		$scope.studentName = studentName;
        		$scope.btnName = 'Update';
        		$scope.obj = { 'studentIdDisabled': true };
        		$scope.displayStudent();
				
        	}
        });
        </script>
       
    </div>
</body>
</html>
