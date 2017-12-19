<?php require_once('head.php'); 

			
			 $select4="DELETE FROM produits_print";
			doQuery($select4);
			doQuery("COMMIT"); 

			 $select3="INSERT INTO produits_print (id,designation, qte_stock,ancien_stock,prix_vente,prix_echange,prix_achat) SELECT id,designation, qte_stock,ancien_stock,prix_vente,prix_echange,prix_achat FROM produits";
			doQuery($select3);
			doQuery("COMMIT"); 

			 $selectss="SELECT impresssion_stock from `parametres`";
			$rr=doQuery($selectss);
			while($li=mysql_fetch_array($rr)) $dateImpression=$li['impresssion_stock'];
			
			 $select1="UPDATE `produits_print` SET date_impression='".$dateImpression."'";
			doQuery($select1);
			doQuery("COMMIT"); 

			
			 $select="UPDATE `parametres` SET `impresssion_stock`='".date('Y-m-d')."'";
			doQuery($select);
			doQuery("COMMIT"); 

			 $select1="UPDATE `produits` SET ancien_stock=`qte_stock`";
			doQuery($select1);
			doQuery("COMMIT"); 
			
			 $select2="UPDATE `produits` SET `qte_stock`=0";
			doQuery($select2);
			doQuery("COMMIT"); 
			
			redirect("print_stock_produit.php");
?>