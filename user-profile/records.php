<?php include("../templates/header.php"); ?>
<?php require("../templates/database.php") ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 <?php include("../templates/navbar.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">User Profile</a>
        </li>
        <li class="breadcrumb-item active">Records</li>
      </ol>
      <center style="padding-right: 30px;">
        <div class="btn-group btn-group-toggle">
          <label class="btn btn-info btn-toggle active" id="calendar-view-btn">
            <input type="radio" name="options" checked> Calendar
          </label>
          <label class="btn btn-info btn-toggle" id="list-view-btn">
            <input type="radio" name="options"> List
          </label>
        </div>
      </center>
      <br>
      <div id="calendarRecords"></div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include_once("../templates/footer.php"); ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include("../templates/logout-modal.php"); ?>
    <!-- Bootstrap core JavaScript-->
    <?php include("../templates/javascript.php"); ?>
    <link rel="stylesheet" href="<?php echo getBaseUrl() ?>/vendor/fullcalendar/fullcalendar.css" />
    <script src="<?php echo getBaseUrl() ?>/assets/js/moment.js"></script>
    <script src="<?php echo getBaseUrl() ?>/vendor/fullcalendar/fullcalendar.js"></script>
    <script type="text/javascript">
      var views = 'basicDay,basicWeek,month';
      var defaultViewCalendar = 'month';
      var buttons = {
        month: {
          buttonText: 'Month'
        },
        basicDay: {
          buttonText: 'Day'
        },
        basicWeek: {
          buttonText: 'Week'
        }
      }
      $(function () {
        initializeCalendar();
        $("#list-view-btn").on('click', function (){
          $(".btn-toggle").removeClass('active');
          $(this).addClass('active');
          views = 'listDay,listWeek,listMonth'
          buttons = {
            listMonth: {
              buttonText: 'Month'
            },
            listDay: {
              buttonText: 'Day'
            },
            listWeek: {
              buttonText: 'Week'
            }
          }
          defaultViewCalendar = 'listMonth';
          $('#calendarRecords').fullCalendar('destroy');
          initializeCalendar();
        });

        $("#calendar-view-btn").on('click', function (){
          $(".btn-toggle").removeClass('active');
          $(this).addClass('active');
          views = 'basicDay,basicWeek,month'
          buttons = {
            month: {
              buttonText: 'Month'
            },
            basicDay: {
              buttonText: 'Day'
            },
            basicWeek: {
              buttonText: 'Week'
            }
          }
          defaultViewCalendar = 'month';
          $('#calendarRecords').fullCalendar('destroy');
          initializeCalendar();
        });
      })

      function initializeCalendar () {
        var url = "<?php echo getBaseUrl() ?>/api/retrieveCalendarData.php";
        var patientId = "<?php echo $_SESSION['user']['patient_id'] ?>";
        if (parseInt(patientId)) {
          $("#calendarRecords").fullCalendar({
            header: {
              center: views // buttons for switching between views
            },
            views: buttons,
            defaultView: defaultViewCalendar,
            events: {
              url: url,
              data: function() { // a function that returns an object
                return {
                  patientId: patientId
                };
              }
            }
          })
        } else {
          $("#calendarRecords").fullCalendar({
            header: {
              center: views // buttons for switching between views
            },
            views: buttons,
            defaultView: defaultViewCalendar,
            events: {
              url: url
            }
          })
        }

      }
    </script>
  </div>
</body>

</html>
