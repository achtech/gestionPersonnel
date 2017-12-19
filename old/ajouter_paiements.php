<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion client";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Client";
	$_SESSION['breadcrumb_nav3'] ="Nouveau paiement";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Nouveau paiement </h5>
				</div>
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal" >
						<input type="hidden" name="act" value=  "a"/>
					    <input type="hidden" name="table" value="paiements"/>
						<input type="hidden" name="page" value= "<?php echo $_REQUEST['page']?>"/>
						<input type="hidden" name="id_clients" value="<?php echo $_REQUEST['clients']?>"/>
						<input type="hidden" name="date_paiment" value="<?php echo date('Y-m-d')?>"/>                        
					    	
					    <input type="hidden" name="id_noms_retour" value="page,clients"/>
						<input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['page'] ?>,<?php echo $_REQUEST['clients'] ?>"/>	
					        
					    
					    <div class="form-group">
							<label class="control-label">Montant : </label>
							<div class="controls">
								<input type="text"  
									name="montant"  class="form-control input-small" id="number"/>
							</div>
						</div>
						
						 <div class="form-actions">
							<input type="submit" class="btn btn-primary" value="<?php echo _AJOUTER ?>" />
						</div>
					</form>
		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>
