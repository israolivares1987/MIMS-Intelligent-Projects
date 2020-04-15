<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuckSheet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BuckSheet_model','bucksheet');
	}

	

	function obtieneBuckSheet(){


		$this->bucksheet->setPurchaseOrderID($this->input->post('PurchaseOrderID'));

		$BuckSheets = $this->bucksheet->obtieneBuckSheet();
		$no = 0;
		$data = array();
		foreach ($BuckSheets as $BuckSheet) {
			$no++;
			$row = array("Editar"=>'<a class="btn btn-block btn-outline-success" href="javascript:void(0)" title="Edit" onclick="edit_bucksheet('."'".$BuckSheet->NumeroLinea."'".','."'".$this->input->post('PurchaseOrderID')."'".')"><i class="glyphicon glyphicon-pencil"></i>Edit</a>',
			"purchaseOrdername"=>$BuckSheet->purchaseOrdername,
			"NumeroLinea"=>$BuckSheet->NumeroLinea,
			"ItemST"=>$BuckSheet->ItemST,
			"SubItemST"=>$BuckSheet->SubItemST,
			"STUnidad"=>$BuckSheet->STUnidad,
			"STCantidad"=>$BuckSheet->STCantidad,
			"TAGNumber"=>$BuckSheet->TAGNumber,
			"Stockcode"=>$BuckSheet->Stockcode,
			"Descripcion"=>$BuckSheet->Descripcion,
			"PlanoModelo"=>$BuckSheet->PlanoModelo,
			"Revision "=>$BuckSheet->Revision ,
			"PaqueteConstruccionArea"=>$BuckSheet->PaqueteConstruccionArea,
			"PesoUnitario"=>$BuckSheet->PesoUnitario,
			"PesoTotal"=>$BuckSheet->PesoTotal,
			"FechaRAS"=>$BuckSheet->FechaRAS,
			"DiasAntesRAS"=>$BuckSheet->DiasAntesRAS,
			"FechaComienzoFabricacion"=>$BuckSheet->FechaComienzoFabricacion,
			"PAFCF"=>$BuckSheet->PAFCF,
			"FechaTerminoFabricacion"=>$BuckSheet->FechaTerminoFabricacion,
			"PAFTF"=>$BuckSheet->PAFTF,
			"FechaGranallado"=>$BuckSheet->FechaGranallado,
			"PAFG"=>$BuckSheet->PAFG,
			"FechaPintura"=>$BuckSheet->FechaPintura,
			"PAFP"=>$BuckSheet->PAFP,
			"FechaListoInspeccion"=>$BuckSheet->FechaListoInspeccion,
			"PAFLI"=>$BuckSheet->PAFLI,
			"ActaLiberacionCalidad"=>$BuckSheet->ActaLiberacionCalidad,
			"FechaSalidaFabrica"=>$BuckSheet->FechaSalidaFabrica,
			"PAFSF"=>$BuckSheet->PAFSF,
			"FechaEmbarque"=>$BuckSheet->FechaEmbarque,
			"PackingList"=>$BuckSheet->PackingList,
			"GuiaDespacho"=>$BuckSheet->GuiaDespacho,
			"SCNNumber"=>$BuckSheet->SCNNumber,
			"UnidadesSolicitadas"=>$BuckSheet->UnidadesSolicitadas,
			"UnidadesRecibidas"=>$BuckSheet->UnidadesRecibidas,
			"MaterialReceivedReport"=>$BuckSheet->MaterialReceivedReport,
			"MaterialWithdrawalReport"=>$BuckSheet->MaterialWithdrawalReport,
			"Origen"=>$BuckSheet->Origen,
			"DiasViaje"=>$BuckSheet->DiasViaje,
			"Observacion1"=>$BuckSheet->Observacion1,
			"Observacion2"=>$BuckSheet->Observacion2,
			"Observacion3"=>$BuckSheet->Observacion3,
			"Observacion4"=>$BuckSheet->Observacion4,
			"Observacion5"=>$BuckSheet->Observacion5,
			"Observacion6"=>$BuckSheet->Observacion6,
			"Observacion7"=>$BuckSheet->Observacion7			
			);
			
			

			$data[] = $row;
		}

		$output = array(
						"draw" => false,
						"recordsTotal" => $this->bucksheet->count_all_BuckSheet(),
						"recordsFiltered" => $this->bucksheet->count_all_BuckSheet(),
						"data" => $data,
						
				);

				
		//output to json format
		echo json_encode(array_filter($output),true);
	}

	 function getRows(){

		$PurchaseOrderID = $this->input->post('PurchaseOrderID');
		$NumeroLinea = $this->input->post('NumeroLinea');


		$con = array(
			'where' => array(
				'PurchaseOrderID' => $PurchaseOrderID,
				'NumeroLinea' => $NumeroLinea
			),
			'returnType' => 'count'
		);


		$prevCount = $this->bucksheet->getRows($con);
		
		
		echo $prevCount;
	 }
	 
	 function update(){

				// Update member data
				$form_data = array(
					'PurchaseOrderID'=>$this->input->post('PurchaseOrderID'),
					'purchaseOrdername'=>$this->input->post('purchaseOrdername'),
					'NumeroLinea'=>$this->input->post('NumeroLinea'),
					'ItemST'=>$this->input->post('ItemST'),
					'SubItemST'=>$this->input->post('SubItemST'),
					'STUnidad'=>$this->input->post('STUnidad'),
					'STCantidad'=>$this->input->post('STCantidad'),
					'TAGNumber'=>$this->input->post('TAGNumber'),
					'Stockcode'=>$this->input->post('Stockcode'),
					'Descripcion'=>$this->input->post('Descripcion'),
					'PlanoModelo'=>$this->input->post('PlanoModelo'),
					'Revision '=>$this->input->post('Revision '),
					'PaqueteConstruccionArea'=>$this->input->post('PaqueteConstruccionArea'),
					'PesoUnitario'=>$this->input->post('PesoUnitario'),
					'PesoTotal'=>$this->input->post('PesoTotal'),
					'FechaRAS'=>$this->input->post('FechaRAS'),
					'DiasAntesRAS'=>$this->input->post('DiasAntesRAS'),
					'FechaComienzoFabricacion'=>$this->input->post('FechaComienzoFabricacion'),
					'PAFCF'=>$this->input->post('PAFCF'),
					'FechaTerminoFabricacion'=>$this->input->post('FechaTerminoFabricacion'),
					'PAFTF'=>$this->input->post('PAFTF'),
					'FechaGranallado'=>$this->input->post('FechaGranallado'),
					'PAFG'=>$this->input->post('PAFG'),
					'FechaPintura'=>$this->input->post('FechaPintura'),
					'PAFP'=>$this->input->post('PAFP'),
					'FechaListoInspeccion'=>$this->input->post('FechaListoInspeccion'),
					'PAFLI'=>$this->input->post('PAFLI'),
					'ActaLiberacionCalidad'=>$this->input->post('ActaLiberacionCalidad'),
					'FechaSalidaFabrica'=>$this->input->post('FechaSalidaFabrica'),
					'PAFSF'=>$this->input->post('PAFSF'),
					'FechaEmbarque'=>$this->input->post('FechaEmbarque'),
					'PackingList'=>$this->input->post('PackingList'),
					'GuiaDespacho'=>$this->input->post('GuiaDespacho'),
					'SCNNumber'=>$this->input->post('SCNNumber'),
					'UnidadesSolicitadas'=>$this->input->post('UnidadesSolicitadas'),
					'UnidadesRecibidas'=>$this->input->post('UnidadesRecibidas'),
					'MaterialReceivedReport'=>$this->input->post('MaterialReceivedReport'),
					'MaterialWithdrawalReport'=>$this->input->post('MaterialWithdrawalReport'),
					'Origen'=>$this->input->post('Origen'),
					'DiasViaje'=>$this->input->post('DiasViaje'),
					'Observacion1'=>$this->input->post('Observacion1'),
					'Observacion2'=>$this->input->post('Observacion2'),
					'Observacion3'=>$this->input->post('Observacion3'),
					'Observacion4'=>$this->input->post('Observacion4'),
					'Observacion5'=>$this->input->post('Observacion5'),
					'Observacion6'=>$this->input->post('Observacion6'),
					'Observacion7'=>$this->input->post('Observacion7')
				);

	$update = $this->bucksheet->update($form_data,$this->input->post('PurchaseOrderID'),$this->input->post('NumeroLinea'));
		
	echo $update;
	 }


		
	 function insert(){



		$form_data = array(
					'PurchaseOrderID'=>$this->input->post('PurchaseOrderID'),
					'purchaseOrdername'=>$this->input->post('purchaseOrdername'),
					'NumeroLinea'=>$this->input->post('NumeroLinea'),
					'ItemST'=>$this->input->post('ItemST'),
					'SubItemST'=>$this->input->post('SubItemST'),
					'STUnidad'=>$this->input->post('STUnidad'),
					'STCantidad'=>$this->input->post('STCantidad'),
					'TAGNumber'=>$this->input->post('TAGNumber'),
					'Stockcode'=>$this->input->post('Stockcode'),
					'Descripcion'=>$this->input->post('Descripcion'),
					'PlanoModelo'=>$this->input->post('PlanoModelo'),
					'Revision '=>$this->input->post('Revision '),
					'PaqueteConstruccionArea'=>$this->input->post('PaqueteConstruccionArea'),
					'PesoUnitario'=>$this->input->post('PesoUnitario'),
					'PesoTotal'=>$this->input->post('PesoTotal'),
					'FechaRAS'=>$this->input->post('FechaRAS'),
					'DiasAntesRAS'=>$this->input->post('DiasAntesRAS'),
					'FechaComienzoFabricacion'=>$this->input->post('FechaComienzoFabricacion'),
					'PAFCF'=>$this->input->post('PAFCF'),
					'FechaTerminoFabricacion'=>$this->input->post('FechaTerminoFabricacion'),
					'PAFTF'=>$this->input->post('PAFTF'),
					'FechaGranallado'=>$this->input->post('FechaGranallado'),
					'PAFG'=>$this->input->post('PAFG'),
					'FechaPintura'=>$this->input->post('FechaPintura'),
					'PAFP'=>$this->input->post('PAFP'),
					'FechaListoInspeccion'=>$this->input->post('FechaListoInspeccion'),
					'PAFLI'=>$this->input->post('PAFLI'),
					'ActaLiberacionCalidad'=>$this->input->post('ActaLiberacionCalidad'),
					'FechaSalidaFabrica'=>$this->input->post('FechaSalidaFabrica'),
					'PAFSF'=>$this->input->post('PAFSF'),
					'FechaEmbarque'=>$this->input->post('FechaEmbarque'),
					'PackingList'=>$this->input->post('PackingList'),
					'GuiaDespacho'=>$this->input->post('GuiaDespacho'),
					'SCNNumber'=>$this->input->post('SCNNumber'),
					'UnidadesSolicitadas'=>$this->input->post('UnidadesSolicitadas'),
					'UnidadesRecibidas'=>$this->input->post('UnidadesRecibidas'),
					'MaterialReceivedReport'=>$this->input->post('MaterialReceivedReport'),
					'MaterialWithdrawalReport'=>$this->input->post('MaterialWithdrawalReport'),
					'Origen'=>$this->input->post('Origen'),
					'DiasViaje'=>$this->input->post('DiasViaje'),
					'Observacion1'=>$this->input->post('Observacion1'),
					'Observacion2'=>$this->input->post('Observacion2'),
					'Observacion3'=>$this->input->post('Observacion3'),
					'Observacion4'=>$this->input->post('Observacion4'),
					'Observacion5'=>$this->input->post('Observacion5'),
					'Observacion6'=>$this->input->post('Observacion6'),
					'Observacion7'=>$this->input->post('Observacion7')
		);

		$insert = $this->bucksheet->insert($form_data);
		
		echo $insert;
	}

	
	}

	
     
?>