
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des avances";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Avances";
	$_SESSION['breadcrumb_nav3'] ="Modifier un avance";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Mis a jour du avance</h5>
				</div>
				<div class="widget-content nopadding">	
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal">
						<input type="hidden" name="act" value="m"/>
					    <input type="hidden" name="table" value="avances"/>
						<input type="hidden" name="page" value="avances.php"/>
						
						<input type="hidden" name="id_nom" value="ID"/>
						<input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['avances'] ?>"/>	
					    
					    <input type="hidden" name="id_noms_retour" value="avances"/>
						<input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['avances'] ?>"/>	
						
					    <div class="form-group">
							<label class="control-label"><?php echo "Nom" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('NOM','personnels','ID', getValeurChamp('ID_PERSONNELS','avances','ID',$_REQUEST['avances'])) ?> <?php echo getValeurChamp('PRENOM','personnels','ID', getValeurChamp('ID_PERSONNELS','avances','ID',$_REQUEST['avances'])) ?>
							</div>
					    </div>
					    <div class="form-group">
							<label class="control-label"><?php echo "Code" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('CODE','personnels','ID', getValeurChamp('ID_PERSONNELS','avances','ID',$_REQUEST['avances'])) ?>
							</div>
						</div>
						
					    <div class="form-group">
							<label class="control-label"><?php echo "Date avance" ?> : </label>
							<div class="controls">
								<input type="date" id="cal_required"  class="form-control input-small"  value="<?php echo getValeurChamp('DATE_EMPREINTE','avances','ID',$_REQUEST['avances']); ?>"
									name="DATE_EMPREINTE"  />
							</div>
						</div>
					
					    <div class="form-group">
							<label class="control-label"><?php echo "Montant"?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "MONTANT" ?>_required"  value="<?php echo getValeurChamp('MONTANT','avances','ID',$_REQUEST['avances']); ?>"
									name="MONTANT"  class="form-control input-small"/>
							</div>
						</div>
						<div class="form-actions">
							<input type="submit" class="btn btn-primary" value="<?php echo _MODIFIER ?>" /> ou <a class="text-danger" href="avances.php">Annuler</a>
						</div>
					</form>

		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>