
<div id="particles-js"style="background-color:#000;"></div>





<div class="centrado">
  <div class="login-box" style="box-shadow: 0px 0px 15px #00FF63;">
    
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        
        <div class="login-logo">
          
          <img src="vistas/img/plantilla/logo.png" style="padding:10px 20px;height:90PX;">
        </div>

        <form method="post">
          
        
          <div class="form-group form has-feedback mb-3">
            <input type="text" class="form-control" name="ingEmail" required>
            <label class="lbl-nombre">
              <span class="text-nomb">E-mail</span>
              <span class="glyphicon glyphicon-envelope form-control-feedback spanIcon "></span>
            </label>
          </div>

          <div class="form-group form has-feedback mb-3">
            <input type="password" class="form-control" name="ingPassword" required>
            <label class="lbl-nombre">
              <span class="text-nomb">Password</span>
              <span class="glyphicon glyphicon-lock form-control-feedback spanIcon"></span>
            </label>
          </div>

          <button type="submit" class="ov-btn-slide-top">INGRESAR</button>
          
          <?php

            $login = new ControladorAdministradores();
            $login -> ctrIngresoAdministrador();

          ?>

        </form>
        
        
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
</div>




<script src="vistas/js/particles.min.js"></script>
<script src="vistas/js/particula.js"></script>