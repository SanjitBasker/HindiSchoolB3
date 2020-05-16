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
    $countquestions = 0;
    
//    first set of questions
    $y=0;
    $questions1 = array("pomegranate", "pineapple", "mango", "plum", "tamarind");
    $countquestions+=sizeof($questions1);
    $choices1=array("अ", "आ", "इ");
    $nums = range(0,sizeof($questions1));
    $nums2 = range(0,sizeof($questions1));
    for ($i = 0; $i < 5; $i++){
        $y = rand(0,4-$i);
        $myVar = $nums[$y];
        
        echo "<tr><td>";
            echo "<p class='question'>".$questions1[$myVar]."</p></td>";
            echo "<td>";
            for ($j = 0; $j < sizeof($choices1); $j++){
                $x="";
                if (isset($_GET['submit'],$_GET['ans'.($nums2[$y]+1)])){
                    if($_GET['ans'.($nums2[$y]+1)]==$choices1[$j])
                    $x = "checked";
                }
                else{
                    $x = "";
                }
                echo "<input type='radio' id='".($nums2[$y]+1).'x'.$choices1[$j]."' name='ans".($nums2[$y]+1)."' value='".$choices1[$j]."'".$x."><label class='option' for='".($nums2[$y]+1).'x'.$choices1[$j]."'><span></span>".$choices1[$j]."</label>";
            }
            echo "</td>";
        echo "</tr>";
        unset($nums[$y]);
        unset($nums2[$y]);
        $nums=array_values($nums);
        $nums2=array_values($nums2);
    }
    

    echo "</table>";
    ?>
</table>
    <button name="submit" type="submit" value="submit" class = "button button1">Evaluate</button>
</form>
<br>

<?PHP
    if (isset($_GET['submit'])){
        $submitted=array();
        for ($i = 1; $i<=$countquestions; $i++){
            array_push($submitted, $_GET['ans'.$i]);
        }
        $answers=array("अ", "अ", "आ", "आ", "इ");
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