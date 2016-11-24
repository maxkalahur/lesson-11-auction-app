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

        <div class="col-md-10">
            <?php
                if (!empty($data["lots"][0])) {
                    echo "<h2 align='center'>Select need lot</h2><br>";
                    foreach ($data["lots"] as $value) {
                        echo '<div class="col-md-4">';
                        echo "<p align='center'><a href='/lot/?lot_id=" . $value['id'] . "'>" . $value['name'] . "</a></p>";
                        echo "</div>";
                    }
                } ?>
            <?php echo $data['pagination'];?>
       </div>
    </div>
</div>
