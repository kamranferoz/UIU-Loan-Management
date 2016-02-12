<div class="col-lg-8">
    <div class="panel-heading">
        <h2 class="panel-title">Already have an account?</h2>
    </div>
    <div class="panel-body">
        <form role="form">
            <fieldset>
                <div class="form-group">
                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                </div>
                <div class="checkbox">
                    <label>
                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                    </label>
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <input type="submit" class="btn btn-lg btn-warning btn-block" value="Login" />
            </fieldset>
        </form>
        <a href="<?php echo base_url() ?>index.php/user/forgotPassword" style="margin: 10px 0; display: inline-block">Forgot your password?</a>
    </div>
</div>
