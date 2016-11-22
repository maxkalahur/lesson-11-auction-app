<?php
    if(!empty($data['lot_page'][0])) {
        foreach ($data['lot_page'] as $value){
            echo  $value->name . "<br>";
            echo  $value->description . "<br>";
        }
}


