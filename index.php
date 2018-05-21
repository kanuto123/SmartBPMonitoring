<?php include("templates/header.php"); ?>
<?php require("templates/database.php") ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 <?php include("templates/navbar.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Test Reports</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><span id="daily-test">0</span> Daily Test</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo getBaseUrl() ?>/user-profile/records.php?type=DAILY">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><span id="weekly-test">0</span> Weekly Test</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo getBaseUrl() ?>/user-profile/records.php?type=WEEKLY">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><span id="monthly-test">0</span> Monthly Test</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo getBaseUrl() ?>/user-profile/records.php?type=MONTHLY">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><span id="yearly-test">0</span> Yearly Test</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo getBaseUrl() ?>/user-profile/records.php?type=YEARLY">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <?php include_once("templates/footer.php"); ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <?php include("templates/logout-modal.php"); ?>
    <?php include("templates/javascript.php"); ?>
    <script type="text/javascript">
      $(function(){
        loadCounterRecords();
      })

      function loadCounterRecords () {
        var url = "<?php echo getBaseUrl() ?>/api/getCountTest.php";
        $.get(url, {type: "DAILY"}, function (o) {
          $("#daily-test").html(o.count);
        }, 'json');
        $.get(url, {type: "WEEKLY"}, function (o) {
          $("#weekly-test").html(o.count);
        }, 'json');
        $.get(url, {type: "MONTHLY"}, function (o) {
          $("#monthly-test").html(o.count);
        }, 'json');
        $.get(url, {type: "YEARLY"}, function (o) {
          $("#yearly-test").html(o.count);
        }, 'json');

        setTimeout(() => {
          loadCounterRecords()
        }, 1000)
      }
    </script>
  </div>
</body>
</html>
