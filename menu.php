<div id="sidebar">
			<!--<a href="#" class="hide"><i class="glyphicon glyphicon-home"></i> Dashboard</a>-->
			<ul>
				
				<li class="">
					<a href="index.php"><i class="glyphicon glyphicon-home"></i> <span> Accueil </span> </a>
					<a href="marches.php"><i class="glyphicon glyphicon-road"></i> <span> Marches</span> </a>
					<a href="chantiers.php"><i class="glyphicon glyphicon-lock"></i> <span> Chantiers</span> </a>
					<a href="personnels.php"><i class="glyphicon glyphicon-user"></i> <span> Personnels 100%</span> </a>
					<a href="pointages.php"><i class="glyphicon glyphicon-time"></i> <span> Pointages 100%</span> </a>
					<a href="paiements.php"><i class="glyphicon glyphicon-usd"></i> <span> Paiements 100%</span> </a>
					<a href="avances.php"><i class="glyphicon glyphicon-euro"></i> <span> Avances</span> </a>
					<a href="postes.php"><i class="glyphicon glyphicon-lock"></i> <span> Postes 100%</span> </a>

					<a href="administrations.php"><i class="glyphicon glyphicon-wrench"></i> <span> Administration</span> </a>
				</li>
                
			</ul>
		
		</div>
		
		<div id="style-switcher">
			<i class="glyphicon glyphicon-arrow-left"></i>
			<span>Style:</span>
			<a href="#grey" style="background-color: #555555;border-color: #aaaaaa;"></a>
            <a href="#light-blue" style="background-color: #8399b0;"></a>
			<a href="#blue" style="background-color: #2D2F57;"></a>
			<a href="#red" style="background-color: #673232;"></a>
            <a href="#red-green" style="background-image: url('img/demo/red-green.png');background-repeat: no-repeat;"></a>
		</div>
	<div id="content">
		<div id="content-header">
				<h1><?php echo $_SESSION['titre'] ?></h1>
				<div class="btn-group">
					
				</div>
			</div>
			<div id="breadcrumb">
				<?php if(!empty($_SESSION['breadcrumb_nav3'])) { 
						$varcurrent="tip-bottom";
					}
					else { $varcurrent="current" ;}
				?>

				<a href="#" title="aller vers accueil" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> <?php echo $_SESSION['breadcrumb_nav1'] ?></a>
				<a href="#" class="<?php echo $varcurrent; ?>"><?php echo $_SESSION['breadcrumb_nav2'] ?></a>
				<?php if(!empty($_SESSION['breadcrumb_nav3'])) { ?><a href="#" class="current"><?php echo $_SESSION['breadcrumb_nav3'] ?></a><?php } ?>
			</div>
		<div class="container-fluid">