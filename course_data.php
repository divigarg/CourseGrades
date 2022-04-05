<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	<!-- Bootstrap CSS -->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
	<title><?php echo $_GET['course_id']; ?> | CourseGrades</title>
</head>

<body>
	<?php
	require 'partials/_navbar.php';
	require 'partials/_dbconnect.php';

	?>

	<div class="container bg-light text-dark p-5" style="max-width:1000px">
		<div class="d-flex">
			<div class="p-2 w-100 bd-highlight">
				<p class="display-4"><?php echo $_GET['course_id']; ?></h1>
			</div>
			<div class="p-2 w-100 bd-highlight">
			<p class="display-6  m-2 text-end"><?php echo $_GET['acad_id']; ?> &ensp;Sem- <?php echo $_GET['sem'];?></h1>
			</div>
		</div>
		<hr>
		<?php
			$sql = "SELECT * FROM courses NATURAL JOIN academic_session NATURAL JOIN teaching_session NATURAL JOIN teachers WHERE academic_year = '" . $_GET['acad_id'] . "' AND semester = " . $_GET['sem'] . " AND  course_id = '" . $_GET['course_id'] . "'";
			// echo $sql;
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			echo '<div class="d-flex h4"><div class="text-muted">Taught by: </div> &ensp; ' . $row['first_name'] . ' ' . $row['last_name'] . '</div>';
			// echo '<div class="text-muted mb-0 h5">Course Description: </div>';
			// echo '<div style="font-size:1.25em">' . $row['course_description'] . ' </div>';
			echo '<div class="d-inline text-muted mb-0 h5">Course Description: </div> <div class="d-inline" style="font-size:1.10em"> &ensp;' . $row['course_description'] . '</div>';				
		?>
	</div>


	<?php
	echo '<div class="container text-center my-3"><h4>Grade Distribution</h4></div>';
	$gd_str = $row['grade_distribution'];
	$gd = json_decode($gd_str);
	$total_students = 0;
	foreach($gd as $key => $value){
		$total_students += $value;
	}
	echo '<div class="container text-center my-3"><h4>Total Students: ' . $total_students . ' </h4></div>';
	require "partials/_piechart.php";
	?>

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