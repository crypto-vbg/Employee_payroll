<?php
  $conn = mysqli_connect('localhost', 'root', '');
  if (!$conn)
  {
    die("Database Connection Failed" . mysqli_error());
  }

  $select_db = mysqli_select_db($conn,'payroll');
  if (!$select_db)
  {
    die("Database Selection Failed" . mysqli_error());
  }

  if(isset($_POST['submit'])!="")
  {
    $fname      = $_POST['fname'];
    $lname      = $_POST['lname'];
    $gender     = $_POST['gender'];
    $type       = $_POST['emp_type'];
    $division   = $_POST['division'];

    $sql = mysqli_query($conn,"INSERT into employee(fname, lname, gender, emp_type, division)VALUES('$fname','$lname','$gender', '$type', '$division')");

    if($sql)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='index.php';
        </script>
      <?php
    }
  }
?>
