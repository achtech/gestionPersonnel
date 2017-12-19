<?php require_once('head.php'); ?>
<?php require_once('menu.php'); ?>

<h3> <?php echo _MODIFIER ?>  <?php echo "Caregories" ?> </h3>

<h2> <?php echo _MODIFIER ?>  <?php echo "Categories" ?> </h2>
<p>
<form action="gestion.php" name="frm" method="post" 
onsubmit="return checkForm(document.frm);" >
	
	<input type="hidden" name="act" value="m"/>
	
    <input type="hidden" name="table" value="categories"/>
	<input type="hidden" name="page" value="categories.php"/>

	<input type="hidden" name="id_nom" value="id"/>
	<input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['categories'] ?>"/>	
    
    <input type="hidden" name="id_noms_retour" value="clients"/>
	<input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['categories'] ?>"/>	
	
	<p class="double">
		<label for="f1-ville">Libelle:</label>
		<input type="text" id=nom_required" 
		name="libelle" value="<?php echo getValeurChamp('libelle','categories','id',$_REQUEST['categories']) ?>" />
	</p>
    
	<p class="simple">
		<input type="submit" class="bouton" value="<?php echo _MODIFIER ?>" />
	</p>
</form>
</p>

<?php require_once('foot.php'); ?>