<?php
$action=(int)$data['lot_page'][0]->id;
    if(!empty($data['lot_page'][0])) {
        foreach ($data['lot_page'] as $value){
            echo  $value->name . "<br>";
            echo  $value->description . "<br>";
        }
        echo "(type over bet as '".$data['maxPrice']."')";
        echo '<form  action="/lot/?lot_id='.$action.'" method="POST">
                 <input type="text" name="bet">
                <input type="submit" value="Ok">
              </form>';
}




