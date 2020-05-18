<?php
    function modMatching($prompts, $choices, $answers){
        if (!isset($GLOBALS['questionCount'])){
            $GLOBALS['questionCount']=0;
        }
        if (!isset($GLOBALS['answers'])){
            $GLOBALS['answers']=array();
        }
        $nums = range(0,sizeof($prompts));
        $nums2 = range($GLOBALS['questionCount'],$GLOBALS['questionCount']+sizeof($prompts));
        for ($i = 0; $i < sizeof($prompts); $i++){
            array_push($GLOBALS['answers'],$answers[$i]);
            $y = rand(0,sizeof($prompts)-1-$i);
            $myVar = $nums[$y];

            echo "<tr><td>";
                echo "<p class='question'>".$prompts[$myVar]."</p></td>";
                echo "<td>";
                for ($j = 0; $j < sizeof($choices); $j++){
                    $x="";
                    if (isset($_GET['submit'],$_GET['ans'.($nums2[$y]+1)])){
                        if($_GET['ans'.($nums2[$y]+1)]==$choices[$j])
                        $x = "checked";
                    }
                    else{
                        $x = "";
                    }
                    echo "<input type='radio' id='".($nums2[$y]+1).'x'.$choices[$j]."' name='ans".($nums2[$y]+1)."' value='".$choices[$j]."'".$x."><label class='option' for='".($nums2[$y]+1).'x'.$choices[$j]."'><span></span>".$choices[$j]."</label>";
                }
                echo "</td>";
            echo "</tr>";
            unset($nums[$y]);
            unset($nums2[$y]);
            $nums=array_values($nums);
            $nums2=array_values($nums2);
        }
        $GLOBALS['questionCount']+=sizeof($prompts);
    }

    function matching($definitions, $terms){
        if (!isset($GLOBALS['questionCount'])){
            $GLOBALS['questionCount']=0;
        }
        if (!isset($GLOBALS['answers'])){
            $GLOBALS['answers']=array();
        }
        $letters = array_slice(array("a", "b", "c", "d", "e", "f", "g"),0,sizeof($definitions));
        $nums = range(0,sizeof($definitions)-1);
        for ($i = 0; $i < sizeof($definitions); $i++){
            $r = rand(0,sizeof($definitions)-$i-1);
            $b = $nums[$r];
            if(isset($_GET['submit'],$_GET['ans'.($GLOBALS['questionCount']+$b+1)])){
                $x=$_GET['ans'.($GLOBALS['questionCount']+$b+1)];
            }
            else{
                $x="";
            }
            echo "<tr>";
            echo "<td><input type='text' name = 'ans".($GLOBALS['questionCount']+$b+1)."' value=".$x."></td>";
            echo "<td><label class='option'>".$terms[$b]."  "."</label></td>";

            echo "<td>".$letters[$i].". ".$definitions[$i]."</td>";
            echo "</tr>";
            array_push($GLOBALS['answers'], $letters[$i]);

            unset($nums[$r]);
            $nums=array_values($nums);
        }
        $GLOBALS['questionCount']+=sizeof($definitions);
    }
?>