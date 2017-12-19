<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des factures";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Client";
	$_SESSION['breadcrumb_nav3'] ="Facture";
	
?>
<?php require_once('menu.php'); ?>


<div class="row">
	<div class="col-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="glyphicon glyphicon-th"></i>
				</span>

				<div class="element_float"><h5>Ajouter facture</h5></div>
				<div class="element-clear"></div>
			</div>
			<br/>
			<div class="widget-content nopadding">
<form action="gestion.php" name="frm" method="post" 
onsubmit="return checkForm(document.frm);" >

	<input type="hidden" name="act" value="ajouter_facture_global"/>
	<input type="hidden" name="page" value="facture_global.php"/>
	<input type="hidden" name="clients" value="<?php echo $_REQUEST['clients'] ?>"/>

    
<?php 
$sql = "select * from factures where id_facture_global=0 
 and id_ventes in (select id from ventes where id_clients=".$_REQUEST['clients']." )
 order by id";		
$res = doQuery($sql);

$nb = mysql_num_rows($res);
if( $nb==0){
	echo _VIDE;
}
else
{
?>

				<br/>
					<table class="table table-bordered table-striped table-hover data-table">
				      <thead>
    	<th class="case"> <input type="checkbox" name="all" onClick="cocherTout()" /> </th>
        <th> Date Facture </th>
        <th> Numero Facture </th>
        <th> Total </th>
        <th> Versement </th>                
					</thead>	
					<tbody>
		<?php 
		$i = 0;
		while ($ligne = mysql_fetch_array($res)){
			
			if($i%2==0)
				$c = "c";
			else
				$c = "";
				
		?>
		<tr class="<?php echo $c ?>">
			
            <td class="case">
            	<input type="checkbox" name="checkbox" 
				value="<?php echo $ligne['id'] ?>"/>
            </td>
            
			<td><?php echo $ligne['date_facture'] ?></td>
			<td><?php echo $ligne['numero_facture'] ?></td>
			<td><?php echo $ligne['totale'] ?></td>
			<td><?php echo $ligne['versement'] ?></td>                                    
	</tr>		
		<?php
			$i++; 
		}
		?>
</tbody>
	</table>
    </br>
	<?php $params = 'act=ajouter_facture_global&clients='.$_REQUEST['clients']?>
	
	<input type="button" value="Valider ma selection" style="margin-left:20px"
	onclick="javascript:ChoixMasse('<?php echo $params ?>')" class="bouton" />
</p>

<?php 
} //Fin If
?>
    
</form>

 		</div>
	   </div>
	</div>
</div>


<?php require_once('foot.php'); ?>