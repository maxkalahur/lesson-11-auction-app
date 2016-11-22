<div class="container">
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-list">
                <li class="nav-header"><h3>Catalog</h3></li>
<?php
     if (!empty($data['parent_cat'][0])) {
         foreach ($data['parent_cat'] as $cat) {
             echo "<li><a href='/catalog/?Parent_id=" . $cat->id . "'>" . $cat->name . "</a></li>";
             if (!empty($data['expand_cat'][0])) {
                 foreach ($data['expand_cat'] as $value) {
                     if($cat->id==$value->parent)
                         echo "<li><a href='/catalog/?Category_id=" . $value->id . "'>---" . $value->name . "</a></li>";
                 }
             }
         }?>
            </ul>
        </div>

        <div class="col-md-10">
            <?php
                $key = empty($data['lotsByCategory'][0]) ? "all_lots" : "lotsByCategory";
                if (!empty($data[$key][0])) {
                    echo "<h2 align='center'>Select need lot</h2><br>";
                    foreach ($data[$key] as $value) {
                        echo '<div class="col-md-4">';
                        echo "<p align='center'><a href='/lot/?lot_id=" . $value->id . "'>" . $value->name . "</a></p>";
                        echo "</div>";
                    }
                }
            }?>
            <div class="row">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li>
                        <a href="/catalog/?prev" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li><a href="/catalog/?pagination=1">1</a></li>
                    <li><a href="/catalog/?pagination=2">2</a></li>
                    <li><a href="/catalog/?pagination=3">3</a></li>
                    <li><a href="/catalog/?pagination=4">4</a></li>
                    <li><a href="/catalog/?pagination=5">5</a></li>
                   <li>
                        <a href="/catalog/?next" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        </div>
    </div>
</div>
