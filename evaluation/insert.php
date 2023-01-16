<!DOCTYPE html>
<html>
 
<head>
    <title>Source TA - DB Insert</title>
</head>
 
<body>
    <center>
        <?php
 
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
         
        // Taking all 4 values from the form (input)
        $dt1=date(date("Y-m-d H:i:s"));
        $instructor =  $_REQUEST['instructor'];
        $Student = $_REQUEST['Student'];
        $Remarks =  $_REQUEST['Remarks'];

         
        // Performing insert query execution
        // here our table name is log_tb
        $sql = "INSERT INTO log_tb  VALUES ('0','$dt1','$instructor',
            '$Student','$Remarks')";
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";
 
            echo nl2br("\n $instructor\n $Student\n $Remarks\n $dt1");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
        $answer1 = $_POST['question-1-answers'];
        $answer2 = $_POST['question-2-answers'];
        $answer3 = $_POST['question-3-answers'];
        $answer4 = $_POST['question-4-answers'];
        $answer5 = $_POST['question-5-answers'];
    
        $totalCorrect = 0;

        if ($answer1 == "A") { $totalCorrect++; }
            if ($answer2 == "A") { $totalCorrect++; }
            if ($answer3 == "A") { $totalCorrect++; }
            if ($answer4 == "A") { $totalCorrect++; }
            if ($answer5 == "A") { $totalCorrect++; }
            
            echo "<div id='results'>$totalCorrect / 5 correct</div>";
        ?>
    </center>
</body>
 
</html>