<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion client";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Client";
	$_SESSION['breadcrumb_nav3'] ="Credit client";
	
?>
<?php require_once('menu.php'); ?>

<br/>
<div class="row">
	<div class="col-12">
	<?php if(isset($_REQUEST['m'])) {?>
			<div class="alert alert-info">
				<?php echo $_REQUEST['m']?>
				<a href="#" data-dismiss="alert" class="close">x</a>
			</div>
		<?php } ?>
	  

	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="glyphicon glyphicon-th"></i>
				</span>

				<div class="element_float"><h5>Détail du paiment </h5></div>
				<div class="add-element">
				    <a href="ajouter_paiements.php?page=clients_credit.php&clients=<?php echo $_REQUEST['clients'] ?>" >
				        <i class="glyphicon glyphicon-plus"></i> &nbsp;<?php echo _AJOUTER ?> Paiement
				    </a>
				</div>

				<div class="element-clear"></div>
			</div>
			<br/>
			<div class="widget-content nopadding">
					<table class="table table-bordered table-striped table-hover data-table">
				      <thead>
				         <th>Total</th>
				         <th>Payé</th>
				         <th>Reste a payé</th>
					</thead>
					<tbody>	
						<tr class="<?php echo $c ?>">
                <td><?php echo formater_montant(getTotalVenteClient($_REQUEST['clients']))." Dh"; ?></td>
                <td><?php echo formater_montant(getSum("paiements","montant","id_clients",$_REQUEST['clients']))." Dh"; ?></td>
                <td><?php echo formater_montant(getTotalReste($_REQUEST['clients']))." Dh" ?></td>                        			
						</tr>
					  </tbody>
					</table>
				<!--fin de la liste des clients-->
						</div>
					</div>
				</div>
				</div>


<?php require_once('foot.php'); ?>