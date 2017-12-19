<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des produits";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Produit";
	$_SESSION['breadcrumb_nav3'] ="Produit vender";
	
?>
<?php require_once('menu.php'); ?>
<br/>

<?php require_once('produits_onglets.php'); ?>
<br/>
<div class="row">
	<div class="col-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="glyphicon glyphicon-th"></i>
				</span>

				<div class="element_float"><h5>Produit vender </h5></div>
				
				<div class="element-clear"></div>
			</div>
			<div class="widget-content nopadding">
<?php 
	$sql = "select * from ventes as a ,ligne_ventes as la where a.id=la.id_ventes and la.id_produits=".$_REQUEST['produits'];
	$res = doQuery($sql);

	$nb = mysql_num_rows($res);
	if( $nb==0){
		echo _VIDE;
	}
	else
	{
?>

 

<p>
	<table class="table table-bordered table-striped table-hover data-table">
       <thead>
         <th>Date vente</th>
         <th>clients</th>
         <th>Quantité</th>         
		</thead>
        <tbody>
		<?php 
		$i = 0;
		while ($ligne = mysql_fetch_array($res)){
			
			if($i%2==0)
				$c = "c";
			else
				$c = "";
				
		?>
		<tr class="<?php echo $c ?>">
			
			<td><?php echo $ligne['date_vente'] ?></td>
			<td><?php echo getValeurChamp('nom','clients','id',$ligne['id_clients']) ?></td>
			<td><?php echo $ligne['qte_vente'] ?></td>            
		</tr>
		<?php
			$i++; 
		}
		?>
       </tbody>
	</table>

<?php 
}//Fin If
?>
		</div>
   </div>
</div>
</div>
<?php require_once('foot.php'); ?>


