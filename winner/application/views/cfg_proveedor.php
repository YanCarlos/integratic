<?php 
date_default_timezone_set ('America/Bogota');
$t=time(); ?>
<div class="row">
    <fieldset>
        <legend align="center"><b> Gestión de Proveedores</b></legend>             
    </fieldset>
</div>
<div style="margin-top: 1%"></div>

<div class="box box-default">
        <div class="box-header with-border">
          <h4 class="box-title">Proveedores Existentes</h4>
          <div class="box-tools pull-right">              
            <div class="has-feedback">
                <button class="btn btn-block btn-primary" type="button" data-toggle="modal" data-target="#agregar">Agregar Nuevo</button>
            </div>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class='box-header'>
        <div class='box-body'>
        <div id="listado">    
        <table id='tb_planchas' class='table table-bordered table-hover'>
        <thead><tr style='background-color: #F6CED8'>
                <th width="10%">Identificación</th>
                <th width="50%">Nombre/Razon Social</th>
                <th width="20%">Teléfonos</th>
                <th width="20%">e-mail</th>
                <th width="10%">Consultar</th>         
        </tr></thead>
        <?php
            foreach($datos as $fila)
                { ?>
        <tr>
            <td align="center"><?=$fila->pvd_nit?></td>
            <td><?=$fila->pvd_razon?></td>  
            <td><?=$fila->pvd_fijo."/".$fila->pvd_movil?></td>
            <td><?=$fila->pvd_email?></td>
            <td><a href="javascript:;" onclick="mostrarPro(this)">
                    <img src="<?=base_url()?>img/ver.png" width="30" height="30" alt="consultar"/></a></td>
        </tr><?php }?>  
        </table></div></div>
</div><!-- /.box -->

<!-- Modal -->
<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Elemento Proveedor</h4>
      </div>
      <div class="modal-body">
          <form id="frmnuevo" name="frmnuevo" role="form"> 
            <table>
                <tr><td style="width: 5%"></td><td>    
                <label for="id">No. Identificación</label>                
                    <div class="input-group">   
                        <input class="form-control" type="text" id="id" name="id"  maxlength="25" size="30" onkeypress="return solonum(event)" required>
                    </div></td></tr>
                <tr><td style="width: 5%"></td><td colspan="2">    
                    <label for="razon">Nombre/Razón Social</label>     
                    <div class="input-group">               
                        <input class="form-control" type="text" id="nombre" name="nombre"  maxlength="100" size="70" required>
                    </div></td></tr>
                <tr><td style="width: 5%"></td><td colspan="2">
                    <label for="dir">Dirección</label>     
                    <div class="input-group">               
                        <input class="form-control" type="text" id="dir" name="dir"  maxlength="100" size="70" required>
                    </div></td></tr>
                <tr><td style="width: 5%"></td><td>
                    <label for="fijo">Teléfono Fijo</label>     
                    <div class="input-group">               
                        <input class="form-control" type="text" id="fijo" name="fijo"  maxlength="25" size="30" required>
                    </div></td>
                <td>
                    <label for="movil">No. Movil</label>     
                    <div class="input-group">               
                        <input class="form-control" type="text" id="movil" name="movil"  maxlength="25" size="32" required>
                    </div></td></tr>              
                <tr><td style="width: 5%"></td><td colspan="2">
                    <label for="email">email</label>     
                    <div class="input-group">               
                        <input class="form-control" type="text" id="email" name="email"  maxlength="100" size="70" required>
                    </div></td></tr>                    
                <tr><td style="width: 5%"></td><td>
                    <label for="regimen">Ciudad</label>     
                    <div class="input-group">               
                        <select class="form-control select2" id="ciudad" name="ciudad" required>
                                <option value="" selected>Seleccione Ciudad</option>
                                <?php 
                                foreach($ciudad as $fila)
                                { ?>
                                    <option value="<?=$fila->ciu_codigo?>"><?=$fila->ciu_nombre?></option>
                                <?php
                                }?>
                            </select>
                    </div></td>                    
                <td><label for="regimen">Régimen Tributario</label>     
                    <div class="input-group">               
                        <select class="form-control select2" id="regimen" name="regimen" required>
                                <option value="" selected>Seleccione Régimen</option>
                                <option value="1"  >Régimen Común</option>
                                <option value="2"  >Régimen Simplificado</option>
                                <option value="3"  >Gran Contribuyente</option>
                            </select>
                    </div></td></tr>
                <tr><td style="width: 5%"></td><td>
                    <label for="contacto">Nombre Contacto</label>     
                    <div class="input-group">               
                        <input class="form-control" type="text" id="contacto" name="contacto" maxlength="100" size="30" required>
                    </div></td>
                    <td>
                        <label for="cargo">Cargo del Contacto</label>     
                        <div class="input-group">               
                            <input class="form-control" type="text" id="cargo" name="cargo" maxlength="50" size="32" required>
                        </div></td></tr> 
                <tr><td style="width: 5%"></td><td>
                    <label for="telcon">Telefono del Contacto</label>     
                    <div class="input-group">               
                        <input class="form-control" type="text" id="telcon" name="telcon" maxlength="25" size="30" required>
                    </div></td>
                    <td>    
                        <label for="mailcon">email del Contacto</label>     
                        <div class="input-group">               
                            <input class="form-control" type="text" id="mailcon" name="mailcon" maxlength="100" size="32" required>
                        </div></td></tr>
                <tr><td style="width: 5%"></td><td colspan="2">
                    <label for="catalogo">Elementos Comercializados</label>     
                    <div class="input-group">               
                        <textarea rows="1" cols="70" id="catalogo" name="catalogo" maxlength="250" required></textarea>
                    </div></td></tr>                
            </table>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" onclick="gPro()">Agregar</button>
              </div>              
        </form>
      </div>
    </div>
  </div>
</div> 

<div class='modal fade' id='consultar' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'></div>
<div class='modal fade' id='editar' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'></div>
<script>

    function gPro(){
        alert($("#frmnuevo").serialize());
        if(document.getElementById("id").value !== "" &&
           document.getElementById("nombre").value !== "" &&
           document.getElementById("fijo").value !== "" &&
           document.getElementById("movil").value !== "" &&
           document.getElementById("email").value !== "" &&
           document.getElementById("regimen").value !== "" &&
           document.getElementById("contacto").value !== "" &&
           document.getElementById("cargo").value !== "" &&
           document.getElementById("telcon").value !== "" &&
           document.getElementById("ciudad").value !== "" &&
           document.getElementById("mailcon").value !== ""){
           //$("#agregar").modal("hide");
            $.ajax({
                    url:'<?=site_url();?>/config/nuevoPro',
                    type:'POST',
                    data:$("#frmnuevo").serialize(),
                    success:function(respuesta){
                            alert(respuesta);
                    }
            });
        }
    }
    
     function updatePro(){
     alert("Entra UpdatePro");
        if(document.getElementById("uid").value !== "" &&
           document.getElementById("unombre").value !== "" &&
           document.getElementById("ufijo").value !== "" &&
           document.getElementById("umovil").value !== "" &&
           document.getElementById("uemail").value !== "" &&
           document.getElementById("uregimen").value !== "" &&
           document.getElementById("ucontacto").value !== "" &&
           document.getElementById("ucargo").value !== "" &&
           document.getElementById("utelcon").value !== "" &&
           document.getElementById("uciudad").value !== "" &&
           document.getElementById("umailcon").value !== ""){
           $("#editar").modal("hide");
            $.ajax({
                    url:'<?=site_url();?>/config/editarPro',
                    type:'POST',
                    data:$("#frmEditar").serialize(),
                    success:function(respuesta){
                            alert(respuesta);
                    }
            });
        }
    }   
        
    function mostrarPro(nodo){  
        var nodoTd = nodo.parentNode; //Nodo TD
        var nodoTr = nodoTd.parentNode; //Nodo TR
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var campo = nodosEnTr[0].textContent;
           $.ajax({
            url:"<?=site_url();?>/consulta/consulta_pro",
            type:"POST",
            data:{buscar:campo},
            success:function(respuesta){
               var registros = eval(respuesta);                       
                 for (i=0; i<registros.length; i++) { 
                     if(registros[i]["pvd_tregimen"]==='1'){var reg="Régimen Simplificado";}
                     else if (registros[i]["pvd_tregimen"]==='2') {reg="Regimen Común";}
                     else {reg="Gran Contribuyente";}
                     html ="<div class='modal-dialog' role='document'>"+
                             "<div class='modal-content'>"+
                             "<div class='modal-header'>"+
                             "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+ 
                             "<h4 class='modal-title' id='myModalLabel'>Consultar Cliente</h4>"+
                             "</div>"+
                             "<div class='modal-body'>"+
                             "<table>"+ 
                             "<tr><td style='width: 5%'></td><td>"+    
                             "<label for='id'>No. Identificación</label>"+                
                             "<div class='input-group'>"+   
                             "<input class='form-control' type='text' value='"+registros[i]["pvd_nit"]+"' Readonly>"+ 
                             "</div></td></tr>"+
                             "<tr><td style='width: 5%'></td><td colspan='2'>"+     
                             "<label for='razon'>Nombre/Razón Social</label>"+     
                             "<div class='input-group'>"+               
                             "<input class='form-control' type='text' value="+registros[i]["pvd_razon"]+" size='70' readonly>"+ 
                             "</div></td></tr>"+
                              "<tr><td style='width: 5%'></td><td colspan='2'>"+     
                             "<label for='razon'>Dirección</label>"+     
                             "<div class='input-group'>"+               
                             "<input class='form-control' type='text' value="+registros[i]["pvd_direccion"]+" size='70' readonly>"+ 
                             "</div></td></tr>"+
                             "<tr><td style='width: 5%'></td><td>"+
                             "<label for='fijo'>Teléfono Fijo</label>"+     
                             "<div class='input-group'>"+               
                             "<input class='form-control' type='text' value="+registros[i]["pvd_fijo"]+" readonly>"+
                             "</div></td>"+
                             "<td><label for='movil'>No. Movil</label>"+     
                             "<div class='input-group'>"+               
                             "<input class='form-control' type='text' value="+registros[i]["pvd_movil"]+" readonly>"+
                             "</div></td></tr>"+              
                             "<tr><td style='width: 5%'></td><td colspan='2'>"+     
                             "<label for='razon'>email</label>"+     
                             "<div class='input-group'>"+               
                             "<input class='form-control' type='text' value="+registros[i]["pvd_email"]+" size='70' readonly>"+ 
                             "</div></td></tr>"+                   
                             "<tr><td style='width: 5%'></td><td>"+
                             "<label for='regimen'>Ciudad</label>"+    
                             "<div class='input-group'>"+   
                             "<input class='form-control' type='text' value="+registros[i]["ciu_nombre"]+" readonly>"+
                             "</div></td>"+                    
                             "<td><label>Regimen Tributario</label>"+    
                             "<div class='input-group'>"+   
                             "<input class='form-control' type='text' value="+reg+" readonly>"+
                             "</div></td>"+ 
                             "<tr><td style='width: 5%'></td><td>"+
                             "<label for='contacto'>Nombre Contacto</label>"+     
                             "<div class='input-group'>"+               
                             "<input class='form-control' type='text' value="+registros[i]["pvd_contacto"]+" readonly>"+
                             "</div></td>"+
                             "<td>"+
                             "<label for='cargo'>Cargo del Contacto</label>"+     
                             "<div class='input-group'>"+               
                             "<input class='form-control' type='text' value="+registros[i]["pvd_cargo"]+" readonly>"+
                             "</div></td></tr>"+ 
                             "<tr><td style='width: 5%'></td><td>"+
                             "<label for='telcon'>Telefono del Contacto</label>"+     
                             "<div class='input-group'>"+               
                             "<input class='form-control' type='text' value="+registros[i]["pvd_telcon"]+" readonly>"+
                             "</div></td>"+
                             "<td><label for='mailcon'>email del Contacto</label>"+     
                             "<div class='input-group'>"+               
                             "<input class='form-control' type='text' value="+registros[i]["pvd_mailcon"]+" readonly>"+
                             "</div></td></tr></table>"+                              
                             "<div class='modal-footer'>"+
                             "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>"+
                             "<button class='btn btn-primary' onclick='editarPro("+registros[i]["pvd_nit"]+")'>Editar</button>"+
                             "</div></div></div></div>"; 
                 }
                 $("#consultar").html(html);
                 $("#consultar").modal("show");
                }   
           });
   }
   
    function editarPro(orden){  
        $("#consultar").modal("hide");
           $.ajax({
            url:"<?=site_url();?>/consulta/consulta_pro",
            type:"POST",
            data:{buscar:orden},
            success:function(respuesta){
               var registros = eval(respuesta); 
                 for (i=0; i<registros.length; i++) { 
                     if(registros[i]["pvd_tregimen"]==='1'){var reg="Régimen Simplificado";}
                     else if (registros[i]["pvd_tregimen"]==='2') {reg="Regimen Común";}
                     else {reg="Gran Contribuyente";}
                        html ="<div class='modal-dialog' role='document'>";
                        html+="<div class='modal-content'>";
                        html+="<div class='modal-header'>";
                        html+="<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"; 
                        html+="<h4 class='modal-title' id='myModalLabel'>Consultar Cliente</h4></div>";
                        html+="<div class='modal-body'>";
                        html+="<form id='frmEditar' name='frmEditar' role='form'>";
                        html+="<table><tr><td style='width: 5%'></td><td>";    
                        html+="<label for='id'>No. Identificación</label>";                
                        html+="<div class='input-group'>";   
                        html+="<input class='form-control' type='text' id='uid' name='uid' value='"+registros[i]["pvd_nit"]+"' size='30' required onkeypress='return solonum(event)'>"; 
                        html+="</div></td></tr>";
                        html+="<tr><td style='width: 5%'></td><td colspan='2'>";     
                        html+="<label for='razon'>Nombre/Razón Social</label>";     
                        html+="<div class='input-group'>";               
                        html+="<input class='form-control' type='text' id='unombre' name='unombre' value="+registros[i]["pvd_razon"]+" maxlength='100' size='70' required>"; 
                        html+="</div></td></tr>";
                        html+="<tr><td style='width: 5%'></td><td colspan='2'>"; 
                        html+="<label for='dir'>Dirección</label>";     
                        html+="<div class='input-group'>";               
                        html+="<input class='form-control' type='text' id='udir' name='udir' value="+registros[i]["pvd_direccion"]+" maxlength='100' size='70' required>";
                        html+="</div></td></tr>";
                        html+="<tr><td style='width: 5%'></td><td>";
                        html+="<label for='fijo'>Teléfono Fijo</label>";     
                        html+="<div class='input-group'>";               
                        html+="<input class='form-control' type='text' id='ufijo' name='ufijo' value="+registros[i]["pvd_fijo"]+" maxlength='25' size='30' required>";
                        html+="</div></td>";
                        html+="<td><label for='movil'>No. Movil</label>";     
                        html+="<div class='input-group'>";               
                        html+="<input class='form-control' type='text' id='umovil' name='umovil' value="+registros[i]["pvd_movil"]+" maxlength='25' size='32' required>";
                        html+="</div></td></tr>";              
                        html+="<tr><td style='width: 5%'></td><td colspan='2'>";
                        html+="<label for='email'>email</label>";     
                        html+="<div class='input-group'>";               
                        html+="<input class='form-control' type='text' id='uemail' name='uemail' value="+registros[i]["pvd_email"]+" maxlength='100' size='70' required>";
                        html+="</div></td></tr>";                                  
                        html+="<tr><td style='width: 5%'></td><td>";
                        html+="<label for='regimen'>Ciudad</label>";    
                        html+="<div class='input-group'>";   
                        html+="<input class='form-control' type='text' value="+registros[i]["ciu_nombre"]+">";
                        html+="</div></td>";                  
                        html+="<td><label for='regimen'>Régimen Tributario</label>";     
                        html+="<div class='input-group'>";               
                        html+="<select class='form-control select2' id='uregimen' name='uregimen' required>";
                        html+="<option value="+registros[i]["pvd_tregimen"]+"  selected>"+reg+"</option>";
                        html+="<option value='1'  >Régimen Común</option>";
                        html+="<option value='2'  >Régimen Simplificado</option>";
                        html+="<option value='3'  >Gran Contribuyente</option>";
                        html+="</select></div></td></tr>";
                        html+="<tr><td style='width: 5%'></td><td>";
                        html+="<label for='contacto'>Nombre Contacto</label>";     
                        html+="<div class='input-group'>";               
                        html+="<input class='form-control' type='text' id='ucontacto' name='ucontacto' value="+registros[i]["pvd_contacto"]+" maxlength='50' size='30' required>";
                        html+="</div></td>";
                        html+="<td><label for='cargo'>Cargo del Contacto</label>";    
                        html+="<div class='input-group'>";               
                        html+="<input class='form-control' type='text' id='ucargo' name='ucargo' value="+registros[i]["pvd_cargo"]+" maxlength='50' size='32' required>";
                        html+="</div></td></tr>"; 
                        html+="<tr><td style='width: 5%'></td><td>";
                        html+="<label for='telcon'>Telefono del Contacto</label>";     
                        html+="<div class='input-group'>";               
                        html+="<input class='form-control' type='text' id='utelcon' name='utelcon' value="+registros[i]["pvd_telcon"]+" maxlength='25' size='30' required>";
                        html+="</div></td>";
                        html+="<td><label for='mailcon'>email del Contacto</label>";     
                        html+="<div class='input-group'>";               
                        html+="<input class='form-control' type='text' id='umailcon' name='umailcon' value="+registros[i]["pvd_mailcon"]+" maxlength='100' size='32' required>";
                        html+="</div></td></tr></table>";                              
                        html+="<div class='modal-footer'>";
                        html+="<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
                        html+="<button class='btn btn-primary' onclick='updatePro()'>Guardar</button>";
                        html+="</div></form></div></div></div>";
                  }
                 $("#editar").html(html);
                 $("#editar").modal("show");
                }   
           });
   }

function solonum(e){

      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key);
      numeros="0123456789";
      especiales = "8-37-39-46";

      tecla_especial = false;
      for(var i in especiales){
           if(key === especiales[i]){
               tecla_especial = true;
               break;
           }
       }
       if(numeros.indexOf(tecla)===-1 && !tecla_especial){
           return false;
       }
   } 
</script>