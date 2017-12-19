<?php require_once('head.php'); ?>
<?php require_once('menu.php'); ?>
<?php require_once('categories_onglets.php'); ?>
<h2><?php echo _DETAILS ?><h2>
<p><?php 

$sql = "select * from categories where id=".$_REQUEST['categories'];		
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
    <label for="f1">Libelle :  </label>
    <?php echo $ligne['libelle'] ?>
</p>

</form>

		<?php }		?>
</p>
</form>

<?php 
} //Fin If
?>

<?php require_once('foot.php'); ?>
