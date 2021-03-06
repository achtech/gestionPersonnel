<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des paiements";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Paiement";
	$_SESSION['breadcrumb_nav3'] ="";
	
?>
<?php require_once('menu.php'); ?>
<br/>
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
                                <?php $change=" onchange='document.frm1.submit()' "?>
                                <?php $valeur=$_REQUEST['id_clients'];?>
                            <div class="center_element">
								<div class="form-group">
									<label class="control-label">Choisir le client : </label>
									<?php echo getTableList('clients','id_clients',$valeur,'nom',$change,$where,$libelle) ?>
                                </div>
                            </div>
                            <div class="form-group">
								<label class="control-label space-label">Date paiement </label>
                                <div class="controls">
                                     <div class="row espace">
                                        <div class="col-4">
                                			<input type="text" name="date1"  value="<?php if(isset($_REQUEST['date1'])) echo $_REQUEST['date1'];?>" data-date-format="yyyy-mm-dd"  class="datepicker form-control input-small"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; et
                                       </div>
                                      <div class="col-4">        
                                                <input type="text" name="date2" value="<?php if(isset($_REQUEST['date2'])) echo $_REQUEST['date2'];?>" data-date-format="yyyy-mm-dd"  class="datepicker form-control input-small" />
                                      </div>
                                       <div class="col-4">
                                            <div>
                                                <input type="submit" name="v" class="btn btn-primary" value="<?php echo _RECHERCHE."r" ?>" />
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
</div>	
<div class="row">
	<div class="col-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="glyphicon glyphicon-th"></i>
				</span>

				<div class="element_float"><h5>Paiement </h5></div>
				
				<div class="element-clear"></div>
			</div>
			<div class="widget-content nopadding">
			<?php 
                $where1="";
            if(isset($_REQUEST['date1']) and isset($_REQUEST['date2']))
            {
                if(!empty($_REQUEST['date1']) and !empty($_REQUEST['date2'])){
                    $date1=$_REQUEST['date1'];
                    $date2=$_REQUEST['date2'];
                    $tab_d1 = explode("/",$date1);
                    $tab_d2 = explode("/",$date2);		
                    $d1=$tab_d1[2]."-".$tab_d1[1]."-".$tab_d1[0];
                    $d2=$tab_d2[2]."-".$tab_d2[1]."-".$tab_d2[0];
                    $where1=" and date_paiment between '".$d1."' and '".$d2."'";
                }
            }
            if(isset($_REQUEST['id_clients']) and !empty($_REQUEST['id_clients']))
                $where1.=" and id_clients in (select id_clients from ventes where id_clients=".$_REQUEST['id_clients'].")";
            
            
                $sql = "select * from paiements where 1=1 ".$where1." order by id";
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
                     <th>Date Vente</th>
                     <th>Client</th>
                     <th>Date paiement</th>
                     <th>Montant</th>		
                     <th>Operation</th>	
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
                        <td><?php echo getValeurChamp('date_vente','ventes','id',$ligne['id_ventes']) ?></td>
                        <td><?php echo getValeurChamp('nom','clients','id',getValeurChamp('id_clients','ventes','id_clients',$ligne['id_clients'])) ?></td>            
                        <td><?php echo $ligne['date_paiment'] ?></td>
                        <td><?php echo formater_montant($ligne['montant'])." Dh"; ?></td>
                        <td>
                            <a href="modifier_paiement.php?paiements=<?php echo $ligne['id'] ?>"  title="Modifier">
                               <i class="glyphicon glyphicon-edit"></i> 
                            </a>	
                            &nbsp;
                            <a href="#ancre" 
                            class="supprimer2" 
                            onclick="javascript:supprimer(
                                                        'paiements',
                                                        '<?php echo $ligne['id'] ?>',
                                                        'paiment.php',
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
            </p>

<?php 
}//Fin If
?>
<!--fin de la liste des clients-->
    </div>
   </div>
</div>
</div>
<?php require_once('foot.php'); ?>