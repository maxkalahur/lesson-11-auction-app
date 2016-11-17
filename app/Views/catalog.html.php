<table class="table table-bordered">
<?php
if(isset($data)) {
        if (!empty($data['parent_cat'][0])) {
            foreach ($data['parent_cat'] as $value) {
                echo "<tr><td align='center'><a href='/catalog/?catalog_id=" . $value->id . "'>" . $value->name . "</a></td></tr>";
            }
        }
        if (!empty($data['expand_cat'][0])) {
            foreach ($data['expand_cat'] as $value) {
                echo "<tr><td align='center'><a href='/lot/?category_id=" . $value->id . "'>" . $value->name . "</a></td></tr>";
            }
        }
}?>
</table>
