// JavaScript Document
function getXhr(){
					var xhr = null; 
	if(window.XMLHttpRequest) // Firefox et autres
	   xhr = new XMLHttpRequest(); 
	else if(window.ActiveXObject){ // Internet Explorer 
	   try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
	}
	else { // XMLHttpRequest non support� par le navigateur 
	   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
	   xhr = false; 
	} 
					return xhr;
}

/**
* M�thode qui sera appel�e sur le click du bouton
*/
function go(){
	var xhr = getXhr();
	// On d�fini ce qu'on va faire quand on aura la r�ponse
	xhr.onreadystatechange = function(){
		// On ne fait quelque chose que si on a tout re�u et que le serveur est ok
		if(xhr.readyState == 4 && xhr.status == 200){
			leselect = xhr.responseText;
			// On se sert de innerHTML pour rajouter les options a la liste
			document.getElementById('villes').innerHTML = leselect;
		}
	}

	// Ici on va voir comment faire du post
	xhr.open("POST","ajax_villes.php",true);
	// ne pas oublier �a pour le post
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	// ne pas oublier de poster les arguments
	// ici, l'id de l'auteur
	sel = document.getElementById('pays');
	idauteur = sel.options[sel.selectedIndex].value;
	xhr.send("idPays="+idauteur);
}