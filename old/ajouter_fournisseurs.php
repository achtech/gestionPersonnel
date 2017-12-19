
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Fournisseur";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Fournisseur";
	$_SESSION['breadcrumb_nav3'] ="Ajouter fournisseur";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Nouveau fournisseur</h5>
				</div>
				<div class="widget-content nopadding">
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal">
						<input type="hidden" name="act" value="a"/>
					    <input type="hidden" name="table" value="fournisseurs"/>
						<input type="hidden" name="page" value="fournisseurs.php"/>
						
					    <div class="form-group">
							<label class="control-label">Nom : </label>
							<div class="controls">
								<input type="text" id="nom__required" 
									name="nom"  class="form-control input-small"/>
						    </div>
					    </div>
					    <div class="form-group">
							<label class="control-label">Adresse : </label>
							<div class="controls">
								<textarea class="form-control" id="adresse_required" 
									name="adresse"  ></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label"><?php echo _GSM ?> : </label>
							<div class="controls">
								<input type="text" id="tel_required" 
									name="tel"  class="form-control input-small"/>
						   </div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary btn-small"><?php echo _AJOUTER ?></button> ou <a class="text-danger" href="fournisseurs.php">Annuler</a>
						</div>
					</form>
		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>