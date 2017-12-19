<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion vente";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Vente";
	$_SESSION['breadcrumb_nav3'] ="";
	require_once('menu.php'); 
?>

<br/>
<div class="row">
	<div class="col-12">
	<?php 
		if(isset($_REQUEST['m'])) {?>
			<div class="alert alert-info">
				<?php echo $_REQUEST['m']?>
				<a href="#" data-dismiss="alert" class="close">x</a>
			</div>
	<?php 
		} 
	?>
	</div>
</div>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Recherche</h5>
				</div>
				<div class="widget-content nopadding">
					<form name="frm1" action="" method="post" class="form-horizontal">
					        <?php $change=" onchange='document.frm1.submit()' "?>
							<?php $valeur=$_REQUEST['id_clients'];?>
						  <div class="center_element">
								<div class="form-group">
									<label class="control-label">Choisir le client : </label>
								<?php echo getTableList('clients','id_clients',$valeur,'nom',$change,$where,$libelle) ?>
								</div>
						  </div>
							<div class="form-group">
								<label class="control-label space-label">Date entre</label>
							  <div class="controls">
						        	  <div class="row espace">
							        	   <div class="col-4">
					        					<input type="text" name="date1" value="<?php if(isset($_REQUEST['date1'])) echo $_REQUEST['date1'];?>" data-date-format="yyyy-mm-dd"  class="datepicker form-control input-small"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; et
							        	   </div>
							        	   <div class="col-4">
					        					<input type="text" name="date2" value="<?php if(isset($_REQUEST['date2'])) echo $_REQUEST['date2'];?>" data-date-format="yyyy-mm-dd"  class="datepicker form-control input-small"/> 
							        	   </div>
							        	    <div class="col-4">

												<input type="submit" name="v" class="btn btn-primary" value="<?php echo _RECHERCHE."r" ?>" />
					        			     
								        </div>
						        	   </div>
						         </div>
				        	</div>
				        </div>
						
					</form>
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

				<div class="element_float"><h5>Vente</h5></div>
				<div class="add-element">
				    <a href="ajouter_ventes.php" >
				        <i class="glyphicon glyphicon-plus"></i> &nbsp;<?php echo _AJOUTER ?> vente
				    </a>
				</div>
				<div class="element-clear"></div>
			</div>
			<br/>
			<div class="widget-content nopadding">
				<?php 
					$where1="";
				if(isset($_REQUEST['date1']) and isset($_REQUEST['date2']))
				{
					if(!empty($_REQUEST['date1']) and !empty($_REQUEST['date2']))
					$where1=" and date_vente between '".$_REQUEST['date1']."' and '".$_REQUEST['date2']."'";
				}
				if(isset($_REQUEST['id_clients']) and !empty($_REQUEST['id_clients']))
					$where1.=" and id_clients =".$_POST['id_clients'];

					$sql = "select * from ventes where 1=1 ".$where1." order by id";
					$res = doQuery($sql);

					$nb = mysql_num_rows($res);
					if( $nb==0){
						echo _VIDE;
					}
					else
					{
				?>
				<br/>
					<table class="table table-bordered table-striped table-hover data-table">
				      <thead>
				         <th>Date vente</th>
				         <th>clients</th>
				         <th>Montant</th>
						 <th class="op"> <?php echo _OP ?> </th>
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
				   			<td><?php echo formater_montant(getMontantVente($ligne['id']))." Dh"; ?></td>
							
							<td class="op">
    							<?php 
									$typeClient=getValeurChamp('type_client','clients','id',$ligne['id_clients']);
									if($typeClient==2){
								?>                        
            					<a href="ventes_facture_print_externe.php?ventes=<?php echo $ligne['id']; ?>" class="detail" title="Imprimer facture">
                                	<i class="fa fa-print"></i>
                                 </a>
            					<?php }
									if($typeClient==1){
								?>                        
            					<a href="ventes_facture_print_interne_journalier.php?ventes=<?php echo $ligne['id']; ?>" class="detail" title="Imprimer facture Journalier">
                                	<i class="fa fa-print"></i>
                                 </a>
            					<?php }
								?>
								&nbsp;
								<a href="detail_ventes.php?ventes=<?php echo $ligne['id'] ?>" class="detail" title="Detail">
									<i class="glyphicon glyphicon-wrench"></i>
				                </a>	
				                &nbsp;			
								<a href="modifier_ventes.php?ventes=<?php echo $ligne['id'] ?>" class="modifier2" title="Modifier">
									<i class="glyphicon glyphicon-edit"></i> 
				                </a>
								&nbsp;
				                <a href="#ancre" 
				                class="supprimer2" 
				                onclick="javascript:supprimer(
				                							'ventes',
				                                            '<?php echo $ligne['id'] ?>',
				                                            'ventes.php',
				                                            '1',
				                                            '1')
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

