<?php
$action=(int)$data['lot_page'][0]->id;
    if(!empty($data['lot_page'][0])) {
        foreach ($data['lot_page'] as $value)
        {
        ?>

             <p> <?=$value->name?> </p>
             <p> <?=$value->description?></p>
<?php }?>

<form  action="/lot/?lot_id=<?=$action?>" method="POST" >
             <lavel>type over bet as '<?=$data['maxBet']?>'</lavel>
                 <input type="text" name="bet">
                <input type="submit" value="Ok">
              </form>

<?php }?>


