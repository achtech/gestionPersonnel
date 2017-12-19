
<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des pointages";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Pointages";
	$_SESSION['breadcrumb_nav3'] ="Modifier un pointage";
?>
<?php require_once('menu.php'); ?>

<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>Mis a jour du pointage</h5>
				</div>
				<div class="widget-content nopadding">	
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal">
						<input type="hidden" name="act" value="m"/>
					    <input type="hidden" name="table" value="pointages"/>
						<input type="hidden" name="page" value="pointages.php"/>
						
						<input type="hidden" name="id_nom" value="ID"/>
						<input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['pointages'] ?>"/>	
					    
					    <input type="hidden" name="id_noms_retour" value="pointages"/>
						<input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['pointages'] ?>"/>	
						
					    <div class="form-group">
							<label class="control-label"><?php echo "Nom" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('NOM','personnels','ID', getValeurChamp('ID_PERSONNELS','pointages','ID',$_REQUEST['pointages'])) ?> <?php echo getValeurChamp('PRENOM','personnels','ID', getValeurChamp('ID_PERSONNELS','pointages','ID',$_REQUEST['pointages'])) ?>
							</div>
					    </div>
					    <div class="form-group">
							<label class="control-label"><?php echo "Code" ?> : </label>
							<div class="controls">
								<?php echo getValeurChamp('CODE','personnels','ID', getValeurChamp('ID_PERSONNELS','pointages','ID',$_REQUEST['pointages'])) ?>
							</div>
						</div>
						
					    <div class="form-group">
							<label class="control-label"><?php echo "Date pointage" ?> : </label>
							<div class="controls">
								<input type="date" id="cal_required"  class="form-control input-small"  value="<?php echo getValeurChamp('DATE_POINTAGE','pointages','ID',$_REQUEST['pointages']); ?>"
									name="DATE_POINTAGE"  />
								
							</div>
						</div>
						
					    <div class="form-group">
							<label class="control-label"><?php echo "Heur normal"?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "HEUR_N" ?>_required"  value="<?php echo getValeurChamp('HEUR_N','pointages','ID',$_REQUEST['pointages']); ?>"
									name="HEUR_N"  class="form-control input-small"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo "Heur supplementaire" ?> : </label>
							<div class="controls">
								<input type="text" id="<?php echo "HEUR_S" ?>_required"  value="<?php echo getValeurChamp('HEUR_S','pointages','ID',$_REQUEST['pointages']); ?>"
									name="HEUR_S"  class="form-control input-small" />
							</div>
						</div>
						<div class="form-group">
                            <label class="control-label">Code chantier : </label>
                            <?php echo getTableList('chantiers','ID_CHANTIER',getValeurChamp('ID_CHANTIER','pointages','ID',$_REQUEST['pointages']),'CODE',$change,$where,$libelle) ?>
                        </div>
						<div class="form-actions">
							<input type="submit" class="btn btn-primary" value="<?php echo _MODIFIER ?>" /> ou <a class="text-danger" href="pointages.php">Annuler</a>
						</div>
					</form>

		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>