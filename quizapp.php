<?php

    $hostname = "localhost";
    $dbname = "quizgame";
    $username = "root";
    $password = "";

    $conn = mysqli_connect("$hostname", "$username", "", "$dbname");

    

    $result = mysqli_query($conn, "select * from quiz");
    echo "<center>";
    echo "<h2>This is a Mets Trivia Game Made with PHP</h2>";

    if(mysqli_num_rows($result)>0)
    {
        echo "<table>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" .$row['quizID'].")".$row['question']."</td>";
            echo "/tr>";

            echo "<tr>";
            echo "<td><input type='radio' id ='choice1' name=".$row['quizID']." class='radoptions' value=".$row['choice1']." />".$row['choice1']."";
            echo "<input type='radio' id ='choice2' name=".$row['quizID']." class='radoptions' value=".$row['choice2']." />".$row['choice2']."";
            echo "<input type='radio' id ='choice3' name=".$row['quizID']." class='radoptions' value=".$row['choice3']." />".$row['choice3']."";
            echo "<input type='radio' id ='answer' name=".$row['quizID']." class='radoptions' value=".$row['answer']." />".$row['answer']."";
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><span id='span1' class='radoptions' style='color:green; display:none;'><hr/><b>The Correct Answer Is: ".$row['answer']."</b><hr/></span></td>";
            echo "</tr>";
        }
        echo "<table>";
    }
    mysqli_close($conn); 
?>
<button id="but1" type="button" onclick='displayans()'>Submit</button>
<labeL id="Labmsg"></labeL>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function()
    {
        $("#but1").click(function()
        {
            $(".radoptions").show();
            $(".radoptions").attr("disabled",true);
            $("#but1").attr("disabled",true);
        })

    })

        function displayans()
        {
            document.getElementById("Labmsg").innerHTML="";
            var results=document.getElementsByTagName('input');
            for(i=0;i<results.length;i++)
            {
                if(results[i].type=="radio")
                {
                    if(results[i].checked)
                    {
                        document.getElementById("Labmsg").innerHTML+="Q"+results[i].name+")"+"You Selected: "+results[i].value+"<br/>";
                    }
                }
            }
        }
    
</script>