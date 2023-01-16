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
         
        // Taking all 6 values from the form (input)
        $LASTNAME=$_REQUEST['LASTNAME'];
        $FIRSTNAME = $_REQUEST['FIRSTNAME'];
        $MIDDLENAME = $_REQUEST['MIDDLENAME'];
        $GENDER = $_REQUEST['GENDER'];
        $PROGRAM =  $_REQUEST['PROGRAM'];
        

                    
            echo "record successfully updated</h2></div>";

            $sql = "INSERT INTO student_info  VALUES ('0','$LASTNAME','$FIRSTNAME','$MIDDLENAME',' $GENDER', '$PROGRAM')";
        if(mysqli_query($conn, $sql)){
            
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        ?>
    </center>
</body>
 
</html>