<?php
//    foreach ($data as $value => $r){
//        echo "$r[name]";
//    }
$user = $data['user'];
?>
<section>
    <div class="">
        <div class="profile-head">
            <div class="col-md-6 col-sm-4 col-xs-12">
                <img src="" class="img-responsive" />
                <h6><?=$user['name']?></h6>
            </div><!--col-md-4 col-sm-4 col-xs-12 close-->


            <div class="col-md-5 col-sm-5 col-xs-12">
                <h5><?=$user['name']?></h5>
                <ul>
                    <li><span class="glyphicon glyphicon-briefcase"></span> 5 years</li>
                    <li><span class="glyphicon glyphicon-map-marker"></span> U.S.A.</li>
                    <li><span class="glyphicon glyphicon-home"></span> 555 street Address,toedo 43606 U.S.A.</li>
                    <li><span class="glyphicon glyphicon-phone"></span> <a href="#" title="call">(+021) 956 789123</a></li>
                    <li><span class="glyphicon glyphicon-envelope"></span><a href="<?=$user['email']?>" title="mail"><?=$user['email']?></a></li>
                </ul>
            </div><!--col-md-8 col-sm-8 col-xs-12 close-->
        </div><!--profile-head close-->
    </div><!--container close-->
    <div id="sticky" class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-menu" role="tablist">
            <li class="active">
                <a href="#profile" role="tab" data-toggle="tab">
                    <i class="fa fa-male"></i> Profile
                </a>
            </li>
            <li><a href="#change" role="tab" data-toggle="tab">
                    <i class="fa fa-key"></i> Edit Profile
                </a>
            </li>
            <li><a href="#change" role="tab" data-toggle="tab">
                    <i class="fa fa-credit-card"></i> Lots
                </a>
            </li>
            <li><a href="#change" role="tab" data-toggle="tab">
                    <i class="fa fa-money"></i> Bought
                </a>
            </li>
        </ul><!--nav-tabs close-->

        <!-- Tab panes -->

    </div><!--container close-->

</section><!--section close-->

<hr>

<div class="container">
    <table class="table table-bordered table-striped">
        <h3>Your lots in auction</h3>
        <tr>
            <td>Name</td>
            <td>Description</td>
            <td>Lot id</td>
            <td>Category</td>
            <td>Bets value</td>
            <td>Buyer</td>
            <td>Time to completion</td>
        </tr>
        <?php
        if($data){
            foreach ($data['lots'] as $key => $value) {
                echo "<tr>";
                echo "<td>".$value['name']."</td>";
                echo "<td>".$value['description']."</td>";
                echo "<td>".$value['id']."</td>";
                echo "<td>".$value['category_id']."</td>";
                echo "<td>".$value['bets_id']."</td>";
                echo "<td>".$value['buyer_id']."</td>";
                echo "<td>".$value['time_finish']."</td>";
                echo "<tr>";
                }
        }
        echo "</table>";
        ?>
</div>

<hr>

<div class="container">
    <table class="table table-bordered table-striped">
        <h3>Your purchases and bets</h3>
        <tr>
            <td>Name</td>
            <td>Description</td>
            <td>Lot id</td>
            <td>Category</td>
            <td>Bets value</td>
            <td>Merchant</td>
            <td>Time to completion</td>
        </tr>
        <?php
        if($data){
            foreach ($data['purchases'] as $key => $value) {
                echo "<tr>";
                echo "<td>".$value['name']."</td>";
                echo "<td>".$value['description']."</td>";
                echo "<td>".$value['id']."</td>";
                echo "<td>".$value['category_id']."</td>";
                echo "<td>".$value['bets_id']."</td>";
                echo "<td>".$value['merchant_id']."</td>";
                echo "<td>".$value['time_finish']."</td>";
                echo "<tr>";
            }

        }

        echo "</table>";

        ?>

</div>


