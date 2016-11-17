<table class="table table-bordered">
<?php
if(isset($data)) {
    if (!empty($data['category_lots'][0])) {
        foreach ($data['category_lots'] as $value) {
            echo "<tr><td align='center'><a href='/lot/?lot_id=" . $value->id . "'>" . $value->description . "</a></td></tr>";
        }
    }
}?>
    <?php
    if(isset($data)){
    if(!empty($data['lot_page'][0])) {
        foreach ($data['lot_page'] as $value){
            echo  $value->description . "<br>";
            echo $value->rate."<br>";
        }
    }
}?>
</table>

