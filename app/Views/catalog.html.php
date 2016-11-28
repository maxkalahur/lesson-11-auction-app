<script>
    $(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
    });
</script>
<div class="container">

    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-list">
                <li class="nav-header"><h3>Catalog</h3></li>
<?php
     if (!empty($data['topCategories'][0])) {
         foreach ($data['topCategories'] as $cat) {
             echo "<li><a href='/catalog?category_id=" . $cat->id . "'>" . $cat->name . "</a></li>";
             if (!empty($data['subCategories'][0])) {
                 foreach ($data['subCategories'] as $value) {
                     if ($cat->id == $value->parent)
                         echo "<li><a href='/catalog?category_id=" . $value->id . "'>---" . $value->name . "</a></li>";
                 }
             }
         }
     }?>
            </ul>
        </div>

        <div class="container col-md-10">

            <div class="">
                <div class="well well-sm">
                    <div class="btn-group">
                        <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                                class="glyphicon glyphicon-th"></span>Grid</a>
                    </div>
                </div>

                <?php ;
//                var_dump($data);
                if (!empty($data["lots"][0])) { ?>
                    <div id="products" class="row list-group">
                    <h2 align='center'>Select need lot</h2><br>
                    <?php foreach ($data["lots"] as $value) { ?>


                            <div class="item  col-xs-4 col-lg-4">
                                <div class="thumbnail">
                                    <img class="group list-group-image" src="<?=$value->shortImagePath();?>" alt="" />
                                    <div class="caption">
                                        <h4 class="group inner list-group-item-heading">
                                            <?=$value->name;?></h4>
                                        <p class="group inner list-group-item-text">
                                            <?=$value->description;?></p>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6">
                                                <!--                                        price -->
                                                <p class="lead">
                                                   </p>
                                            </div>
                                            <div class="col-xs-12 col-md-6">
                                                <a class="btn btn-success" href="">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>


                    <?php } ?>
                <?php } ?>

            </div>
            </div>
            <div class="col-md-4 col-md-offset-5">
            <?php echo $data['pagination'];?>
            </div>
            </div>
       </div>
    </div>
</div>
</div>