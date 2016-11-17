<table class="table table-bordered">
<?php
if(isset($data)) {
    if (!empty($data['category_lots'][0])) {
        foreach ($data['category_lots'] as $value) {
            echo "<tr><td align='center'><a href='/lot/product?lot_id=" . $value->id . "'>" . $value->name . "</a></td></tr>";
        }
    }
}?>
    <?php
    if(isset($data)){
    if(!empty($data['lot_page'][0])) {
        foreach ($data['lot_page'] as $value){
            echo  $value->name . "<br>";
            echo  $value->description . "<br>";
        }
    }
}?>
</table>

