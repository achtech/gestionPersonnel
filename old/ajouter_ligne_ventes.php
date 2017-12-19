<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion vente";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Nouvelle vente";
	$_SESSION['breadcrumb_nav3'] ="Nouveau commande";
?>
<?php require_once('menu.php'); 

						$sql = "select * from produits
								order by id";		
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
	 	Fmap(); 	
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
	 	Fmap();
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
	Fmap();
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
	Fmap();
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
	Fmap();
	total();
	
	
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
				document.getElementById('totales').value=valeur4;
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

	if(document.getElementById("totales").value!=""){
		total=parseInt(document.getElementById("totales").value);
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

<div class="row">
	<form action="gestion.php" name="frm" 	method="post" 
					onsubmit="return checkForm(document.frm);" class="form-horizontal">

						<input type="hidden" name="act" value="ajouter_ligne_vente"/>
					    <input type="hidden" name="table" value="ligne_ventes"/>
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
								<input type="text" name="changes" id="change" onChange="Fmap()" onBlur="Fmap()"/>
							</div>
						</div>
                        <div class="form-group">
                            <label class="control-label">Total: </label>
							<div class="controls">
								<input type="text" name="totales" id="totales" onChange="Fmap()"/>
							</div>
						</div>
						<div class="form-group">
                            <label class="control-label"> Versement:  </label>
							<div class="controls"><input required="required" type="text" name="versement" id="versement" onChange="Fmap()"/></div>
						</div>
						<div class="form-group">
                            <label class="control-label">Reste: </label>
							 <div class="controls"> <input type="text" name="rest" id="rest" value="<?php echo CreditClient(getValeurChamp('id_clients','ventes','id',getLastId('ventes')));?>" onChange="Fmap()"/></div>
						</div>
						<div class="form-group">
                            <label class="control-label">Map: </label>
							<div class="controls"><input type="text" name="map"  id="map"/></div>
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
						$sql = "select * from produits
								order by id";		
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
							while ($ligne = mysql_fetch_array($res)){
								if($i%2==0)
									$c = "c";
								else
									$c = "";
									
							?>
		<tr class="<?php echo $c ?>">
            <td><?php echo $ligne['designation'] ?></td>
            <td><input type="text" name="a_retour_<?php echo $ligne['id']; ?>"  id="a_retour_<?php echo $ligne['id']; ?>"
            onChange="somme1(<?php echo $ligne['id']; ?>)"/></td>
            <td><input type="text" name="qte_<?php echo $ligne['id']; ?>"  id="qte_<?php echo $ligne['id']; ?>"
            onChange="somme2(<?php echo $ligne['id']; ?>)"/></td>
            <td><input type="text" name="nbr_retour_<?php echo $ligne['id']; ?>" id="nbr_retour_<?php echo $ligne['id']; ?>"
            onChange="somme3(<?php echo $ligne['id']; ?>)"/></td>
            <td><input type="text" name="prix_<?php echo $ligne['id']; ?>" value="<?php echo $ligne['prix_vente']; ?>" id="prix_<?php echo $ligne['id']; ?>"/></td>
            <td><input type="text" id="tvente_<?php echo $ligne['id']; ?>" /></td>
            <td><input type="text" name="change_<?php echo $ligne['id']; ?>" id="change_<?php echo $ligne['id']; ?>" onChange="somme4(<?php echo $ligne['id']; ?>)" /></td>
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