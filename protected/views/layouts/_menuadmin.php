  <ul class="nav side-menu">
        <li><a><i class="fa fa-users"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="<?php echo Yii::app()->createUrl("administradores/admin"); ?>"> Administradores</a></li>                  
            <li><a href="<?php echo Yii::app()->createUrl("clientes/admin"); ?>"> Clientes</a></li>
          </ul>
        </li>
       <li><a href="<?php echo Yii::app()->createUrl("funciones/admin"); ?>"><i class="fa fa-calendar"></i>Funciones</a></li>
       <li><a href="<?php echo Yii::app()->createUrl("misreservas/admin"); ?>"><i class="fa fa-book"></i>Reservas</a></li>
    </ul> 