# serre    repo test de l'interface de la serre

	Ce projet a été développé sur un serveur apache (sous debian)
Pour fonctionner il vous faudra donc apache, mysql et php d'installé sur votre serveur.

	Exporter le repo git, dans votre dossier html, htdocs ou autres,...
	Puis vous modifierez, les fichiers php pour pour renseigner l'adresse de votre site web aux emplacements indiqués, ainsi que les caractéristiques de la base de données que vous souhaitez utiliser. N'hésitez pas à utiliser le fichier import.sql pour importer une base de données fonctionnelle.

	Il vous faudra aussi modifier le fichier config.php dans le dossier vendor/hybridauth/hybridauth et y rentrer les ids et secrets des services d'authentification que vous souhaitez utiliser. 

	En cas de problèmes n'hésitez pas à lire les docs de Bootstrap et de Hybridauth.

	Pour pouvoir simuler la serre, il vous faudra une beaglebone reliée également à internet. (Attention si réseau ISEN utiliser un partage de connexion, les ports sont fermés)

	Et lancer le script python simulateur_beaglebone.py, après y avoir également modifié les champs adresse, port et mot de passe de votre base de données.



En cas de problèmes de compréhension vous pouvez nous contacter : 
louisjaouen@me.com
benoit.lau@isen-ouest.yncrea.fr