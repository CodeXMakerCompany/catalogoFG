<div class="login-box">
 
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Welcome Boss</p>
     <div class="login-logo">
    <img src="vistas/img/preloader/kokoro.gif" class="img-circle imgLogin" alt="">
  </div>
    
  
    <form method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control fields" placeholder="Email" name="ingEmail" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control fields" placeholder="Password" name="ingPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col <-->
          <center>
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary login_btn">Sign In</button>
            </div>
      </center>
        
        <!-- /.col -->
      </div>

      <?php 

        $login = new ControladorAdministradores();
        $login -> ctrIngresoAdministrador();

       ?>

    </form>
  <div class="card-footer">
        <div class="d-flex justify-content-center links">
          Te gustaria contactar al desarrollador?<a href="https://linktr.ee/yowsam">Linktree</a>
        </div>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


