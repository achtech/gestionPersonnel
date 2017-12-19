<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des produits";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Produit";
	$_SESSION['breadcrumb_nav3'] ="Produit achter";
	
?>
<?php require_once('menu.php'); ?>


<br />
<div class="row">
	<div class="col-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="glyphicon glyphicon-th"></i>
				</span>

				<div class="element_float"><h5>Produit acheter : <?php echo getValeurChamp('designation','produits','id',$_REQUEST['produits'])?></h5></div>
				
				<div class="element-clear"></div>
			</div>
			<div class="widget-content nopadding">
            <br/>
            <?php require_once('produits_onglets.php'); ?>
            
            <div class="widget-content tab-content">
            	<div id="tab1" class="tab-pane active">
				<?php 
                    $sql = "select * from achats as a ,ligne_achats as la where a.id=la.id_achats and la.id_produits=".$_REQUEST['produits'];
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
                         <th>Quantité</th>         
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
                            <td><?php echo $ligne['qte_achat'] ?></td>            
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
                <div id="tab2" class="tab-pane">
                	<?php 
						$sql = "select * from ventes as a ,ligne_ventes as la where a.id=la.id_ventes and la.id_produits=".$_REQUEST['produits'];
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
							 <th>Date vente</th>
							 <th>clients</th>
							 <th>Quantité</th>
                             <th>A-retour</th>
                             <th>Nbr-retour</th>         
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
								<td><?php echo $ligne['date_vente'] ?></td>
								<td><?php echo getValeurChamp('nom','clients','id',$ligne['id_clients']) ?></td>
								<td><?php echo $ligne['qte_vente'] ?></td>  
                                <td><?php echo $ligne['a_retour'] ?></td>  
                                <td><?php echo $ligne['nbr_retour'] ?></td>            
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
         		</div>
			</div>
           </div>
          </div>
          <br/>
		</div>
   </div>
</div>
</div>
<?php require_once('foot.php'); ?>

