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

				<div class="element_float"><h5>Liste des produits </h5></div>
				
				<div class="element-clear"></div>
			</div>
			<div class="widget-content nopadding">
                <form action="gestion.php" name="frm" method="post" 
                onsubmit="return checkForm(document.frm);"  class="form-horizontal">
                
                    <input type="hidden" name="act" value="modifier_ligne_echanges"/>
                    <input type="hidden" name="table" value="ligne_echanges"/>
                    <input type="hidden" name="echanges" value="<?php echo $_REQUEST['echanges']?>"/>
                    <input type="hidden" name="page" value="echanges.php"/>
                
                <?php 
                $sql = "select * from produits 
                        order by 
                            id";		
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
                        <th> <?php echo _NOM ?> </th>
                        <th> Quantité </th>	
                        <th> Prix unitaire </th>	
                      </thead>
                      <tbody>        
                        <?php 
                        $i = 0;
                        while ($ligne = mysql_fetch_array($res)){
                            
                            if($i%2==0)
                                $c = "c"; 
                            else
                                $c = "";
                            $qte=getValeurChamp4('qte_echange','ligne_echange','id_echanges',$_REQUEST['echanges'],'id_produits',$ligne['id']);
                            $prix=getValeurChamp4('prix_echange','ligne_echange','id_echanges',$_REQUEST['echanges'],'id_produits',$ligne['id']);				
							if($prix==0 || $prix=="")
								$prix=getValeurChamp('prix_echange','produits','id',$ligne['id']);
                    
                        ?>
                        <tr class="<?php echo $c ?>">
                          <td><?php echo $ligne['designation'] ?></td>
                          <td><input type="text" name="qte_<?php echo $ligne['id']; ?>" value="<?php echo $qte;?>" /></td>
                          <td><input type="text" name="prix_<?php echo $ligne['id']; ?>" value="<?php echo $prix;?>" /></td>          
                        </tr>
                        <?php
                            $i++; 
                        }
                        ?>
                      </tbody>
                    </table>
                <br/>
                <div class="form-actions">	
                    <input type="submit" value="Valider" class="btn btn-primary" />
                </div>
                
                <?php 
                } //Fin If
                ?>
                    
         </form>
		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>