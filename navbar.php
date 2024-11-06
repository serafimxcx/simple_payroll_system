<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" >
  <div class="container-fluid" >
    <div class="navbar-header"  >
      <a class="navbar-brand" href="/infoman_finalproject/salary/salary.php" >GALE Payroll System</a>
    </div>
    <ul class="nav navbar-nav">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" >Employee
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="/infoman_finalproject/employee/employee.php">Manage Basic Information</a></li>
        <li><a href="/infoman_finalproject/employee/employeepay.php">Manage Earnings and Deductions</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="/infoman_finalproject/employee/e_report.php">Employee Report</a></li> 
        <li><a href="/infoman_finalproject/dailyattendance/attendancereport.php">Attendance Report</a></li>
        <li><a href="/infoman_finalproject/salary/s_report.php">Salary Report</a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="/infoman_finalproject/admin/admin.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
    </ul>

  </div>
</nav>
<br><br><br>
</body>
</html>
