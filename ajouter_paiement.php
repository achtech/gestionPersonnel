<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Paiement des personnels et des ouvriers";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Pointage";
	$_SESSION['breadcrumb_nav3'] ="Ajout des paiements";
	
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
							        <input type="text" name="txtrechercher" value="<?php if(isset($_REQUEST['txtrechercher'])) echo $_REQUEST['txtrechercher'];?>" class="form-control input-small-recherche" />
							     </div>
						 </div>
							 <div class="form-group">
							  <label class="control-label">Date pointage entre:</label>
							      <div class="controls">
							        <input type="date" id="cal_required" name="dateDebut"  value="<?php if(isset($_REQUEST['dateDebut'])) echo $_REQUEST['dateDebut']; ?>" class="form-control input-small" />
							     </div>
						 </div>
						 <div class="form-group">
							  <label class="control-label">Et :</label>
							      <div class="controls">
							       <input type="date" id="cal_required" name="dateFin"  value="<?php if(isset($_REQUEST['dateFin'])) echo $_REQUEST['dateFin']; ?>"   class="form-control input-small" />
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
<?php if(isset($_REQUEST['txtrechercher']) && !empty($_REQUEST['txtrechercher']) && isset($_REQUEST['dateDebut']) && !empty($_REQUEST['dateDebut']) &&  isset($_REQUEST['dateFin']) && !empty($_REQUEST['dateFin'])) {?>
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
					if(isset($_REQUEST['txtrechercher']) and !empty($_REQUEST['txtrechercher']))
					 $where1.="and (NOM like '%".$_REQUEST['txtrechercher']."%' or PRENOM like '%".$_REQUEST['txtrechercher']."%' or CIN like '%".$_REQUEST['txtrechercher']."%' or TELEPHONE like '%".$_REQUEST['txtrechercher']."%' or CNSS like '%".$_REQUEST['txtrechercher']."%' or RIB like '%".$_REQUEST['txtrechercher']."%' or 	DATE_EMBAUCHE like '%".$_REQUEST['txtrechercher']."%' or CODE like '%".$_REQUEST['txtrechercher']."%' or ADRESSE like '%".$_REQUEST['txtrechercher']."%') ";
					if(isset($_REQUEST['dateDebut']) && !empty($_REQUEST['dateDebut']))
					 $where1.=" and ID IN (SELECT ID_PERSONNELS FROM pointages where DATE_POINTAGE >= DATE_FORMAT('".$_REQUEST['dateDebut']."', '%Y-%m-%d'))";

					if(isset($_REQUEST['dateFin']) && !empty($_REQUEST['dateFin']))
					  $where1.=" and ID IN (SELECT ID_PERSONNELS FROM pointages where DATE_POINTAGE < DATE_FORMAT('".$_REQUEST['dateFin']."', '%Y-%m-%d'))";


					$sql = "select * from personnels where STATUS=1 ".$where1." order by ID";
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
					<input type="hidden" name="act" value="ajouter_paiement"/>
					<input type="hidden" name="DATE_POINTAGE_START" value="<?php echo $_REQUEST['dateStart'] ?>"/>
					<input type="hidden" name="DATE_POINTAGE_END" value="<?php echo $_REQUEST['dateFin'] ?>"/>
					
					<table class="table table-bordered table-striped table-hover data-table">
				      <thead>
				         <th>Code</th>
				         <th>Nom</th>
				         <th>Somme heurs N</th>
				         <th>Somme Heurs S</th>
				         <th>Tarif journaliere / Salaire</th>
				         <th>Avance</th>
				         <th>Montant</th>
				         <th>Valider</th>
				         
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
							<td><?php echo getSommeHeurN($ligne['ID'],$_REQUEST['dateDebut'],$_REQUEST['dateFin']) ?></td>
							<td><?php echo getSommeHeurS($ligne['ID'],$_REQUEST['dateDebut'],$_REQUEST['dateFin']) ?></td>
							<td><?php echo $ligne['TYPE']=="Salarie"?$ligne['SALAIRE_MENSUELLE']:$ligne['TARIF_JOURNALIERS'] ?></td>
							<td><?php echo getSommeAvance($ligne['ID'],$_REQUEST['dateDebut'],$_REQUEST['dateFin']) ?></td>
							<td><?php echo getMontant($ligne['ID'],$_REQUEST['dateDebut'],$_REQUEST['dateFin']) ?></td>
							<td><a href="gestion.php?act=valider_paiement&personnels=<?php echo $ligne['ID']?>&dateDebut=<?php echo $_REQUEST['dateDebut']?>&dateFin=<?php echo $_REQUEST['dateFin']?>"
				                class="supprimer2"  
								title="Valider le paiement">
				                	 <i class="glyphicon glyphicon-ok"></i> 
				                </a>
				            </td>
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
							<a class="text-danger" href="paiements.php">Retour</a>
						</div>
					</form>
 		</div>
	   </div>
	</div>
</div>
<?php  } ?>
<?php require_once('foot.php'); ?>