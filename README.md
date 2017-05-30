# serre
#repo test de l'interface de la serre

Ce projet a été développé sur un serveur apache (sous debian)
Pour fonctionner il vous faudra donc apache, mysql et php d'installé sur votre serveur.

Exporter le repo git, dans votre dossier html, htdocs ou autres,...
Puis vous modifierez, les fichiers php pour pour renseigner l'adresse de votre site web aux emplacements indiqués, ainsi que les caractéristiques de la base de données que vous souhaitez utiliser. N'hésitez pas à utiliser le fichier import.sql pour importer une base de données fonctionnelle.

Il vous faudra aussi modifier le fichier config.php dans le dossier vendor/hybridauth/hybridauth et y rentrer les ids et secrets des services d'authentification que vous souhaitez utiliser. 

En cas de problèmes n'hésitez pas à lire les docs de Bootstrap et de Hybridauth.

