<?php

//Format d'un article demandé : $_SERVER['REQUEST_URI'] = 'sand4l/article-2013-04-18-test-de-mi-avril-deja';
$url = explode('-', key($_GET), 4);

if(!empty($url[0])) { //si un article spécifié après article dans l'url
	
	$date = $url[0].'-'.$url[1].'-'.$url[2];
	$titre = utf8_decode(urldecode(str_replace('-', ' ', $url[3])));
	
	$article = lire_article('', $date, $titre); //Récupération de l'article
	
} elseif(!empty($_GET['article'])) //Manière classique d'accéder à l'article : 'http://sand4l.free.fr/article.php?article=$id'
	$article = lire_article($_GET['article']); //Récupération de l'article


//Un article a été demandé et la requete lire_article a aboutis
if(!empty($article)) {

	$id = $article['id'];
	
	$article['dossier_images'] = '_/images/articles/'.$article['id'].'/';
	$article['images'] = liste_images($article['dossier_images']); //Liste des images, à l'exception de celle de couverture 0.jpeg
	$article['timestamp'] = strtotime($article['date']);
	$article['lien'] = '?' . $article['date'] . '-' . strtolower(str_replace(' ', '-', $article['titre']));
	//$article['lien'] = '?article=' . $article['id'];
	
	
//Sinon, la page d'accueil, on liste les derniers articles
} else {

	$articles = liste_articles(1); //Récupération des articles de la page 1
	
	$id = $articles[0]['id'];
	
	if(!empty($articles)) {
		foreach($articles as $i => $article) { //Augmentation des informations de l'article
			$articles[$i]['dossier_images'] = '_/images/articles/'.$article['id'].'/';
			$articles[$i]['images'] = liste_images($articles[$i]['dossier_images']);
			$articles[$i]['timestamp'] = strtotime($articles[$i]['date']);
			$articles[$i]['lien'] = '?' . $articles[$i]['date'] . '-' . strtolower(str_replace(' ', '-', $articles[$i]['titre']));
			//$articles[$i]['lien'] = '?article=' . $article['id'];
		}
		unset($article); //Destruction de $article
	}
}