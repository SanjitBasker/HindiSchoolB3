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


<h1>Letters Activity</h1>
<p class='instructions'>
    Select the first letter of each word in Hindi. Use Research material posted in our Google Classroom if you need a reminder for any of the words.</p>
<form>
<table>
    <?PHP
    //initial variables
    
    //question sets
    modMatching(array("cold drink", "turnip", "hexagon", "truth", "elephant"),
                   array("श", "ष", "स", "ह"),
                   array("श","श","ष","स","ह"));
    modMatching(array("forgive", "trident", "knowledge"),
                   array("क्ष", "त्र", "ज्ञ"),
                   array("क्ष", "त्र", "ज्ञ"));
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