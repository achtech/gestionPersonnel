<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion vente";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Vente";
	$_SESSION['breadcrumb_nav3'] ="D&eacute;tail vente";
	
?>
<?php require_once('menu.php'); ?>
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
				$sql = "select * from ligne_ventes where id_ventes=".$_REQUEST['ventes']." order by id";		
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
				         <th>A retour</th>
				         <th>Charge</th>
				         <th>Nbr retour</th>
				         <th>Change</th>                                                                           
				         <th>Prix unitaire</th>
				         <th>Montant</th>
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
							<td><?php echo getValeurChamp('designation','produits','id',$ligne['id_produits']) ?></td>
							<td><?php echo $ligne['a_retour'] ?></td>
							<td><?php echo $ligne['qte_vente'] ?></td>
                            <td><?php echo $ligne['nbr_retour'] ?></td>
                            <td><?php echo $ligne['qte_change'] ?></td>
							<td><?php echo $ligne['prix_vente'] ?> Dh</td>            
							<td><?php echo formater_montant($ligne['prix_vente']*($ligne['qte_vente']+$ligne['a_retour']-$ligne['nbr_retour'])) ?> Dh</td>                        
						</tr>
						<?php
							$i++; 
						}
						?>
					  </tbody>
					</table>
				</p>

				<?php 
				} //Fin If
				?>

		</div>
   </div>
</div>
</div>
<?php require_once('foot.php'); ?>