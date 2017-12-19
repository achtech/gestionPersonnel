
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion achat";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Achat";
	$_SESSION['breadcrumb_nav3'] ="Ajouter achat";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Nouveau achat</h5>
				</div>
				<div class="widget-content nopadding">
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal">

						<input type="hidden" name="act" value="a"/>
					    <input type="hidden" name="table" value="achats"/>
						<input type="hidden" name="page" value="ajouter_ligne_achats.php"/>
						<input type="hidden" name="date_achat" value="<?php echo date('Y-m-d');?>"/>
                        
					     <div class="form-group">
							<label class="control-label">Choisir le fournisseur : </label>
							
								<?php $valeur=$_REQUEST['id_fournisseurs'];?>
								<?php echo getTableList('fournisseurs','id_fournisseurs',$valeur,'nom',$change,$where,$libelle) ?>
						  
						 </div>
					     <div class="form-actions">
							<input type="submit" name="Envoyer" value="Valider" class="btn btn-primary" /> ou <a class="text-danger" href="achats.php">Annuler</a>
						</div>
					</form>
		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>