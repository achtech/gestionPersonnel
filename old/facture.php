<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des des factures";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Factures";
	$_SESSION['breadcrumb_nav3'] ="";
	
?>
<?php require_once('menu.php'); ?>
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
									<label class="control-label">Choisir le client : </label><?php echo getTableList('clients','id_clients',$valeur,'nom',$change,$where,$libelle) ?>
                               </div>
                        </div>
                        <div class="form-group">
								<label class="control-label space-label">Date facture entre</label>
                             <div class="controls">
                                  <div class="row espace">
                                        <div class="col-4">   
                            				<input type="text" name="date1" id="cal_required" value="<?php if(isset($_REQUEST['date1'])) echo $_REQUEST['date1'];?>" data-date-format="yyyy-mm-dd"  class="datepicker form-control input-small"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; et
                                       </div>
                                       <div class="col-4"> 
                            				<input type="text" name="date2" id="cal2_required" value="<?php if(isset($_REQUEST['date2'])) echo $_REQUEST['date2'];?>" data-date-format="yyyy-mm-dd"  class="datepicker form-control input-small"/>
                                       </div>
                                 		<div class="col-4">
                                            <div>
                                                <input type="submit" name="v"  class="btn btn-primary" value="<?php echo _RECHERCHE."r" ?>" />
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

				<div class="element_float"><h5>Factures</h5></div>
				
				<div class="element-clear"></div>
			</div>
			<div class="widget-content nopadding">
			<br/>
					<?php 
                        $where1="";
                    if(isset($_REQUEST['date1']) and isset($_REQUEST['date2']))
                    {
                        if(!empty($_REQUEST['date1']) and !empty($_REQUEST['date2'])){
                            $date1=$_REQUEST['date1'];
                            $date2=$_REQUEST['date2'];
                            $tab_d1 = explode("/",$date1);
                            $tab_d2 = explode("/",$date2);		
							$d1=$tab_d1[0];
							$d2=$tab_d2[0];
                            
							$where1=" and date_facture between '".$d1."' and '".$d2."'";
                        }
                    }
                    if(isset($_REQUEST['id_clients']) and !empty($_REQUEST['id_clients']))
                        $where1.=" and id_ventes in (select id from ventes where id_clients=".$_REQUEST['id_clients'].")";
                    
                    $sql = "select * from factures where id_ventes!=0 ".$where1;		
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
                             <th>client</th>
                             <th>numero_facture</th>
                             <th>date_facture</th>
                             <th>Total TTC</th>
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
                                <td>
                                <?php
								  echo  getValeurChamp('nom','clients','id',getValeurChamp('id_clients','ventes','id',$ligne['id_ventes']))
								  ?>
                            </td>
                    <?php //echo $type_vente[$ligne['type_vente']] echo $ligne['date_facture']?>
                                <td><?php  echo $ligne['numero_facture']?></td>
                                <td>
                                    
                                <?php echo dateVersSite($ligne['date_facture'])?>
                                    
                                </td>
                                <td><?php echo formater_montant(getMontantVente($ligne['id_ventes']))." Dh"; ?></td>
                                <td class="op">
                             &nbsp;
                             <?php $TypeClient=getValeurChamp('type_client','clients','id',getValeurChamp('id_clients','ventes','id',$ligne['id_ventes']));
							 if($TypeClient==1){?>
            					<a href="ventes_facture_print_interne_journalier.php?ventes=<?php echo $ligne['id_ventes']; ?>" class="detail" title="Imprimer facture Journalier">
                                	<i class="fa fa-print"></i>
                                 </a>
                                <?php } if($TypeClient==2){?> 
            					<a href="ventes_facture_print_externe.php?ventes=<?php echo $ligne['id_ventes']; ?>" class="detail" title="Imprimer facture">
                                	<i class="fa fa-print"></i>
                                 </a>
                                <?php } ?>                                 
                                    &nbsp;
                                    
                                    <a href="#ancre" 
                                    class="supprimer2" 
                                    onclick="javascript:supprimer(
                                                                'factures',
                                                                '<?php echo $ligne['id'] ?>',
                                                                'facture.php',
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
                    } //Fin If
                    ?>
 			</div>
   		</div>
	</div>
</div>
<?php require_once('foot.php'); ?>