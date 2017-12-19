
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des paiements";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Paiements";
	$_SESSION['breadcrumb_nav3'] ="Modifier un paiement";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Mis a jour du paiement</h5>
				</div>
				<div class="widget-content nopadding">	
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal">
						<input type="hidden" name="act" value="m"/>
					    <input type="hidden" name="table" value="paiements"/>
						<input type="hidden" name="page" value="paiements.php"/>
						
						<input type="hidden" name="id_nom" value="ID"/>
						<input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['paiements'] ?>"/>	
					    
					    <input type="hidden" name="id_noms_retour" value="paiements"/>
						<input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['paiements'] ?>"/>	
						
					    <div class="form-group">
							<label class="control-label"><?php echo "Nom" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('NOM','personnels','ID', getValeurChamp('ID_PERSONNELS','paiements','ID',$_REQUEST['paiements'])) ?> <?php echo getValeurChamp('PRENOM','personnels','ID', getValeurChamp('ID_PERSONNELS','paiements','ID',$_REQUEST['paiements'])) ?>
							</div>
					    </div>
					    <div class="form-group">
							<label class="control-label"><?php echo "Code" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('CODE','personnels','ID', getValeurChamp('ID_PERSONNELS','paiements','ID',$_REQUEST['paiements'])) ?>
							</div>
						</div>
						
					    <div class="form-group">
							<label class="control-label"><?php echo "Date paiement" ?> : </label>
							<div class="controls">
								<input type="date" id="cal_required"  class="form-control input-small"  value="<?php echo getValeurChamp('DATE_PAIEMENT','paiements','ID',$_REQUEST['paiements']); ?>"
									name="DATE_PAIEMENT"  />
							</div>
						</div>
						
					    <div class="form-group">
							<label class="control-label"><?php echo "Date de debut du pointage" ?> : </label>
							<div class="controls">
								<input type="date" id="cal_required"  class="form-control input-small"  value="<?php echo getValeurChamp('DATE_POINTAGE_START','paiements','ID',$_REQUEST['paiements']); ?>"
									name="DATE_POINTAGE_START"  />
							</div>
						</div>

					    <div class="form-group">
							<label class="control-label"><?php echo "Date de fin du pointage" ?> : </label>
							<div class="controls">
								<input type="date" id="cal_required"  class="form-control input-small"  value="<?php echo getValeurChamp('DATE_POINTAGE_END','paiements','ID',$_REQUEST['paiements']); ?>"
									name="DATE_POINTAGE_END"  />
							</div>
						</div>

					    <div class="form-group">
							<label class="control-label"><?php echo "Somme des heurs normaux"?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "SOMME_HEUR_N" ?>_required"  value="<?php echo getValeurChamp('SOMME_HEUR_N','paiements','ID',$_REQUEST['paiements']); ?>"
									name="SOMME_HEUR_N"  class="form-control input-small"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "Somme des heurs supplementaires" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "SOMME_HEUR_S" ?>_required"  value="<?php echo getValeurChamp('SOMME_HEUR_S','paiements','ID',$_REQUEST['paiements']); ?>"
									name="SOMME_HEUR_S"  class="form-control input-small" />
							</div>
						</div>
					    <div class="form-group">
							<label class="control-label"><?php echo "Montant"?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "MONTANT" ?>_required"  value="<?php echo getValeurChamp('MONTANT','paiements','ID',$_REQUEST['paiements']); ?>"
									name="MONTANT"  class="form-control input-small"/>
							</div>
						</div>
						<div class="form-actions">
							<input type="submit" class="btn btn-primary" value="<?php echo _MODIFIER ?>" /> ou <a class="text-danger" href="paiements.php">Annuler</a>
						</div>
					</form>

		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>