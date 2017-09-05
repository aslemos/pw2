<?php
$meta_keywords = "";
$meta_description = "";
$page_title = "login";
$body_class = "subpages login";

// Header
include VIEWPATH . '/common/header.php';
//========================================================
?>

<main>
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel with-nav-tabs panel-info">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#login" data-toggle="tab"> Login </a></li>
                                <li><a href="devenir-membre.php"> S'inscrire </a></li>
                            </ul>
                        </div>

                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="login" class="tab-pane fade in active register">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <h2 class="text-center" style="color: #5cb85c;"> <strong> Login  </strong></h2><hr />

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="glyphicon glyphicon-user"></span>
                                                            </div>
                                                            <input type="text" placeholder="User Name" name="uname" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="glyphicon glyphicon-lock"></span>
                                                            </div>

                                                            <input type="password" placeholder="Password" name="pass" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <input type="checkbox" name="check" checked> Remember Me
                                                    </div>
                                                </div>

                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <a href="#forgot" data-toggle="modal"> Forgot Password? </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <button type="submit" class="btn btn-success btn-block btn-lg"> Login </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div> 
                                </div>

                                <div id="signup" class="tab-pane fade">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <h2 class="text-center" style="color: #f0ad4e;"> <Strong> Register </Strong></h2> <hr />
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon iga1">
                                                                <span class="glyphicon glyphicon-user"></span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Enter User Name" name="name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon iga1">
                                                                <span class="glyphicon glyphicon-envelope"></span>
                                                            </div>
                                                            <input type="email" class="form-control" placeholder="Enter E-Mail" name="mail">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon iga1">
                                                                <span class="glyphicon glyphicon-lock"></span>
                                                            </div>
                                                            <input type="password" class="form-control" placeholder="Enter Password" name="pass">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-lg btn-block btn-warning"> Register</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="forgot">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
                        <h4 class="modal-title" style="font-size: 32px; padding: 12px;"> Recover Your Password </h4>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon iga2">
                                                <span class="glyphicon glyphicon-envelope"></span>
                                            </div>
                                            <input type="email" class="form-control" placeholder="Enter Your E-Mail ID" name="email">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon iga2">
                                                <span class="glyphicon glyphicon-lock"></span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Enter Your New Password" name="newpwd">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-info"> Save <span class="glyphicon glyphicon-saved"></span></button>

                            <button type="button" data-dismiss="modal" class="btn btn-lg btn-default"> Cancel <span class="glyphicon glyphicon-remove"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<?php
//========================================================
//Footer
include VIEWPATH . '/common/footer.php';
