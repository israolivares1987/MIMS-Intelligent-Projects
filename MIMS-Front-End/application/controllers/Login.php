<?php
class Login extends CI_Controller{
  
  function __construct(){
    parent::__construct(); 
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

    $base_url_servicios = $this->config->item('BASE_SERVICIOS');


    $api_url = $base_url_servicios."Login/validateUser";

    $form_data = array(
        'user_name'		=>$user_name,
        'password'		=>$password,
        'cod_emp'		  =>$cod_emp
    );

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    $json = $response;
    $obj = json_decode($json);
        
        
    if($obj->{'Error'} ==='0'){

          if ($obj->{'estado'} ==='0'){


            echo $this->session->set_flashdata('msg',$obj->{'DescripcionError'} );
            redirect('login');

          }else{

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
              'id_usuario'        => $obj->{'id_usuario'}
              );

              $this->session->set_userdata($sesdata);
              // busca pagina de inicio segun Rol de usuario
          
              $rol_id    = $obj->{'rol_id'};
              
              $api_url_rol = $base_url_servicios."Login/validateUserRol";
  
              $form_data_rol = array(
                    'rol_id'		=>$rol_id
              );
  
              $client = curl_init($api_url_rol);
  
              curl_setopt($client, CURLOPT_POST, true);
  
              curl_setopt($client, CURLOPT_POSTFIELDS, $form_data_rol);
  
              curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  
              $response_rol = curl_exec($client);
  
              curl_close($client);
  
              $json_rol = $response_rol;
              $obj_rol = json_decode($json_rol);

              redirect($obj_rol->{'pagina_inicio'});

        
        }
            
              
    
    }else{

        echo $this->session->set_flashdata('msg',$obj->{'DescripcionError'});
        redirect('login');
    }
  }

  function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }

}

?>