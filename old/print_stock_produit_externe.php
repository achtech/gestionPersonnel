
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
		$data =getFacturClientExterne();
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
		$this->Cell(70,10,'Client Externe ',0,0,'C');
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
	// Tableau amélioré
	function ImprovedTable($header, $data)
	{
		// Largeurs des colonnes
		
		$nb=count($data[0]);
		$wi=150/$nb;
		// Données
		$w = array();
		$w[0]=45;
			
		foreach($data as $row)
		{
			for($c=0;$c<$nb;$c++){
				
				if($c==0)
					$this->Cell(45,6,$row[$c],'LR');
				else{
					$w[$c]=20<250/$nb?20:250/$nb;
					$this->Cell($w[$c],6,$row[$c],'LR');
				}
			}
			$this->Ln();
		}
		// Trait de terminaison
		$this->Cell(array_sum($w),0,'','T');
	}
}

$pdf = new PDF();
$pdf->AliasNbPages();
// Titres des colonnes
$header = array('');
// Chargement des données
$data = $pdf->LoadData();
$pdf->SetFont('Arial','',14);
$pdf->DefOrientation = 'L';
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->Output();

?>
