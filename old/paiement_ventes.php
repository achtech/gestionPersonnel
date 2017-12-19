<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion vente";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Vente";
	$_SESSION['breadcrumb_nav3'] ="Paiement ";
	
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
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>D&eacute;tail paiement</h5>
				</div>
				<div class="widget-content nopadding">
				    <div class="detail-mnt">
				    	<strong>Total du vente : </strong> <?php echo getMontantVente($_REQUEST['ventes']); ?>
					    <span style="padding-left:200px" ><strong>Somme payé : </strong><?php echo getMontantPaye($_REQUEST['ventes']); ?></span>
				    	<span style="padding-left:200px" ><strong>Somme restant : </strong><?php echo getMontantReste($_REQUEST['ventes']); ?></span>
				    </div>
				</div>
			</div>						
		  </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="glyphicon glyphicon-th"></i>
				</span>

				<div class="element_float"><h5>Paiement vente</h5></div>
				<div class="add-element">
				    <a href="ajouter_paiements.php?page=paiement_ventes.php&ventes=<?php echo $_REQUEST['ventes']?>" class="ajouter">
				        <i class="glyphicon glyphicon-plus"></i> &nbsp;<?php echo _AJOUTER ?> paiement
				    </a>
				</div>
				<div class="element-clear"></div>
			</div>
			<br/>
			<div class="widget-content nopadding">	
			 <br/>
			<?php 
				$sql = "select * from paiements where id_ventes=".$_REQUEST['ventes']." order by id";
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
			         <th>Date paiement</th>
			         <th>Montant</th>		
			         <th>Annuler</th>
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
						<td><?php echo $ligne['date_paiment'] ?></td>
			   			<td><?php echo formater_montant($ligne['montant'])." Dh"; ?></td>
						<td>
			            				&nbsp;
							
			                <a href="#ancre" 
			                class="supprimer2" 
			                onclick="javascript:supprimer(
			                							'paiements',
			                                            '<?php echo $ligne['id'] ?>',
			                                            'paiement_ventes.php',
			                                            'ventes',
			                                            '<?php echo $ligne['id_ventes']?>')
									" 
							title="<?php echo _SUPPRIMER ?>">
			                	
			                     <i class="glyphicon glyphicon-remove"></i>
			                </a>
			        </td>
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
<!--fin de la liste des clients-->
	 </div>
   </div>
 </div>
</div>
<?php require_once('foot.php'); ?>