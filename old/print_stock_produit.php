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
		$data =getDataStock(); 
		return $data;
	}
	// En-tête
	function Header()
	{
		// Logo
		$this->Image('logo_AlHanini.jpg',10,6,30);
		// Police Arial gras 15
		$this->SetFont('Arial','B',13);
		// Décalage à droite
		$this->Cell(45);
		// Titre
		$this->Cell(60,10,'Ste Boulangerie Patisserie Al Hanini S.A.R.L ',0,0,'C');
		// Saut de ligne
		$this->Ln(20);
		$this->SetFont('Arial','B',20);
		// Décalage à droite
		$this->Cell(60);
		// Titre
		$this->Cell(70,10,'Etat de stock',0,0,'C');
		// Saut de ligne
		$this->Ln(20);
	}

	// Pied de page
	function Footer()
	{
		// Positionnement à 1,5 cm du bas
		$this->SetY(-15);
		// Police Arial italique 8
		$this->SetFont('Arial','I',10);
		// adresse de page
		$this->Cell(0,10,'Depostaire  Marrakech  Adresse: Lot Massira 2 A N 829 /Tel: +212 661 369 412 / +212 600 531 642',0,0,'C');
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
		$w = array(40, 30, 30, 30,30,30);
		// En-tête
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		$this->Ln();
		// Données
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],'LR');
			$this->Cell($w[1],6,number_format($row[1],0,',',' '),'LR',0,'R');
			$this->Cell($w[2],6,number_format($row[2],0,',',' '),'LR',0,'R');
			$this->Cell($w[3],6,number_format($row[3],0,',',' '),'LR',0,'R');
			$this->Cell($w[4],6,number_format($row[4],0,',',' '),'LR',0,'R');
			$this->Cell($w[5],6,number_format($row[5],0,',',' '),'LR',0,'R');
			$this->Ln();
		}
		// Trait de terminaison
		$this->Cell(array_sum($w),0,'','T');
	}

	// Tableau coloré
	function FancyTable($header, $data)
	{
		// Couleurs, épaisseur du trait et police grasse
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		// En-tête
		$w = array(40, 35, 45, 30,30,30);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
		// Restauration des couleurs et de la police
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Données
		$fill = false;
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[1],6,number_format($row[1],0,',',' '),'LR',0,'R',$fill);
			$this->Cell($w[2],6,number_format($row[2],0,',',' '),'LR',0,'R',$fill);
			$this->Cell($w[3],6,number_format($row[3],0,',',' '),'LR',0,'R',$fill);
			$this->Cell($w[4],6,number_format($row[4],0,',',' '),'LR',0,'R',$fill);
			$this->Cell($w[5],6,number_format($row[5],0,',',' '),'LR',0,'R',$fill);
			$this->Ln();
			$fill = !$fill;
		}
		// Trait de terminaison
		$this->Cell(array_sum($w),0,'','T');
	 }
	}
	$pdf = new PDF();
	$pdf->AliasNbPages();
	// Titres des colonnes
	$header = array('Designation', 'A. Stock', 'Les entres', 'Les sorties', 'N. Stock', 'Changes');
	// Chargement des données
	$data = $pdf->LoadData();
	$pdf->SetFont('Arial','',14);
	$pdf->AddPage();
	$pdf->ImprovedTable($header,$data);
	$pdf->Output('','');
	
	
?>