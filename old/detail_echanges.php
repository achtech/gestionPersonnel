<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des des échanges";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Echange";
	$_SESSION['breadcrumb_nav3'] ="Produit échanger";
	
?>
<?php require_once('menu.php'); ?>

<div class="row">
	<div class="col-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="glyphicon glyphicon-th"></i>
				</span>

				<div class="element_float"><h5>Liste des produits echangés</h5></div>
				<div class="add-element">
				    <a href="imprimer_bon_echange.php?echanges=<?php echo $_REQUEST['echanges'];?>">
				        <i class="glyphicon glyphicon-print"></i> &nbsp;Imprimer bon d'echange
				    </a>
				</div>
				<div class="element-clear"></div>
			</div>
			<div class="widget-content nopadding">
				<?php 
                $sql = "select * from ligne_echange where id_echanges=".$_REQUEST['echanges']." order by id";		
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
                         <th>Designation</th>
                         <th>Qte</th>
                         <th>Prix unitaire</th>
                         <th>Montant</th>
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
                                <td><?php echo getValeurChamp('designation','produits','id',$ligne['id_produits']) ?></td>
                                <td><?php echo $ligne['qte_echange'] ?></td>
                                <td><?php echo $ligne['prix_echange'] ?> Dh</td>            
                                <td><?php echo formater_montant($ligne['prix_echange']*$ligne['qte_echange']) ?> Dh</td>                        
                            </tr>
                            <?php
                                $i++; 
                            }
                            ?>
                       </tbody>
                    </table>
                </p>
                
                <?php 
                } //Fin If
                ?>
    </div>
   </div>
</div>
</div>
<?php require_once('foot.php'); ?>
