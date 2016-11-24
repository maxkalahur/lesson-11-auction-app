<div class=" text-center center-block">
    <h2>New Lot</h2>
</div>
<div class="container">
    <form class="form-horizontal" action='/create-lot' method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <p><label for="name">Name</label></p>
            <input id="name" class="form-control" type="text" name="lot[name]" value="" required="">
        </div>

        <div class="form-group">
            <p><label>Description</label></p>
            <textarea name="lot[description]" class="form-control" rows="5" tabindex="2"></textarea>
        </div>

        <div class="form-group">
            <label for="formAcc">Category</label>
                <select id="formAcc" name="lot[category_id]" class="form-control">
                    <?php
                        foreach ($data as $value){
                            echo "<option value=$value[id]>".$value['name']."</option>";
                        }
                    ?>
                </select>
        </div>
        <div class="form-group">
            <label for="formAcc">Time</label>
            <select id="formAcc" name="lot[time]" class="form-control">
                <option value="1">day</option>
                <option value="3">3 days</option>
                <option value="7">week</option>
                <option value="14">two weeks</option>
                <option value="month">month</option>
            </select>
        </div>
        <div class="form-group">
            <p><label>Photo</label></p>
            <input name="lot_image" class="form-control" type="file" >
        </div>

        <input type="submit" value="Add" id="submit" class="btn btn-default"/>
    </form>
</div>