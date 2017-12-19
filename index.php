<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Statistique & Tableau de bord";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="";
	$_SESSION['breadcrumb_nav3'] ="";
?>
<?php require_once('menu.php'); ?>
<div class="row">
	<div class="col-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="glyphicon glyphicon-th"></i>
				</span>

				<div class="element_float"><h5>Raccourcis</h5></div>
				<div class="element-clear"></div>
			</div>
			<div class="widget-content nopadding">
            <div class="row">
					<div class="col-12 center" style="text-align: center;">					
						<ul class="stat-boxes">
							<li class="popover-visits" style="width:150px;padding-top:5px;padding-bottom:5px;background-image:none;background-color:#FFF">
								<a href="clients.php"> <img src="images/client-icone-9349-64.png"  alt="Clients" title="Clients"/><br>Clients </a>
                                
							</li>
							<li class="popover-users" style="width:150px;padding-top:5px;padding-bottom:5px;background-image:none;background-color:#FFF">
								<a href="fournisseurs.php"> <img src="images/utilisateur-icone-3871-64.png"  alt="Fournisseurs" title="Fournisseurs"/> <?php echo "Fournisseurs"?> </a>
                                
							</li>
							<li class="popover-orders" style="width:150px;padding-top:5px;padding-bottom:5px;background-image:none;background-color:#FFF">
								<a href="ajouter_achats.php"><img src="images/ajouter-ecommerce-panier-boutique-en-ligne-icone-6203-64.png" alt="Achat" title="Achat" /> <br>Nouvelle Achat</a>
                                
							</li>
							<li class="popover-tickets" style="width:150px;padding-top:5px;padding-bottom:5px;background-image:none;background-color:#FFF">
								<a href="ajouter_ventes.php"> <img src="images/okteta-icone-7976-64.png" alt="Vente" title="Vente"/> <br>Nouvelle vente </a>
                                
							</li>
                            <li class="popover-tickets" style="width:150px;padding-top:5px;padding-bottom:5px;background-image:none;background-color:#FFF">
								<a href="produits.php"> <img src="images/archiver-dossier-services-publics-icone-7132-64.png" alt="Stock" title="Stock"/> <br>Stocks </a>
                                
							</li>
						</ul>
					</div>	
				</div>
</div>
                </div>
    		<div class="widget-content nopadding">
			<div class="row">
					<div class="col-12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="glyphicon glyphicon-th"></i>
								</span>
								<h5>Statistique</h5>
                            </div>
							<div class="widget-content nopadding">
							<br />
                            	<table class="table table-bordered table-striped table-hover">
									<tbody>
										<tr>
											<td>Nombre des clients internes</td>
											<td><?php echo getNombreClientInterne(); ?></td>
										</tr>
										<tr>
											<td>Nombre des clients externes</td>
											<td><?php echo getNombreClientExterne(); ?></td>
										</tr>									
										<tr>
											<td>Nombre des Fournisseur</td>
											<td><?php echo getNombreFournisseurs(); ?></td>
										</tr>						
										<tr>
											<td>Nombre des produits</td>
											<td><?php echo getNombreProduits(); ?></td>
										</tr>						                                        			                                                                                	
									</tbody>
								</table>							
							<br />
                            </div>
						</div>
               <div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="glyphicon glyphicon-th"></i>
								</span>
								<h5>Tableau de bord</h5>
							</div>
							<div class="widget-content nopadding">
                            <br />
								<table class="table table-bordered table-striped table-hover">
									<tbody>
										<tr>
											<td width="85%">Valeur du stock</td>
											<td align="right"><?php echo formater_montant(getValeurStock())?> Dh</td>
										</tr>
										<tr>
											<td>Valeur des achats</td>
											<td align="right"><?php echo formater_montant(getValeurAchats())?> Dh</td>
										</tr>
										<tr>
											<td>Valeur des ventes</td>
											<td align="right"><?php echo formater_montant(getValeurVentes())?> Dh</td>
										</tr>
                                        <tr>
											<td>Valeur des credits</td>
											<td align="right"><?php echo formater_montant(getValeurCredit())?> Dh</td>
										</tr>
										<tr>
											<td>Valeur des retours</td>
											<td align="right"><?php echo formater_montant(getValeurRetour())?> Dh</td>
										</tr>
										
									</tbody>
								</table>							
							<br />
                            </div>
						</div>         
      </div>
      </div>
     </div>
    </div>
  </div>
</div>

<?php
	if(isset($_REQUEST['archiver'])) {?>	
			<script language="javascript" type="text/javascript">
			alert("Votre Fichier est enregistrer dans le document Base de donne");
	</script>

	<?php	}
require_once('foot.php'); ?>