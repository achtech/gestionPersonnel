<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion client";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Client";
	$_SESSION['breadcrumb_nav3'] ="";
	
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
					<h5>Recherche</h5>
				</div>
				<div class="widget-content nopadding">
					<form name="frm1" action="" method="post" class="form-horizontal">
						 <div class="form-group">
							  <label class="control-label"><?php echo _RECHERCHER ?>:</label>
							      <div class="controls">
							        <input type="text" name="txtrechercher" value="<?php if(isset($_POST['txtrechercher'])) echo $_POST['txtrechercher']; ?>" class="form-control input-small-recherche" />
							     </div>
						 </div>
						 <div class="form-group">
							    <?php $change=" onchange='document.frm1.submit()' ";
									$valeur=$_REQUEST['type_client'];
								?> 
							<label class="control-label">Choisir le type du client : </label>
							
						    	<?php echo getTabList($tab_client,"type_client",$valeur,$change,_TYPE) ?>
						   
						</div>
						<div class="form-actions">
							<input type="submit" name="v" class="btn btn-primary" value="<?php echo _RECHERCHE."r" ?>" />
						
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

				<div class="element_float"><h5>Clients</h5></div>
				<div class="add-element">
				    <a href="ajouter_clients.php" >
				        <i class="glyphicon glyphicon-plus"></i> &nbsp;<?php echo _AJOUTER ?> <?php echo _CLIENTS ?>
				    </a>
				</div>
				<div class="element-clear"></div>
			</div>
			<br/>
			<div class="widget-content nopadding">
				<?php 
					$where1="";
					if(isset($_POST['txtrechercher']) and !empty($_REQUEST['txtrechercher']))
					 $where1.="and (nom like '%".$_POST['txtrechercher']."%' or immatriculation like '%".$_POST['txtrechercher']."%' or compagnon like '%".$_POST['txtrechercher']."%' or secteure like '%".$_POST['txtrechercher']."%' or tel like '%".$_POST['txtrechercher']."%') ";

					if(isset($_POST['type_client']) and !empty($_REQUEST['type_client']))
					 $where1.="and type_client=".$_POST['type_client']." ";

					$sql = "select * from clients where 1=1 ".$where1." order by id";
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
				         <th>Type</th>
				         <th>Nom</th>
				         <th><?php echo "Immatriculation" ?></th>
				         <th><?php echo "Compagnon" ?></th>
				         <th><?php echo "secteure" ?></th>
				         <th><?php echo "Telephone" ?></th>
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
							<td><?php echo $ligne['type_client']==1?"Interne":"Externe" ?></td>							
							<td><?php echo $ligne['nom'] ?></td>
							<td><?php echo $ligne['immatriculation'] ?></td>
							<td><?php echo $ligne['compagnon'] ?></td>
							<td><?php echo $ligne['secteure'] ?></td>
							<td><?php echo $ligne['tel'] ?></td>
							<td class="op">
								<?php 
									if($ligne['type_client']==1){
								?>                        
            					<a href="ventes_factures.php?clients=<?php echo $ligne['id']; ?>" class="detail" title="Imprimer facture global">
                                	<i class="fa fa-print"></i>
                                 </a>
								<?php 
									}
								?>                        

    							<a href="clients_credit.php?clients=<?php echo $ligne['id'] ?>" class="paiement" title="Paiement">
				                	<i class="fa fa-money"></i>
				                </a>
							    &nbsp;
								<a href="modifier_clients.php?clients=<?php echo $ligne['id'] ?>" class="modifier2" title="<?php echo _MODIFIER ?>">
									<i class="glyphicon glyphicon-edit"></i> 
				                </a>
								&nbsp;
								
				                <a href="#ancre" 
				                class="supprimer2" 
				                onclick="javascript:supprimer(
				                							'clients',
				                                            '<?php echo $ligne['id'] ?>',
				                                            'clients.php',
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
				<br/>
				<?php 
				} //Fin If
				?>
 		</div>
	   </div>
	</div>
</div>
<?php require_once('foot.php'); ?>