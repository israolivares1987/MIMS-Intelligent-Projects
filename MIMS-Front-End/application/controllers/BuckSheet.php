<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class BuckSheet extends MY_Controller
{



  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('CSVReader');
    $this->load->library('CallExternosClientes');
    $this->load->library('CallExternosProyectos');
    $this->load->library('CallExternosConsultas');
    $this->load->library('CallExternosJournal');
    $this->load->library('CallExternosEmpleados');
    $this->load->library('CallExternosOrdenes');
    $this->load->library('CallExternosOrdenesItem');
    $this->load->library('CallExternosBuckSheet');
    $this->load->library('CallExternosDominios');

    $this->load->library('CallExternosBitacora');

    $this->load->helper('file');
    $this->load->helper('url');
    $this->load->library('CallUtil');

    if ($this->session->userdata('logged_in') !== TRUE) {
      redirect('login');
    }
  }



  function listaBucksheet($id_orden_compra, $id_cliente, $id_proyecto)
  {


    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $menu = $this->callutil->armaMenuClientes($response);
    $datos['arrClientes'] = $menu;
    $countAdverCalidad = 0;
    $countDespachos = 0;
    $countTotalWpanel= 0;
    $fecha_hoy = date_create()->format('Y-m-d');
    $countAtrasados =0;
    $countAdverActivacion = 0;




    //Obtiene Datos Orden

    $Orden = $this->callexternosordenes->obtieneOrden($id_proyecto, $id_cliente, $id_orden_compra, $codEmpresa);


    $arrOrden = json_decode($Orden);


    if ($arrOrden) {

      foreach ($arrOrden as $llave => $valor) {

        $PurchaseOrderID = $valor->PurchaseOrderID;
        $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
        $PurchaseOrderDescription = $valor->PurchaseOrderDescription;
      }

      //Obtiene Datos Proyecto

      $Proyecto = $this->callexternosproyectos->obtieneProyecto($id_proyecto, $id_cliente);


      $arrProyecto = json_decode($Proyecto);

      if ($arrProyecto) {

        foreach ($arrProyecto as $llave => $valor) {

          $DescripcionProyecto = $valor->NombreProyecto;
        }
      }

      // Obtiene Datos Cliente

      $responseCliente = $this->callexternosclientes->obtieneCliente($id_cliente);

      $arrCliente = json_decode($responseCliente);

      if ($arrCliente) {

        foreach ($arrCliente as $key => $value) {


          $nombreCliente =  $value->nombreCliente;
          $razonSocial  =   $value->razonSocial;
        }
      }


      $datoarchivo     = $this->callexternosdominios->obtieneDatosRef('NOMBRE_ARCHIVO_EJEMPLO');

      foreach (json_decode($datoarchivo) as $llave => $valor) {

        $nombreArchivoEjemplo = $valor->domain_desc;
      }


      $datoap   = $this->callexternosdominios->obtieneDatosRef('ACTUAL_PREVIO');
      $select_ap = "";
      foreach (json_decode($datoap) as $llave => $valor) {

        $select_ap .= '<option value="' . $valor->domain_id . '">' . $valor->domain_desc . '</option>';
      }

    //contar advertencias de calidad
      $journal = $this->callexternosjournal->obtienejournal($id_orden_compra,1,$id_cliente);
      $arrJournal = json_decode($journal);     
       if ($arrJournal) {
           foreach ($arrJournal as $key => $value) {
            if($value->cod_tipo_interaccion === '16'){
              $countAdverCalidad++;
            }
            
          }
       }

         //contar advertencias de activacion
      $journalactivacion = $this->callexternosjournal->obtienejournal($id_orden_compra,2,$id_cliente);
      $arrJournalActivacion = json_decode($journalactivacion);     
       if ($arrJournalActivacion) {
           foreach ($arrJournalActivacion as $key => $value) {
            if($value->cod_tipo_interaccion === '14'){
              $countAdverActivacion++;
            }
            
          }
       }


       //contar despachos, atrasos
       
       $bucksheet = $this->callexternosbucksheet->obtieneBucksheet($codEmpresa,$id_orden_compra);


       $arrBucksheet = json_decode($bucksheet);
   

       if ($arrBucksheet) {
   
         foreach ($arrBucksheet as $key => $value) {
   
          if ($value->TIPO_DE_LINEA==='ACTIVABLE') {

            $countTotalWpanel++;
          }
          if (!empty($value->FECHA_EMBARQUE) && !empty($value->PACKINGLIST)) {

            $countDespachos++;
          }


        

          if ( $this->callutil->diasDiffFechaswpanel($value->FECHA_TCF,$fecha_hoy) < 0 && $value->PA_TCF == 'PROGRAMADO' && $value->TIPO_DE_LINEA == 'ACTIVABLE') {

            $countAtrasados++;
          }
  
          if ( $this->callutil->diasDiffFechaswpanel($value->FECHA_COMIENZO_FABRICACION,$fecha_hoy)  < 0 && $value->PA_FCF == 'PROGRAMADO' && $value->TIPO_DE_LINEA == 'ACTIVABLE') {

            $countAtrasados++;
          }

      

          if ($this->callutil->diasDiffFechaswpanel($value->FECHA_TERMINO_FABRICACION,$fecha_hoy)  < 0 &&  $value->PA_FTF == 'PROGRAMADO' && $value->TIPO_DE_LINEA == 'ACTIVABLE') {
            $countAtrasados++;
          }

          if ($this->callutil->diasDiffFechaswpanel($value->FECHA_PINTURA,$fecha_hoy) < 0  && $value->PA_FP == 'PROGRAMADO' && $value->TIPO_DE_LINEA == 'ACTIVABLE') {

            $countAtrasados++;
          }

          if ($this->callutil->diasDiffFechaswpanel($value->FECHA_LISTO_INSPECCION,$fecha_hoy)  < 0  && $value->PA_FLI == 'PROGRAMADO' && $value->TIPO_DE_LINEA == 'ACTIVABLE') {

            $countAtrasados++;
          }

          if ($this->callutil->diasDiffFechaswpanel($value->FECHA_GRANALLADO,$fecha_hoy)  < 0  && $value->PA_FG == 'PROGRAMADO' && $value->TIPO_DE_LINEA == 'ACTIVABLE') {

            $countAtrasados++;
          }

          if ($this->callutil->diasDiffFechaswpanel($value->FECHA_SALIDA_FABRICA,$fecha_hoy)  < 0  && $value->PA_FSF == 'PROGRAMADO' && $value->TIPO_DE_LINEA == 'ACTIVABLE') {

            $countAtrasados++;
          }


          

         }
       } 



       
      $datos['countAdverActivacion'] = $countAdverActivacion; 
      $datos['countAtrasados'] = $countAtrasados; 
      $datos['countTotalWpanel'] = $countTotalWpanel; 
      $datos['countDespachos'] = $countDespachos;
      $datos['countAdverCalidad'] = $countAdverCalidad;
      $datos['select_ap'] = $select_ap;
      $datos['nombreArchivoEjemplo'] = $nombreArchivoEjemplo;
      $datos['PurchaseOrderID'] = $PurchaseOrderID;
      $datos['PurchaseOrderDescription'] = $PurchaseOrderDescription;
      $datos['idCliente'] = $id_cliente;
      $datos['codProyecto'] = $id_proyecto;
      $datos['DescripcionProyecto'] = $DescripcionProyecto;
      $datos['nombreCliente'] = $nombreCliente;
      $datos['razonSocial'] = $razonSocial;
      $datos['PurchaseOrderNumber'] = $PurchaseOrderNumber;



      if ($this->session->userdata('rol_id') === '202') {


        $this->plantilla_activador('activador/listaBuckSheet', $datos);
      } elseif ($this->session->userdata('rol_id') === '203') {

        $this->plantilla_calidad('calidad/listaBuckSheet', $datos);
      } elseif ($this->session->userdata('rol_id') === '204') {

        $this->plantilla_ingenieria('ingenieria/listaBuckSheet', $datos);
      } elseif ($this->session->userdata('rol_id') === '205') {

        $this->plantilla_supervisor('supervisor/listaBuckSheet', $datos);
      }
    }
  }


  public function save()
  {

    $data = array();
    $memData = array();
    $error_msg = "";
    $insertCount = 0;
    $updateCount = 0;
    $errorCount = 0;
    $rowCount = 0;
    $codEmpresa = $this->session->userdata('cod_emp');
    $response = $this->callexternosproyectos->obtieneMenuProyectos($codEmpresa);
    $menu = $this->callutil->armaMenuClientes($response);
    $datos['arrClientes'] = $menu;

    $idOrden = $this->input->post('idOrden');
    $idCliente = $this->input->post('idCliente');
    $idProyecto = $this->input->post('idProyecto');
    $error = 0;
    $idmensaje = 0;


    $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');


    //Obtiene Datos Orden

    $Orden = $this->callexternosordenes->obtieneOrden($idProyecto, $idCliente, $idOrden, $codEmpresa);


    $arrOrden = json_decode($Orden);


    if ($arrOrden) {

      foreach ($arrOrden as $llave => $valor) {

        $SupplierName = $valor->SupplierName;
        $PurchaseOrderID = $valor->PurchaseOrderID;
        $PurchaseOrderDescription = $valor->PurchaseOrderDescription;
        $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
      }
    }


    if ($this->form_validation->run() == false) {

      $error_msg = 'Archivo invalido, favor seleccionar archivo CSV.';
      $resp = false;
    } else {
      // If file uploaded
      if (is_uploaded_file($_FILES['fileURL']['tmp_name'])) {
        // Parse data from CSV file
        $csvData = $this->csvreader->parse_csv($_FILES['fileURL']['tmp_name']);



        // create array from CSV file
        if (!empty($csvData)) {


          //Carga Bitacora

          $insert_bitacora = array(
            'codEmpresa' => $this->session->userdata('cod_emp'),
            'accion'  => 'SUBE_WPANEL',
            'id_registro' => '0',
            'usuario'  =>  $this->session->userdata('n_usuario'),
            'rol' =>   $this->session->userdata('nombre_rol'),
            'objeto'  => 'WPANEL',
            'fechaCambio' =>  date_create()->format('Y-m-d')
          );

          $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);


          $filename = $_FILES["fileURL"]["tmp_name"];
          $handle = fopen($filename, "r");
          $data = fgetcsv($handle, 500, ";");
          $ids = array();
          $repetidos[]= null;

          $i = 0;
          while (($data = fgetcsv($handle, 500, ";")) !== FALSE) {
            $i++;

            if (!in_array($data[6], $ids)) {
              $ids[] = $data[6];
            } else {
              $repetidos[] = $data[6];
            }
          }
          fclose($handle);

          $fecha_hoy = date_create()->format('Y-m-d');
          $idError = date_create()->format('YmdHis');

          foreach ($csvData as $row) {

            $error = 0;

            $rowCount++;


                // Ordenes ITEM
              $ordenesItem = $this->callexternosordenesitem->obtieneItemOrdenes($idOrden,$idProyecto,$idCliente);

              $arrOrdenesItem = json_decode($ordenesItem);
              $count_item = '0';

                if($arrOrdenesItem){
              
                  foreach ($arrOrdenesItem as $key => $value) {
                    
                    $item_id = $value->id_item;

                    if($item_id === $row['ITEM_OC']) {

                      $count_item = '1';
                    }
                  }
                }





            if (strlen($row['REVISION']) < 1 || $row['REVISION'] === "" || isset($row['REVISION']) || empty($row['REVISION']) || is_null($row['Revision'])) {

              $revision = '0';
            } else {

              $revision = $row['REVISION'];
            }

           



            //valida fechas


            if ($row['ID_OC'] != $idOrden) {
                $idmensaje = 3;

               
                $this->insertar_error($idError, $idmensaje, 'ID_OC', $row);
                $error++;
                $errorCount++;
            }else{

              if ($count_item === '0' ){
              
                $idmensaje = 4;

                $this->insertar_error($idError, $idmensaje,'ITEM_OC',$row);
                $error++;
                $errorCount++;

              }else{ 

           
                  if ($this->callutil->validarFecha($row['FECHA_LINEA_BASE'])){
                
                  } else {
                    $idmensaje = 2;

                    $this->insertar_error($idError, $idmensaje,'FECHA_LINEA_BASE', $row);
                    $error++;
                    $errorCount++;

                  }

                  if ($this->callutil->validarFecha($row['FECHA_COMIENZO_FABRICACION'])){
                
                  } else {
                    $idmensaje = 2;

                    $this->insertar_error($idError, $idmensaje,'FECHA_COMIENZO_FABRICACION', $row);
                    $error++;
                    $errorCount++;

                  }
                  if ($this->callutil->validarFecha($row['FECHA_TERMINO_FABRICACION'])){
                
                  } else {
                    $idmensaje = 2;

                    $this->insertar_error($idError, $idmensaje, 'FECHA_TERMINO_FABRICACION',$row);
                    $error++;
                    $errorCount++;

                  }

                  if ($this->callutil->validarFecha($row['FECHA_GRANALLADO'])){
                
                  } else {
                    $idmensaje = 2;

                    $this->insertar_error($idError, $idmensaje,'FECHA_GRANALLADO', $row);
                    $error++;
                    $errorCount++;

                  }

                  if ($this->callutil->validarFecha($row['FECHA_PINTURA'])){
                
                  } else {
                    $idmensaje = 2;

                    $this->insertar_error($idError, $idmensaje, 'FECHA_PINTURA',$row);
                    $error++;
                    $errorCount++;

                  }

                  if ($this->callutil->validarFecha($row['FECHA_LISTO_INSPECCION'])){
                
                  } else {
                    $idmensaje = 2;

                    $this->insertar_error($idError, $idmensaje,'FECHA_LISTO_INSPECCION', $row);
                    $error++;
                    $errorCount++;

                  }
                  if ($this->callutil->validarFecha($row['FECHA_SALIDA_FABRICA'])){
                
                  } else {
                    $idmensaje = 2;

                    $this->insertar_error($idError, $idmensaje,'FECHA_SALIDA_FABRICA', $row);
                    $error++;
                    $errorCount++;

                  }

                  if ($this->callutil->validarFecha($row['FECHA_EMBARQUE'])){
                
                  } else {
                    $idmensaje = 2;

                    $this->insertar_error($idError, $idmensaje,'FECHA_EMBARQUE', $row);
                    $error++;
                    $errorCount++;

                  }

                  if ($this->callutil->validarFecha($row['FECHA_TC'])){
                
                  } else {
                    $idmensaje = 2;

                    $this->insertar_error($idError, $idmensaje, 'FECHA_TC',$row);
                    $error++;
                    $errorCount++;

                  }

                  if ($this->callutil->validarFecha($row['FECHA_TP'])){
                
                  } else {
                    $idmensaje = 2;

                    $this->insertar_error($idError, $idmensaje,'FECHA_TP', $row);
                    $error++;
                    $errorCount++;

                  }

                  if ($this->callutil->validarFecha($row['FECHA_TCF'])){
                
                  } else {
                    $idmensaje = 2;

                    $this->insertar_error($idError, $idmensaje,'FECHA_TCF',$row);
                    $error++;
                    $errorCount++;

                  }


                  if (in_array($row['NUMERO_DE_LINEA'], $repetidos)) {

                          $idmensaje = 1;
                          $this->insertar_error($idError, $idmensaje,'NUMERO_DE_LINEA', $row);
                          $error++;
                          $errorCount++;
                        } else {

                        

                          if ($error == 0) {

                            $prevCount = $this->callexternosbucksheet->getRows($idOrden, $row['NUMERO_DE_LINEA']);

                  

                            if ($prevCount > 0) {

                              $EstadoLineaBucksheet = '1';
                              
                              if (!$this->callutil->validanull($row['FECHA_TCF']) && $row['PA_TCF'] == 'ACTUAL') {

                                $EstadoLineaBucksheet = '7';
                              }
                             
                              
                              if ($this->callutil->validanull($row['FECHA_COMIENZO_FABRICACION']) && $row['PA_FCF'] == 'ACTUAL') {

                                $EstadoLineaBucksheet = '2';
                              }

                              if (!empty($row['FECHA_TERMINO_FABRICACION']) && $row['PA_FTF'] == 'ACTUAL') {

                                $EstadoLineaBucksheet = '3';
                              }

                              if (!empty($row['FECHA_PINTURA']) && $row['PA_FP'] == 'ACTUAL') {

                                $EstadoLineaBucksheet = '6';
                              }



                              if (!empty($row['FECHA_LISTO_INSPECCION']) && $row['PA_FLI'] == 'ACTUAL') {

                                $EstadoLineaBucksheet = '4';
                              }

                              if (!empty($row['FECHA_EMBARQUE']) && !empty($row['PACKINGLIST'])) {

                                $EstadoLineaBucksheet = '5';
                              }
                            } else {

                              $EstadoLineaBucksheet = '1';
                              
                              if (!empty($row['FECHA_TCF']) && $row['PA_TCF'] == 'ACTUAL') {

                                $EstadoLineaBucksheet = '7';
                              }


                              if ($this->callutil->validanull($row['FECHA_COMIENZO_FABRICACION']) && $row['PA_FCF'] == 'ACTUAL') {

                                $EstadoLineaBucksheet = '2';
                              }

                              if (!empty($row['FECHA_TERMINO_FABRICACION']) && $row['PA_FTF'] == 'ACTUAL') {

                                $EstadoLineaBucksheet = '3';
                              }

                              if (!empty($row['FECHA_PINTURA']) && $row['PA_FP'] == 'ACTUAL') {

                                $EstadoLineaBucksheet = '6';
                              }



                              if (!empty($row['FECHA_LISTO_INSPECCION']) && $row['PA_FLI'] == 'ACTUAL') {

                                $EstadoLineaBucksheet = '4';
                              }

                              if (!empty($row['FECHA_EMBARQUE']) && !empty($row['PACKINGLIST'])) {

                                $EstadoLineaBucksheet = '5';
                              }
                            }

                            

                            $memData = array(
                              'COD_EMPRESA' =>  $codEmpresa,
                              'ID_OC' => $row['ID_OC'],
                              'NUMERO_OC' => urldecode($PurchaseOrderNumber),
                              'DESCRIPCION_OC' => urldecode($PurchaseOrderDescription),
                              'ITEM_OC' => $row['ITEM_OC'],
                              'SUB_ITEM_OC' => $row['SUB_ITEM_OC'],
                              'PROVEEDOR' => urldecode($SupplierName),
                              'NUMERO_DE_LINEA' => $row['NUMERO_DE_LINEA'],
                              'TIPO_DE_LINEA' => $row['TIPO_DE_LINEA'],
                              'ESTADO_DE_LINEA' => $EstadoLineaBucksheet,
                              'NUMERO_DE_TAG' => $row['NUMERO_DE_TAG'],
                              'STOCKCODE' => $row['STOCKCODE'],
                              'DESCRIPCION_LINEA' => $row['DESCRIPCION_LINEA'],
                              'NUMERO_DE_ELEMENTOS' => $row['NUMERO_DE_ELEMENTOS'],
                              'CANTIDAD_UNITARIA' => $row['CANTIDAD_UNITARIA'],
                              'CANTIDAD_TOTAL' => $row['CANTIDAD_TOTAL'],
                              'UNIDAD' => $row['UNIDAD'],
                              'TRANSMITTAL_CLIENTE' => $row['TRANSMITTAL_CLIENTE'],
                              'FECHA_TC' => $this->callutil->formatoFecha($row['FECHA_TC']),
                              'TRANSMITTAL_PROVEEDOR' => $row['TRANSMITTAL_PROVEEDOR'],
                              'FECHA_TP' => $this->callutil->formatoFecha($row['FECHA_TP']),
                              'TRANSMITTAL_CLIENTE_FINAL' => $row['TRANSMITTAL_CLIENTE_FINAL'],
                              'FECHA_TCF' => $this->callutil->formatoFecha($row['FECHA_TCF']),
                              'PA_TCF' => $row['PA_TCF'],
                              'NUMERO_DE_PLANO' => $row['NUMERO_DE_PLANO'],
                              'REVISION' => $row['REVISION'],
                              'PAQUETE_DE_CONSTRUCCION_AREA' => $row['PAQUETE_DE_CONSTRUCCION_AREA'],
                              'FECHA_LINEA_BASE' => $this->callutil->formatoFecha($row['FECHA_LINEA_BASE']),
                              'DIAS_ANTES_LB' => $this->callutil->diasDiffFechas($row['FECHA_LINEA_BASE'], $fecha_hoy),
                              'FECHA_COMIENZO_FABRICACION' => $this->callutil->formatoFecha($row['FECHA_COMIENZO_FABRICACION']),
                              'PA_FCF' => $row['PA_FCF'],
                              'FECHA_TERMINO_FABRICACION' =>$this->callutil->formatoFecha($row['FECHA_TERMINO_FABRICACION']),
                              'PA_FTF' => $row['PA_FTF'],
                              'FECHA_GRANALLADO' => $this->callutil->formatoFecha($row['FECHA_GRANALLADO']),
                              'PA_FG' => $row['PA_FG'],
                              'FECHA_PINTURA' => $this->callutil->formatoFecha($row['FECHA_PINTURA']),
                              'PA_FP' => $row['PA_FP'],
                              'FECHA_LISTO_INSPECCION' => $this->callutil->formatoFecha($row['FECHA_LISTO_INSPECCION']),
                              'PA_FLI' => $row['PA_FLI'],
                              'ACTA_LIBERACION_CALIDAD' => $row['ACTA_LIBERACION_CALIDAD'],
                              'FECHA_SALIDA_FABRICA' => $this->callutil->formatoFecha($row['FECHA_SALIDA_FABRICA']),
                              'PA_FSF' => $row['PA_FSF'],
                              'FECHA_EMBARQUE' => $this->callutil->formatoFecha($row['FECHA_EMBARQUE']),
                              'PACKINGLIST' => $row['PACKINGLIST'],
                              'GUIA_DESPACHO' => $row['GUIA_DESPACHO'],
                              'NUMERO_DE_VIAJE' => $row['NUMERO_DE_VIAJE'],
                              'ORIGEN' => $row['ORIGEN'],
                              'DIAS_VIAJE' => $row['DIAS_VIAJE'],
                              'UNIDADES_SOLICITADAS' => $row['UNIDADES_SOLICITADAS'],
                              'UNIDADES_RECIBIDAS' => $row['UNIDADES_RECIBIDAS'],
                              'REPORTE_DE_RECEPCION_RR' => $row['REPORTE_DE_RECEPCION_RR'],
                              'REPORTE_DE_ENTREGA_RE' => $row['REPORTE_DE_ENTREGA_RE'],
                              'REPORTE_DE_EXCEPCION_EXB' => $row['REPORTE_DE_EXCEPCION_EXB'],
                              'INSPECCION_DE_INGENIERIA' => $row['INSPECCION_DE_INGENIERIA'],
                              'OBSERVACION' => $row['OBSERVACION']
                            );


                            if ($prevCount > 0) {
                              // Update member data

                              $update = $this->callexternosbucksheet->update($memData, $idOrden, $row['NUMERO_DE_LINEA']);

                              if ($update) {
                                $updateCount++;

                                //Carga Bitacora

                                //Carga Bitacora

                                $insert_bitacora = array(
                                  'codEmpresa' => $this->session->userdata('cod_emp'),
                                  'accion'  => 'ACTUALIZA_WPANEL_LINEA',
                                  'id_registro' => $row['NUMERO_DE_LINEA'],
                                  'usuario'  =>  $this->session->userdata('n_usuario'),
                                  'rol' =>   $this->session->userdata('nombre_rol'),
                                  'objeto'  => 'WPANEL',
                                  'fechaCambio' =>  date_create()->format('Y-m-d')
                                );

                                $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
                              }
                            } else {
                              // Insert member data
                              $insert = $this->callexternosbucksheet->insert($memData);

                              
                              if ($insert) {

                                $insertCount++;

                                $insert_bitacora = array(
                                  'codEmpresa' => $this->session->userdata('cod_emp'),
                                  'accion'  => 'INSERTA_WPANEL_LINEA_' . $row['NUMERO_DE_LINEA'],
                                  'id_registro' => $row['NUMERO_DE_LINEA'],
                                  'usuario'  =>  $this->session->userdata('n_usuario'),
                                  'rol' =>   $this->session->userdata('nombre_rol'),
                                  'objeto'  => 'WPANEL',
                                  'fechaCambio' =>  date_create()->format('Y-m-d')
                                );

                                $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
                              }
                            }
                          }




                        }
                }
              }
           
            }
          



          if ($errorCount > 0) {

            // Status message with imported data count
            $notAddCount = ($rowCount - ($insertCount + $updateCount));
            $error_msg = 'WPanel importado con Errores Total registros (' . $rowCount . ') |';
            $error_msg .= ' Insertados (' . $insertCount . ') ';
            $error_msg .= ' | Actualizados(' . $updateCount . ')';
            $error_msg .= ' | No insertados (' . $notAddCount . ')';
            $error_msg .= ' | Errores (' . $errorCount . ')';
            $error_msg .=  '<a target="_blank" class="btn btn-outline-danger btn-sm mr-1" href="' . base_url() . 'index.php/BuckSheet/exportCSVErrores/' . $idError . '/' . $PurchaseOrderID . '"><i class="fas fa-download"></i></a>';
            $resp = true;
            $error = 1;
          } else {
            // Status message with imported data count
            $notAddCount = ($rowCount - ($insertCount + $updateCount));
            $error_msg = 'WPanel importado correctamente. Total registros (' . $rowCount . ')';
            $error_msg .= ' Insertados (' . $insertCount . ') ';
            $error_msg .= ' Insertados (' . $insertCount . ') ';
            $error_msg .= ' | Actualizados(' . $updateCount . ')';
            $error_msg .= ' | No insertados (' . $notAddCount . ')';
            $resp = true;
            $error = 0;
          }



        }
      } else {

        $error_msg = 'Archivo con problemas, favor comunicarse con soporte.';
        $resp = false;
      }
    }


    $data['resp']        = $resp;
    $data['mensaje']     = $error_msg;
    $data['error']       = $error;

    echo json_encode($data);
  }



  // checkFileValidation
  public function checkFileValidation($str)
  {
    $mime_types = array(
      'text/csv',
      'text/x-csv',
      'application/csv',
      'application/x-csv',
      'application/excel',
      'text/x-comma-separated-values',
      'text/comma-separated-values',
      'application/octet-stream',
      'application/vnd.ms-excel',
      'application/vnd.msexcel',
      'text/plain',
    );
    if (isset($_FILES['fileURL']['name']) && $_FILES['fileURL']['name'] != "") {
      // get mime by extension
      $mime = get_mime_by_extension($_FILES['fileURL']['name']);
      $fileExt = explode('.', $_FILES['fileURL']['name']);
      $ext = end($fileExt);
      if (($ext == 'csv') && in_array($mime, $mime_types)) {
        return true;
      } else {
        $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
        return false;
      }
    } else {
      $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
      return false;
    }
  }


  function obtieneBucksheet()
  {


    $codEmpresa = $this->session->userdata('cod_emp');
    $PurchaseOrderID = $this->input->post('id_orden');
    $respuesta = false;

    $bucksheet = $this->callexternosbucksheet->obtieneBucksheet($codEmpresa,$PurchaseOrderID);

    $arrBucksheet = json_decode($bucksheet);


    $datos_bucksheet = array();

    if ($arrBucksheet) {
      $respuesta = true;

      foreach ($arrBucksheet as $key => $value) {




        $fecha_hoy = date_create()->format('Y-m-d');

        $datosEstados  = $this->callutil->obtieneDatoRef('ESTADO_BUCKSHEET',$value->ESTADO_DE_LINEA);

        foreach (json_decode($datosEstados) as $llave => $valor) {
                    
          $estado_bucksheet = $valor->domain_desc;
  
        }


        $datos_bucksheet[] = array(

              'ID_OC' => $value->ID_OC,
              'NUMERO_OC' => $value->NUMERO_OC,
              'DESCRIPCION_OC' => $value->DESCRIPCION_OC,
              'ITEM_OC' => $value->ITEM_OC,
              'SUB_ITEM_OC' => $value->SUB_ITEM_OC,
              'PROVEEDOR' => $value->PROVEEDOR,
              'NUMERO_DE_LINEA' => $value->NUMERO_DE_LINEA,
              'TIPO_DE_LINEA' => $value->TIPO_DE_LINEA,
              'ESTADO_DE_LINEA' => $this->callutil->cambianull($estado_bucksheet),
              'NUMERO_DE_TAG' => $value->NUMERO_DE_TAG,
              'STOCKCODE' => $value->STOCKCODE,
              'DESCRIPCION_LINEA' => $value->DESCRIPCION_LINEA,
              'NUMERO_DE_ELEMENTOS' => $value->NUMERO_DE_ELEMENTOS,
              'CANTIDAD_UNITARIA' => $value->CANTIDAD_UNITARIA,
              'CANTIDAD_TOTAL' => $value->CANTIDAD_TOTAL,
              'UNIDAD' => $value->UNIDAD,
              'TRANSMITTAL_CLIENTE' => $value->TRANSMITTAL_CLIENTE,
              'FECHA_TC' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TC)),
              'TRANSMITTAL_PROVEEDOR' => $value->TRANSMITTAL_PROVEEDOR,
              'FECHA_TP' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TP)),
              'TRANSMITTAL_CLIENTE_FINAL' => $value->TRANSMITTAL_CLIENTE_FINAL,
              'FECHA_TCF' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TCF)),
              'PA_TCF' => $this->callutil->cambianull($value->PA_TCF),
              'NUMERO_DE_PLANO' => $value->NUMERO_DE_PLANO,
              'REVISION' => $value->REVISION,
              'PAQUETE_DE_CONSTRUCCION_AREA' => $value->PAQUETE_DE_CONSTRUCCION_AREA,
              'FECHA_LINEA_BASE' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_LINEA_BASE)),
              'DIAS_ANTES_LB' => $this->callutil->diasDiffFechas($value->FECHA_LINEA_BASE, $fecha_hoy),
              'FECHA_COMIENZO_FABRICACION' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_COMIENZO_FABRICACION)),
              'PA_FCF' => $this->callutil->cambianull($value->PA_FCF),
              'FECHA_TERMINO_FABRICACION' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TERMINO_FABRICACION)),
              'PA_FTF' => $this->callutil->cambianull($value->PA_FTF),
              'FECHA_GRANALLADO' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_GRANALLADO)),
              'PA_FG' => $this->callutil->cambianull($value->PA_FG),
              'FECHA_PINTURA' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_PINTURA)),
              'PA_FP' => $this->callutil->cambianull($value->PA_FP),
              'FECHA_LISTO_INSPECCION' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_LISTO_INSPECCION)),
              'PA_FLI' => $this->callutil->cambianull($value->PA_FLI),
              'ACTA_LIBERACION_CALIDAD' => $value->ACTA_LIBERACION_CALIDAD,
              'FECHA_SALIDA_FABRICA' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_SALIDA_FABRICA)),
              'PA_FSF' => $this->callutil->cambianull($value->PA_FSF),
              'FECHA_EMBARQUE' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_EMBARQUE)),
              'PACKINGLIST' => $value->PACKINGLIST,
              'GUIA_DESPACHO' => $value->GUIA_DESPACHO,
              'NUMERO_DE_VIAJE' => $value->NUMERO_DE_VIAJE,
              'ORIGEN' => $value->ORIGEN,
              'DIAS_VIAJE' => $value->DIAS_VIAJE,
              'UNIDADES_SOLICITADAS' => $value->UNIDADES_SOLICITADAS,
              'UNIDADES_RECIBIDAS' => $value->UNIDADES_RECIBIDAS,
              'REPORTE_DE_RECEPCION_RR' => $value->REPORTE_DE_RECEPCION_RR,
              'REPORTE_DE_ENTREGA_RE' => $value->REPORTE_DE_ENTREGA_RE,
              'REPORTE_DE_EXCEPCION_EXB' => $value->REPORTE_DE_EXCEPCION_EXB,
              'INSPECCION_DE_INGENIERIA' => $value->INSPECCION_DE_INGENIERIA,
              'OBSERVACION' => $value->OBSERVACION
              



        );
      }
    } else {

      $respuesta = false;
    }

  
    $datos['bucksheets'] = $datos_bucksheet;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
  }

    



  function obtieneBuckSheetRRInicial()
  {



    $PurchaseOrderID = $this->input->post('id_orden');
    $GuiaDespacho = $this->input->post('guia');
    $codEmpresa = $this->session->userdata('cod_emp');
    $packinglist = $this->input->post('packinglist');


    $respuesta = false;

    $bucksheet = $this->callexternosbucksheet->obtieneBuckSheetRRInicial($codEmpresa,$PurchaseOrderID);

  


    $arrBucksheet = json_decode($bucksheet);


    $datos_bucksheet = array();

    if ($arrBucksheet) {
      $respuesta = true;

    

      foreach ($arrBucksheet as $key => $value) {

        $datosEstados  = $this->callutil->obtieneDatoRef('ESTADO_BUCKSHEET',$value->ESTADO_DE_LINEA);

        foreach (json_decode($datosEstados) as $llave => $valor) {
                    
          $estado_bucksheet = $valor->domain_desc;
  
        }
        $fecha_hoy = date_create()->format('Y-m-d');

        $datos_bucksheet[] = array(
        'NUMERO_DE_LINEA' => $value->NUMERO_DE_LINEA,
        'ESTADO_DE_LINEA' => $this->callutil->cambianull($value->ESTADO_DE_LINEA),
        'NUMERO_DE_TAG' => $value->NUMERO_DE_TAG,
        'STOCKCODE' => $value->STOCKCODE,
        'NUMERO_DE_ELEMENTOS' => $value->NUMERO_DE_ELEMENTOS,
        'CANTIDAD_UNITARIA' => $value->CANTIDAD_UNITARIA,
        'CANTIDAD_TOTAL' => $value->CANTIDAD_TOTAL,
        'UNIDAD' => $value->UNIDAD,
        'ID_OC' => $value->ID_OC,
        'NUMERO_OC' => $value->NUMERO_OC,
        'UNIDADES_SOLICITADAS' => $value->UNIDADES_SOLICITADAS,
        'UNIDADES_RECIBIDAS' => $value->UNIDADES_RECIBIDAS,
        'REPORTE_DE_RECEPCION_RR' => $value->REPORTE_DE_RECEPCION_RR,
        'REPORTE_DE_ENTREGA_RE' => $value->REPORTE_DE_ENTREGA_RE,
        'REPORTE_DE_EXCEPCION_EXB' => $value->REPORTE_DE_EXCEPCION_EXB,
        'PACKINGLIST' => $value->PACKINGLIST,
        'GUIA_DESPACHO' => $value->GUIA_DESPACHO,
        'FECHA_CREACION' =>$this->callutil->cambianull($this->callutil->formatoFechaSalida($value->fecha_creacion))
               

        );
      }
    } else {

      $respuesta = false;
    }

  
    $datos['bucksheets'] = $datos_bucksheet;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
  } 



  


  function obtieneReporteDiario()
  {


    $codigoProyecto = $this->input->post('codigoProyecto');
    $codEmpresa = $this->session->userdata('cod_emp');
    $codigoCliente = $this->input->post('codigoCliente');  
    $fecha_hoy = date_create()->format('Y-m-d');


    $respuesta = false;
   
      
    $bucksheet = $this->callexternosbucksheet->obtieneReporteDiario($codEmpresa,$codigoProyecto,$codigoCliente);

   

    $arrBucksheet = json_decode($bucksheet);


    $datos_bucksheet = array();

    if ($arrBucksheet) {
      $respuesta = true;

    

      foreach ($arrBucksheet as $key => $value) {

        $datosEstados  = $this->callutil->obtieneDatoRef('ESTADO_BUCKSHEET',$value->ESTADO_DE_LINEA);

        foreach (json_decode($datosEstados) as $llave => $valor) {
                    
          $estado_bucksheet = $valor->domain_desc;
  
        }
        $fecha_hoy = date_create()->format('Y-m-d');

        $datos_bucksheet[] = array(
 

              'ID_OC' => $value->ID_OC,
              'NUMERO_OC' => $value->NUMERO_OC,
              'DESCRIPCION_OC' => $value->DESCRIPCION_OC,
              'ITEM_OC' => $value->ITEM_OC,
              'SUB_ITEM_OC' => $value->SUB_ITEM_OC,
              'PROVEEDOR' => $value->PROVEEDOR,
              'NUMERO_DE_LINEA' => $value->NUMERO_DE_LINEA,
              'TIPO_DE_LINEA' => $value->TIPO_DE_LINEA,
              'ESTADO_DE_LINEA' => $this->callutil->cambianull($estado_bucksheet),
              'NUMERO_DE_TAG' => $value->NUMERO_DE_TAG,
              'STOCKCODE' => $value->STOCKCODE,
              'DESCRIPCION_LINEA' => $value->DESCRIPCION_LINEA,
              'NUMERO_DE_ELEMENTOS' => $value->NUMERO_DE_ELEMENTOS,
              'CANTIDAD_UNITARIA' => $value->CANTIDAD_UNITARIA,
              'CANTIDAD_TOTAL' => $value->CANTIDAD_TOTAL,
              'UNIDAD' => $value->UNIDAD,
              'TRANSMITTAL_CLIENTE' => $value->TRANSMITTAL_CLIENTE,
              'FECHA_TC' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TC)),
              'TRANSMITTAL_PROVEEDOR' => $value->TRANSMITTAL_PROVEEDOR,
              'FECHA_TP' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TP)),
              'TRANSMITTAL_CLIENTE_FINAL' => $value->TRANSMITTAL_CLIENTE_FINAL,
              'FECHA_TCF' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TCF)),
              'PA_TCF' => $this->callutil->cambianull($value->PA_TCF),
              'NUMERO_DE_PLANO' => $value->NUMERO_DE_PLANO,
              'REVISION' => $value->REVISION,
              'PAQUETE_DE_CONSTRUCCION_AREA' => $value->PAQUETE_DE_CONSTRUCCION_AREA,
              'FECHA_LINEA_BASE' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_LINEA_BASE)),
              'DIAS_ANTES_LB' => $this->callutil->diasDiffFechas($value->FECHA_LINEA_BASE, $fecha_hoy),
              'FECHA_COMIENZO_FABRICACION' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_COMIENZO_FABRICACION)),
              'PA_FCF' => $this->callutil->cambianull($value->PA_FCF),
              'FECHA_TERMINO_FABRICACION' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TERMINO_FABRICACION)),
              'PA_FTF' => $this->callutil->cambianull($value->PA_FTF),
              'FECHA_GRANALLADO' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_GRANALLADO)),
              'PA_FG' => $this->callutil->cambianull($value->PA_FG),
              'FECHA_PINTURA' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_PINTURA)),
              'PA_FP' => $this->callutil->cambianull($value->PA_FP),
              'FECHA_LISTO_INSPECCION' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_LISTO_INSPECCION)),
              'PA_FLI' => $this->callutil->cambianull($value->PA_FLI),
              'ACTA_LIBERACION_CALIDAD' => $value->ACTA_LIBERACION_CALIDAD,
              'FECHA_SALIDA_FABRICA' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_SALIDA_FABRICA)),
              'PA_FSF' => $this->callutil->cambianull($value->PA_FSF),
              'FECHA_EMBARQUE' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_EMBARQUE)),
              'PACKINGLIST' => $value->PACKINGLIST,
              'GUIA_DESPACHO' => $value->GUIA_DESPACHO,
              'NUMERO_DE_VIAJE' => $value->NUMERO_DE_VIAJE,
              'ORIGEN' => $value->ORIGEN,
              'DIAS_VIAJE' => $value->DIAS_VIAJE,
              'UNIDADES_SOLICITADAS' => $value->UNIDADES_SOLICITADAS,
              'UNIDADES_RECIBIDAS' => $value->UNIDADES_RECIBIDAS,
              'REPORTE_DE_RECEPCION_RR' => $value->REPORTE_DE_RECEPCION_RR,
              'REPORTE_DE_ENTREGA_RE' => $value->REPORTE_DE_ENTREGA_RE,
              'REPORTE_DE_EXCEPCION_EXB' => $value->REPORTE_DE_EXCEPCION_EXB,
              'INSPECCION_DE_INGENIERIA' => $value->INSPECCION_DE_INGENIERIA,
              'OBSERVACION' => $value->OBSERVACION,
              'PurchaseOrderNumber' => $value->PurchaseOrderNumber,
              'PurchaseOrderDescription' => $value->PurchaseOrderDescription, 
              'FECHA_REPORTE' => $this->callutil->formatoFechaSalida($fecha_hoy) 

        );
      }
    } else {

      $respuesta = false;
    }

  
    $datos['bucksheets'] = $datos_bucksheet;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
  } 





  function obtieneBuckSheetRR()
  {



    $PurchaseOrderID = $this->input->post('id_orden');
    $GuiaDespacho = $this->input->post('guia');
    $codEmpresa = $this->session->userdata('cod_emp');
    $packinglist = $this->input->post('packinglist');


    $respuesta = false;

 
    if ($GuiaDespacho != "0") {
    
      $bucksheet = $this->callexternosbucksheet->obtieneBuckSheetGuia($codEmpresa,$PurchaseOrderID,$GuiaDespacho);

    }else if ($packinglist != "0") {
  
 
      $bucksheet = $this->callexternosbucksheet->obtieneBuckSheetPackingList($codEmpresa,$PurchaseOrderID,$packinglist);

    }else{
      
      $bucksheet = $this->callexternosbucksheet->obtieneBuckSheetBodega($codEmpresa,$PurchaseOrderID);

    }
    


    $arrBucksheet = json_decode($bucksheet);


    $datos_bucksheet = array();

    if ($arrBucksheet) {
      $respuesta = true;

    

      foreach ($arrBucksheet as $key => $value) {

        $datosEstados  = $this->callutil->obtieneDatoRef('ESTADO_BUCKSHEET',$value->ESTADO_DE_LINEA);

        foreach (json_decode($datosEstados) as $llave => $valor) {
                    
          $estado_bucksheet = $valor->domain_desc;
  
        }
        $fecha_hoy = date_create()->format('Y-m-d');

        $datos_bucksheet[] = array(
 

              'ID_OC' => $value->ID_OC,
              'NUMERO_OC' => $value->NUMERO_OC,
              'DESCRIPCION_OC' => $value->DESCRIPCION_OC,
              'ITEM_OC' => $value->ITEM_OC,
              'SUB_ITEM_OC' => $value->SUB_ITEM_OC,
              'PROVEEDOR' => $value->PROVEEDOR,
              'NUMERO_DE_LINEA' => $value->NUMERO_DE_LINEA,
              'TIPO_DE_LINEA' => $value->TIPO_DE_LINEA,
              'ESTADO_DE_LINEA' => $this->callutil->cambianull($estado_bucksheet),
              'NUMERO_DE_TAG' => $value->NUMERO_DE_TAG,
              'STOCKCODE' => $value->STOCKCODE,
              'DESCRIPCION_LINEA' => $value->DESCRIPCION_LINEA,
              'NUMERO_DE_ELEMENTOS' => $value->NUMERO_DE_ELEMENTOS,
              'CANTIDAD_UNITARIA' => $value->CANTIDAD_UNITARIA,
              'CANTIDAD_TOTAL' => $value->CANTIDAD_TOTAL,
              'UNIDAD' => $value->UNIDAD,
              'TRANSMITTAL_CLIENTE' => $value->TRANSMITTAL_CLIENTE,
              'FECHA_TC' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TC)),
              'TRANSMITTAL_PROVEEDOR' => $value->TRANSMITTAL_PROVEEDOR,
              'FECHA_TP' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TP)),
              'TRANSMITTAL_CLIENTE_FINAL' => $value->TRANSMITTAL_CLIENTE_FINAL,
              'FECHA_TCF' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TCF)),
              'PA_TCF' => $this->callutil->cambianull($value->PA_TCF),
              'NUMERO_DE_PLANO' => $value->NUMERO_DE_PLANO,
              'REVISION' => $value->REVISION,
              'PAQUETE_DE_CONSTRUCCION_AREA' => $value->PAQUETE_DE_CONSTRUCCION_AREA,
              'FECHA_LINEA_BASE' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_LINEA_BASE)),
              'DIAS_ANTES_LB' => $this->callutil->diasDiffFechas($value->FECHA_LINEA_BASE, $fecha_hoy),
              'FECHA_COMIENZO_FABRICACION' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_COMIENZO_FABRICACION)),
              'PA_FCF' => $this->callutil->cambianull($value->PA_FCF),
              'FECHA_TERMINO_FABRICACION' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TERMINO_FABRICACION)),
              'PA_FTF' => $this->callutil->cambianull($value->PA_FTF),
              'FECHA_GRANALLADO' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_GRANALLADO)),
              'PA_FG' => $this->callutil->cambianull($value->PA_FG),
              'FECHA_PINTURA' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_PINTURA)),
              'PA_FP' => $this->callutil->cambianull($value->PA_FP),
              'FECHA_LISTO_INSPECCION' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_LISTO_INSPECCION)),
              'PA_FLI' => $this->callutil->cambianull($value->PA_FLI),
              'ACTA_LIBERACION_CALIDAD' => $value->ACTA_LIBERACION_CALIDAD,
              'FECHA_SALIDA_FABRICA' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_SALIDA_FABRICA)),
              'PA_FSF' => $this->callutil->cambianull($value->PA_FSF),
              'FECHA_EMBARQUE' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_EMBARQUE)),
              'PACKINGLIST' => $value->PACKINGLIST,
              'GUIA_DESPACHO' => $value->GUIA_DESPACHO,
              'NUMERO_DE_VIAJE' => $value->NUMERO_DE_VIAJE,
              'ORIGEN' => $value->ORIGEN,
              'DIAS_VIAJE' => $value->DIAS_VIAJE,
              'UNIDADES_SOLICITADAS' => $value->UNIDADES_SOLICITADAS,
              'UNIDADES_RECIBIDAS' => $value->UNIDADES_RECIBIDAS,
              'REPORTE_DE_RECEPCION_RR' => $value->REPORTE_DE_RECEPCION_RR,
              'REPORTE_DE_ENTREGA_RE' => $value->REPORTE_DE_ENTREGA_RE,
              'REPORTE_DE_EXCEPCION_EXB' => $value->REPORTE_DE_EXCEPCION_EXB,
              'INSPECCION_DE_INGENIERIA' => $value->INSPECCION_DE_INGENIERIA,
              'OBSERVACION' => $value->OBSERVACION

        );
      }
    } else {

      $respuesta = false;
    }

  
    $datos['bucksheets'] = $datos_bucksheet;
    $datos['resp']      = $respuesta;

    echo json_encode($datos);
  } 


  function obtieneBucksheetDet()
  {

    $PurchaseOrderID = $this->input->post('id_orden');
    $NumeroLinea = $this->input->post('numero_linea');
    $fecha_hoy = date_create()->format('Y-m-d');
    $codEmpresa = $this->session->userdata('cod_emp');
    $select_unidad = "";

    $response = $this->callexternosbucksheet->obtieneBucksheetDet($codEmpresa,$PurchaseOrderID, $NumeroLinea);

 
    $arrBucksheet = json_decode($response);


    $datos_bucksheet = array();

    if ($arrBucksheet) {
      $respuesta = true;

      foreach ($arrBucksheet as $key => $value) {



        $datos_bucksheet[] = array(

              'ID_OC' => $value->ID_OC,
              'NUMERO_OC' => $value->NUMERO_OC,
              'DESCRIPCION_OC' => $value->DESCRIPCION_OC,
              'ITEM_OC' => $value->ITEM_OC,
              'SUB_ITEM_OC' => $value->SUB_ITEM_OC,
              'PROVEEDOR' => $value->PROVEEDOR,
              'NUMERO_DE_LINEA' => $value->NUMERO_DE_LINEA,
              'TIPO_DE_LINEA' => $value->TIPO_DE_LINEA,
              'ESTADO_DE_LINEA' =>  $value->ESTADO_DE_LINEA,
              'NUMERO_DE_TAG' => $value->NUMERO_DE_TAG,
              'STOCKCODE' => $value->STOCKCODE,
              'DESCRIPCION_LINEA' => $value->DESCRIPCION_LINEA,
              'NUMERO_DE_ELEMENTOS' => $value->NUMERO_DE_ELEMENTOS,
              'CANTIDAD_UNITARIA' => $value->CANTIDAD_UNITARIA,
              'CANTIDAD_TOTAL' => $value->CANTIDAD_TOTAL,
              'UNIDAD' => $value->UNIDAD,
              'TRANSMITTAL_CLIENTE' => $value->TRANSMITTAL_CLIENTE,
              'FECHA_TC' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TC)),
              'TRANSMITTAL_PROVEEDOR' => $value->TRANSMITTAL_PROVEEDOR,
              'FECHA_TP' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TP)),
              'TRANSMITTAL_CLIENTE_FINAL' => $value->TRANSMITTAL_CLIENTE_FINAL,
              'FECHA_TCF' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TCF)),
              'PA_TCF' => $this->callutil->cambianull($value->PA_TCF),
              'NUMERO_DE_PLANO' => $value->NUMERO_DE_PLANO,
              'REVISION' => $value->REVISION,
              'PAQUETE_DE_CONSTRUCCION_AREA' => $value->PAQUETE_DE_CONSTRUCCION_AREA,
              'FECHA_LINEA_BASE' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_LINEA_BASE)),
              'DIAS_ANTES_LB' => $this->callutil->diasDiffFechas($value->FECHA_LINEA_BASE, $fecha_hoy),
              'FECHA_COMIENZO_FABRICACION' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_COMIENZO_FABRICACION)),
              'PA_FCF' => $this->callutil->cambianull($value->PA_FCF),
              'FECHA_TERMINO_FABRICACION' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_TERMINO_FABRICACION)),
              'PA_FTF' => $this->callutil->cambianull($value->PA_FTF),
              'FECHA_GRANALLADO' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_GRANALLADO)),
              'PA_FG' => $this->callutil->cambianull($value->PA_FG),
              'FECHA_PINTURA' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_PINTURA)),
              'PA_FP' => $this->callutil->cambianull($value->PA_FP),
              'FECHA_LISTO_INSPECCION' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_LISTO_INSPECCION)),
              'PA_FLI' => $this->callutil->cambianull($value->PA_FLI),
              'ACTA_LIBERACION_CALIDAD' => $value->ACTA_LIBERACION_CALIDAD,
              'FECHA_SALIDA_FABRICA' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_SALIDA_FABRICA)),
              'PA_FSF' => $this->callutil->cambianull($value->PA_FSF),
              'FECHA_EMBARQUE' => $this->callutil->cambianull($this->callutil->formatoFechaSalida($value->FECHA_EMBARQUE)),
              'PACKINGLIST' => $value->PACKINGLIST,
              'GUIA_DESPACHO' => $value->GUIA_DESPACHO,
              'NUMERO_DE_VIAJE' => $value->NUMERO_DE_VIAJE,
              'ORIGEN' => $value->ORIGEN,
              'DIAS_VIAJE' => $value->DIAS_VIAJE,
              'UNIDADES_SOLICITADAS' => $value->UNIDADES_SOLICITADAS,
              'UNIDADES_RECIBIDAS' => $value->UNIDADES_RECIBIDAS,
              'REPORTE_DE_RECEPCION_RR' => $value->REPORTE_DE_RECEPCION_RR,
              'REPORTE_DE_ENTREGA_RE' => $value->REPORTE_DE_ENTREGA_RE,
              'REPORTE_DE_EXCEPCION_EXB' => $value->REPORTE_DE_EXCEPCION_EXB,
              'INSPECCION_DE_INGENIERIA' => $value->INSPECCION_DE_INGENIERIA,
              'OBSERVACION' => $value->OBSERVACION
        );

        $select_unidad = $this->callutil->obtiene_select_def_act('UNIDAD',$value->UNIDAD,'UNIDAD_MEDIDA');
        $select_patcf = $this->callutil->obtiene_select_def_act('PA_TCF',$value->PA_TCF,'ACTUAL_PREVIO');
       
        $select_pafcf = $this->callutil->obtiene_select_def_act('PA_FCF',$value->PA_FCF,'ACTUAL_PREVIO');
        $select_paftf = $this->callutil->obtiene_select_def_act('PA_FTF',$value->PA_FTF,'ACTUAL_PREVIO');
        $select_pafg = $this->callutil->obtiene_select_def_act('PA_FG',$value->PA_FG,'ACTUAL_PREVIO');
        $select_pafp = $this->callutil->obtiene_select_def_act('PA_FP',$value->PA_FP,'ACTUAL_PREVIO');
        $select_pafli = $this->callutil->obtiene_select_def_act('PA_FLI',$value->PA_FLI,'ACTUAL_PREVIO');
        $select_pafsf = $this->callutil->obtiene_select_def_act('PA_FSF',$value->PA_FSF,'ACTUAL_PREVIO');

        $select_pafsf = $this->callutil->obtiene_select_def_act('PA_FSF',$value->PA_FSF,'ACTUAL_PREVIO');
      
        $select_tipo_linea = $this->callutil->obtiene_select_def_act('TIPO_DE_LINEA',$value->TIPO_DE_LINEA,'ESTADO_LINEA_WPANEL');
        $select_estado_linea = $this->callutil->obtiene_select_def_act('ESTADO_DE_LINEA',$value->ESTADO_DE_LINEA,'ESTADO_BUCKSHEET');
       
      }
    } else {

      $respuesta = false;
    }

    $datos['bucksheet'] = $datos_bucksheet;
    $datos['resp']      = $respuesta;
    $datos['select_unidad'] = $select_unidad;
    $datos['select_patcf'] = $select_patcf;

    $datos['select_pafcf'] = $select_pafcf;
    $datos['select_paftf'] = $select_paftf;
    $datos['select_pafg'] = $select_pafg;
    $datos['select_pafp'] = $select_pafp;
    $datos['select_pafli'] = $select_pafli;
    $datos['select_pafsf'] = $select_pafsf;

    
    $datos['select_tipo_linea'] = $select_tipo_linea;
    $datos['select_estado_linea'] = $select_estado_linea;



    

    echo json_encode($datos);
  }


  function updateBuckSheet()
  {

    $codEmpresa = $this->session->userdata('cod_emp');
      $EstadoLineaBucksheet = '1';
                      
    if (!empty($row['FECHA_TFC']) && $row['PA_TCF'] == 'ACTUAL') {

      $EstadoLineaBucksheet = '7';
    }


    if (!empty($row['FECHAC_OMIENZO_FABRICACION']) && $row['PA_FCF'] == 'ACTUAL') {

      $EstadoLineaBucksheet = '2';
    }

    if (!empty($row['FECHA_TERMINO_FABRICACION']) && $row['PA_FTF'] == 'ACTUAL') {

      $EstadoLineaBucksheet = '3';
    }

    if (!empty($row['FECHA_PINTURA']) && $row['PA_FP'] == 'ACTUAL') {

      $EstadoLineaBucksheet = '6';
    }



    if (!empty($row['FECHA_LISTO_INSPECCION']) && $row['PA_FLI'] == 'ACTUAL') {

      $EstadoLineaBucksheet = '4';
    }

    if (!empty($row['FECHA_EMBARQUE']) && !empty($row['PACKINGLIST'])) {

      $EstadoLineaBucksheet = '5';
    }



    $Orden = $this->callexternosordenes->obtieneOrden(
      $this->input->post('idProyecto'),
      $this->input->post('idCliente'),
      $this->input->post('ID_OC'),
      $codEmpresa
    );


    $arrOrden = json_decode($Orden);


    if ($arrOrden) {

      foreach ($arrOrden as $llave => $valor) {

        $SupplierName = $valor->SupplierName;
        $PurchaseOrderDescription = $valor->PurchaseOrderDescription;
        $PurchaseOrderNumber = $valor->PurchaseOrderNumber;
      }
    }



    $memData = array(
      'COD_EMPRESA' => $codEmpresa,
      'ID_OC' => $this->input->post('ID_OC'),
      'NUMERO_OC' => urldecode($PurchaseOrderNumber),
      'DESCRIPCION_OC' => urldecode($PurchaseOrderDescription),
      'ITEM_OC' => $this->input->post('ITEM_OC'),
      'SUB_ITEM_OC' => $this->input->post('SUB_ITEM_OC'),
      'PROVEEDOR' => $this->input->post('PROVEEDOR'),
      'NUMERO_DE_LINEA' => $this->input->post('NUMERO_DE_LINEA'),
      'TIPO_DE_LINEA' => $this->input->post('TIPO_DE_LINEA'),
      'ESTADO_DE_LINEA' => $EstadoLineaBucksheet,
      'NUMERO_DE_TAG' => $this->input->post('NUMERO_DE_TAG'),
      'STOCKCODE' => $this->input->post('STOCKCODE'),
      'DESCRIPCION_LINEA' => $this->input->post('DESCRIPCION_LINEA'),
      'NUMERO_DE_ELEMENTOS' => $this->callutil->formatoNumeroMilesEntrada($this->input->post('NUMERO_DE_ELEMENTOS')),
      'CANTIDAD_UNITARIA' => $this->callutil->formatoNumeroMilesEntrada($this->input->post('CANTIDAD_UNITARIA')),
      'CANTIDAD_TOTAL' => $this->callutil->formatoNumeroMilesEntrada($this->input->post('CANTIDAD_TOTAL')),
      'UNIDAD' => $this->input->post('UNIDAD'),
      'TRANSMITTAL_CLIENTE' => $this->input->post('TRANSMITTAL_CLIENTE'),
      'FECHA_TC' =>  $this->callutil->formatoFecha($this->input->post('FECHA_TC')),
      'TRANSMITTAL_PROVEEDOR' => $this->input->post('TRANSMITTAL_PROVEEDOR'),
      'FECHA_TP' =>  $this->callutil->formatoFecha($this->input->post('FECHA_TP')),
      'TRANSMITTAL_CLIENTE_FINAL' => $this->input->post('TRANSMITTAL_CLIENTE_FINAL'),
      'FECHA_TCF' =>  $this->callutil->formatoFecha($this->input->post('FECHA_TCF')),
      'PA_TCF' => $this->input->post('PA_TCF'),
      'NUMERO_DE_PLANO' => $this->input->post('NUMERO_DE_PLANO'),
      'REVISION' => $this->callutil->formatoNumeroMilesEntrada($this->input->post('REVISION')),
      'PAQUETE_DE_CONSTRUCCION_AREA' => $this->input->post('PAQUETE_DE_CONSTRUCCION_AREA'),
      'FECHA_LINEA_BASE' =>  $this->callutil->formatoFecha($this->input->post('FECHA_LINEA_BASE')),
      'DIAS_ANTES_LB' => $this->input->post('DIAS_ANTES_LB'),
      'FECHA_COMIENZO_FABRICACION' =>  $this->callutil->formatoFecha($this->input->post('FECHA_COMIENZO_FABRICACION')),
      'PA_FCF' => $this->input->post('PA_FCF'),
      'FECHA_TERMINO_FABRICACION' =>  $this->callutil->formatoFecha($this->input->post('FECHA_TERMINO_FABRICACION')),
      'PA_FTF' => $this->input->post('PA_FTF'),
      'FECHA_GRANALLADO' =>  $this->callutil->formatoFecha($this->input->post('FECHA_GRANALLADO')),
      'PA_FG' => $this->input->post('PA_FG'),
      'FECHA_PINTURA' =>  $this->callutil->formatoFecha($this->input->post('FECHA_PINTURA')),
      'PA_FP' => $this->input->post('PA_FP'),
      'FECHA_LISTO_INSPECCION' =>  $this->callutil->formatoFecha($this->input->post('FECHA_LISTO_INSPECCION')),
      'PA_FLI' => $this->input->post('PA_FLI'),
      'ACTA_LIBERACION_CALIDAD' =>  $this->callutil->formatoFecha($this->input->post('ACTA_LIBERACION_CALIDAD')),
      'FECHA_SALIDA_FABRICA' =>  $this->callutil->formatoFecha($this->input->post('FECHA_SALIDA_FABRICA')),
      'PA_FSF' => $this->input->post('PA_FSF'),
      'FECHA_EMBARQUE' =>  $this->callutil->formatoFecha($this->input->post('FECHA_EMBARQUE')),
      'PACKINGLIST' => $this->input->post('PACKINGLIST'),
      'GUIA_DESPACHO' => $this->input->post('GUIA_DESPACHO'),
      'NUMERO_DE_VIAJE' => $this->input->post('NUMERO_DE_VIAJE'),
      'ORIGEN' => $this->input->post('ORIGEN'),
      'DIAS_VIAJE' => $this->callutil->formatoNumeroMilesEntrada($this->input->post('DIAS_VIAJE')),
      'UNIDADES_SOLICITADAS' => $this->input->post('UNIDADES_SOLICITADAS'),
      'UNIDADES_RECIBIDAS' => $this->input->post('UNIDADES_RECIBIDAS'),
      'REPORTE_DE_RECEPCION_RR' => $this->input->post('REPORTE_DE_RECEPCION_RR'),
      'REPORTE_DE_ENTREGA_RE' => $this->input->post('REPORTE_DE_ENTREGA_RE'),
      'REPORTE_DE_EXCEPCION_EXB' => $this->input->post('REPORTE_DE_EXCEPCION_EXB'),
      'INSPECCION_DE_INGENIERIA' => $this->input->post('INSPECCION_DE_INGENIERIA'),
      'OBSERVACION' => $this->input->post('OBSERVACION'),
      
    );

    $response = $this->callexternosbucksheet->updateBuckSheetLinea($memData);
    

    
    $data = array();

    if ($response) {

      $data['resp']        = true;
      $data['mensaje']     = 'Registro actualizado correctamente';



      $insert_bitacora = array(
        'codEmpresa' => $this->session->userdata('cod_emp'),
        'accion'  => 'ACTUALIZA_WPANEL_LINEA',
        'id_registro' =>  $this->input->post('NumeroLinea'),
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'WPANEL',
        'fechaCambio' =>  date_create()->format('Y-m-d')
      );

      $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
    } else {
      $data['resp']        = false;
      $data['mensaje']     = 'Error al actualizar registro';
    }


    echo json_encode($data);
  }


  function eliminaBuckSheet()
  {


    $PurchaseOrderID       = $this->input->post('PurchaseOrderID');
    $numeroLinea       = $this->input->post('numeroLinea');
    $codEmpresa = $this->session->userdata('cod_emp');
    $resp = false;
    $mensaje = "";



    $bucksheet = $this->callexternosbucksheet->eliminaBuckSheet($codEmpresa,$PurchaseOrderID, $numeroLinea);


    if ($bucksheet) {

      $resp = true;
      $mensaje = "Linea " . $numeroLinea . " del BuckeSheet Eliminado correctamente";



      $insert_bitacora = array(
        'codEmpresa' => $this->session->userdata('cod_emp'),
        'accion'  => 'ELIMINA_WPANEL_LINEA'  ,
        'id_registro' =>  $numeroLinea,
        'usuario'  =>  $this->session->userdata('n_usuario'),
        'rol' =>   $this->session->userdata('nombre_rol'),
        'objeto'  => 'WPANEL',
        'fechaCambio' =>  date_create()->format('Y-m-d')
      );

      $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);
    } else {

      $resp = false;
      $mensaje = "Error al Eliminar Linea, datos sin actualizar";
    }



    $data['resp']       = $resp;
    $data['mensaje']    = $mensaje;





    echo json_encode($data);
  }

  // export Data
  // Export data in CSV format 
  public function exportCSV($PurchaseOrderID)
  {
    // file name 
    $filename = 'wpanel_' . $PurchaseOrderID . '_' . date('Ymd') . date('H:i:s') . '.csv';
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: text/csv;charset=UTF-8");

    $codEmpresa = $this->session->userdata('cod_emp');

    // get data 
    $usersData = $this->callexternosbucksheet->obtieneBucksheet($codEmpresa,$PurchaseOrderID);


    $arrBucksheet = json_decode($usersData);


    // file creation 
    $file = fopen('php://output', 'w');


    $header = array(
      "ID_OC",
      "NUMERO_OC",
      "DESCRIPCION_OC",
      "ITEM_OC",
      "SUB_ITEM_OC",
      "PROVEEDOR",
      "NUMERO_DE_LINEA",
      "TIPO_DE_LINEA",
      "ESTADO_DE_LINEA",
      "NUMERO_DE_TAG",
      "STOCKCODE",
      "DESCRIPCION_LINEA",
      "NUMERO_DE_ELEMENTOS",
      "CANTIDAD_UNITARIA",
      "CANTIDAD_TOTAL",
      "UNIDAD",
      "TRANSMITTAL_CLIENTE",
      "FECHA_TC",
      "TRANSMITTAL_PROVEEDOR",
      "FECHA_TP",
      "TRANSMITTAL_CLIENTE_FINAL",
      "FECHA_TCF",
      "PA_TCF",
      "NUMERO_DE_PLANO",
      "REVISION",
      "PAQUETE_DE_CONSTRUCCION_AREA",
      "FECHA_LINEA_BASE",
      "DIAS_ANTES_LB",
      "FECHA_COMIENZO_FABRICACION",
      "PA_FCF",
      "FECHA_TERMINO_FABRICACION",
      "PA_FTF",
      "FECHA_GRANALLADO",
      "PA_FG",
      "FECHA_PINTURA",
      "PA_FP",
      "FECHA_LISTO_INSPECCION",
      "PA_FLI",
      "ACTA_LIBERACION_CALIDAD",
      "FECHA_SALIDA_FABRICA",
      "PA_FSF",
      "FECHA_EMBARQUE",
      "PACKINGLIST",
      "GUIA_DESPACHO",
      "NUMERO_DE_VIAJE",
      "ORIGEN",
      "DIAS_VIAJE",
      "UNIDADES_SOLICITADAS",
      "UNIDADES_RECIBIDAS",
      "REPORTE_DE_RECEPCION_RR",
      "REPORTE_DE_ENTREGA_RE",
      "REPORTE_DE_EXCEPCION_EXB",
      "INSPECCION_DE_INGENIERIA",
      "OBSERVACION"

    );

    fputcsv($file, $header, ';', chr(27));

    foreach ($arrBucksheet as $key => $value) {


      $datos_bucksheet = array(

            'ID_OC' => $value->ID_OC,
            'NUMERO_OC' => $value->NUMERO_OC,
            'DESCRIPCION_OC' => $value->DESCRIPCION_OC,
            'ITEM_OC' => $value->ITEM_OC,
            'SUB_ITEM_OC' => $value->SUB_ITEM_OC,
            'PROVEEDOR' => $value->PROVEEDOR,
            'NUMERO_DE_LINEA' => $value->NUMERO_DE_LINEA,
            'TIPO_DE_LINEA' => $value->TIPO_DE_LINEA,
            'ESTADO_DE_LINEA' => $value->ESTADO_DE_LINEA,
            'NUMERO_DE_TAG' => $value->NUMERO_DE_TAG,
            'STOCKCODE' => $value->STOCKCODE,
            'DESCRIPCION_LINEA' => $value->DESCRIPCION_LINEA,
            'NUMERO_DE_ELEMENTOS' => $value->NUMERO_DE_ELEMENTOS,
            'CANTIDAD_UNITARIA' => $value->CANTIDAD_UNITARIA,
            'CANTIDAD_TOTAL' => $value->CANTIDAD_TOTAL,
            'UNIDAD' => $value->UNIDAD,
            'TRANSMITTAL_CLIENTE' => $value->TRANSMITTAL_CLIENTE,
            'FECHA_TC' => $value->FECHA_TC,
            'TRANSMITTAL_PROVEEDOR' => $value->TRANSMITTAL_PROVEEDOR,
            'FECHA_TP' => $this->callutil->formatoFechaSalida($value->FECHA_TP),
            'TRANSMITTAL_CLIENTE_FINAL' => $value->TRANSMITTAL_CLIENTE_FINAL,
            'FECHA_TCF' => $this->callutil->formatoFechaSalida($value->FECHA_TCF),
            'PA_TCF' => $value->PA_TCF,
            'NUMERO_DE_PLANO' => $value->NUMERO_DE_PLANO,
            'REVISION' => $value->REVISION,
            'PAQUETE_DE_CONSTRUCCION_AREA' => $value->PAQUETE_DE_CONSTRUCCION_AREA,
            'FECHA_LINEA_BASE' => $this->callutil->formatoFechaSalida($value->FECHA_LINEA_BASE),
            'DIAS_ANTES_LB' => $value->DIAS_ANTES_LB,
            'FECHA_COMIENZO_FABRICACION' => $this->callutil->formatoFechaSalida($value->FECHA_COMIENZO_FABRICACION),
            'PA_FCF' => $value->PA_FCF,
            'FECHA_TERMINO_FABRICACION' => $this->callutil->formatoFechaSalida($value->FECHA_TERMINO_FABRICACION),
            'PA_FTF' => $value->PA_FTF,
            'FECHA_GRANALLADO' => $this->callutil->formatoFechaSalida($value->FECHA_GRANALLADO),
            'PA_FG' => $value->PA_FG,
            'FECHA_PINTURA' => $this->callutil->formatoFechaSalida($value->FECHA_PINTURA),
            'PA_FP' => $value->PA_FP,
            'FECHA_LISTO_INSPECCION' => $this->callutil->formatoFechaSalida($value->FECHA_LISTO_INSPECCION),
            'PA_FLI' => $value->PA_FLI,
            'ACTA_LIBERACION_CALIDAD' => $value->ACTA_LIBERACION_CALIDAD,
            'FECHA_SALIDA_FABRICA' => $this->callutil->formatoFechaSalida($value->FECHA_SALIDA_FABRICA),
            'PA_FSF' => $value->PA_FSF,
            'FECHA_EMBARQUE' => $this->callutil->formatoFechaSalida($value->FECHA_EMBARQUE),
            'PACKINGLIST' => $value->PACKINGLIST,
            'GUIA_DESPACHO' => $value->GUIA_DESPACHO,
            'NUMERO_DE_VIAJE' => $value->NUMERO_DE_VIAJE,
            'ORIGEN' => $value->ORIGEN,
            'DIAS_VIAJE' => $value->DIAS_VIAJE,
            'UNIDADES_SOLICITADAS' => $value->UNIDADES_SOLICITADAS,
            'UNIDADES_RECIBIDAS' => $value->UNIDADES_RECIBIDAS,
            'REPORTE_DE_RECEPCION_RR' => $value->REPORTE_DE_RECEPCION_RR,
            'REPORTE_DE_ENTREGA_RE' => $value->REPORTE_DE_ENTREGA_RE,
            'REPORTE_DE_EXCEPCION_EXB' => $value->REPORTE_DE_EXCEPCION_EXB,
            'INSPECCION_DE_INGENIERIA' => $value->INSPECCION_DE_INGENIERIA,
            'OBSERVACION' => $value->OBSERVACION
      );



      $this->my_fputcsv($file, $datos_bucksheet, $delimiter = ';', $enclosure = '', $escape = '');
    }
    fclose($file);


    $insert_bitacora = array(
      'codEmpresa' => $this->session->userdata('cod_emp'),
      'accion'  => 'DESCARGA_WPANEL',
      'id_registro' =>  '0',
      'usuario'  =>  $this->session->userdata('n_usuario'),
      'rol' =>   $this->session->userdata('nombre_rol'),
      'objeto'  => 'WPANEL',
      'fechaCambio' =>  date_create()->format('Y-m-d')
    );

    $bitacora = $this->callexternosbitacora->agregarBitacora($insert_bitacora);


    exit;
  }


  function insertar_error($idError, $idmensaje,$campo, $row)
  {
    $codEmpresa = $this->session->userdata('cod_emp');

    $datoarchivo     = $this->callexternosdominios->obtieneDatoRef('MENSAJE_ERROR_WPANEL', $idmensaje);

    foreach (json_decode($datoarchivo) as $llave => $valor) {

      $valorMensaje = $valor->domain_desc;
    }

    $memData = array(
      'ID_ERROR' => $idError,
      'MENSAJE_ERROR' => $valorMensaje.', campo: '.$campo,
      'COD_EMPRESA' =>  $codEmpresa,
      'ID_OC' => $row['ID_OC'],
      'NUMERO_OC' => $row['NUMERO_OC'],
      'DESCRIPCION_OC' => $row['DESCRIPCION_OC'],
      'ITEM_OC' => $row['ITEM_OC'],
      'SUB_ITEM_OC' => $row['SUB_ITEM_OC'],
      'PROVEEDOR' => $row['PROVEEDOR'],
      'NUMERO_DE_LINEA' => $row['NUMERO_DE_LINEA'],
      'TIPO_DE_LINEA' => $row['TIPO_DE_LINEA'],
      'ESTADO_DE_LINEA' => $row['ESTADO_DE_LINEA'],
      'NUMERO_DE_TAG' => $row['NUMERO_DE_TAG'],
      'STOCKCODE' => $row['STOCKCODE'],
      'DESCRIPCION_LINEA' => $row['DESCRIPCION_LINEA'],
      'NUMERO_DE_ELEMENTOS' => $row['NUMERO_DE_ELEMENTOS'],
      'CANTIDAD_UNITARIA' => $row['CANTIDAD_UNITARIA'],
      'CANTIDAD_TOTAL' => $row['CANTIDAD_TOTAL'],
      'UNIDAD' => $row['UNIDAD'],
      'TRANSMITTAL_CLIENTE' => $row['TRANSMITTAL_CLIENTE'],
      'FECHA_TC' => $this->callutil->formatoFecha($row['FECHA_TC']),
      'TRANSMITTAL_PROVEEDOR' => $row['TRANSMITTAL_PROVEEDOR'],
      'FECHA_TP' => $this->callutil->formatoFecha($row['FECHA_TP']),
      'TRANSMITTAL_CLIENTE_FINAL' => $row['TRANSMITTAL_CLIENTE_FINAL'],
      'FECHA_TCF' => $this->callutil->formatoFecha($row['FECHA_TCF']),
      'PA_TCF' => $row['PA_TCF'],
      'NUMERO_DE_PLANO' => $row['NUMERO_DE_PLANO'],
      'REVISION' => $row['REVISION'],
      'PAQUETE_DE_CONSTRUCCION_AREA' => $row['PAQUETE_DE_CONSTRUCCION_AREA'],
      'FECHA_LINEA_BASE' => $this->callutil->formatoFecha($row['FECHA_LINEA_BASE']),
      'DIAS_ANTES_LB' => $row['DIAS_ANTES_LB'],
      'FECHA_COMIENZO_FABRICACION' => $this->callutil->formatoFecha($row['FECHA_COMIENZO_FABRICACION']),
      'PA_FCF' => $row['PA_FCF'],
      'FECHA_TERMINO_FABRICACION' =>$this->callutil->formatoFecha($row['FECHA_TERMINO_FABRICACION']),
      'PA_FTF' => $row['PA_FTF'],
      'FECHA_GRANALLADO' => $this->callutil->formatoFecha($row['FECHA_GRANALLADO']),
      'PA_FG' => $row['PA_FG'],
      'FECHA_PINTURA' => $this->callutil->formatoFecha($row['FECHA_PINTURA']),
      'PA_FP' => $row['PA_FP'],
      'FECHA_LISTO_INSPECCION' => $this->callutil->formatoFecha($row['FECHA_LISTO_INSPECCION']),
      'PA_FLI' => $row['PA_FLI'],
      'ACTA_LIBERACION_CALIDAD' => $row['ACTA_LIBERACION_CALIDAD'],
      'FECHA_SALIDA_FABRICA' => $this->callutil->formatoFecha($row['FECHA_SALIDA_FABRICA']),
      'PA_FSF' => $row['PA_FSF'],
      'FECHA_EMBARQUE' => $this->callutil->formatoFecha($row['FECHA_EMBARQUE']),
      'PACKINGLIST' => $row['PACKINGLIST'],
      'GUIA_DESPACHO' => $row['GUIA_DESPACHO'],
      'NUMERO_DE_VIAJE' => $row['NUMERO_DE_VIAJE'],
      'ORIGEN' => $row['ORIGEN'],
      'DIAS_VIAJE' => $row['DIAS_VIAJE'],
      'UNIDADES_SOLICITADAS' => $row['UNIDADES_SOLICITADAS'],
      'UNIDADES_RECIBIDAS' => $row['UNIDADES_RECIBIDAS'],
      'REPORTE_DE_RECEPCION_RR' => $row['REPORTE_DE_RECEPCION_RR'],
      'REPORTE_DE_ENTREGA_RE' => $row['REPORTE_DE_ENTREGA_RE'],
      'REPORTE_DE_EXCEPCION_EXB' => $row['REPORTE_DE_EXCEPCION_EXB'],
      'INSPECCION_DE_INGENIERIA' => $row['INSPECCION_DE_INGENIERIA'],
      'OBSERVACION' => $row['OBSERVACION']
    );


    $exito =$this->callexternosbucksheet->insertError($memData);

  }


  public function exportCSVErrores($idError, $PurchaseOrderID)
  {

    $codEmpresa = $this->session->userdata('cod_emp');
    // file name 
    $filename = 'wpanel_errores_' . $PurchaseOrderID . '_' . date('Ymd') . date('H:i:s') . '.csv';
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: text/csv;charset=UTF-8");

    // get data 
    $usersData = $this->callexternosbucksheet->obtieneBuckSheetError($codEmpresa,$idError, $PurchaseOrderID);

 
    $arrBucksheet = json_decode($usersData);


    // file creation 
    $file = fopen('php://output', 'w');

   
    $header = array(
      "ID_ERROR",
      "MENSAJE_ERROR",
      "ID_OC",
      "NUMERO_OC",
      "DESCRIPCION_OC",
      "ITEM_OC",
      "SUB_ITEM_OC",
      "PROVEEDOR",
      "NUMERO_DE_LINEA",
      "TIPO_DE_LINEA",
      "ESTADO_DE_LINEA",
      "NUMERO_DE_TAG",
      "STOCKCODE",
      "DESCRIPCION_LINEA",
      "NUMERO_DE_ELEMENTOS",
      "CANTIDAD_UNITARIA",
      "CANTIDAD_TOTAL",
      "UNIDAD",
      "TRANSMITTAL_CLIENTE",
      "FECHA_TC",
      "TRANSMITTAL_PROVEEDOR",
      "FECHA_TP",
      "TRANSMITTAL_CLIENTE_FINAL",
      "FECHA_TCF",
      "PA_TCF",
      "NUMERO_DE_PLANO",
      "REVISION",
      "PAQUETE_DE_CONSTRUCCION_AREA",
      "FECHA_LINEA_BASE",
      "DIAS_ANTES_LB",
      "FECHA_COMIENZO_FABRICACION",
      "PA_FCF",
      "FECHA_TERMINO_FABRICACION",
      "PA_FTF",
      "FECHA_GRANALLADO",
      "PA_FG",
      "FECHA_PINTURA",
      "PA_FP",
      "FECHA_LISTO_INSPECCION",
      "PA_FLI",
      "ACTA_LIBERACION_CALIDAD",
      "FECHA_SALIDA_FABRICA",
      "PA_FSF",
      "FECHA_EMBARQUE",
      "PACKINGLIST",
      "GUIA_DESPACHO",
      "NUMERO_DE_VIAJE",
      "ORIGEN",
      "DIAS_VIAJE",
      "UNIDADES_SOLICITADAS",
      "UNIDADES_RECIBIDAS",
      "REPORTE_DE_RECEPCION_RR",
      "REPORTE_DE_ENTREGA_RE",
      "REPORTE_DE_EXCEPCION_EXB",
      "INSPECCION_DE_INGENIERIA",
      "OBSERVACION"
    );

  fputcsv($file, $header, ';', chr(27));

    foreach ($arrBucksheet as $key => $value) {


      $datos_bucksheet = array(

        "ID_ERROR" => $value->ID_ERROR,
        "MENSAJE_ERROR" => $value->MENSAJE_ERROR,
        'ID_OC' => $value->ID_OC,
            'NUMERO_OC' => $value->NUMERO_OC,
            'DESCRIPCION_OC' => $value->DESCRIPCION_OC,
            'ITEM_OC' => $value->ITEM_OC,
            'SUB_ITEM_OC' => $value->SUB_ITEM_OC,
            'PROVEEDOR' => $value->PROVEEDOR,
            'NUMERO_DE_LINEA' => $value->NUMERO_DE_LINEA,
            'TIPO_DE_LINEA' => $value->TIPO_DE_LINEA,
            'ESTADO_DE_LINEA' => $value->ESTADO_DE_LINEA,
            'NUMERO_DE_TAG' => $value->NUMERO_DE_TAG,
            'STOCKCODE' => $value->STOCKCODE,
            'DESCRIPCION_LINEA' => $value->DESCRIPCION_LINEA,
            'NUMERO_DE_ELEMENTOS' => $value->NUMERO_DE_ELEMENTOS,
            'CANTIDAD_UNITARIA' => $value->CANTIDAD_UNITARIA,
            'CANTIDAD_TOTAL' => $value->CANTIDAD_TOTAL,
            'UNIDAD' => $value->UNIDAD,
            'TRANSMITTAL_CLIENTE' => $value->TRANSMITTAL_CLIENTE,
            'FECHA_TC' => $value->FECHA_TC,
            'TRANSMITTAL_PROVEEDOR' => $value->TRANSMITTAL_PROVEEDOR,
            'FECHA_TP' => $this->callutil->formatoFechaSalida($value->FECHA_TP),
            'TRANSMITTAL_CLIENTE_FINAL' => $value->TRANSMITTAL_CLIENTE_FINAL,
            'FECHA_TCF' => $this->callutil->formatoFechaSalida($value->FECHA_TCF),
            'PA_TCF' => $value->PA_TCF,
            'NUMERO_DE_PLANO' => $value->NUMERO_DE_PLANO,
            'REVISION' => $value->REVISION,
            'PAQUETE_DE_CONSTRUCCION_AREA' => $value->PAQUETE_DE_CONSTRUCCION_AREA,
            'FECHA_LINEA_BASE' => $this->callutil->formatoFechaSalida($value->FECHA_LINEA_BASE),
            'DIAS_ANTES_LB' => $value->DIAS_ANTES_LB,
            'FECHA_COMIENZO_FABRICACION' => $this->callutil->formatoFechaSalida($value->FECHA_COMIENZO_FABRICACION),
            'PA_FCF' => $value->PA_FCF,
            'FECHA_TERMINO_FABRICACION' => $this->callutil->formatoFechaSalida($value->FECHA_TERMINO_FABRICACION),
            'PA_FTF' => $value->PA_FTF,
            'FECHA_GRANALLADO' => $this->callutil->formatoFechaSalida($value->FECHA_GRANALLADO),
            'PA_FG' => $value->PA_FG,
            'FECHA_PINTURA' => $this->callutil->formatoFechaSalida($value->FECHA_PINTURA),
            'PA_FP' => $value->PA_FP,
            'FECHA_LISTO_INSPECCION' => $this->callutil->formatoFechaSalida($value->FECHA_LISTO_INSPECCION),
            'PA_FLI' => $value->PA_FLI,
            'ACTA_LIBERACION_CALIDAD' => $value->ACTA_LIBERACION_CALIDAD,
            'FECHA_SALIDA_FABRICA' => $this->callutil->formatoFechaSalida($value->FECHA_SALIDA_FABRICA),
            'PA_FSF' => $value->PA_FSF,
            'FECHA_EMBARQUE' => $this->callutil->formatoFechaSalida($value->FECHA_EMBARQUE),
            'PACKINGLIST' => $value->PACKINGLIST,
            'GUIA_DESPACHO' => $value->GUIA_DESPACHO,
            'NUMERO_DE_VIAJE' => $value->NUMERO_DE_VIAJE,
            'ORIGEN' => $value->ORIGEN,
            'DIAS_VIAJE' => $value->DIAS_VIAJE,
            'UNIDADES_SOLICITADAS' => $value->UNIDADES_SOLICITADAS,
            'UNIDADES_RECIBIDAS' => $value->UNIDADES_RECIBIDAS,
            'REPORTE_DE_RECEPCION_RR' => $value->REPORTE_DE_RECEPCION_RR,
            'REPORTE_DE_ENTREGA_RE' => $value->REPORTE_DE_ENTREGA_RE,
            'REPORTE_DE_EXCEPCION_EXB' => $value->REPORTE_DE_EXCEPCION_EXB,
            'INSPECCION_DE_INGENIERIA' => $value->INSPECCION_DE_INGENIERIA,
            'OBSERVACION' => $value->OBSERVACION
      );



     $this->my_fputcsv($file, $datos_bucksheet, $delimiter = ';', $enclosure = '', $escape = '');
    }
   fclose($file);


    exit;
  }


  public  function my_fputcsv($handle, $fields, $delimiter = ',', $enclosure = '"', $escape = '\\')
  {
    $first = 1;
    foreach ($fields as $field) {
      if ($first == 0) fwrite($handle, $delimiter);

      $f = str_replace($enclosure, $enclosure . $enclosure, $field);
      if ($enclosure != $escape) {
        $f = str_replace($escape . $enclosure, $escape, $f);
      }
      if (strpbrk($f, " \t\n\r" . $delimiter . $enclosure . $escape) || strchr($f, "\000")) {
        fwrite($handle, $enclosure . $f . $enclosure);
      } else {
        fwrite($handle, $f);
      }

      $first = 0;
    }
    fwrite($handle, "\n");
  }
}
