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
    <?php if (!$_SESSION['user']['patient_id']) { ?>
    <div class="col-sm-11">
      <button class="btn btn-info btn-sg" data-toggle="modal" data-target="#addRecordModal">ADD EVENT</button>
    </div>
    <?php } ?>
    </div>
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

    <div class="modal fade" id="addRecordModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="alert alert-success dynamic-alert" role="alert" style="display: none;"><center class="error-messages">test</center></div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <label for="InputPatient"><strong>Patient</strong></label>
                  <br>
                  <select class="form-control select2" id="patient" style="width: 460px;" placeholder="Search Patient"></select>
                  <span style="color: red;" id="patient_error"></span>
                </div>
                <div class="clear"></div>
                <div class="col-md-6" style="margin-top: 10px;">
                  <label for="InputBP1"><strong>Blood Pressure 1</strong></label>
                  <input class="form-control" id="bp1" type="text"  placeholder="Enter Blood Pressure 1">
                  <span style="color: red;" id="bp1_error"></span>
                </div>
                <div class="col-md-6" style="margin-top: 10px;">
                  <label for="InputBP2"><strong>Blood Pressure 2</strong></label>
                  <input class="form-control" id="bp2" type="text"  placeholder="Enter Blood Pressure 2">
                  <span style="color: red;" id="bp2_error"></span>
                </div>
                <div class="col-md-12">
                  <label for="InputDate"><strong>Date</strong></label>
                  <br>
                  <input class="form-control" id="start_date" type="text"  placeholder="Enter Date" readonly>
                  <span style="color: red;" id="date_error"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" onclick="createRecord()">Create</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Logout Modal-->
    <?php include("../templates/logout-modal.php"); ?>
    <!-- Bootstrap core JavaScript-->
    <?php include("../templates/javascript.php"); ?>
    <link rel="stylesheet" href="<?php echo getBaseUrl() ?>/vendor/fullcalendar/fullcalendar.css" />
    <link rel="stylesheet" href="<?php echo getBaseUrl() ?>/vendor/select2/dist/css/select2.css" />
    <link rel="stylesheet" href="<?php echo getBaseUrl() ?>/vendor/datepicker/dist/datepicker.css" />
    <script src="<?php echo getBaseUrl() ?>/assets/js/moment.js"></script>
    <script src="<?php echo getBaseUrl() ?>/vendor/fullcalendar/fullcalendar.js"></script>
    <script src="<?php echo getBaseUrl() ?>/vendor/select2/dist/js/select2.js"></script>
    <script src="<?php echo getBaseUrl() ?>/vendor/datepicker/dist/datepicker.js"></script>
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
        var urlSelectPatient = "<?php echo getBaseUrl() ?>/api/getAllPatient.php";
        $('.select2').select2({
          ajax: {
            url: urlSelectPatient,
            dataType: 'json'
          }
        });

        $("#start_date").datepicker({
          format: 'yyyy-mm-dd',
          autoPick: true
        });
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
        var type = "<?php echo (isset($_GET['type']) ? ucwords($_GET['type']) : 'default' ) ?>";
        if (parseInt(patientId)) {
          $("#calendarRecords").fullCalendar({
            header: {
              left: 'prev,next today',
              center: 'title',
              right: views
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
            },
            eventClick: function(calEvent, jsEvent, view) {
              alertify.alert("Record", "Patient: " + calEvent.patientName + "<br>BP: " + calEvent.BP + "<br>Time Taken: " + calEvent.timeTaken);
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
              url: url,
              data: function() { // a function that returns an object
                return {
                  type: type
                };
              }
            },
            eventClick: function(calEvent, jsEvent, view) {
              alertify.alert("Record", "Patient: " + calEvent.patientName + "<br>BP: " + calEvent.BP + "<br>Time Taken: " + calEvent.timeTaken);
            }
          })
        }
      }

      function createRecord () {
        let url = "<?php echo getBaseUrl() ?>/api/addEvent.php";
        let params = {
          patient: $("#patient").val(),
          bp1: $("#bp1").val(),
          bp2: $("#bp2").val(),
          startDate: $("#start_date").val()
        }
        $(".error-messages").html("");
        $(".dynamic-alert").hide();
        $.post(url, params, function (o) {
          if(o.is_successful) {
            clearFields();
            $(".dynamic-alert").show();
            $(".dynamic-alert").removeClass('alert-success');
            $(".dynamic-alert").removeClass('alert-danger');
            $(".dynamic-alert").addClass('alert-success');
            $(".error-messages").html(o.messages);
            alertify.success(o.messages);
            setTimeout(()=> {
              $("#addRecordModal").modal('hide');
              $(".error-messages").html("");
              $(".dynamic-alert").hide();
              $('#calendarRecords').fullCalendar('removeEvents');
              $('#calendarRecords').fullCalendar('refetchEvents');
            }, 1000);
          } else {
            $(".dynamic-alert").removeClass('alert-success');
            $(".dynamic-alert").removeClass('alert-danger');
            $(".dynamic-alert").addClass('alert-danger');
            if (o.error) {
              $(".error-messages").html(o.error);
              alertify.error(o.error);
            } else {
              // clear messages
              let fields = ['patient', 'bp1', 'bp2', 'date'];
              $.each(fields, function( index, value ) {
                $("#"+value+"_error").html("");
              });
              // set messages
              $.each(o.errors, function( index, value ) {
                $("#"+index+"_error").html(value);
              });
            }
          }
        }, 'json');
      }

      function clearFields () {
        $("#bp1").val("");
        $("#bp2").val("");

        let fields = ['patient', 'bp1', 'bp2', 'date'];
        $.each(fields, function( index, value ) {
          $("#"+value+"_error").html("");
        });
      }
    </script>
    <style>
      .datepicker-container{z-index:1151 !important;}
    </style>
  </div>
</body>
</html>
