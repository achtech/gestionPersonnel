<?php require_once('head.php'); ?>
<?php require_once('menu.php'); ?>

<h3><?php echo _GESTION ?> </h3>
<h2><?php echo _OP ?></h2>


<?php 
$sql = "select * from produits where qte_stock < qte_seuil order by id";		
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
 
         <th>Designation</th>
         <th>Qte Stock</th>
         <th>PU Vente	</th>         
         
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
			
			<td><?php echo $ligne['designation'] ?></td>
            
			<td><?php echo $ligne['qte_stock'] ?></td>
			<td><?php echo $ligne['prix_unitaire_vente'] ?></td>
		           
			
			<td class="op">
				<a href="modifier_produits.php?produits=<?php echo $ligne['id'] ?>" class="modifier2">
					&nbsp;
                </a>
				
				&nbsp;
				
                <a href="#ancre" 
                class="supprimer2" 
                onclick="javascript:supprimer(
                							'produits',
                                            '<?php echo $ligne['id'] ?>',
                                            'Produits.php',
                                            '1',
                                            '1')
						" 
				title="<?php echo _SUPPRIMER ?>">
                	
                    &nbsp;
                </a>
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