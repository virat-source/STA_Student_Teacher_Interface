<html>
    <body>
        <form action="" method="post">
            <center>
                <table border=0>
                    <tr>
                        <td>
                            Student Name
                        </td>
                        <td>
                            <input type=text name="t1">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Student Evaluation
                        </td>
                        <td>
                            <input type=text name="t2">
                        </td>
                    </tr>
                    
                    </tr>
                </table>
                <br>
                <br>
                <input type=submit name="s" value="Get Grade">
            </center>
            <?php
if(isset($_POST['s']))////checking whether the input element is set or not
{
    $a=$_POST['t1']; //accessing value from 1st text box
    $a1=$_POST['t2']; //accessing value from 2nd text field
    if($a1>=0&&$a1<80)
        $grade="Fail";
    if($a1>=80&&$a1<=90)
        $grade="pass";
       echo "<br>";
    echo "<font size=4><center>Student is:-".$a."</center><br>"; 
    echo "<font size=4><center>Grade is:-".$grade."</center>"; 
}
            ?>
        </form>
    </body>
</html>