<?php require_once('head.php'); ?>
<?php require_once('menu.php'); ?>

<h3><?php echo _GESTION ?> </h3>
<h2><?php echo _OP ?></h2>

<?php 
$sql = "select * from  bon_livraison where id_frns=".$_REQUEST['fournisseurs'];		
$res = doQuery($sql);

$nb = mysql_num_rows($res);
if( $nb==0){
	echo _VIDE;
}
else
{
?>

 

<h2><?php echo _LISTE ?> (<?php echo $nb ?>) </h2>
<p>
	<table>
         <th>Date </th>
          <th>Total_TTC</th>   
         
		<th class="op"> <?php echo _OP ?> </th>
		
		<?php 
		$i = 0;
		while ($ligne = mysql_fetch_array($res)){
			
			if($i%2==0)
				$c = "c";
			else
				$c = "";
				
		?>
		<tr class="<?php echo $c ?>">
			<td>
            		<?php echo $ligne['date_bl'] ?>
         	</td>
          
			<td><?php echo TotalTTC_achat($ligne['id'])?></td>
			
			<td class="op">
				<a href="fournisseur_bon_livraison.php?bon_livraison=<?php echo $ligne['id'] ?>" class="ajouter">
					infos
                </a>
				
				&nbsp;
				
                
			</td>
		</tr>
		<?php
			$i++; 
		}
		?>
	</table>
</p>

<?php 
} //Fin If
?>

<?php require_once('foot.php'); ?>