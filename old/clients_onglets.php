<br/>
<div class="row">
	<div class="col-12">
		
		<a href="clients_details.php?clients=<?php echo $_REQUEST['clients'] ?>"> Profil client </a>

		&nbsp; | &nbsp;

		<a href="clients_achat.php?clients=<?php echo $_REQUEST['clients'] ?>"> <?php echo "Vente" ?> </a>

		&nbsp; 

		<br/>
				<h4>
					Client : <?php echo getValeurChamp('nom','clients','id',$_REQUEST['clients'])?> 
				</h4>
		   </div>
	</div>
