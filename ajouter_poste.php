
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des postes";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="postes";
	$_SESSION['breadcrumb_nav3'] ="Nouveau poste";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Nouveau poste</h5>
				</div>
				<div class="widget-content nopadding">	
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal">
						<input type="hidden" name="act" value="a"/>
					    <input type="hidden" name="table" value="postes"/>
						<input type="hidden" name="page" value="postes.php"/>
						
					    <div class="form-group">
							<label class="control-label"><?php echo "Poste" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "POSTE" ?>__required" 
									name="POSTE"  class="form-control input-small"/>
							</div>
					    </div>
						<div class="form-actions">
							<input type="submit" class="btn btn-primary" value="<?php echo _AJOUTER ?>" /> ou <a class="text-danger" href="postes.php">Annuler</a>
						</div>
					</form>

		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>