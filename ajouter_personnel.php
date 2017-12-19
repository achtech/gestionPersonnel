
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des personnels";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Personnels";
	$_SESSION['breadcrumb_nav3'] ="Nouveau personnel";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Nouveau personnel</h5>
				</div>
				<div class="widget-content nopadding">	
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal">
						<input type="hidden" name="act" value="a"/>
					    <input type="hidden" name="table" value="personnels"/>
						<input type="hidden" name="page" value="personnels.php"/>
						
					    <div class="form-group">
							<label class="control-label"><?php echo "nom" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "NOM" ?>__required" 
									name="NOM"  class="form-control input-small"/>
							</div>
					    </div>
					    <div class="form-group">
							<label class="control-label"><?php echo "prenom" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "PRENOM" ?>_required" 
								name="PRENOM"  class="form-control input-small"/>
							</div>
						</div>
						
					    <div class="form-group">
							<label class="control-label"><?php echo "CIN" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "CIN" ?>_required" 
									name="CIN"  class="form-control input-small"/>
							</div>
						</div>
						
					    <div class="form-group">
							<label class="control-label"><?php echo "TELEPHONE"?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "TELEPHONE" ?>_required" 
									name="TELEPHONE"  class="form-control input-small"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "ADRESSE" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "ADRESSE" ?>_required" 
									name="ADRESSE"  class="form-control input-small" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "CNSS" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "CNSS" ?>_required" 
									name="CNSS"  class="form-control input-small" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "RIB" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "RIB" ?>_required" 
									name="RIB"  class="form-control input-small" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "Date d'embauche" ?> : </label>
							<div class="controls">
								<input type="date" id="cal_required" 
									name="DATE_EMBAUCHE"  class="form-control input-small" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "Type" ?> : </label>
							<div class="controls">
								<select name = "TYPE" id="TYPE_required">	
									
								    <option value="">- -  - - _</option>
									<option value="Salarie">Salarie</option>
									<option value="Ouvrier">Ouvrier</option>
									
								    </select>
								</div> 
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "Salaire mensuel" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "SALAIRE_MENSUELLE" ?>_required" 
									name="SALAIRE_MENSUELLE"  class="form-control input-small" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "Tarif journaliere" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "TARIF_JOURNALIERS" ?>_required" 
									name="TARIF_JOURNALIERS"  class="form-control input-small" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "Code" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "CODE" ?>_required" 
									name="CODE"  class="form-control input-small" />
							</div>
						</div>
                        <div class="form-group">
                            <label class="control-label">Poste : </label>
                            <?php echo getTableList('postes','ID_POSTES',$valeur,'POSTE',$change,$where,$libelle) ?>
                        </div>
						<div class="form-actions">
							<input type="submit" class="btn btn-primary" value="<?php echo _AJOUTER ?>" /> ou <a class="text-danger" href="personnels.php">Annuler</a>
						</div>
					</form>

		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>