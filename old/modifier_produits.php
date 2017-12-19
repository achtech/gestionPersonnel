
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des produits";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Produit";
	$_SESSION['breadcrumb_nav3'] ="Mise à produit";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Mise à jour produit</h5>
				</div>
				<div class="widget-content nopadding">
                    <form action="gestion.php" name="frm" method="post" 
                    onsubmit="return checkForm(document.frm);" class="form-horizontal">
                        <input type="hidden" name="act" value="m"/>
                        <input type="hidden" name="table" value="produits"/>
                        <input type="hidden" name="page" value="produits.php"/>
                        
                        <input type="hidden" name="id_nom" value="id"/>
                        <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['produits'] ?>"/>	
                        
                        <input type="hidden" name="id_noms_retour" value="produits"/>
                        <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['produits'] ?>"/>	
                        
                        <div class="form-group">
							<label class="control-label">designation : </label>
                            <div class="controls">
                            	<input type="text" id="designation__required" value="<?php echo getValeurChamp('designation','produits','id',$_REQUEST['produits']) ?>"	name="designation"  />
                            </div>
                        </div>
                       <div class="form-group">
							<label class="control-label">Prix de vente : </label>
                             <div class="controls">
                            <input type="text" id="prix_vente_required"  value="<?php echo getValeurChamp('prix_vente','produits','id',$_REQUEST['produits']) ?>"
                            name="prix_vente"  />
                           </div>
                        </div>
                        <div class="form-group">
							<label class="control-label">Prix d'achat : </label>
                            <div class="controls">
                            <input type="text" id="prix_achat_required"  value="<?php echo getValeurChamp('prix_achat','produits','id',$_REQUEST['produits']) ?>"
                            name="prix_achat"  />
                          </div>
                        </div>
                        <div class="form-group">
							<label class="control-label">Qte Stock : </label>
                           <div class="controls">
                            <input type="text" id="qte_stock_required"  value="<?php echo getValeurChamp('qte_stock','produits','id',$_REQUEST['produits']) ?>"
                            name="qte_stock"  />
                            </div>
                        </div>
                        
                       <div class="form-group">
							<label class="control-label">Prix d'échange : </label>
                          <div class="controls">
                            <input type="text" id="prix_echange_required"  value="<?php echo getValeurChamp('prix_echange','produits','id',$_REQUEST['produits']) ?>"
                            name="prix_echange"  />
                          </div>
                        </div>
                        <div class="form-group">
							<label class="control-label">nombre de piece par carton : </label>
                            <div class="controls">
                            	<input type="text" id="unite_carton_required"  value="<?php echo getValeurChamp('unite_carton','produits','id',$_REQUEST['produits']) ?>"	
                            name="unite_carton"  />
                            </div>
                        </div>
                      <div class="form-actions">
                            <input type="submit" value="<?php echo _MODIFIER ?>" class="btn btn-primary" />
                        </div>
                    </form>
     </div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>