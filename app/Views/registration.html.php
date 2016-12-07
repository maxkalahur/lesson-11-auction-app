<div class="container">
    <form action="/registration" method="POST" id="contactform" role="form">
        <div class="form-group">
            <p><label for="name">Name</label></p>
            <input id="name" name="reg[name]" class="form-control" type="text" tabindex="1" required>
        </div>

        <div class="form-group">
            <p><label for="email">Email</label></p>
            <input id="email" name="reg[email]" class="form-control"  tabindex="2" type="text" required>
        </div>

        <div class="form-group">
            <p><label for="password">Password</label></p>
            <input id="password" name="reg[password]" class="form-control" type="password" tabindex="3" required>
        </div>

        <input type="submit" value="Register" id="submit" class="btn btn-default"/>
    </form>
</div>