


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- For data-table -->
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->

  <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <!-- <script src="jquery-XXX.js"></script> -->
  <!-- <script src="jquery.redirect.js"></script> -->

  <script>
    $(document).ready(function() {
      var table = $('#myTable').DataTable();

      $('#myTable tbody').on('click', 'tr', function(e) {
        let target = $(e.target);
        if (target.is('i') || target.is('button') || target.is('a') || target.hasClass('select-checkbox')) {
          return;
        }
        var data = table.row(this).data();
        url = "./course_data.php?acad_id=" + data[0] + "&sem=" + data[1] + "&course_id=" + data[2];
        window.location.assign(url);
      });
    });
  </script>

  <!-- Bootstrap CSS -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>My Courses | CourseGrades</title>
</head>

<body>
  <?php
  require 'partials/_navbar.php';
  require 'partials/_dbconnect.php';
  require 'partials/_addnewtsession.php';
  ?>

  <div class="container my-4">
    <button class="btn me-2 btn-success" onclick="addNewCourse()">Add New Teaching Session </button>
  </div>

  <div class="container my-4">
    <table class="hover" id="myTable">
      <thead>
        <tr>
          <th scope="col">Academic Year</th>
          <th scope="col">Semester</th>
          <th scope="col">Course Id</th>
          <th scope="col">Course Name</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM teaching_session where teacher_id = '" . $_SESSION['teacherId'] . "'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          $acad_sql = "SELECT * FROM academic_session WHERE academic_id=" . $row['academic_id'];
          $acad_result = mysqli_query($conn, $acad_sql);
          $acad_row = mysqli_fetch_assoc($acad_result);
          $acad_year = $acad_row['academic_year'];
          $semester = $acad_row['semester'];

          $courseid = $row['course_id'];
          $course_sql = "SELECT course_name FROM courses WHERE course_id='" . $courseid . "'";
          $course_result = mysqli_query($conn, $course_sql);
          $course_row = mysqli_fetch_assoc($course_result);
          $course_name = $course_row['course_name'];

          $prof_sql = "SELECT * FROM teachers WHERE teacher_id=" . $row['teacher_id'];
          $prof_result = mysqli_query($conn, $prof_sql);
          $prof_row = mysqli_fetch_assoc($prof_result);
          $professor_firstname = $prof_row['first_name'];
          $professor_lastname = $prof_row['last_name'];

          echo "<tr>
                        <th scope='row'>" . $acad_year . "</th>
                        <td>" . $semester . "</td>
                        <td>" . $courseid . "</td>
                        <td>" . $course_name . "</td>
                        <td><button class='edit btn btn-sm btn-primary' id=" . $row['sno'] . ">Edit</button>
                        <button class='delete btn btn-sm btn-primary' id=d" . $row['sno'] . ">Delete</button></td>
                    </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>


  <script src="javascript/my_courses_functional.js"></script>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</body>


</html>