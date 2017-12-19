<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Fournisseur";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Fournisseur";
	$_SESSION['breadcrumb_nav3'] ="";
	
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
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5><?php echo _RECHERCHER ?></h5>
				</div>
				<div class="widget-content nopadding">
					<br/>
						<form name="frm1" action="" method="post" class="form-horizontal">
								<div class="form-product"> 
										<label ><?php echo _RECHERCHER ?>:</label>
							        	<input type="text" name="txtrechercher" value="<?php if(isset($_POST['txtrechercher'])) echo $_POST['txtrechercher']; ?>" />
									<input type="submit" name="v" class="btn btn-primary" value="<?php echo _RECHERCHE."r" ?>" />
							    </div>
							   
						</form>
				    <br/>
				</div>
			</div>						
		</div>
</div>		
<div class="row">
	<div class="col-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="glyphicon glyphicon-th"></i>
				</span>

				<div class="element_float"><h5>Fournisseur</h5></div>
				<div class="add-element">
				    <a href="ajouter_fournisseurs.php" >
				        <i class="glyphicon glyphicon-plus"></i> &nbsp;<?php echo _AJOUTER ?> <?php echo "Fournisseur" ?>
				    </a>
				</div>
				<div class="element-clear"></div>
			</div>
			<div class="widget-content nopadding">
			
				<?php 

				if(isset($_POST['txtrechercher']) and !empty($_REQUEST['txtrechercher']))
					$where1="and nom like '%".$_POST['txtrechercher']."%' or adresse like '%".$_POST['txtrechercher']."%' or tel like '%".$_POST['txtrechercher']."%'";
				$sql = "select * from fournisseurs where 1=1 ".$where1." order by id";
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
			         <th>Nom</th>
			         <th>Adresse</th>
			         <th><?php echo _GSM ?></th>
			         
					<th class="op"> <?php echo _OP ?> </th>
				 </head>	
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
						
						<td>
			            	
								<?php echo $ligne['nom'] ?>
			               
			            </td>
			            
						<td><?php echo $ligne['adresse'] ?></td>
						<td><?php echo $ligne['tel'] ?></td>

						
						<td class="op">
							&nbsp;
							<a href="modifier_fournisseurs.php?fournisseurs=<?php echo $ligne['id'] ?>"  title="<?php echo _MODIFIER ?>">
								<i class="glyphicon glyphicon-edit"></i> 
			                </a>
							
							&nbsp;
							
			                <a href="#ancre" 
			                class="supprimer2" 
			                onclick="javascript:supprimer(
			                							'fournisseurs',
			                                            '<?php echo $ligne['id'] ?>',
			                                            'fournisseurs.php',
			                                            '1',
			                                            '1')
									" 
							title="<?php echo _SUPPRIMER ?>">
			                	
			                    <i class="glyphicon glyphicon-remove"></i> 
			                </a>
						</td>
					</tr>
					<?php
						$i++; 
					}
					?>
				  </tbody>
				</table>
			

			<?php 
			}//Fin If
			?>

	<!--fin de la liste des clients-->
		 </div>
	   </div>
	</div>
</div>


<?php require_once('foot.php'); ?>