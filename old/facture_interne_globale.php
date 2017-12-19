<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion facture";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Facture";
	$_SESSION['breadcrumb_nav3'] ="";
	require_once('menu.php'); 
?>
<div class="row">
					<div class="col-12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="glyphicon glyphicon-th-list"></i>
								</span>
								<h5>Facture</h5>
								<div class="buttons">
									<a title="Icon Title" class="btn" href="#"><i class="glyphicon glyphicon-shopping-cart"></i> <span class="text">Pay Now</span></a>
									<a title="Icon Title" class="btn" href="#"><i class="glyphicon glyphicon-print"></i> <span class="text">Print</span></a>
								</div>
							</div>
							<div class="widget-content">
								<div class="invoice-content">
									<div class="invoice-head">
										<div class="invoice-meta">
											Facture <span class="invoice-number"><?php echo $data =getFactureVenteGlobal($_REQUEST['clients']);?>
                                            <?php
												$date = date("d-m-Y");
												$heure = date("H:i");
											?>
                                            </span><span class="invoice-date">Date: <?php echo $date; ?>&nbsp;<?php echo $heure ?></span>
										</div>
										<h5>Facture Title/Subject</h5>
										<div class="invoice-to">
											<ul>
												<li>
												<span><strong>De</strong></span>
												<span><?php echo utf8_decode('Sté Boulangerie Patisserie ');?> Al Hanini S.A.R.L</span>
												<span><?php echo utf8_decode('Dépostaire  Marrakech  Adresse: Lot Massira 2 A N° 829');?></span>
												<span>Marrakech.</span>
												</li>
											</ul>
										</div>
										<div class="invoice-from">
                                        	<?php 
												$id_client=$_REQUEST['clients'];
												$client="Client : ".getValeurChamp('nom','clients','id',$id_client);
												$Compagnon=utf8_decode("Compagnon : ".getValeurChamp('compagnon','clients','id',$id_client));
												$Immatriculation="Immatriculation : ".getValeurChamp('immatriculation','clients','id',$id_client);
												$telephone=utf8_decode("Télephone : ".getValeurChamp('tel','clients','id',$id_client));
												$secteur=utf8_decode("Sécteur : ".getValeurChamp('secteure','clients','id',$id_client));
												$departkm=utf8_decode("Départ Km : ".getValeurChamp('depart_km','ventes','id',$_REQUEST['ventes']));
												$departA=utf8_decode("Départ à : ".getValeurChamp('depart_date_heur','ventes','id',$_REQUEST['ventes'])." h ".getValeurChamp('depart_date_min','ventes','id',$_REQUEST['ventes']));
												$arriveKm=utf8_decode("Arrivée Km : ".getValeurChamp('arrivee_km','ventes','id',$_REQUEST['ventes']));
												$arriveA=utf8_decode("Arrivée à : ".getValeurChamp('arrivee_date_heur','ventes','id',$_REQUEST['ventes'])." h ".getValeurChamp('arrivee_date_min','ventes','id',$_REQUEST['ventes']));
											?>
											<ul>
												<li>
												<span><strong>à</strong></span>
												<span><?php echo $client; ?></span>
												<span><?php echo $Compagnon?></span>
                                                <span><?php echo $Immatriculation ?></span>
                                                <span><?php echo $telephone ?></span>
                                                <span><?php echo $secteur ?></span>
                                                <div style="float:left;padding-right:5px;">
                                                    <span><?php echo $departkm ?></span>
                                                    <span><?php echo $arriveA ?></span>
                                                </div>
                                                 <div style="float:left;">
                                                    <span><?php echo $departA ?></span>
                                                    <span><?php echo $arriveA ?></span>
                                                </div>
												<span>Treyan.</span>
												</li>
											</ul>
										</div>
									</div>
									<div>
										<table class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
												<th>
													 Transaction Id
												</th>
												<th>
													 Title
												</th>
												<th>
													 Amount
												</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th class="total-label" colspan="2">
													 Total:
												</th>
												<th class="total-amount">
													 $920.00
												</th>
											</tr>
										</tfoot>
										<tbody>
										<tr>
											<td>
												 #43
											</td>
											<td>
												 Vivamus sed auctor nibh congue, ligula
											</td>
											<td>
												 $20.00
											</td>
										</tr>
										
										<tr>
											<td>
												 #47
											</td>
											<td>
												 Larta mida eno mosque teria.
											</td>
											<td>
												 $340.00
											</td>
										</tr>
										</tbody>
										</table>
									</div>
									<p class="amount-word">
										Amount in Word: <span>Nine Hundred Twenty Dollars</span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
<?php require_once('foot.php'); ?>