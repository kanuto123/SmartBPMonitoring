<?php include("../templates/header.php"); ?>
<?php require("../templates/database.php") ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 <?php include("../templates/navbar.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <div class="card-header">
        <i class="fa fa-calendar"></i> Records
      </div>
      <br>
        <div class="col-sm-11">
          <!-- <button type="button" class="btn btn-primary btn-sm" onclick="addEvent()">ADD EVENT</button> -->
          <?php if (!$_SESSION['user']['patient_id']) { ?>
          <button class="btn btn-info btn-sg" data-toggle="modal" data-target="#addRecordModal">ADD EVENT</button>
        </div>
      </ol>
        <div class="modal fade" id="addRecordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-12">
                        <label for="InputFname"><strong>Event Name</strong></label>
                        <input class="form-control" id="eventName" type="text"  placeholder="Enter event name">
                        <span style="color: red;" id="fname_error"></span>
                      </div>
                      <div class="col-md-6">
                        <label for="InputLname"><strong>Systolic</strong></label>
                        <input class="form-control" id="bp1" type="text"  placeholder="Enter Systolic">
                        <span style="color: red;" id="lname_error"></span>
                      </div>
                      <div class="col-md-6">
                        <label for="InputMi"><strong>Diastolic</strong></label>
                        <input class="form-control" id="bp2" type="text"  placeholder="Enter Diastolic">
                        <span style="color: red;" id="mi_error"></span>                      
                      </div>                      
                    </div>
                  </div>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" name="addEvent" onclick="createEvent()">Create</a>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    <?php } ?>
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
        function createEvent () {
          let url = "<?php echo getBaseUrl() ?>/api/addEvent.php";
          let params = {
            eventName: $("#eventName").val(),
            bp1: $("#bp1").val(),
            bp2: $("#bp2").val()
          }

          $.post(url, params, function (o) {
            if(o.is_successful) {
              $(".dynamic-alert").show();
              clearFields();
              $(".dynamic-alert").addClass('alert-success');
              $(".error-messages").html(o.messages);
            } else {
              $(".dynamic-alert").removeClass('alert-success'); 
              $(".dynamic-alert").removeClass('alert-danger');
              $(".dynamic-alert").addClass('alert-danger');
              // clear messages
              let fields = ['eventName', 'bp1', 'bp2'];
              $.each(fields, function( index, value ) {
                $("#"+value+"_error").html("");
              });
              // set messages
              $.each(o.errors, function( index, value ) {
                $("#"+index+"_error").html(value);
              });
              $(".dynamic-alert").hide();
            }
          }, 'json');
        }

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
