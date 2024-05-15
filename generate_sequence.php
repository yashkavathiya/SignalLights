<?php
    if(isset($_POST['action'])){
        if($_POST['action'] == 'start'){
            $errors = array();
            if(empty($_POST['greenInterval']) || empty($_POST['yellowInterval']) || empty($_POST['A_light_sequence']) ||  empty($_POST['B_light_sequence']) ||  empty($_POST['C_light_sequence']) ||  empty($_POST['D_light_sequence'])){
                $errors[] = "Please fill all the fields.";
            }else{
                $greenInterval = $_POST['greenInterval'];
                $yellowInterval = $_POST['yellowInterval'];
                $A_light_sequence = explode(',',$_POST['A_light_sequence']);
                $B_light_sequence = explode(',',$_POST['B_light_sequence']);
                $C_light_sequence = explode(',',$_POST['C_light_sequence']);
                $D_light_sequence = explode(',',$_POST['D_light_sequence']);

                $sequence = array();
                $minNumber = min(min($A_light_sequence),min($B_light_sequence),min($C_light_sequence),min($D_light_sequence));
                $maxNumber = max(max($A_light_sequence),max($B_light_sequence),max($C_light_sequence),max($D_light_sequence));
                
                for($i = $minNumber; $i<=$maxNumber; $i++){
                    if(in_array($i,$A_light_sequence)){
                        $sequence[]= ['light'=>'A_light','color'=>'green'];
                        $sequence[]= ['light'=>'A_light','color'=>'yellow'];
                        $sequence[]= ['light'=>'A_light','color'=>'red'];
                    }
                    if(in_array($i,$B_light_sequence)){
                        $sequence[]= ['light'=>'B_light','color'=>'green'];
                        $sequence[]= ['light'=>'B_light','color'=>'yellow'];
                        $sequence[]= ['light'=>'B_light','color'=>'red'];
                    }
                    if(in_array($i,$C_light_sequence)){
                        $sequence[]= ['light'=>'C_light','color'=>'green'];
                        $sequence[]= ['light'=>'C_light','color'=>'yellow'];
                        $sequence[]= ['light'=>'C_light','color'=>'red'];
                    }
                    if(in_array($i,$D_light_sequence)){
                        $sequence[]= ['light'=>'D_light','color'=>'green'];
                        $sequence[]= ['light'=>'D_light','color'=>'yellow'];
                        $sequence[]= ['light'=>'D_light','color'=>'red'];
                    }
                }
                if(in_array($minNumber,$A_light_sequence)){
                    $sequence[]= ['light'=>'A_light','color'=>'green'];
                }
                if(in_array($minNumber,$B_light_sequence)){
                    $sequence[]= ['light'=>'B_light','color'=>'green'];
                }
                if(in_array($minNumber,$C_light_sequence)){
                    $sequence[]= ['light'=>'C_light','color'=>'green'];
                }
                if(in_array($minNumber,$D_light_sequence)){
                    $sequence[]= ['light'=>'D_light','color'=>'green'];
                }
            }

            if(empty($errors)){
                echo json_encode($sequence);
            } else{
                echo json_encode(array('error' => $errors));
            }
        } elseif($_POST['action'] == 'stop'){
            echo "Lights stopped successfully."; 
        }
    }
?>