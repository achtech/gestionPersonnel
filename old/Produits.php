<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des produits";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Produit";
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
                                    <label ><?php echo _RECHERCHER ?> &nbsp;&nbsp;</label>
                                    <input type="text" name="txtrechercher" value="<?php if(isset($_POST['txtrechercher'])) echo $_POST['txtrechercher']; ?>" />
                                    
                                
                                <input type="submit" name="v" class="btn btn-primary" value="<?php echo _RECHERCHE."r" ?>" />
                         </div>
                        </form>
                   
                    <br/> <br/>
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

				<div class="element_float"><h5>Produit</h5></div>
				 <div class="add-element">
				    <a href="valider_print_stock_produit.php?champ=impression_stock"   title="etat stock">
					   <i class="fa fa-print"></i> Imprimer Stock  
					</a>
				</div>
				 <div class="add-element">
				    <a href="print_stock_produit_externe.php"   title="etat stock">
					   <i class="fa fa-print"></i> Imprimer Vente client externe  
					</a>
				</div>                
				<div class="add-element">
				    <a href="ajouter_produits.php" class="ajouter">
				        <i class="glyphicon glyphicon-plus"></i> &nbsp;<?php echo _AJOUTER ?> Produit &nbsp;&nbsp;   
				    </a>
				</div>
			   
				<div class="element-clear"></div>
			</div>
			<div class="widget-content nopadding">
	<?php 
    
    if(isset($_POST['txtrechercher']) and !empty($_REQUEST['txtrechercher']))
        $where1="and designation like '%".$_REQUEST['txtrechercher']."%'";
    $sql = "select * from produits where 1=1 ".$where1." order by id";
    $res = doQuery($sql);
    
    $nb = mysql_num_rows($res);
    if( $nb==0){
        echo _VIDE;
    }
    else
    {
    ?>

	<table class="table table-bordered table-striped table-hover data-table" >
      <thead>
         <th><?php echo "Designation" ?></th>
         <th><?php echo "Prix d'achat" ?></th>
         <th><?php echo "Prix de vente" ?></th>
         <th><?php echo "A stock" ?></th>
         <th><?php echo "Les entres" ?></th>                  
         <th><?php echo "Les sorties" ?></th>
         <th><?php echo "N stock" ?></th>
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
			<td><?php echo $ligne['designation'] ?></td>
			<td><?php echo $ligne['prix_achat'] ?></td>
			<td><?php echo $ligne['prix_vente'] ?></td>
			<td><?php echo $ligne['ancien_stock'] ?></td>            
			<td><?php echo getQteEntrerAffichage($ligne['id']) ?></td>
			<td><?php echo getQteSortieAffichage($ligne['id']) ?></td>            
            <td><?php echo $ligne['qte_stock'] ?></td>
			<td class="op">
            <a href="produits_achats.php?produits=<?php echo $ligne['id'] ?>" class="detail" title="Detail">
				<i class="glyphicon glyphicon-wrench"></i>
            </a>
            &nbsp;
            <a href="modifier_produits.php?produits=<?php echo $ligne['id'] ?>" class="modifier2"  title="<?php echo _MODIFIER ?>">
                <i class="glyphicon glyphicon-edit"></i> 
            </a>
            
            &nbsp;
            
            <a href="#ancre" 
            class="supprimer2" 
            onclick="javascript:supprimer(
                                        'produits',
                                        '<?php echo $ligne['id'] ?>',
                                        'produits.php',
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
    } //Fin If
    ?>
    </div>
   </div>
</div>
</div>
<?php require_once('foot.php'); ?>