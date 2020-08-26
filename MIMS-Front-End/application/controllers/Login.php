<?php
class Login extends CI_Controller{
  
  function __construct(){
    parent::__construct(); 
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosDominios');

  }

  function index(){
            
    if($this->session->userdata('logged_in') !== TRUE){
              
        $this->session->sess_destroy();
        $this->load->view('login_view');
    
    }else{
        
        if($this->session->userdata('rol_id')==='201'){
          redirect('Activador/index_activador');
        }elseif ($this->session->userdata('rol_id')==='202') {
          redirect('Activador/index_activador');
        }elseif ($this->session->userdata('rol_id')==='203') {
          redirect('Calidad/index_calidad');
        }elseif ($this->session->userdata('rol_id')==='204') {
          redirect('Ingenieria/index_ingenieria');
        }

      }
  }

  function auth(){
    
    $user_name    = $this->input->post('user_name',TRUE);
    $password     = md5($this->input->post('password',TRUE));
    $cod_emp      = $this->input->post('cod_emp',TRUE);

    if($this->session->userdata('logged_in') == TRUE){
            $sessionData=$this->session->all_userdata();
            $userId = $sessionData['id_usuario'];

            if ($userId > 0){

              echo $this->session->set_flashdata('msg','Usuario ya se encuentra logueado, favor cerrar sesion o esperar 5 min para acceder.');
              redirect('login');
            }
    }else{
  
        $json = $this->callexternosconsultas->iniciosesion($user_name,$password,$cod_emp);
        $obj = json_decode($json);
            
            
        if($obj->{'Error'} ==='0'){

              if ($obj->{'estado'} ==='0'){


                echo $this->session->set_flashdata('msg',$obj->{'DescripcionError'} );
                redirect('login');

              }else{


                //Obtiene Valor IVA
                $datoIva     = $this->callexternosdominios->obtieneDatosRef('VALOR_IVA');

                foreach (json_decode($datoIva) as $llave => $valor) {
                
                $datoIva =$valor->domain_id;
            
              }

                $sesdata = array(
                  'nombres'           => $obj->{'nombres'},
                  'paterno'           => $obj->{'paterno'},
                  'materno'           => $obj->{'materno'},
                  'n_usuario'         => $obj->{'n_usuario'},
                  'email'             => $obj->{'email'},
                  'rol_id'            => $obj->{'rol_id'},
                  'estado'            => $obj->{'estado'},
                  'Error'             => $obj->{'Error'} ,
                  'DescripcionError'  => $obj->{'DescripcionError'} ,
                  'logged_in'         => TRUE,
                  'icono'             => $obj->{'icono'},
                  'avatar'            => $obj->{'avatar'},
                  'nombre_rol'        => $obj->{'nombre_rol'},
                  'cod_emp'           => $cod_emp,
                  'id_usuario'        => $obj->{'id_usuario'},
                  'cod_user'        => $obj->{'cod_user'},
                  'valor_iva'      => $datoIva
                  );

                  $this->session->set_userdata($sesdata);
                  // busca pagina de inicio segun Rol de usuario
              
                  $rol_id    = $obj->{'rol_id'};
                  $json_rol =  $this->callexternosconsultas->validateUserRol($rol_id);
                  $obj_rol = json_decode($json_rol);
                  $sessionId =session_id();

                  $dataSession = $this->callexternosconsultas->setSession($obj->{'cod_user'}, $sessionId);

                  redirect($obj_rol->{'pagina_inicio'});

            
            }
                
              
        
        }else{

            echo $this->session->set_flashdata('msg',$obj->{'DescripcionError'});
            redirect('login');
        }
    }
  }

  function logout(){


    $sessionData=$this->session->all_userdata();
    $userId = $sessionData['cod_user'];
    $this->session->sess_destroy();
    redirect('login');
  }

}

?>