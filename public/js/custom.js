

function AddAnnonce(productName, description, price, photo, url) {
	$.ajax({
		url: 'annonce/add',
		type: 'POST',
		data: {productName:productName, description: description, price: price, photo: photo, url_sell: url},
		error: function (jqXHR, textStatus, errorThrown) {
			return "Une erreur est survenue.\nSi le problème persiste, contacter un responsable du site.\nMessage d\'erreur :\n" + textStatus + "\n" + errorThrown;
		},
		success: function (data, textStatus, jqXHR) {
			$response = $.parseJSON(data);
			if ($response.success) {
				return response.success;
			} else {
				return response.error;
			}
		}
	});
}

//renvoie un tableau (id et nom catégorie) pour les mots cle searchSentence ou une erreur
// envoie la string de mot clef
function getSearch(searchSentence, callbackSuccess, callbackError) {
	$.ajax({
		url: 'search',
		type: 'POST',
		data: { search: searchSentence},
		// error: function (jqXHR, textStatus, errorThrown) {
		// 	return "Une erreur est survenue.\nSi le problème persiste, contacter un responsable du site.\nMessage d\'erreur :\n" + textStatus + "\n" + errorThrown;
		// },
		// success: function (data, textStatus, jqXHR) {
		// 	$response = $.parseJSON(data);
		// 	if ($response.success) {
		// 		return response.categories;
		// 	} else {
		// 		return response.error;
		// 	}
		// }
		error: callbackError,
		success: callbackSuccess
	});
}

//renvoie un tableau (id et nom catégorie) pour la categorie categorie ou une erreur
// envoie la liste des id des categories selectionnées
function getTree(categories) {
	$.ajax({
		url: 'tree',
		type: 'POST',
		data: { categories: categories},
		error: function (jqXHR, textStatus, errorThrown) {
			return "Une erreur est survenue.\nSi le problème persiste, contacter un responsable du site.\nMessage d\'erreur :\n" + textStatus + "\n" + errorThrown;
		},
		success: function (data, textStatus, jqXHR) {
			$response = $.parseJSON(data);
			if ($response.success) {
				return response.categories;
			} else {
				return response.error;
			}
		}
	});
}

// envoie une liste des categorie selectionnées et renvoie nom prix description lienImage, lienSiteAnnonceur
function getAnnonce(categories) {
	$.ajax({
		url: 'annonce/get',
		type: 'POST',
		data: { categories: categories},
		error: function (jqXHR, textStatus, errorThrown) {
			return "Une erreur est survenue.\nSi le problème persiste, contacter un responsable du site.\nMessage d\'erreur :\n" + textStatus + "\n" + errorThrown;
		},
		success: function (data, textStatus, jqXHR) {
			$response = $.parseJSON(data);
			if ($response.success) {
				return response.annonces;
			} else {
				return response.error;
			}
		}
	});
}

/*
En cas d'erreur renvoie un message avec les infos de l'erreur(404, 500, ...)
Si la connexion reussie, renvoie true, le message d'erreur si elle echoue
*/
function logIn(user, pass) {
	$.ajax({
		url: 'user/connect',
		type: 'POST',
		data: { username: user, password: pass },
		error: function (jqXHR, textStatus, errorThrown) {
			return "Une erreur est survenue.\nSi le problème persiste, contacter un responsable du site.\nMessage d\'erreur :\n" + textStatus + "\n" + errorThrown;
		},
		success: function (data, textStatus, jqXHR) {
			$response = $.parseJSON(data);
			if ($response.success) {
				return true;
			} else {
				return $response.error;	
			}
		}
	});
}

/*
Renvoie true si l'inscription reussi
*/

function inscription(user, pass, mail) {
	$.ajax({
		url: 'user/inscription',
		type: 'POST',
		data: { username: user, password: pass, mail: mail},
		error: function (jqXHR, textStatus, errorThrown) {
			return "Une erreur est survenue.\nSi le problème persiste, contacter un responsable du site.\nMessage d\'erreur :\n" + textStatus + "\n" + errorThrown;
		},
		success: function (data, textStatus, jqXHR) {
			$response = data;
			if ($response.success) {
				return true;
			} else {
				return $response.error;	
			}
		}
	});
}

/*
	Renvoie true si l'utilisateur devra s'inscrire, et false si son email existe deja en base
*/
function testMail(mail) {
	$.ajax({
		url: '/user/test-email',
		type: 'POST',
		data: { mail: mail},
		error: function (jqXHR, textStatus, errorThrown) {
			return "Une erreur est survenue.\nSi le problème persiste, contacter un responsable du site.\nMessage d\'erreur :\n" + textStatus + "\n" + errorThrown;
		},
		success: function (data, textStatus, jqXHR) {
			$response = $.parseJSON(data);
			if ($response.state == "not_exists") {
				return true;
			} else {
				return false;
			}
		}
	});
}