<!-- SHIVANI -->
<?php
$con=mysqli_connect("localhost","root","","examsystem");
if(!$con)
{
  die("Couldn't connect to sever");
}
$query=mysqli_query($con,"SELECT * FROM exampaper");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SARAF EXAM SYSTEM</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- CUSTOM STYLES -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/student_profile.css" />
  </head>
  <body>
    <!-- just as a main wrapper -->
    <div class="root">
      <nav class="navbar bg-primary navbar-dark py-1 justify-content-between">
        <div class="container">
          <h2>
            <a class="navbar-brand">Dashboard</a>
          </h2>
          <div>
            <button class="btn btn-danger">Logout</button>
          </div>
        </div>
      </nav>
      <div class="container">
        <section id="allCategories" class="d-flex justify-content-between mt-3">
          <a class="btn btn-hover d-flex align-items-center">
            <div
              class="btn rounded-circle text-light bg-primary me-2"
              style="width: 35px; height: 35px"
            >
              1
            </div>
            <div class="text-dark">All</div>
          </a>
          <a class="btn btn-light d-flex align-items-center">
            <div
              class="btn rounded-circle text-light bg-success me-2"
              style="width: 35px; height: 35px"
            >
              2
            </div>
            <div class="text-dark">Yet to start</div>
          </a>
          <a class="btn btn-light d-flex align-items-center">
            <div
              class="btn rounded-circle text-light bg-info me-2"
              style="width: 35px; height: 35px"
            >
              3
            </div>
            <div class="text-dark">Resume</div>
          </a>
          <a class="btn btn-light d-flex align-items-center">
            <div
              class="btn rounded-circle text-light bg-danger me-2"
              style="width: 35px; height: 35px"
            >
              4
            </div>
            <div class="text-dark">Completed</div>
          </a>
          <a class="btn btn-light d-flex align-items-center">
            <div
              class="btn rounded-circle text-light bg-dark me-2"
              style="width: 35px; height: 35px"
            >
              5
            </div>
            <div class="text-dark">Expired</div>
          </a>
        </section>
        <section id="allExams" class="row mt-4">
          <?php while($row=mysqli_fetch_assoc($query)): ?>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card">
                <div class="card-header bg-primary">
                  <h5 class="text-center text-light"><?php echo $row['Subject']?></h5>
                </div>
                <div class="card-body">
                  <?php 
                  $date1=date('m/d/y',strtotime($row['date']));
                  $time=date('H:i:s',strtotime($row['date']));
                  $end=date('H:i:s',strtotime($row['endTime']));
                  ?>
                  <h6>Start: <?php echo $date1?></h6>
                  <h6>Time: <?php echo $time?></h6>
                  <h6>Expired: <?php echo $end?></h6>
                  <h6>No of Questions: <?php echo $row['Questions']?></h6>
                  <hr />
                  <button class="btn btn-primary d-block mx-auto">Resume</button>
                </div>
              </div>
            </div>
            <?php endwhile;?>
        </section>
      </div>
    </div>
    <!-- SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>