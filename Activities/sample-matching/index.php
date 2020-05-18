<?php
    include '../question-writer.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" type="image/png" href="../fav.png"/>
    <meta charset="UTF-8">
    <title>Words Activity</title>
</head>

<body>


<h1>Letters Activity</h1>
<p class='instructions'>
    Select the first letter of each word in Hindi. Use Research material posted in our Google Classroom if you need a reminder for any of the words.</p>
<form>
<table>
    <?PHP
    echo "<tr><td class='boundary' colspan=3>Section 1</td></tr>";
    matching(array("Come (you).", "(I/she) came.", "(We) came.", "(I/she) went."), 
             array("आओ", "आई", "आए", "गई"));
    echo "<tr><td class='boundary' colspan=3>Section 2</td></tr>";
    matching(array("Today", "Fire", "Eight", "Number", "Body Part"),
             array("आज", "आग", "आठ", "अंक", "अंग"));

    ?>
    
    
</table>
    <button name="submit" type="submit" value="submit" class = "button button1">Evaluate</button>
</form>
<br>

<?PHP
    if (isset($_GET['submit'])){
        $submitted=array();
        for ($i = 1; $i<=$questionCount; $i++){
            if (isset($_GET['ans'.$i])){
                $x = $_GET['ans'.$i];
            }
            else {
                $x = "0";
            }
            array_push($submitted, $x);
        }
        $correct = 0;
        for ($i = 0; $i < sizeof($submitted); $i ++){
            $correct+= ($submitted[$i]==$answers[$i]);
        }
        echo "<p>The score is: ".$correct."/".sizeof($answers)."</p>";
        if ($correct == sizeof($answers)){
            echo "<p>Good job! Mark Google Classroom assignment as done.</p>";
        }
    }
    else if(isset($_GET['submit'])){
        echo "<p>Some questions not answered.";
    }
?>
<p><a href="..">Back to all activities</a></p>
</body>

</html>