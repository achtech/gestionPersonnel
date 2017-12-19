<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion achat";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Achat";
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
					<form name="frm1" action="" method="post" class="form-horizontal" >
					    
					        <?php $change=" onchange='document.frm1.submit()' "?>
							<?php $valeur=$_REQUEST['id_fournisseurs'];?>
							<div class="center_element">
								<div class="form-group">
									<label class="control-label">Choisir le fournisseur : </label>
									
										<?php echo getTableList('fournisseurs','id_fournisseurs',$valeur,'nom',$change,$where,$libelle) ?>
									
								</div>
						  </div>
							<div class="form-group">
								<label class="control-label space-label">Date d'achat entre</label>
					        	<div class="controls">
						        	  <div class="row espace">
							        	   <div class="col-4">
							        		 <input type="text" name="date1" value="<?php if(isset($_REQUEST['date1'])) echo $_REQUEST['date1'];?>" data-date-format="yyyy-mm-dd"  class="datepicker form-control input-small"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; et
							        	   </div>
							        	   <div class="col-4">
							        		 <input type="text" name="date2" value="<?php if(isset($_REQUEST['date2'])) echo $_REQUEST['date2'];?>" data-date-format="yyyy-mm-dd"  class="datepicker form-control input-small"/> 
							        	   </div>
							        	    <div class="col-4">
							        	    	<div>
													<button type="submit" name="v" class="btn btn-primary btn-small">Rechercher</button>
										    	</div>
							        	    </div>
							         </div>
					        	</div>
					        </div>
							
					</form>
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

				<div class="element_float"><h5>Achat</h5></div>
				<div class="add-element">
				    <a href="ajouter_achats.php" class="ajouter">
				        <i class="glyphicon glyphicon-plus"></i> &nbsp;<?php echo _AJOUTER ?> <?php echo "Achat" ?>
				    </a>
				</div>
				<div class="element-clear"></div>
			</div>
			<div class="widget-content nopadding">	
				<?php 
	$where1="";
if(isset($_REQUEST['date1']) and isset($_REQUEST['date2']))
{
	if(!empty($_REQUEST['date1']) and !empty($_REQUEST['date2']))
	{
		$date1=$_REQUEST['date1'];
		$date2=$_REQUEST['date2'];
		$tab_d1 = explode("/",$date1);
		$tab_d2 = explode("/",$date2);		
		$d1=$tab_d1[0];
		$d2=$tab_d2[0];
		
		$where1=" and date_achat between '".$d1."' and '".$d2."'";	
			}
			
		}
		if(isset($_REQUEST['id_fournisseurs']) and !empty($_REQUEST['id_fournisseurs']))
			$where1.=" and id_fournisseurs =".$_POST['id_fournisseurs'];
			$sql = "select * from achats where 1=1 ".$where1." order by id";
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
         <th>Date Achat</th>
         <th>Fournisseurs</th>
         <th>Total</th> 
         <th class="op"> <?php echo _OP ?> </th>
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
							<td><?php echo $ligne['date_achat'] ?></td>
							<td><?php echo getValeurChamp('nom','fournisseurs','id',$ligne['id_fournisseurs']) ?></td>
							<td><?php echo formater_montant(getMontantAchat($ligne['id'])) ?> Dh</td>		
							<td class="op">
								&nbsp;
								<a href="detail_achats.php?achats=<?php echo $ligne['id'] ?>" class="detail" title="Detail">
                					<i class="glyphicon glyphicon-wrench"></i>
                				</a>
                				&nbsp;				
								<a href="modifier_achats.php?achats=<?php echo $ligne['id'] ?>" class="modifier2">
									<i class="glyphicon glyphicon-edit"></i> 
				                </a>
								&nbsp;
				                <a href="#ancre" 
				                class="supprimer2" 
				                onclick="javascript:supprimer(
				                							'achats',
				                                            '<?php echo $ligne['id'] ?>',
				                                            'achats.php',
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