<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Pointage des personnels";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Pointage";
	$_SESSION['breadcrumb_nav3'] ="Ajout des pointages";
	
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

				<div class="element_float"><h5>Personnels</h5></div>
				<div class="element-clear"></div>
			</div>
			<br/>
			<div class="widget-content nopadding">
				<?php 
					$where1="";
					if(isset($_POST['txtrechercher']) and !empty($_REQUEST['txtrechercher']))
					 $where1.="and (nom like '%".$_POST['txtrechercher']."%' or prenom like '%".$_POST['txtrechercher']."%' or cin like '%".$_POST['txtrechercher']."%' or telephone like '%".$_POST['txtrechercher']."%' or cnss like '%".$_POST['txtrechercher']."%' or rib like '%".$_POST['txtrechercher']."%' or 	DATE_EMBAUCHE like '%".$_POST['txtrechercher']."%' or code like '%".$_POST['txtrechercher']."%' or adresse like '%".$_POST['txtrechercher']."%') ";

					$sql = "select * from personnels where status=1 ".$where1." order by id";
					$res = doQuery($sql);

					$nb = mysql_num_rows($res);
					if( $nb==0){
					 echo _VIDE;
					}
					else
					{
				?>
				<br/>
				<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal">
						<input type="hidden" name="act" value="ajouter_pointage"/>
					    <input type="hidden" name="table" value="pointages"/>
						<input type="hidden" name="page" value="pointages.php"/>
					
					<table class="table table-bordered table-striped table-hover data-table">
				      <thead>
				         <th>Code</th>
				         <th>Nom</th>
				         <th>Date</th>
				         <th>Heur N</th>
				         <th>Heur S</th>
				         <th>Chantier</th>
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
							<input type="hidden" name="id_<?php echo $i ?>" value="<?php echo $ligne['ID'] ?>"/>
							<td><?php echo $ligne['CODE'] ?></td>
							<td><?php echo $ligne['NOM']." ".$ligne['PRENOM'] ?></td>
							<td><input type="date" id="cal_required" name="DATE_POINTAGE_<?php echo $i ?>"   class="form-control input-small" /></td>
							<td><input type="text" id="<?php echo "HEUR_N" ?>__required" name="HEUR_N_<?php echo $i ?>"  class="form-control input-small"/></td>
							<td><input type="text" id="<?php echo "HEUR_S" ?>__required" name="HEUR_S_<?php echo $i ?>"  class="form-control input-small"/></td>
							<td><input type="text" id="<?php echo "CODE_CHANTIER" ?>__required" name="CODE_CHANTIER_<?php echo $i ?>"  class="form-control input-small"/></td>
						</tr>
						<?php
							$i++; 
						}
						?>
						<input type="hidden" name="nb_personnage" value="<?php echo $i ?>"/>
					  </tbody>
					</table>
				<br/>
				<?php 
				} //Fin If
				?>
				<div class="form-actions">
							<input type="submit" class="btn btn-primary" value="<?php echo _VALIDER ?>" /> ou <a class="text-danger" href="personnels.php">Annuler</a>
						</div>
					</form>
 		</div>
	   </div>
	</div>
</div>
<?php require_once('foot.php'); ?>