<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion fournisseur";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Fournisseur";
	$_SESSION['breadcrumb_nav3'] ="D&eacute;tail fournisseur";
	
?>
<?php require_once('menu.php'); ?>
<?php require_once('fournisseurs_onglets.php'); ?>
<div class="row">
	<div class="col-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="glyphicon glyphicon-th"></i>
				</span>

				<div class="element_float"><h5>D&eacute;tail fournisseur</h5></div>
				
				<div class="element-clear"></div>
			</div>
			<div class="widget-content nopadding">
				<?php 

				$sql = "select * from fournisseurs where id=".$_REQUEST['fournisseurs'];		
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
				<form class="form-horizontal"> 
				<div class="form-group">
						<label class="control-label">Adresse :  </label>
						<div class="controls">
			             	<textarea class="form-control" value="<?php echo $ligne['adresse'] ?>" readonly="readonly" ><?php echo $ligne['adresse'] ?>"</textarea>
						</div>
				</div>
				<div class="form-group">
							<label class="control-label">GSM : </label>
							<div class="controls">
				    			<input type="text" 
									  class="form-control input-small"/ value="<?php echo $ligne['tel'] ?>" readonly="readonly" />
							</div>
					
				</div>

				</form>

						<?php }		?>

				<?php 
				} //Fin If
				?>

<!--fin de la liste des clients-->
		 </div>
	   </div>
	</div>
</div>


<?php require_once('foot.php'); ?>
