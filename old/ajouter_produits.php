
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des produits";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Produit";
	$_SESSION['breadcrumb_nav3'] ="Nouveau produit";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Nouveau produit</h5>
				</div>
				<div class="widget-content nopadding">
                    <form action="gestion.php" name="frm" method="post" 
                    onsubmit="return checkForm(document.frm);" class="form-horizontal">
                        <input type="hidden" name="act" value="a"/>
                        <input type="hidden" name="table" value="produits"/>
                        <input type="hidden" name="page" value="produits.php"/>
                        
                        <div class="form-group">
							<label class="control-label">designation : </label>
                            <div class="controls">
                            	<input type="text" id="designation__required" 
                           		 name="designation"  />
                           </div>
                        </div>
                        <div class="form-group">
							<label class="control-label">Prix vente : </label>
                            <div class="controls">
                           		 <input type="text" id="prix_vente_required" 
                            	name="prix_vente"  />
                            </div>
                        </div>
                         <div class="form-group">
							<label class="control-label">Prix achat : : </label>
                             <div class="controls">
                            		<input type="text" id="prix_achat_required" 
                            	name="prix_achat"  />
                             </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">nombre de piece par carton : </label>
                             <div class="controls">
                            <input type="text" id="unite_carton_required" 
                            name="unite_carton"  />
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label">Taux d'echange : </label>
                            <div class="controls">
                            <label><input type="radio" id="pourcentage_echange" 
                            name="pourcentage_echange" value="100" />100 </label>
                            <label><input type="radio" id="pourcentage_echange" 
                            name="pourcentage_echange" value="50" /> 50 </label>
                           </div>
                        </div>
                  		<div class="form-actions">
                            <input type="submit"  value="<?php echo _AJOUTER ?>" class="btn btn-primary"/>
                        </div>
                    </form>
     </div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>