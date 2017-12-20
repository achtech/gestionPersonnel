<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des avances";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Avances";
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
							  <label class="control-label">Employe ou chantier:</label>
							      <div class="controls">
							        <input type="text" name="txtrechercher" value="<?php if(isset($_POST['txtrechercher'])) echo $_POST['txtrechercher']; ?>" class="form-control input-small-recherche" />
							     </div>
						 </div>
						 <div class="form-group">
							  <label class="control-label">Date d'avance entre:</label>
							      <div class="controls">
							        <input type="date" id="cal_required" name="dateDebut"  value="<?php if(isset($_POST['dateDebut'])) echo $_POST['dateDebut']; ?>" class="form-control input-small" />
							     </div>
						 </div>
						 <div class="form-group">
							  <label class="control-label">Et :</label>
							      <div class="controls">
							       <input type="date" id="cal_required" name="dateFin"  value="<?php if(isset($_POST['dateFin'])) echo $_POST['dateFin']; ?>"   class="form-control input-small" />
							     </div>
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

				<div class="element_float"><h5>Avances</h5></div>
				<div class="add-element">
				    <a href="ajouter_avance.php" >
				        <i class="glyphicon glyphicon-plus"></i> &nbsp;<?php echo _AJOUTER ?> avance
				    </a>
				</div>
				<div class="element-clear"></div>
			</div>
			<br/>
			<div class="widget-content nopadding">
				<?php 
					$where1="";
					if(isset($_POST['txtrechercher']) && !empty($_REQUEST['txtrechercher']))
					 $where1.=" and (ID_PERSONNELS in (select ID from personnels where NOM like '%".$_POST['txtrechercher']."%' or PRENOM like '%".$_POST['txtrechercher']."%' or CODE like '%".$_POST['txtrechercher']."%')  or ID_CHANTIER in (select ID from chantiers where CODE like '%".$_POST['txtrechercher']."%'))";

					if(isset($_POST['dateDebut']) && !empty($_REQUEST['dateDebut']))
					 $where1.=" and DATE_EMPREINTE >= DATE_FORMAT('".$_POST['dateDebut']."', '%Y-%m-%d')";

					if(isset($_POST['dateFin']) && !empty($_REQUEST['dateFin']))
					 $where1.=" and DATE_EMPREINTE <= DATE_FORMAT('".$_POST['dateFin']."', '%Y-%m-%d')";

					$sql = "select * from avances where 1=1 ".$where1." order by ID desc";
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
				         <th>Code</th>
				         <th>Nom</th>
				         <th>Date empriente</th>
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
							<td><?php echo getValeurChamp('CODE','personnels', 'ID',$ligne['ID_PERSONNELS']) ?></td>
							<td><?php echo getValeurChamp('NOM','personnels', 'ID',$ligne['ID_PERSONNELS'])." ".getValeurChamp('PRENOM','personnels', 'ID',$ligne['ID_PERSONNELS']) ?></td>
							<td><?php echo $ligne['DATE_EMPREINTE'] ?></td>
							<td><?php echo $ligne['MONTANT'] ?> Dh</td>
							<td class="op">
							    &nbsp;
								<a href="modifier_avances.php?avances=<?php echo $ligne['ID'] ?>" class="modifier2" title="<?php echo _MODIFIER ?>">
									<i class="glyphicon glyphicon-edit"></i> 
				                </a>
								&nbsp;
								
				                <a href="#ancre" 
				                class="supprimer2" 
				                onclick="javascript:supprimer(
				                							'avances',
				                                            '<?php echo $ligne['ID'] ?>',
				                                            'avances.php',
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