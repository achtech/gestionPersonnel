
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion vente";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="vente";
	$_SESSION['breadcrumb_nav3'] ="mettre a&#768; jour  vente";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>mettre a&#768; jour vente</h5>
				</div>
				<div class="widget-content nopadding">
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal" >

						<input type="hidden" name="act" value="m"/>
					    <input type="hidden" name="table" value="ventes"/>
						<input type="hidden" name="page" value="modifier_ligne_ventes.php"/>

						<input type="hidden" name="id_nom" value="id"/>
						<input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['ventes'] ?>"/>	
					    
					    <input type="hidden" name="id_noms_retour" value="ventes"/>
						<input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['ventes'] ?>"/>	

					    <div class="form-group">
							<label class="control-label">Date vente:</label>
							<div class="controls">	 
								<input type="text" id="cal_required" 
							name="date_vente"  value="<?php echo getValeurChamp('date_vente','ventes','id',$_REQUEST['ventes']) ?>" data-date-format="yyyy-mm-dd"  class="datepicker form-control input-small" />
						   </div>
						</div>
						<div class="form-group"> 
							<label class="control-label">Choisir le client : </label>	 
							<?php $valeur= getValeurChamp('id_clients','ventes','id',$_REQUEST['ventes']);?>
							<?php echo getTableList('clients','id_clients',$valeur,'nom',$change,$where,$libelle) ?>
						</div>
	        			    <div class="form-group">
							<label class="control-label">Départ Km:</label>
							<div class="controls">	 
								<input type="text" id="depart_km_required"  value="<?php echo getValeurChamp('depart_km','ventes','id',$_REQUEST['ventes']) ?>" 
									name="depart_km" class="form-control input-small"  />
							</div>
							<label class="control-label">Arrivée Km:</label>
							<div class="controls">	 
								<input type="text" id="arrivee_km_required"  value="<?php echo getValeurChamp('arrivee_km','ventes','id',$_REQUEST['ventes']) ?>" 
									name="arrivee_km" class="form-control input-small"  />
							</div>
						</div>
                        
	       			    <div class="form-group">
							<label class="control-label">Départ à:</label>
							<div class="controls">	
								 <div class="row">
									<div class="col-6">
										<input type="text" id="depart_date_heur_required"  value="<?php echo getValeurChamp('depart_date_heur','ventes','id',$_REQUEST['ventes']) ?>" 
											name="depart_date_heur" class="input-append"  placeholder="heur" />
								   </div>
								   <div class="col-6">
										<input type="text" id="depart_date_min_required"  value="<?php echo getValeurChamp('depart_date_min','ventes','id',$_REQUEST['ventes']) ?>" 
											name="depart_date_min" class="input-append"  placeholder="min" />
								   </div>
								 </div>
							</div>
						</div>
 
 	       			    <div class="form-group">
							<label class="control-label">Arrivée à:</label>
							<div class="controls">	
							   <div class="row">
									<div class="col-6"> 
										<input type="text" id="arrivee_date_heur_required"  value="<?php echo getValeurChamp('arrivee_date_heur','ventes','id',$_REQUEST['ventes']) ?>" 
											name="arrivee_date_heur" class="input-append"  placeholder="heur" />
								   </div>
								   <div class="col-6">
										<input type="text" id="arrivee_date_min_required"  value="<?php echo getValeurChamp('arrivee_date_min','ventes','id',$_REQUEST['ventes']) ?>" 
											name="arrivee_date_min" class="input-append"  placeholder="min" />
									 </div>
								 </div>
							</div>
						</div>

    				    <div class="form-actions">
							<input type="submit" name="Envoyer" value="mettre a jour et voir produit" class="btn btn-primary" />
							 ou <a class="text-danger" href="ventes.php">Annuler</a>
						</div>
					</form>
		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>