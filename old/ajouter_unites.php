

<?php require_once('head.php'); ?>
<?php require_once('menu.php'); ?>

<h3> <?php echo _AJOUTER ?> <?php echo "Fournisseur" ?></h3>

<h2> <?php echo _AJOUTER ?> <?php echo "Fournisseur" ?> </h2>
<p>	
<form action="gestion.php" name="frm" method="post" 
onsubmit="return checkForm(document.frm);" >
	<input type="hidden" name="act" value="a"/>
    <input type="hidden" name="table" value="unites"/>
	<input type="hidden" name="page" value="unites.php"/>
	
    <p class="double">
		<label for="f1">Nombre : </label>
		<input type="text" id="nom__required" 
		name="nombre"  />
    </p>
    
 	
	<p class="simple">
		<input type="submit" class="bouton" value="<?php echo _AJOUTER ?>" />
	</p>
</form>
</p>

<?php require_once('foot.php'); ?>