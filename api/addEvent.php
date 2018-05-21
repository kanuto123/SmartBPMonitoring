<?php
session_start();
require('../templates/initialization.php');
require_once('../vendor/telerivet/telerivet.php');
date_default_timezone_set("Asia/Manila");
$con=mysqli_connect($GLOBALS['dbHost'],$GLOBALS['dbUsername'],$GLOBALS['dbPassword'],$GLOBALS['dbName']);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}

if (isset($_POST)){
	$patient = $_POST['patient'];
	$bp1 = $_POST['bp1'];
	$bp2 = $_POST['bp2'];
	$startDate = $_POST['startDate']. " " . date("H:i:s");

	if (!isset($patient) || $patient === "") {
		$json['errors']['patient'] = 'Patient is required.';
	}
	if (!isset($bp1) || $bp1 === "") {
		$json['errors']['bp1'] = 'Blood Pressure 1 is required.';
	}

  if (!is_numeric($bp1)) {
    $json['errors']['bp1'] = 'Blood Pressure 1 must be digit.';
  }

	if (!isset($bp2) || $bp2 === "") {
		$json['errors']['bp2'] = 'Blood Pressure 2 is required.';
	}

  if (!is_numeric($bp2)) {
    $json['errors']['bp2'] = 'Blood Pressure 2 must be digit.';
  }

  if (!isset($startDate) || $startDate === "") {
		$json['errors']['date'] = 'Date is required.';
	}

	if (isset($json['errors'])) {
    $json['is_successful'] = false;
		echo json_encode($json, 200);
		die();
	}

  $queryPatient = "SELECT * FROM patient WHERE id=$patient";
  $ret = mysqli_query($con, $queryPatient);
  $result = mysqli_fetch_assoc($ret);
  if ($result) {
    $eventName = $result['fname'] . " " . $result['mi'] . " " . $result['lname'];
  	$query = "INSERT INTO records (patient_id,eventName,start_date,end_date,bp1,bp2) VALUES ($patient, '$eventName', '$startDate', '$startDate', $bp1, $bp2)";
  	mysqli_query($con, $query);

    $sendSms = false;
    $dateTaken = date("M d, Y h:i a", strtotime($startDate));
    $message = "Hi {$eventName}, \n";
    $message .= "the result of your BP test is {$bp1}/{$bp2}\n";
    $message .= "taken last {$dateTaken}.\n";
    // if ($bp1 >= 121 && $bp1 <= 139) {
    //   $message .= "You have PREHYPERTENSION. Take a rest.";
    //   $sendSms = true;
    // }
    //
    // if ($bp1 >= 140 && $bp1 <= 159) {
    //   $message .= "You have STAGE 1 HYPERTENSION. Please take a medicine.";
    //   $sendSms = true;
    // }
    //
    // if ($bp1 >= 160) {
    //   $message .= "You have STAGE 2 HYPERTENSION. Please see a doctor immediately!";
    //   $sendSms = true;
    // }

    if ($bp1 >= 140) {
      $message .= "Your blood pressure is quite high. \n\n
                  Here are the list of things to do.\n
                  1. Take Medications if prescribe by your doctor.\n
                  2. Move to a cool place to avoid the risk of having stroke.\n
                  3. Take deep breaths and relax your mind and body to lower your blood pressure.\n
                  4. Drink fruit juice with potassium\n
                  5. Move away from stressful situations\n\n
                  Here are the list on how to prevent hypertension\n
                  1. Avoid too much sodium and fatty foods.\n
                  2 .Exercise regularly.\n
                  3. Stop smoking and drinking alcoholic beverages.\n
                  4. Avoid too much stress and be comfortable with your surroundings\n
                  5. Monitor your blood pressure regularly and appoint check-ups with your doctor.\n\n
                  In case of emergency go to the nearest Hospital or kindly Contact the following.\n
                  Daniel O. Mercado Medical Center.\n
                  (043) 778 1810\n
                  C.P. Reyes Hospital\n
                  (043) 784 5401";
      $sendSms = true;
    }

    if ($sendSms) {
      $api = "fOpGVM8es6OKxaQKA9J4cQwYEsN8YjxE";
      $project_id = "PJf654f009924a3747";
      $tr = new Telerivet_API($api);
      $project = $tr->initProjectById($project_id);

      $project->sendMessage(array(
        'to_number' => $result['contactNo'],
        'content' => $message
      ));
    }

  	$json['messages'] = "Record successfully added!";
  	$json['is_successful'] = true;
  } else {
    $json['error'] = "Patient not found.";
    $json['is_successful'] = false;
  }
 	mysqli_close($con);
	echo json_encode($json, 200);
	die();
}
?>
