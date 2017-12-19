<?php require_once('head.php'); ?>
<?php 
	$_SESSION['titre'] ="Changer le mot de passe ";
	$_SESSION['breadcrumb_nav1'] ="Accueil";
	$_SESSION['breadcrumb_nav2'] ="administration";
	$_SESSION['breadcrumb_nav3'] ="";
	
?>
<?php require_once('menu.php'); ?>
<br/>
<div class="row">
	<div class="col-12">
		<?php if(isset($_REQUEST['msg'])) {?>
			<div class="alert alert-info">
				<?php echo $_REQUEST['msg']?>
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
					<h5>Changer le mot de passe</h5>
				</div>
				<div class="widget-content nopadding">
                    <form action="gestion.php" name="frm" method="post" 
                    onsubmit="return checkForm(document.frm);" class="form-horizontal" >
                        
                        <input type="hidden" name="act" value="authentifications"/>
                        
                        <input type="hidden" name="table" value="authentifications"/>
                        <input type="hidden" name="page" value="administration.php"/>
                    
                        <input type="hidden" name="id_nom" value="id"/>
                        <input type="hidden" name="id_valeur" value="<?php echo getValeurChamp("id","authentifications",1,1) ?>"/>	
                            
                            
                        <div class="form-group">
                            <label class="control-label space-label">Login (*):</label>
                            <div class="controls">
                                <input type="text" id="login_required" class="form-control input-small"
                                name="login"/>
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label space-label"><?php echo _ANCIENNE ?> <?php echo _PASSWORD ?> (*):</label>
                           <div class="controls"> 
                            <input type="text" id="<?php echo _ANCIENNE ?>_<?php echo _PASSWORD ?>_required" class="form-control input-small"
                            name="password0"/>
                           </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label space-label"><?php echo _NOUVELLE ?> <?php echo _PASSWORD ?> (*):</label>
                         <div class="controls"> 
                            <input type="text" id="<?php echo _NOUVELLE ?>_<?php echo _PASSWORD ?>_required" class="form-control input-small"
                            name="password"/>
                         </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label space-label"><?php echo _CONFIRMER ?> <?php echo _PASSWORD ?> (*):</label>
                          <div class="controls"> 
                            <input type="text" id="<?php echo _CONFIRMER ?>_<?php echo _PASSWORD ?>_required"  class="form-control input-small"
                            name="password2"/>
                          </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit"  value="<?php echo _MODIFIER ?>" class="btn btn-primary" />
                        </div>
                    </form>
      </div>
	</div>						
</div>
</div>		

<?php require_once('foot.php'); ?>