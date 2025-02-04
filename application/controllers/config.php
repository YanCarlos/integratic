<?php
  
   class Config extends CI_Controller {	
    public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form','url','html')); 
         $this->load->model('general_model');
         $this->load->model('config_model');
         $this->load->model('consultas_model');
         $this->load->library('upload');
      }
    public function nuevoMenu(){

         if (!empty($_FILES['archivomenu']['name'])){
            $datos = array(
                "nombre"        => $this->input->post("nombremenu"),
                "nivel"         => '1',
                "nivel_sup"     => '1',
                "orden"         => $this->input->post("posicion"),
                "tipo"          => $this->input->post("tipoenlace"),
                "enlace"        => $this->input->post("enlace"),
                "areas"         => strtoupper($this->input->post("areas")),
                "descripcion"   => strtoupper($this->input->post("titulo")),
                "icono"         => $_FILES["archivomenu"]['name']
             );

            if($this->general_model->insertar("cfg_menuad",$datos)==true){
                 echo json_encode("Creado Satisfactoriamente!");}
            else { echo ("No se pudo guardar los datos");} 
         }else { echo json_encode("Nada");}
    }
    public function nuevoArea(){
        date_default_timezone_set ('America/Bogota');        
         if (!empty($_FILES['archivo']['name'])){
            $nom        = $this->input->post("nomarea");
            $tipo       = $this->input->post("tipo");
            $fecha      = date('Y-m-d');
            $ico        = $_FILES["archivo"]['name'];

            $datos = array(
                "nomarea"   => $nom,
                "tipo"      => 'areas',
                "icoarea"   => $ico,
                "fecha"     => $fecha
             );

            if($this->general_model->insertar("cfg_areas",$datos)==true){
                $dir=utf8_decode('./principal/areas/'.$nom);
                if (!is_dir($dir)) { mkdir($dir, 0777); } 
                 echo json_encode("Area creada!");}
            else { echo ("No se pudo guardar los datos");} 
         }else { echo json_encode("Nada");}
    }
    
    public function nuevoMateria(){
        date_default_timezone_set ('America/Bogota');
         if (!empty($_FILES['archivomat']['name'])){
             
             $nom        = $this->input->post("nommateria");
             $area       = $this->input->post("areasmat");
             $grado       = $this->input->post("grado");
             $fecha      = date('Y-m-d');
             $ico        = $_FILES["archivomat"]['name'];

            $datos = array(
                "area"          => $area,
                "nommateria"    => $nom,
                "grado"         => $grado,
                "icomateria"    => $ico,
                "fecha"         => $fecha
             );            
            $nomarea=$this->general_model->co_nomarea($area);
            foreach($nomarea as $row){$narea=$row->nomarea;}            
            if($this->general_model->insertar("cfg_materias",$datos)==true){
                //$dir=utf8_decode('./principal/areas/'.$narea.'/'.$nom.$grado);
                $dir='./principal/areas/'.$narea.'/'.$nom.$grado;
                if(!is_dir($dir)){mkdir($dir,0777);}
                 echo json_encode("Materia creada!");}
            else { echo ("No se pudo guardar los datos");} 
         }else { echo json_encode("Nada");}
    } 
    public function nuevoProyecto(){
        date_default_timezone_set ('America/Bogota');
         if (!empty($_FILES['icopro']['name'])){
            $nom        = $this->input->post("nomproyecto");
            $ico        = $_FILES["icopro"]['name'];

            $datos = array(
                "nomproyecto"   => $nom,
                "icono"         => $ico
             );

            if($this->general_model->insertar("cfg_proyectos",$datos)==true){
                $dir=utf8_decode('./principal/proyectos/'.$nom);
                if (!is_dir($dir)) { mkdir($dir, 0777); } 
                 echo json_encode($ico);}
            else { echo ("No se pudo guardar los datos");} 
         }else { echo json_encode("Nada");}
    }    
    public function nuevoProceso(){
        date_default_timezone_set ('America/Bogota');
         if (!empty($_FILES['icoproc']['name'])){
            $nom        = $this->input->post("nomproc");
            $ico        = $_FILES["icoproc"]['name'];
            $datos = array(
                "nomproceso"   => $nom,
                "icono"        => $ico
             );
            if($this->general_model->insertar("cfg_procesos",$datos)==true){
                $dir=utf8_decode('./principal/procesos/'.$nom);
                if (!is_dir($dir)) { mkdir($dir, 0777); } 
                 echo json_encode($ico);}
            else { echo ("No se pudo guardar los datos");} 
         }else { echo json_encode("Nada");}
    }     
public function bo_area(){ 
$conta=0; 
         if ($this->input->is_ajax_request()) {
             $id = $this->input->post("id");
             $mat=$this->consultas_model->mat_area($id); 
             foreach($mat as $row){$conta=1;} 
             if($conta==0){
                    $conn=$this->config_model->bo_area($id); 
                    echo json_encode('Area Borrada!');  
                }
             else{echo json_encode('NO Borrado! Verifique si existen materias'); }   
         }
         else{show_404();}
     }  
public function bo_materia(){  
         if ($this->input->is_ajax_request()) {
             $id = $this->input->post("id");
             $conn=$this->config_model->bo_materia($id); 
              echo json_encode($conn);  
         }
         else{show_404();}
     } 
public function bo_proyecto(){  
         if ($this->input->is_ajax_request()) {
             $id = $this->input->post("id");
             $conn=$this->config_model->bo_proyecto($id); 
              echo json_encode($conn);  
         }
         else{show_404();}
     }     
public function bo_proceso(){  
         if ($this->input->is_ajax_request()) {
             $id = $this->input->post("id");
             $conn=$this->config_model->bo_proceso($id); 
              echo json_encode($conn);  
         }
         else{show_404();}
     }      
public function bo_usr(){  
         if ($this->input->is_ajax_request()) {
             $id = $this->input->post("id");
             $conn=$this->config_model->bo_usr($id); 
              echo json_encode($conn);  
         }
         else{show_404();}
     }      
public function bo_menuad(){  
         if ($this->input->is_ajax_request()) {
             $id = $this->input->post("id");
             $conn=$this->config_model->bo_menuad($id); 
              echo json_encode($conn);  
         }
         else{show_404();}
     }      
public function up_area(){  
         if ($this->input->is_ajax_request()) {
            date_default_timezone_set ('America/Bogota'); 
            $cod        = $this->input->post("ucodarea");
            $nom        = $this->input->post("unomarea");
            $fecha      = date('Y-m-d');
            $ico        = $_FILES["uicoarea"]['name'];
            
          $this->config_model->up_area($cod,$nom,$ico,$fecha);
          echo json_encode($ico);
         }
         else{show_404();}       
     }    
public function up_materia(){  
         if ($this->input->is_ajax_request()) {
            date_default_timezone_set ('America/Bogota'); 
            $cod        = $this->input->post("ucodmat");
            $nom        = $this->input->post("unommat");
            $gra        = $this->input->post("ugramat");
            $fecha      = date('Y-m-d');
            $ico        = $_FILES["uicomat"]['name'];
            
          $this->config_model->up_materia($cod,$nom,$gra,$ico,$fecha);
          echo json_encode($ico);
         }
         else{show_404();}       
     }   
public function up_proyecto(){  
         if ($this->input->is_ajax_request()) {
            date_default_timezone_set ('America/Bogota'); 
            $cod        = $this->input->post("ucodigo");
            $nom        = $this->input->post("unombre");
            $ico        = $_FILES["uicono"]['name'];
            
          $this->config_model->up_proyecto($cod,$nom,$ico);
          echo json_encode($ico);
         }
         else{show_404();}        
     }   
public function up_proceso(){  
         if ($this->input->is_ajax_request()) {
            date_default_timezone_set ('America/Bogota'); 
            $cod        = $this->input->post("ucodigo");
            $nom        = $this->input->post("unombre");
            $ico        = $_FILES["uicono"]['name'];
            
          $this->config_model->up_proceso($cod,$nom,$ico);
          echo json_encode($ico);
         }
         else{show_404();}       
     }      
public function up_usuario(){  
         if ($this->input->is_ajax_request()) {
            date_default_timezone_set ('America/Bogota'); 
            $cod        = $this->input->post("ucod");
            $nom        = $this->input->post("unom");
            $ape        = $this->input->post("uape");
            $car        = $this->input->post("ucar");
            $rol        = $this->input->post("urol");
            $cel        = $this->input->post("ucel");
            $usr        = $this->input->post("uusr");
            $pas        = $this->input->post("upas");
          $this->config_model->up_usuario($cod,$nom,$ape,$car,$rol,$cel,$usr,$pas);
          echo json_encode($ico);
         }
         else{show_404();}       
     }  
public function up_menu(){  
         if ($this->input->is_ajax_request()) {
            date_default_timezone_set ('America/Bogota'); 
            $cod        = $this->input->post("uid");
            $nom        = $this->input->post("unombre");
            $ord        = $this->input->post("uorden");
            $tipo       = $this->input->post("utipo");
            $link       = $this->input->post("ulink");
            $ico        = $this->input->post("uicono");
          $this->config_model->up_menu($cod,$nom,$ord,$tipo,$link,$ico);
          echo json_encode($ico);
         }
         else{show_404();}       
     }      
public function co_menu(){  
         if ($this->input->is_ajax_request()) {
             $con=$this->config_model->con_menu(); 
              echo json_encode($con);  
         }
         else{show_404();}
     }      
public function co_menupri_fil($filtro){ 
      $con=''; 
      $con=$this->config_model->con_menupri_fil($filtro); 
      echo json_encode($con);  
     }  
public function co_menuadd_fil($filtro){  
      $con='';
      $con=$this->config_model->con_menuadd_fil($filtro); 
      echo json_encode($con);  
     }              
}