<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Fournisseur";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Fournisseur";
	$_SESSION['breadcrumb_nav3'] ="Modifier fournisseur";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Modifier fournisseur</h5>
				</div>
				<div class="widget-content nopadding">
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal">
						
						<input type="hidden" name="act" value="m"/>
						
					    <input type="hidden" name="table" value="fournisseurs"/>
						<input type="hidden" name="page" value="fournisseurs.php"/>

						<input type="hidden" name="id_nom" value="id"/>
						<input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['fournisseurs'] ?>"/>	
					    
					    <input type="hidden" name="id_noms_retour" value="clients"/>
						<input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['fournisseurs'] ?>"/>	
						
						<div class="form-group">
							<label class="control-label">Nom:</label>
							<div class="controls">
								<input type="text" id="nom_required" 
									name="nom" value="<?php echo getValeurChamp('nom','fournisseurs','id',$_REQUEST['fournisseurs']) ?>" class="form-control input-small" />
							</div>
						</div>
					    <div class="form-group">
							<label class="control-label">Adresse : </label>
							<div class="controls">
								<textarea class="form-control" id="adresse" 
					        		name="adresse" value="<?php echo getValeurChamp('adresse','fournisseurs','id',$_REQUEST['fournisseurs']) ?>" ><?php echo getValeurChamp('adresse','fournisseurs','id',$_REQUEST['fournisseurs']) ?></textarea>
					        </div>
						</div>

						<div class="form-group">
							<label class="control-label"><?php echo _GSM ?> :</label>
							<div class="controls">
								<input type="text" id="tel" 
						        name="tel" value="<?php echo getValeurChamp('tel','fournisseurs','id',$_REQUEST['fournisseurs']) ?>" class="form-control input-small" />
						    </div>
						</div>
						 <div class="form-actions">
							<button type="submit" class="btn btn-primary btn-small"><?php echo _MODIFIER ?></button> ou <a class="text-danger" href="fournisseurs.php">Annuler</a>
						</div>
						
					</form>
			</div>
	</div>						
</div>
</div>	
<?php require_once('foot.php'); ?>