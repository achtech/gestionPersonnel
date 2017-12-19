
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion achat";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="D&eacute;tail achat";
	$_SESSION['breadcrumb_nav3'] ="Nouveau commande produit";

?>
<?php require_once('menu.php'); ?>

<div class="row">
	<div class="col-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="glyphicon glyphicon-align-justify"></i>									
				</span>
				<h5>Produit command&eacute;s</h5>
			</div>
			<div class="widget-content nopadding">
				<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal">
					<input type="hidden" name="act" value="ajouter_ligne_achat"/>
				    <input type="hidden" name="table" value="ligne_achats"/>
					<input type="hidden" name="page" value="achats.php"/>

				<?php 
				$sql = "select * from produits
						order by 
							id";		
				$res = doQuery($sql);

				$nb = mysql_num_rows($res);
				if( $nb==0){
					echo _VIDE;
				}
				else
				{
				?>
				
					<table class="table table-bordered table-striped table-hover data-table">
					  <thead>
				        <th> <?php echo _NOM ?> </th>
				        <th> Quantité </th>	
				        <th> Prix </th>	                        
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
							<td><?php echo $ligne['designation'] ?></td>
				            <td><input type="text" name="qte_<?php echo $ligne['id']; ?>" /></td>
                            <td><input type="text" name="prix_<?php echo $ligne['id']; ?>" value="<?php echo $ligne['prix_achat']; ?>"/></td> 
				        </tr>
						<?php
							$i++; 
						}
						?>
					  </tbody>
					</table>
				
				<div class="form-actions">	
					<input type="submit" value="Valider" class="btn btn-primary" />
				</div>

				<?php 
				} //Fin If
				?>
				    
			</form>
		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>
