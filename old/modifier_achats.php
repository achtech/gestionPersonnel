
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Fournisseur";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Achat";
	$_SESSION['breadcrumb_nav3'] ="mettre a&#768; jour achat ";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>mettre a&#768; jour  achat</h5>
				</div>
				<div class="widget-content nopadding">
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal" >

						<input type="hidden" name="act" value="m"/>
					    <input type="hidden" name="table" value="achats"/>
						<input type="hidden" name="page" value="modifier_ligne_achats.php"/>

						<input type="hidden" name="id_nom" value="id"/>
						<input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['achats'] ?>"/>	
					    
					    <input type="hidden" name="id_noms_retour" value="achats"/>
						<input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['achats'] ?>"/>	
<!--
					    <div class="form-group">
							<label class="control-label">Date Achat:</label>	 	 
							<div class="controls">
								<input type="text" 
									name="date_achat" data-date-format="yyyy-mm-dd"  class="datepicker form-control input-small"  value="<?php echo getValeurChamp('date_achat','achats','id',$_REQUEST['achats']) ?>" />
							</div>

						</div>
-->
					     <div class="form-group">
							<label class="control-label">Choisir le fournisseur : </label>	 
							<?php $valeur= getValeurChamp('id_fournisseurs','achats','id',$_REQUEST['achats']);?>
							<?php echo getTableList('fournisseurs','id_fournisseurs',$valeur,'nom',$change,$where,$libelle) ?>
						</div>
					     <div class="form-actions">
							<input type="submit" name="Envoyer" value="<?php echo _MODIFIER ?>" class="btn btn-primary" /> ou <a class="text-danger" href="achats.php">Annuler</a>
						</div>
					</form>

		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>