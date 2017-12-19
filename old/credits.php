<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion Credit";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="";
	$_SESSION['breadcrumb_nav3'] ="";
?>
<?php require_once('menu.php'); 

						$sql = "select * from clients order by id";		
						$res = doQuery($sql);
						$tab=array();
						while ($ligne = mysql_fetch_array($res)){
								$tab[]=$ligne['id'];
						}
?>

<div class="row">
	<form action="gestion.php" name="frm" 	method="post" onsubmit="return checkForm(document.frm);" class="form-horizontal">
						<input type="hidden" name="act" value="ajouter_credit"/>
					    <input type="hidden" name="table" value="credit_clients"/>
						<input type="hidden" name="page" value="index.php"/>
		<div class="col-12">
         <div>	
			<div class="widget-box">
				
				<div class="widget-content nopadding">
				

						<?php 
						$sql = "select * from clients
								order by id";		
						$res = doQuery($sql);

						$nb = mysql_num_rows($res);
						if( $nb==0){
							echo _VIDE;
						}
						else
						{
						?>

						<table class="table table-bordered table-striped table-hover data-table">
						  <thead>
					        <th> Clients </th>
					        <th> Montant </th>	
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
                                <td><?php echo $ligne['nom']; ?></td>
                                <td><input type="text" name="montant_<?php echo $ligne['id'] ?>"</td>            
                            </tr>
			<?php
                $i++; 
            }
            ?>
          </tbody>
        </table>
						<br/>
						<div class="form-actions">&nbsp;&nbsp;&nbsp; <input type="submit" value="Valider" class="btn btn-primary" /> ou <a class="text-danger" href="index.php">Annuler</a>
					   </div>
					   <br/>
					<?php 
					} //Fin If
					?>
					    
				</form>
		</div>
	</div>						
  </div>
</div>		

<?php require_once('foot.php'); ?>