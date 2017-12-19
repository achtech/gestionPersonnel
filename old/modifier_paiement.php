<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Gestion des des paiements";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="Paiement";
	$_SESSION['breadcrumb_nav3'] ="Mise à jour paiement";
	
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
					<h5><?php echo _MODIFIER ?> paiement</h5>
				</div>
				<div class="widget-content nopadding">
                	<br/>
                        <form action="gestion.php" name="frm" method="post" 
                        onsubmit="return checkForm(document.frm);"  class="form-horizontal" >
                            <input type="hidden" name="act" value=  "m"/>
                            <input type="hidden" name="table" value="paiements"/>
                            <input type="hidden" name="page" value= "paiment.php"/>
                            <?php 
                                    $v=getValeurChamp('id_clients','paiements','id',$_REQUEST['paiements']);
                            ?>
                            <input type="hidden" name="id_clients" value="<?php echo $v?>"/>
                            
                            <input type="hidden" name="id_nom" value="id"/>
                            <input type="hidden" name="id_valeur" value="<?php echo $_REQUEST['paiements'] ?>"/>	
                            
                            <input type="hidden" name="id_noms_retour" value="paiements"/>
                            <input type="hidden" name="id_valeurs_retour" value="<?php echo $_REQUEST['paiements'] ?>"/>	
                                 
                            <div class="form-group">
									<label class="control-label">Date paiement : </label>
                               <div class="controls">
                                <input type="text" 
                                name="date_paiment" value="<?php echo getValeurChamp('date_paiment','paiements','id',$ligne['paiements']) ?>" data-date-format="yyyy-mm-dd"  class="datepicker form-control input-small" />
                                </div>
                            </div>
                            
                             <div class="form-group">
							   <label class="control-label">Montant : </label>
                               <div class="controls"> 
                                <input type="text" id="montant_required" 
                                name="montant"   value="<?php echo getValeurChamp('montant','paiements','id',$ligne['paiements']) ?>"/>
                                </div>
                            </div>
                          <div class="form-actions">
                            <input type="submit"  value="<?php echo _MODIFIER ?>" class="btn btn-primary" /> ou <a class="text-danger" href="paiment.php">Annuler</a>
                         </div>
                        </form>
		</div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>