<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion achat";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Achat";
	$_SESSION['breadcrumb_nav3'] ="D&eacute;tail achat";
	
?>
<?php require_once('menu.php'); ?>

<br/>
<div class="row">
	<div class="col-12">
		<?php if(isset($_REQUEST['m'])) {?>
			<div class="alert alert-info">
				<?php echo $_REQUEST['m']?>
				<a href="#" data-dismiss="alert" class="close">x</a>
			</div>
		<?php } ?>
	  

	</div>
</div>
<div class="row">
		<div class="col-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="glyphicon glyphicon-th"></i>
				</span>

				<div class="element_float"><h5>Produit command&eacute;s </h5></div>
				
				<div class="element-clear"></div>
			</div>
			<div class="widget-content nopadding">
            <br/>	
			<?php 
			$sql = "select * from ligne_achats where id_achats=".$_REQUEST['achats']." order by id";		
			$res = doQuery($sql);

			$nb = mysql_num_rows($res);
			if( $nb==0){
				echo _VIDE;
			}
			else
			{
			?>
			
				<table class="table table-bordered table-striped table-hover data-table" >
			       <thead>
			         <th>Designation</th>
                     <th>Qte</th>
                     <th>Prix</th>
                     <th>Total</th>  
				   </thead>
				   <tbody>
					<?php 
		$i = 0;
		$total=0;
		while ($ligne = mysql_fetch_array($res)){
			
			if($i%2==0)
				$c = "c";
			else
				$c = "";
				
		?>
		<tr class="<?php echo $c ?>">			
			<td><?php echo getValeurChamp('designation','produits','id',$ligne['id_produits']) ?></td>
			<td><?php echo $ligne['qte_achat'] ?></td>
			<td><?php echo $ligne['prix_achat'] ?></td>            
			<td><?php 
				$t=$ligne['prix_achat']*$ligne['qte_achat'];
				$total=$total+$t;
			echo  formater_montant($t);?> Dh</td>                        
		</tr>
		<?php
			$i++; 
		}
		?>
        <tr><td colspan="3" align="right">Total : </td><td><?php echo formater_montant($total)?> Dh</td></tr>
				  </tbody>
				</table>
			<?php 
			} //Fin If
			?>
			
		</div>
   </div>
</div>
</div>
<?php require_once('foot.php'); ?>