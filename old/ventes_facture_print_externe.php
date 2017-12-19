<?php error_reporting(0) ?>
<?php require_once('lang.php'); ?>
<?php require_once('fonctions.php'); ?>
<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{

	// Chargement des données
	function LoadData()
	{
		$data = array();
		$data =getFactureVenteReduit($_REQUEST['ventes']);	
		return $data;
	}
	
	function getHeaderData(){
		$id_client=getValeurChamp('id_clients','ventes','id',$_REQUEST['ventes']);
		$dta=array();
		$dta[0][0]="Client : ".getValeurChamp('nom','clients','id',$id_client);
		$dta[1][0]=utf8_decode("Compagnon : ".getValeurChamp('compagnon','clients','id',$id_client));
		$dta[0][1]="Immatriculation : ".getValeurChamp('immatriculation','clients','id',$id_client);
		$dta[2][0]=utf8_decode("Télephone : ".getValeurChamp('tel','clients','id',$id_client));
		$dta[1][1]=utf8_decode("Sécteur : ".getValeurChamp('secteure','clients','id',$id_client));
		$dta[3][0]=utf8_decode("Départ Km : ".getValeurChamp('depart_km','ventes','id',$_REQUEST['ventes']));
		$dta[3][1]=utf8_decode("Départ à : ".getValeurChamp('depart_date_heur','ventes','id',$_REQUEST['ventes'])." h ".getValeurChamp('depart_date_min','ventes','id',$_REQUEST['ventes']));
		$dta[4][0]=utf8_decode("Arrivée Km : ".getValeurChamp('arrivee_km','ventes','id',$_REQUEST['ventes']));
		$dta[4][1]=utf8_decode("Arrivée à : ".getValeurChamp('arrivee_date_heur','ventes','id',$_REQUEST['ventes'])." h ".getValeurChamp('arrivee_date_min','ventes','id',$_REQUEST['ventes']));
		
		return $dta;
	}
// En-tête
	function Header()
	{
		
		$id_client=getValeurChamp('id_clients','ventes','id',$_REQUEST['ventes']);
		$facture_num=getValeurChamp('numero_facture','factures','id_ventes',$_REQUEST['ventes']);
		$date = date("d/m/Y");
		$heure = date("H:i");
		// Logo
		$this->Image('logo_AlHanini.jpg',10,6,30);
		// Police Arial gras 15
		$this->SetFont('Arial','B',13);
		// Décalage à droite
		$this->Cell(25);
		// Titre
		$title=utf8_decode('Sté Boulangerie Patisserie ');
		$this->Cell(60,10,$title,0,0,'C');
		$this->Cell(48);
		// Date
		$this->Cell(48,10,$heure,0,0,'C');
		$this->Cell(1);
		// Titre
		$this->Cell(1,10,$date,0,0,'C');
		// Saut de ligne
		$this->Ln(5);
		$this->Cell(30);
		// Titre
		$this->Cell(30,10,'Al Hanini S.A.R.L ',0,0,'C');
		// Saut de ligne
		$this->Ln(20);
		
		$this->SetFont('Arial','B',13);
		// Décalage à droite
		$this->Cell(5);
		// Titre
		/*$this->Cell(5,10,'client :',0,0,'C');
		$this->Cell(10);
		// Titre
		$this->Cell(55,10,$dta[0],0,0,'C');
		$this->SetFont('Arial','B',13);
		// Décalage à droite
		$this->Cell(28);
		// Titre
		$this->Cell(28,10,'Immatriculation :',0,0,'C');
		$this->Cell(15);
		// Titre
		$this->Cell(15,10,$dta[1],0,0,'C');
		// Saut de ligne
		$this->Ln(10);
		$this->SetFont('Arial','B',13);
		// Décalage à droite
		$this->Cell(2);
		// Titre
		$this->Cell(5,10,'Tel :',0,0,'C');
		$this->Cell(10);
		// Titre
		$this->Cell(55,10,$dta[3],0,0,'C');
		$this->SetFont('Arial','B',13);
		// Décalage à droite
		$this->Cell(28);
		// Titre
		$this->Cell(10,10,'secteur :',0,0,'C');
		$this->Cell(20);
		// Titre
		$this->Cell(20,10,$dta[4],0,0,'C');
		// Saut de ligne
		$this->Ln(10);
		$this->SetFont('Arial','B',13);
		// Décalage à droite
		$this->Cell(9);
		// Titre
		
		$this->Cell(10,10,'Depart Km  :',0,0,'C');
		$this->Cell(15);
		// Titre
		$this->Cell(15,10,$dta[5],0,0,'C');
		
		$this->SetFont('Arial','B',13);
		// Décalage à droite
		$this->Cell(45);
		// Titre
		$this->Cell(10,10,'Depart a  :',0,0,'C');
		$this->Cell(8);
		// Titre
		$this->Cell(8,10,$dta[6],0,0,'C');
		$this->Cell(1);
		// Titre
		$this->Cell(5,10,'h',0,0,'C');
		$this->Cell(1);
		// Titre
		$this->Cell(5,10,$dta[7],0,0,'C');
		// Saut de ligne
		$this->Ln(10);
		$this->SetFont('Arial','B',13);
		// Décalage à droite
		$this->Cell(10);
		// Titre
		$this->Cell(10,10,'Arrivee Km  :',0,0,'C');
		$this->Cell(15);
		// Titre
		$this->Cell(15,10,$dta[8],0,0,'C');
		$this->SetFont('Arial','B',13);
		// Décalage à droite
		$this->Cell(45);
		// Titre
		$this->Cell(10,10,'Arrivee a  :',0,0,'C');
		$this->Cell(8);
		// Titre
		$this->Cell(8,10,$dta[9],0,0,'C');
		$this->Cell(1);
		// Titre
		$this->Cell(5,10,'h',0,0,'C');
		$this->Cell(1);
		// Titre
		$this->Cell(5,10,$dta[10],0,0,'C');
		// Saut de ligne
		$this->Ln(20);*/
		$this->SetFont('Arial','B',20);
		$this->Cell(50);
		// Titre
		$fact=utf8_decode('Facture N° :');
		$this->Cell(50,10,$fact,0,0,'C');
		$this->Cell(5);
		// Titre
		$this->Cell(5,10,$facture_num,0,0,'C');
		// Saut de ligne
		$this->Ln(20);
		
	}

	// Pied de page
	function Footer()
	{
		// Positionnement à 1,5 cm du bas
		$this->SetY(-19);
		// Police Arial italique 8
		$this->SetFont('Arial','I',10);
		// adresse de page
		$this->Cell(0,10,"______________________________________________________________________",0,0,'C');
		$this->Ln(5);
		$adresse=utf8_decode('Dépostaire  Marrakech  Adresse: Lot Massira 2 A N° 829');
		$adress_half=utf8_decode('Tél: +212 661 369 412 / +212 600 531 642');
		$this->Cell(0,10,$adresse,0,0,'C');
		$this->Ln(5);
		$this->Cell(0,10,$adress_half,0,0,'C');
		// Numéro de page
		$this->Cell(1,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	// Tableau simple
	function BasicTable($header, $data)
	{
		// En-tête
		foreach($header as $col)
			$this->Cell(40,7,$col,1);
		$this->Ln();
		// Données
		foreach($data as $row)
		{
			foreach($row as $col)
				$this->Cell(40,6,$col,1);
			$this->Ln();
		}
	}

	// Tableau amélioré
	function ImprovedTable($header, $data)
	{
		// Largeurs des colonnes
		$wi=28;
		$w = array(45,$wi,$wi,$wi,$wi,38);
		// En-tête
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		$this->Ln();
		// Données
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],'LR');
			$this->Cell($w[1],6,$row[1],'LR',0,'R');
			$this->Cell($w[2],6,$row[2],'LR',0,'R');
			$this->Cell($w[3],6,$row[3],'LR',0,'R');
			$this->Cell($w[4],6,$row[4],'LR',0,'R');
			$this->Cell($w[5],6,$row[5],'LR',0,'R');
			$this->Ln();
		}
		// Trait de terminaison
		$this->Cell(array_sum($w),0,'','T');
	}

	// Tableau coloré
	function FancyTable($header, $data)
	{
		// Couleurs, épaisseur du trait et police grasse;
		$this->SetTextColor(0);
		$this->SetDrawColor(0,0,0);
		$this->SetLineWidth(.2);
		$this->SetFont('','B');
		// En-tête
		$wi=28;
		$w = array(130,95);
		/*for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],0,0,'L');
		$this->Ln();*/
		// Restauration des couleurs et de la police
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Données
		//$fill = false;
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],0,0,'L');
			$this->Cell($w[1],6,$row[1],0,0,'L');
			$this->Ln();
			$fill = !$fill;
		}
		// Trait de terminaison
		//$this->Cell(array_sum($w),0,'','T');
	 }
	}

	$pdf = new PDF();
	$pdf->AliasNbPages();
	// Titres des colonnes
	$designation=utf8_decode('Désignation');
	$header = array($designation, 'A.retour', 'Charge','N.retour', 'T.vente', 'Change');
	$header2 = array('','');
	// Chargement des données
	$pdf->Ln(30);
	$dta = $pdf->getHeaderData();
	$pdf->SetFont('Arial','',14);
	$pdf->AddPage();
	$pdf->FancyTable($header2,$dta);
	$pdf->Ln(10);
	$data = $pdf->LoadData();
	$pdf->SetFont('Arial','',14);
	
	$pdf->ImprovedTable($header,$data);
	$pdf->Output();
?>