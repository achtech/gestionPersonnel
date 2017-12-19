<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion vente";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="mettre a&#768; jour  vente";
	$_SESSION['breadcrumb_nav3'] ="Choisir produit";


	$sql = "select * from produits order by id";		
	$res = doQuery($sql);

	$tab=array();
	while ($ligne = mysql_fetch_array($res)){
		$tab[]=$ligne['id'];
	}
?>
<script language="javascript" type="text/javascript">
function somme1(id)
{
	var valeur1=0;
	<?php
		foreach($tab as $k){
	?>	
		if(document.getElementById("a_retour_"+<?php echo $k?>).value!="")
		{
			valeur1=valeur1+parseInt(document.getElementById("a_retour_"+<?php echo $k?>).value);
			document.getElementById('resultat1').value=valeur1;
		}
	<?php
	}
	?>
	 tvente(id); 	
}

function somme2(id)
{
	var valeur2=0;
	<?php
		foreach($tab as $k){
	?>	
		if(document.getElementById("qte_"+<?php echo $k?>).value!="")
		{
			valeur2=valeur2+parseInt(document.getElementById("qte_"+<?php echo $k?>).value);
			document.getElementById('resultat2').value=valeur2;
		}

	<?php
	}
	?>
	 tvente(id);
}

function somme3(id)
{
	var valeur3=0;
	<?php
		foreach($tab as $k){
	?>	
		if(document.getElementById("nbr_retour_"+<?php echo $k?>).value!="")
		{
			valeur3=valeur3+parseInt(document.getElementById("nbr_retour_"+<?php echo $k?>).value);
			document.getElementById('resultat3').value=valeur3;
		}
	<?php
	}
	?>
    tvente(id);
}

function somme4(id)
{
	var valeur5=0;
	var valeur6=0;	
	<?php
		foreach($tab as $k){
	?>	
		if(document.getElementById("change_"+<?php echo $k?>).value!="")
		{
			var qteE=parseInt(document.getElementById("change_"+<?php echo $k?>).value);
			valeur5=valeur5+qteE;
			document.getElementById('resultat4').value=valeur5;

			var prixPiece=<?php echo PrixPiece($k); ?>;
			valeur6=parseFloat(valeur6)+parseFloat(prixPiece*qteE);
			document.getElementById('change').value=valeur6;			
		}
	<?php
	}
	?>
}

function tvente(id){
	var qte=0;
	var a_retour=0;
	var nb_retour=0;

	if(document.getElementById("a_retour_"+id).value!=""){
		a_retour=parseInt(document.getElementById("a_retour_"+id).value);
	}
	
	if(document.getElementById("nbr_retour_"+id).value!=""){
		nb_retour=parseInt(document.getElementById("nbr_retour_"+id).value);
	}
	
	
	if(document.getElementById("qte_"+id).value!=""){
		qte=parseInt(document.getElementById("qte_"+id).value);
	}
	
	var prix=parseInt(document.getElementById("prix_"+id).value);
	
	var t=(qte+a_retour-nb_retour)*prix;
	
	document.getElementById('tvente_'+id).value=t; 
	total();
	Fmap();
}


	
function total(){
	var valeur4=0;
	<?php
		foreach($tab as $k)
		{
	?>	
			if(document.getElementById("tvente_"+<?php echo $k?>).value!="")
			{
				valeur4=valeur4+parseInt(document.getElementById("tvente_"+<?php echo $k?>).value);
				document.getElementById('total').value=valeur4;
			}
	<?php
		}	
	?>
}

function Fmap(){
	var total=0;
	var versement=0;
	var rest=0;
	var change=0;

	if(document.getElementById("total").value!=""){
		total=parseInt(document.getElementById("total").value);
	}
	
	if(document.getElementById("versement").value!=""){
		versement=parseInt(document.getElementById("versement").value);
	}
	
	if(document.getElementById("rest").value!=""){
		rest=parseInt(document.getElementById("rest").value);
	}
	if(document.getElementById("change").value!=""){
		change=parseInt(document.getElementById("change").value);
	}
	var t=total+rest-versement-change;
	
	document.getElementById("map").value=t; 
}


</script>

<?php require_once('menu.php'); ?>
<div class="row">
		<div class="col-12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
					<h5>mettre a&#768; jour vente</h5>
				</div>
				<div class="widget-content nopadding">
					<form action="gestion.php" name="frm" method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal" >

						<input type="hidden" name="act" value="modifier_ligne_ventes"/>
					    <input type="hidden" name="table" value="ligne_ventes"/>
					    <input type="hidden" name="ventes" value="<?php echo $_REQUEST['ventes']?>"/>
						<input type="hidden" name="page" value="ventes.php"/>
		<div class="col-12">
         <div>
         <div class="widget-box">
				<div class="widget-title">
                 
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
                   
					<h5>Affichage de paiment</h5>
				</div>
                
				
				<div class="widget-content nopadding">
					
						<div class="form-group">
							<label class="control-label"> Change: </label>
							<div class="controls"> 
								<input type="text" name="changes" id="change" value="<?php echo getValeurChamp('chnages','factures','id_ventes',$_REQUEST['ventes']) ?>"/>
							</div>
						</div>
                        <div class="form-group">
                            <label class="control-label">Total: </label>
							<div class="controls">
								<input type="text" name="totales" id="total"  value="<?php echo getValeurChamp('totale','factures','id_ventes',$_REQUEST['ventes']) ?>"/>
							</div>
						</div>
						<div class="form-group">
                            <label class="control-label"> Versement:  </label>
							<div class="controls"><input type="text" name="versement" id="versement" onChange="Fmap()"  value="<?php echo getValeurChamp('versement','factures','id_ventes',$_REQUEST['ventes']) ?>"/></div>
						</div>
						<div class="form-group">
                             <label class="control-label">Reste: </label>
							 <div class="controls"> <input type="text" name="rest" id="rest"  value="<?php echo getValeurChamp('reste','factures','id_ventes',$_REQUEST['ventes']) ?>"/>
                             Actuel : <?php echo formater_montant(CreditClient(getValeurChamp('id_clients','ventes','id',getLastId('ventes'))));?> Dh
                             </div>
						</div>
						<div class="form-group">
                            <label class="control-label">Map: </label>
							<div class="controls">
								<input type="text" name="map"  id="map" value="<?php echo getValeurChamp('map','factures','id_ventes',$_REQUEST['ventes']) ?>"/>
							</div>
						</div>
					  </div>
				   </div>
				</div>
					

			<div class="widget-box">
				<div class="widget-title">
                 
					<span class="icon">
						<i class="glyphicon glyphicon-align-justify"></i>									
					</span>
                   
					<h5>mettre a&#768; jour vente</h5>
				</div>
                
				<div class="widget-content nopadding">
				


					<?php 
					$sqlll = "select * from produits 
							order by 
								id";		
					$resss = doQuery($sqlll);

					$nbbb = mysql_num_rows($resss);
					if( $nbbb==0){
						echo _VIDE;
					}
					else
					{
?>				       <table class="table table-bordered table-striped table-hover data-table">
						  <thead>
					        <th> Déscription </th>
					        <th> A. retour <input type="text" id="resultat1" style="width:60px" > </th>	
					        <th> Charges <input type="text" id="resultat2" style="width:60px" > </th>	 
					        <th> N.retour <input type="text" id="resultat3" style="width:60px" ></th>	
					        <th> Prix Vente </th>
					        <th> T. Vente </th>
					        <th> Change  <input type="text" id="resultat4" style="width:60px" ></th>		
					      </thead> 
					      <tbody>      
							<?php 
							$i = 0;
							while ($ligneee = mysql_fetch_array($resss)){
								if($i%2==0)
									$c = "c";
								else
									$c = "";
									
		$qte=getValeurChamp4('qte_vente','ligne_ventes','id_ventes',$_REQUEST['ventes'],'id_produits',$ligneee['id']);
		$prix=getValeurChamp4('prix_vente','ligne_ventes','id_ventes',$_REQUEST['ventes'],'id_produits',$ligneee['id']);				
		if($prix==0 || $prix==""){
				$prix=getValeurChamp('prix_vente','produits','id',$ligneee['id']);
			}
		$tvente=(getValeurChamp4('qte_vente','ligne_ventes','id_ventes',$_REQUEST['ventes'],'id_produits',$ligneee['id'])+getValeurChamp4('a_retour','ligne_ventes','id_ventes',$_REQUEST['ventes'],'id_produits',$ligneee['id'])-getValeurChamp4('nbr_retour','ligne_ventes','id_ventes',$_REQUEST['ventes'],'id_produits',$ligneee['id']))*$prix;
		
		$a_retour=getValeurChamp4('a_retour','ligne_ventes','id_ventes',$_REQUEST['ventes'],'id_produits',$ligneee['id']);
		$nbr_retour=getValeurChamp4('nbr_retour','ligne_ventes','id_ventes',$_REQUEST['ventes'],'id_produits',$ligneee['id']);		
		$change=getValeurChamp4('`qte_change`','ligne_ventes','id_ventes',$_REQUEST['ventes'],'id_produits',$ligneee['id']);		
			?>
		<tr class="<?php echo $c ?>">
            <td><?php echo $ligneee['designation'] ?></td>
            <td><input type="text" name="a_retour_<?php echo $ligneee['id']; ?>"  
            						 id="a_retour_<?php echo $ligneee['id']; ?>" 
                                     onChange="somme1(<?php echo $ligneee['id']; ?>)" 
                                     value="<?php echo $a_retour;?>"/></td>
   
   
            <td><input type="text" name="qte_<?php echo $ligneee['id']; ?>"  
            						 id="qte_<?php echo $ligneee['id']; ?>"
            				   onChange="somme2(<?php echo $ligneee['id']; ?>)"  
                                  value="<?php echo $qte;?>"/></td>
   
   
            <td><input type="text" name="nbr_retour_<?php echo $ligneee['id']; ?>"  
            						 id="nbr_retour_<?php echo $ligneee['id']; ?>" 
							   onChange="somme3(<?php echo $ligneee['id']; ?>)"
                                  value="<?php echo $nbr_retour?>" /></td>
   
   
            <td><input type="text" name="prix_<?php echo $ligneee['id']; ?>" 
            						 id="prix_<?php echo $ligneee['id']; ?>"  
                                  value="<?php echo $prix ;?>"/></td>
   
   
            <td><input type="text" id="tvente_<?php echo $ligneee['id']; ?>" value="<?php echo $tvente; ?>"/>
            
            </td>
            <td><input type="text" value="<?php echo $change;?>" name="change_<?php echo $ligneee['id']; ?>" id="change_<?php echo $ligneee['id']; ?>" onChange="somme4(<?php echo $ligneee['id']; ?>)"  /></td>
		</tr>
			<?php
                $i++; 
            }
            ?>
          </tbody>
        </table>
						<br/>
						<div class="form-actions">&nbsp;&nbsp;&nbsp; <input type="submit" value="Valider" class="btn btn-primary" /> ou <a class="text-danger" href="ventes.php">Annuler</a>
					   </div>
					   <br/>
					<?php 
					} //Fin If
					?>
					    
				</form>
		</div>
	</div>						
  </div>
</div>		

<?php require_once('foot.php'); ?>