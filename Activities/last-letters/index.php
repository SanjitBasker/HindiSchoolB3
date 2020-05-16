<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
    
<meta charset="UTF-8">
<title>Last Letters Quiz</title>
</head>

<body>


<h1>Last Letters Activity</h1>
<p class='instructions'>
    Select the first letter of each word in Hindi. Use Research material if you need a reminder.</p>
<form>
<table>
    <?PHP
    $y=0;
    $questions1 = array("cold drink", "turnip", "hexagon", "truth", "elephant");
    $choices1=array("श", "ष", "स", "ह");
    $nums = array(0,1,2,3,4);
    $nums2 = array(0,1,2,3,4);
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
    
    
    $y=0;
    $questions1 = array("forgive", "trident", "knowledge");
    $choices1=array("क्ष", "त्र", "ज्ञ");
    $nums = array(0,1,2);
    $nums2 = array(5,6,7);
    for ($i = 0; $i < 3; $i++){
        $y = rand(0,2-$i);
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
    if (isset($_GET['submit'],
              $_GET['ans1'],
              $_GET['ans2'],
              $_GET['ans3'],
              $_GET['ans4'],
              $_GET['ans5'],
              $_GET['ans6'],
              $_GET['ans7'],
              $_GET['ans8'],)){
        $submitted = array($_GET['ans1'],
                         $_GET['ans2'],
                         $_GET['ans3'],
                         $_GET['ans4'],
                         $_GET['ans5'],
                         $_GET['ans6'],
                         $_GET['ans7'],
                         $_GET['ans8'],
                        );
        $answers=array("श","श","ष","स","ह", "क्ष", "त्र", "ज्ञ");
        $correct = 0;
        for ($i = 0; $i < sizeof($answers); $i ++){
            $correct+= ($submitted[$i]==$answers[$i]);
        }
        echo "<p>The score is: ".$correct."/8</p>";
        if ($correct == 8){
            echo "<p>Good job! Mark Google Classroom assignment as done.</p>";
        }
    }
    else if(isset($_GET['submit'])){
        echo "<p>Some questions not answered.";
    }
?>

</body>

</html>