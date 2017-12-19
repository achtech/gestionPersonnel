
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion client";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Client";
	$_SESSION['breadcrumb_nav3'] ="Ajouter client";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Nouveau client</h5>
				</div>
				<div class="widget-content nopadding">	
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal">
						<input type="hidden" name="act" value="a"/>
					    <input type="hidden" name="table" value="clients"/>
						<input type="hidden" name="page" value="clients.php"/>
						
					    <div class="form-group">
							<label class="control-label"><?php echo "nom" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "nom" ?>__required" 
									name="nom"  class="form-control input-small"/>
							</div>
					    </div>
					    <div class="form-group">
							<label class="control-label"><?php echo "immatriculation" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "immatriculation" ?>_required" 
								name="immatriculation"  class="form-control input-small"/>
							</div>
						</div>
						
					    <div class="form-group">
							<label class="control-label"><?php echo "Compagnon" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "Compagnon" ?>_required" 
									name="compagnon"  class="form-control input-small"/>
							</div>
						</div>
						
					    <div class="form-group">
							<label class="control-label"><?php echo "Secteure"?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "Secteure" ?>_required" 
									name="secteure"  class="form-control input-small"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "Telephone" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "Telephone" ?>_required" 
									name="tel"  class="form-control input-small" />
							</div>
						</div>
                        <div class="form-group">
                            <label class="control-label">type client : </label>
                            <?php getTabList($tab_client,"type_client",$valeur,$change,_TYPE);?>
                        </div>
						<div class="form-actions">
							<input type="submit" class="btn btn-primary" value="<?php echo _AJOUTER ?>" /> ou <a class="text-danger" href="clients.php">Annuler</a>
						</div>
					</form>

		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>