
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des personnels";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Personnels";
	$_SESSION['breadcrumb_nav3'] ="Profil";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Profil du personnel</h5>
				</div>
				<div class="widget-content nopadding">	
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal">
						<input type="hidden" name="act" value="m"/>
					    <input type="hidden" name="page" value="personnels.php"/>
						
						<div class="form-group">
							<label class="control-label"><?php echo "nom" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('NOM','personnels','ID',$_REQUEST['personnels']); ?>
							</div>
					    </div>
					    <div class="form-group">
							<label class="control-label"><?php echo "prenom" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('PRENOM','personnels','ID',$_REQUEST['personnels']); ?>
							</div>
						</div>
						
					    <div class="form-group">
							<label class="control-label"><?php echo "CIN" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('CIN','personnels','ID',$_REQUEST['personnels']); ?>
							</div>
						</div>
						
					    <div class="form-group">
							<label class="control-label"><?php echo "TELEPHONE"?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('TELEPHONE','personnels','ID',$_REQUEST['personnels']); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "ADRESSE" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('ADRESSE','personnels','ID',$_REQUEST['personnels']); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "CNSS" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('CNSS','personnels','ID',$_REQUEST['personnels']); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "RIB" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('RIB','personnels','ID',$_REQUEST['personnels']); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "Date d'embauche" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('DATE_EMBAUCHE','personnels','ID',$_REQUEST['personnels']); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "Type" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('TYPE','personnels','ID',$_REQUEST['personnels']); ?>
								</div> 
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "Salaire mensuel" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('SALAIRE_MENSUELLE','personnels','ID',$_REQUEST['personnels']); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "Tarif journaliere" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('TARIF_JOURNALIERS','personnels','ID',$_REQUEST['personnels']); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "Code" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('CODE','personnels','ID',$_REQUEST['personnels']); ?>
							</div>
						</div>
                        <div class="form-group">
                            <label class="control-label">Poste : </label>
                            <div class="controls"><?php echo getValeurChamp('POSTE','postes','ID', $_REQUEST['ID_POSTE']) ?></div>
                        </div>
						<div class="form-actions">
							<a class="text-danger" href="personnels.php">Annuler</a>
						</div>
					</form>

		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>