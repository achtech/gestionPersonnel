<?php require_once('head.php'); ?>
<?php 
    $_SESSION['titre'] ="Gestion clients";
    $_SESSION['breadcrumb_nav1'] ="Accueil";
    $_SESSION['breadcrumb_nav2'] ="Clients";
    $_SESSION['breadcrumb_nav3'] ="D&eacute;tail client";
    
?>
<?php require_once('menu.php'); ?>
<?php require_once('clients_onglets.php'); ?>

<div class="row">
    <div class="col-12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="glyphicon glyphicon-th"></i>
                </span>

                <div class="element_float"><h5>D&eacute;tail client</h5></div>
                
                <div class="element-clear"></div>
            </div>
            <div class="widget-content nopadding">
                <?php 

                $sql = "select * from clients where id=".$_REQUEST['clients'];		
                $res = doQuery($sql);
                $nb = mysql_num_rows($res); 
                if( $nb==0){
                	echo _VIDE;
                }
                else
                {
                ?>
                <?php 		
                	if ($ligne = mysql_fetch_array($res))
                	{    
                ?>
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label"><?php echo "Immatriculation" ?> :  </label>
                        <div class="controls">
                                <input type="text" 
                                      class="form-control input-small" value="<?php echo $ligne['immatriculation']  ?>" readonly="readonly" />
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php echo "Compagnon" ?> : </label>
                         <div class="controls">
                                <input type="text" 
                                      class="form-control input-small" value="<?php echo $ligne['compagnon']  ?>" readonly="readonly" />
                        </div>
                        
                    </div>
                     <div class="form-group">
                        <label class="control-label"><?php echo "secteure" ?> : </label>
                        <div class="controls">
                                <input type="text" 
                                      class="form-control input-small" value="<?php echo $ligne['secteure']  ?>" readonly="readonly" />
                        </div>
                       
                    </div>


                    <div class="form-group">
                        <label class="control-label"><?php echo "Telephone" ?> : </label>
                         <div class="controls">
                                <input type="text" 
                                      class="form-control input-small" value="<?php echo $ligne['tel']  ?>" readonly="readonly" />
                        </div>
                        
                    </div>
                </form>

                		<?php }		?>
                

                <?php 
                } //Fin If
                ?>

            </div>
       </div>
    </div>
</div>


<?php require_once('foot.php'); ?>
