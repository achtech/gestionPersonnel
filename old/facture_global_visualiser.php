<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion facture";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Facture";
	$_SESSION['breadcrumb_nav3'] ="";
	require_once('menu.php'); 
?>
<form name="frm1" action="gestion.php" method="post" class="form-horizontal" > 
<input type="hidden" name="act" value="valider_facture_global" />
<input type="hidden" name="id_facture_global" value="<?php echo $_REQUEST['facture_global']?>" />
<div class="row">
			<div class="col-12">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon">
							<i class="glyphicon glyphicon-th-list"></i>
						</span>
						<h5>Facture</h5>
						<div class="buttons">
                        <input type="submit" value="valider" name="valider" />
							<a title="Icon Title" class="btn" href="ventes_facture_print_interne_gobal.php?facture_global=<?php echo $_REQUEST['facture_global']?>">
                            <i class="glyphicon glyphicon-print"></i> <span class="text">Print</span></a>
						</div>
					</div>
					<div class="widget-content">
						<div class="invoice-content">
							<div class="invoice-head">
								<div class="invoice-meta">
									<b>Facture <span class="invoice-number"><?php echo $data=$_REQUEST['facture_global'];?>
									<?php
										$date = date("d-m-Y");
										$heure = date("H:i");
									?>
									</span></b>
									<b><span class="invoice-date">Date: <?php echo $date; ?>&nbsp;<?php echo $heure ?></span></b>
								</div>
									<div class="invoice-to">
										 <div style="background:#DCDCDC;height:190px;height:190px;padding-left:5px;" >
											<ul>
												<li>
													<span><strong>De</strong></span>
													<span><?php echo 'Sté Boulangerie Patisserie ';?> Al Hanini S.A.R.L</span>
													<span><?php echo 'Dépostaire  Marrakech  Adresse: Lot Massira 2 A N° 829';?></span>
													<span>Marrakech.</span>
												</li>
											</ul>
										  </div>
									</div>
								
								<div class="invoice-from">
									<div style="background:#DCDCDC;height:190px;padding-left:5px;">
										<?php 
											$id_client=$_REQUEST['clients'];
											$client="Client : ".getValeurChamp('nom','clients','id',$id_client);
											$Compagnon=utf8_decode("Compagnon : ".getValeurChamp('compagnon','clients','id',$id_client));
											$Immatriculation="Immatriculation : ".getValeurChamp('immatriculation','clients','id',$id_client);
											$telephone="Télephone : ".getValeurChamp('tel','clients','id',$id_client);
											$secteur="Sécteur : ".getValeurChamp('secteure','clients','id',$id_client);
											
											$departkm=getDepartKm($_REQUEST['facture_global']);
											$departA=getValeurChamp('depart_date_heur','ventes','id',$_REQUEST['ventes'])." h ".getValeurChamp('depart_date_min','ventes','id',$_REQUEST['ventes']);
											
											$arriveKm=getArriveKm($_REQUEST['facture_global']);
											$arriveA=getValeurChamp('arrivee_date_heur','ventes','id',$_REQUEST['ventes'])." h ".getValeurChamp('arrivee_date_min','ventes','id',$_REQUEST['ventes']);
										?>
										<ul>
											<li>
												<span><strong>à</strong></span>
												<span><?php echo $client; ?></span>
												<span><?php echo $Compagnon?></span>
												<span><?php echo $Immatriculation ?></span>
												<span><?php echo $telephone ?></span>
												<span><?php echo $secteur ?></span>
												
													<div style="float:left;padding-right:30px;">
													
														<span>Départ Km :<input type="text" name="depart_km" id="depart_km" value="<?php echo $departkm ?>" class="form-control input-small-recherche" style="width:70px;" onChange="calculGasoilPrice()"/> </span>
														<span>Arrivée Km :<input type="text" name="arrivee_km" id="arrivee_km" value="<?php echo $arriveKm ?>" class="form-control input-small-recherche" style="width:70px;"  onCha	nge="calculGasoilPrice()"/> </span>
													</div>
													<div style="float:left;">
														<span>Départ à : <input type="text" name="depart_date_heur" value="<?php echo getValeurChamp('depart_date_heur','ventes','id',$_REQUEST['ventes']) ?>" class="form-control input-small-recherche" style="width:70px;"/> h <input type="text" name="depart_date_min" value="<?php echo getValeurChamp('depart_date_min','ventes','id',$_REQUEST['ventes']) ?>" class="form-control input-small-recherche" style="width:70px;" /> </span>
														<span>Arrivée à : <input type="text" name="arrivee_date_heur" value="<?php echo getValeurChamp('arrivee_date_heur','ventes','id',$_REQUEST['ventes']) ?>" class="form-control input-small-recherche" style="width:70px;" /> h <input type="text" name="arrivee_date_min" value="<?php echo getValeurChamp('arrivee_date_min','ventes','id',$_REQUEST['ventes']) ?>" class="form-control input-small-recherche" style="width:70px;" /></span>
													</div>
													<div style="clear:both"></div>
												
											</li>
										</ul>
									</div>
							   </div>
							</div>
							<div>
								<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>
											 Désignation
										</th>
										<th>
											 A.retour
										</th>
										<th>
											 Charge
										</th>
										<th>
											N.retour
										</th>
										<th>
											T.vente
										</th>
										<th>
											Change
										</th>
									</tr>
								</thead>
								
								<tbody>
								<?php
									$sql = "select * from ligne_ventes where id_ventes in (select id_ventes from factures where id_facture_global=".$_REQUEST['facture_global'].")";		
									$res = doQuery($sql);
								?>
							   <?php
							   		$tot_aretour=0;
									$tot_nretour=0;
									$tot_charge=0;
									
							     while ($ligne = mysql_fetch_array($res)) { 
							   		$tot_aretour=$tot_aretour+($ligne['a_retour']*$ligne['prix_vente']);
									$tot_nretour=$tot_nretour+($ligne['nbr_retour']*$ligne['prix_vente']);
									$tot_charge=$tot_charge+($ligne['qte_vente']*$ligne['prix_vente']);							   		
							   ?>
								<tr>
									<td>
										 <?php echo getValeurChamp('designation','produits','id',$ligne['id_produits']) ?>
									</td>
									<td>
										<input type="text" name="a_retour" value="<?php echo $ligne['a_retour'];?>" class="form-control input-small-recherche" style="width:100px;"/>
									</td>
									<td>
										 <input type="text" name="qte_vente" value="<?php echo $ligne['qte_vente'];?>" class="form-control input-small-recherche" style="width:100px;"/>
									</td>
									<td>
										<input type="text" name="nbr_retour" value="<?php echo $ligne['nbr_retour'];?>" class="form-control input-small-recherche" style="width:100px;"/>
									</td>
									<td>
										<?php 
											$mont=(($ligne['qte_vente']+ $ligne['a_retour'])-$ligne['nbr_retour'])*$ligne['prix_vente'];
										?>
										
										<input type="text" name="T.vente" value="<?php echo $mont;?>" class="form-control input-small-recherche" style="width:130px;"/>
									</td>
									<td>
										<?php 
										     $ligneMontant=$ligne['qte_change'];$tot_change=$tot_change+($ligne['qte_change']*getValeurChamp('prix_echange','produits','id',$ligne['id_produits']));
										?>
										<input type="text" name="Change" value="<?php echo $ligneMontant;?>" class="form-control input-small-recherche" style="width:100px;"/>
									</td>
								</tr>
								<?php
								  }
								?>
								<tr>
									<td>Total</td>
									<td><?php echo $tot_aretour?></td>
									<td><?php echo $tot_charge?></td>
									<td><?php echo $tot_nretour?></td>
									<td>&nbsp;</td>
									<td><?php echo $tot_change?></td>
								</tr>
								</tbody>
								<tfoot>
								
									<tr>
										<td class="total-label" colspan="" >
											 <u><b>Dépenses: </b> </u>
										</td>
										<td class="total-label" colspan="4" align="right">
											 Total:  
										</td>
										<td><input type="text" name="total" id="total" value="<?php echo $tot_aretour+$tot_charge;?>" class="form-control input-small-recherche" style="width:100px;" /></td>
									</tr>
									<tr>
										<td class="total-label"  >
											 Piéces:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="pieces" id="pieces" value="" class="form-control input-small-recherche" style="width:100px;"/>
										</td>
										<td class="total-label" colspan="4" align="right">
											 Versement:  &nbsp;&nbsp;
										</td>
										<td><input type="text" name="versement" value="<?php echo getTotalVersement($_REQUEST['facture_global']) ?>" class="form-control input-small-recherche" style="width:100px;"/></td>
									</tr>
									<tr>
										<td class="total-label"  >
											 Gasoil:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="gasoil" id="gasoil"  class="form-control input-small-recherche" style="width:100px;"/>
                                             Prix /litre<input type="text" name="prix_gasoil" id="prix_gasoil"  class="form-control input-small-recherche" style="width:50px;" value="100"  onChange="calculGasoilPrice()"/>
										</td>
										<td class="total-label" colspan="4" align="right">
											 Retour:  
										</td>
										<td><input type="text" name="retour" value="<?php echo $tot_nretour ?>" class="form-control input-small-recherche" style="width:100px;"/></td>
									</tr>
									<tr>
										<td class="total-label" >
											 Change   :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="changes"  id="change" value="<?php echo $tot_change; ?>" class="form-control input-small-recherche" style="width:100px;"/>
										</td>
										 <td class="total-label" colspan="4" align="right">
											 Map   :  
										</td>
										<td><input type="text" name="map" value="" class="form-control input-small-recherche" style="width:100px;"/></td>
									</tr>
									<tr>
										<td class="total-label" >
											Frais Dépot   :  <input type="text" name="frais_depot" value="A calculer" class="form-control input-small-recherche" style="width:100px;"/>
										</td>
										<td class="total-label" colspan="4" align="right">
											<input type="radio" name="percent1" value="3" onclick="percentF();" /> 3 % 
											<input type="radio" name="percent1" value="4"  onclick="percentF();" /> 4 %															                                            <input type="radio" name="percent1" value="5" onclick="percentF();" /> 5 %
										</td>
										<td><input type="text" name="percent2" value="" class="form-control input-small-recherche" style="width:100px;"/></td>
									</tr>
								</tfoot>
								</table>
							</div>
<p class="amount-word">Dépostaire  Marrakech  Adresse:  <span>Lot Massira 2 A N 829 /Tél: +212 661 369 412 / +212 600 531 642</span>
						</p>
						</div>
		
        			</div>
				</div>
			</div>
		</div>
</div>
</form>
<script language="javascript" type="text/javascript"> 
	var index=0;
calculGasoilPrice();
map();
percentF();
function calculGasoilPrice(){
	var DepartKm=document.frm1.depart_km.value;
	var ArriveKm=document.frm1.arrivee_km.value;
	var prixgasoil=document.frm1.prix_gasoil.value;		
	var totalGasoil=(ArriveKm-DepartKm)*prixgasoil;
	document.frm1.gasoil.value=totalGasoil;
}

function map(){
	var total=document.frm1.total.value;
	var versement=document.frm1.versement.value;
	var retour=document.frm1.retour.value;		
	var pieces=document.frm1.pieces.value;		
	var gasoil=document.frm1.gasoil.value;				
	var change=document.frm1.change.value;				
	document.frm1.map.value=total-versement-retour-pieces-gasoil-change;
}

function percentF(){

	var map=document.frm1.map.value;
	var per=document.frm1.percent1.value;

	if(map<2000000)
		per1=3;
	else if(map>=2000000 && map<2500000)
		per1=4;
	else per1=5;
	
	if(per=="") per=per1;
	var res=map*per/100;

	document.frm1.percent2.value=res;	
}
</script>

<?php require_once('foot.php'); ?>