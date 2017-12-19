<br/>
<div class="row">
	<div class="col-12">
		

		<a href="fournisseurs_details.php?fournisseurs=<?php echo $_REQUEST['fournisseurs'] ?>"> Profil fournisseur </a>

		&nbsp; | &nbsp;


		<a href="fournisseurs_achat.php?fournisseurs=<?php echo $_REQUEST['fournisseurs'] ?>"> <?php echo "Achat" ?> </a>

		&nbsp; 	

		<br/>
		<h4>
			Fournisseur : <?php echo getValeurChamp('nom','fournisseurs','id',$_REQUEST['fournisseurs'])?> 
		</h4>
    </div>
</div>
