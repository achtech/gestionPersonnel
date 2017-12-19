<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion échanges";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Echange";
	$_SESSION['breadcrumb_nav3'] ="Mise à jour échange";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Mise à jour échange</h5>
				</div>
				<div class="widget-content nopadding">
                    <form action="gestion.php" name="frm" method="post" 
                    onsubmit="return checkForm(document.frm);" class="form-horizontal" >
                    
                        <input type="hidden" name="act" value="m"/>
                        <input type="hidden" name="table" value="echanges"/>
                        <input type="hidden" name="page" value="modifier_ligne_echanges.php"/>
                    
                        <input type="hidden" name="id_nom" value="id"/>
                        <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['echanges'] ?>"/>	
                        
                        <input type="hidden" name="id_noms_retour" value="echanges"/>
                        <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['echanges'] ?>"/>	
                    
                        <div class="form-group">
							<label class="control-label">Date echange:</label>	
                             <div class="controls">  
                           		 <input type="text" data-date-format="yyyy-mm-dd"  class="datepicker form-control input-small"
                            name="date_echange"  value="<?php echo getValeurChamp('date_echange','echanges','id',$_REQUEST['echanges']) ?>" />
                            </div>
                        </div>
                        <div class="form-group">
							<label class="control-label">Choisir le client : </label>	 
                            <?php $valeur= getValeurChamp('id_clients','echanges','id',$_REQUEST['echanges']);?>
                    <?php echo getTableList('clients','id_clients',$valeur,'nom',$change,$where,$libelle) ?>
                        </div>
                     <div class="form-actions">
                            <input type="submit" name="Envoyer" value="mettre a jour et modifier les quantites des produits" class="btn btn-primary" /> ou <a class="text-danger" href="echanges.php">Annuler</a>
                     </div>
                </form>
		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>