<?php require_once('head.php'); ?>
<?php require_once('menu.php'); ?>
<?php require_once('produits_onglets.php'); ?>
<h2><?php echo _DETAILS ?><h2>
<p><?php 

$sql = "select * from produits where id=".$_REQUEST['produits'];		
$res = doQuery($sql);
$nb = mysql_num_rows($res); 
if( $nb==0){
	echo _VIDE;
}
else
{
?></p>

<p>
<?php 		
	if ($ligne = mysql_fetch_array($res))
	{    
?>
<form>
<p class="double">
    <label for="f1">Designation :  </label>
    <?php echo $ligne['designation'] ?>
</p>
<p class="double">
    <label for="f1">Prix_unitaire_vente : </label>
    <?php echo $ligne['prix_unitaire_vente'] ?>
</p>
<p class="double">
    <label for="f1">Qte_stock :  </label>
    <?php echo $ligne['qte_stock'] ?>
</p>
<p class="double">
    <label for="f1">Qte_seuil : </label>
    <?php echo $ligne['qte_seuil'] ?>
</p>

</form>

		<?php }		?>
</p>
</form>

<?php 
} //Fin If
?>

<?php require_once('foot.php'); ?>
