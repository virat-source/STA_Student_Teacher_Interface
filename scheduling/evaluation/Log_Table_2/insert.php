 <?php
 date_default_timezone_set('America/Los_Angeles');

 $script_tz = date_default_timezone_get();
 
 if (strcmp($script_tz, ini_get('date.timezone'))){
     echo '';
 } else {
     echo '';
 }
        // servername => localhost
        // username => root
        // password => empty
        // database name => db_sta
        $conn = mysqli_connect("localhost", "root", "", "db_sta");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        

              // Taking all 6 values from the form (input)
        $dt1=date(date("Y-m-d H:i:s"));
        $instructor = $_REQUEST['instructor'];
        $Student = $_REQUEST['Student'];
        $Remarks =  $_REQUEST['Remarks'];
        $Remarks_s = mysqli_real_escape_string($conn,trim($Remarks));
        $subject_name = $_REQUEST['subject_name'];
        $subject = $_REQUEST['subject'];

         
        // Performing insert query execution - #answer(n) should match number of questions on form
        // here our table name is log_tb

        $answer1 = $_POST['question-1-answers'];
        $answer2 = $_POST['question-2-answers'];
        $answer3 = $_POST['question-3-answers'];
        $answer4 = $_POST['question-4-answers'];
        $answer5 = $_POST['question-5-answers'];
        $answer6 = $_POST['question-6-answers'];
        $answer7 = $_POST['question-7-answers'];
        $answer8 = $_POST['question-8-answers'];
        $answer9 = $_POST['question-9-answers'];
        $answer10 = $_POST['question-10-answers'];
        $answer11 = $_POST['question-11-answers'];
        $answer12 = $_POST['question-12-answers'];
        $answer13 = $_POST['question-13-answers'];
        $answer14 = $_POST['question-14-answers'];
        $answer15 = $_POST['question-15-answers'];
        $answer16 = $_POST['question-16-answers'];
        $answer17 = $_POST['question-17-answers'];
        $answer18 = $_POST['question-18-answers'];
        $answer19 = $_POST['question-19-answers'];
        $totalCorrect = 0;

        //Enter the total correct questions in each form - this corresponds to the # of criteria in each evaluation
        $totalQ = 19;

            if ($answer1 == "A") { $totalCorrect++; }
            if ($answer2 == "A") { $totalCorrect++; }
            if ($answer3 == "A") { $totalCorrect++; }
            if ($answer4 == "A") { $totalCorrect++; }
            if ($answer5 == "A") { $totalCorrect++; }
            if ($answer6 == "A") { $totalCorrect++; }
            if ($answer7 == "A") { $totalCorrect++; }
            if ($answer8 == "A") { $totalCorrect++; }
            if ($answer9 == "A") { $totalCorrect++; }
            if ($answer10 == "A") { $totalCorrect++; }
            if ($answer11 == "A") { $totalCorrect++; }
            if ($answer12 == "A") { $totalCorrect++; }
            if ($answer13 == "A") { $totalCorrect++; }
            if ($answer14 == "A") { $totalCorrect++; }
            if ($answer15 == "A") { $totalCorrect++; }
            if ($answer16 == "A") { $totalCorrect++; }
            if ($answer17 == "A") { $totalCorrect++; }
            if ($answer18 == "A") { $totalCorrect++; }
            if ($answer19 == "A") { $totalCorrect++; }


            if($totalCorrect >= 0) {
                $percentage = ($totalCorrect/$totalQ) * 100;}

            if($percentage < 80) {$grade = "failed";
            } else {
                $grade = "passed";
                }


            
            echo "<div id='results'><h2> $Student $grade as graded by $instructor on $dt1 and $instructor had, $Remarks, to say about $Student. </h2></div> ";
              
            

            $sql = "INSERT INTO log_tb  VALUES ('0','$dt1','$instructor','$Student', '$subject_name', '$subject',
            '$Remarks_s','$grade')";
        if(mysqli_query($conn, $sql)){
            
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        ?>
