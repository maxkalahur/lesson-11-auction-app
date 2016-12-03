<?php
$action=(int)$data['lot'][0]->id;
    if(!empty($data['lot'][0])):
        foreach ($data['lot'] as $value): ?>

    <div class="container">
<!--   bootstrap popup to photo   -->
    <div class="thumbnail">
        <a href="#" data-toggle="modal" data-target=".pop-up">
            <img src="<?=$value->shortImagePath()?>" width="150" class="img-responsive img-rounded center-block" alt="">
        </a>
        <div class="modal fade pop-up" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <img src="<?=$value->imagePath()?>" class="img-responsive img-rounded center-block" alt="">
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal mixer image -->

<!--        caption lot               -->
        <div class="container">
        <div class="caption-full">

            <h4> <p><span class="text-info">Lot name:</span> <?=$value->name?></p>
            </h4>
            <p><span class="text-info" >Description:</span> <?=$value->description?></p>

            <h4 class="text-info">Max Bet <span class="text-danger"><?=$data['allBet'][0]['price']?> &#36;</span></h4>
            <div class="container">
                <p>from: <?=$data['allBet'][0]['name']?></p>
            </div>
            <div class="container">
                <p class="text-muted">Previous bets:</>
                <?php foreach ($data['allBet'] as $betKey => $betValue): ?>
                    <?php if ($betKey > 0):?>
                        <div class="container">
                            <p class="text-muted">Bet value: <?=$betValue['price']?></p>
                            <p class="text-muted">Buyer name: <?=$betValue['name']?></p>
                            <p class="text-muted">Bet date: <?=$betValue['created_at']?></p>
                        </div>
                    <?php endif;?>
                <?php endforeach; ?>
            </div>
        </div>
        </div>
    </div>
        <?php endforeach;?>

<!--    form new bet    -->
        <div class="row">
            <div class="container center-block">
            <form  action="/lot/?lot_id=<?=$action?>" method="POST" >
                <h3 class="text-center">New Bet</h3>
                <div class="col-md-4">
                    <input class="form-control col-md-4" type="text" name="bet">
                </div>
                <div class="col-md-2">
                    <input type="submit" value="Ok" class="btn btn-adn">
                </div>
            </form>
        </div>

</div>
<?php endif;?>


