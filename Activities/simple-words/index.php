<?php
    include '../question-writer.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" type="image/png" href="../fav.png"/>
    <meta charset="UTF-8">
    <title>Letters Activity</title>
</head>

<body>


<h1>Words Activity - Group 1</h1>
<p class='instructions'>
    Select the Hindi word that corresponds to each of the English words.</p>
<form>
<table>
    <?PHP
    //initial variables
    
    //question sets
    modMatching(array("Come (you).", "(I/she) came.", "(We) came.", "(I/she) went."),
                   array("आओ", "आई", "आए", "गई"),
                   array("आओ", "आई", "आए", "गई"));
    modMatching(array("Today", "Fire", "Eight", "Number", "Body Part"),
                   array("आज", "आग", "आठ", "अंक", "अंग"),
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
            array_push($submitted, $_GET['ans'.$i]);
        }
        $correct = 0;
        for ($i = 0; $i < sizeof($submitted); $i ++){
            $correct+= ($submitted[$i]==$answers[$i]);
        }
        echo "<p>The score is: ".$correct."/".sizeof($answers)."</p>";
        if ($correct == 8){
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