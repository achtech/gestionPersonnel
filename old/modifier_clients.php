
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion client";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Client";
	$_SESSION['breadcrumb_nav3'] ="mettre a&#768; jour  client";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>mettre a&#768; jour  client</h5>
				</div>
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal">
						
						<input type="hidden" name="act" value="m"/>
						
					    <input type="hidden" name="table" value="clients"/>
						<input type="hidden" name="page" value="clients.php"/>

						<input type="hidden" name="id_nom" value="id"/>
						<input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['clients'] ?>"/>	
					    
					    <input type="hidden" name="id_noms_retour" value="clients"/>
						<input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['clients'] ?>"/>	
						
						<div class="form-group">
							<label class="control-label"><?php echo "Nom"?>:</label>
							<div class="controls">
								<input type="text" id="<?php echo "Nom" ?>_required" 
									name="nom" value="<?php echo getValeurChamp('nom','clients','id',$_REQUEST['clients']) ?>" class="form-control input-small" />
							</div>
						</div>
					    	    
						<div class="form-group">
							<label class="control-label"><?php echo "Immatriculation" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "Immatriculation" ?>" 
					       			 name="immatriculation" value="<?php echo getValeurChamp('immatriculation','clients','id',$_REQUEST['clients']) ?>" class="form-control input-small" />
					       	</div>
						</div>
					    	    
						<div class="form-group">
							<label class="control-label"><?php echo "Compagnon" ?> :</label>
							<div class="controls">
								<input type="text" id="<?php echo "Compagnon" ?>" 
					        name="compagnon" value="<?php echo getValeurChamp('compagnon','clients','id',$_REQUEST['clients']) ?>" class="form-control input-small" />
					        </div>
						</div>
						
					    
						<div class="form-group">
							<label class="control-label"><?php echo "Secteure" ?>:</label>
							<div class="controls">
								<input type="text" id="<?php echo "Secteure" ?>" 
					        name="secteure" value="<?php echo getValeurChamp('secteure','clients','id',$_REQUEST['clients']) ?>" class="form-control input-small" />
					        </div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "Telephone" ?> : </label>
							<div class="controls">
							 	<input type="text" id="<?php echo "Telephone" ?>" 
					        name="tel" value="<?php echo getValeurChamp('tel','clients','id',$_REQUEST['clients']) ?>" class="form-control input-small" />
					        </div>
						</div>
                        <div class="form-group">
					    <label class="control-label">Choisir le type: </label>	 
						<?php $valeur= getValeurChamp('type_client','clients','id',$_REQUEST['clients']);?>
                        <?php echo getTabList($tab_client,"type_client",$valeur,$change,_TYPE) ?>
                        </p>
						<div class="form-actions">
							<input type="submit" class="btn btn-primary" value="<?php echo _MODIFIER ?>" /> ou <a class="text-danger" href="clients.php">Annuler</a>
						</div>
					</form>
		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>