<div class="container">
    <form action="/login" method="POST" id="contactform" role="form">
        <div class="form-group">
            <p><label for="login">Email</label></p>
            <input id="login" class="form-control" type="text" name="login[email]" tabindex="1" required>
        </div>
        <div class="form-group">
            <p><label for="password">Password</label></p>
            <input id="password" name="login[pass]" class="form-control" tabindex="2" type="password" required>
        </div>
        <div class="container">        <input type="checkbox" name="login[rememberMe]"> Remember me</div>
        <br>
        <div class="container">
        <input type="submit" value="Log in" id="submit" class="btn btn-default"/>
        </div>
<!--        <div class="container col-md-3">-->
                <a class="btn  btn-social btn-facebook" href="https://www.facebook.com/v2.8/dialog/oauth?client_id=377416752598790&redirect_uri=http://mysite.com/fb-callback">
                    <span class="fa fa-facebook"></span> Sign in with Facebook
                </a>
<!--        </div>-->


    </form>
</div>

