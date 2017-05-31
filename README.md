# serre    repo test de l'interface de la serre

	Ce projet a été développé sur un serveur apache (sous debian)
Pour fonctionner il vous faudra donc apache, mysql et php d'installés sur votre serveur.

	Exporter le repo git, dans votre dossier html, htdocs ou autres,...
	Puis vous modifierez, les fichiers php pour pour renseigner l'adresse de votre site web aux emplacements indiqués, ainsi que les caractéristiques de la base de données que vous souhaitez utiliser. N'hésitez pas à utiliser le fichier import.sql pour importer une base de données fonctionnelle.

	Il vous faudra aussi modifier le fichier config.php dans le dossier vendor/hybridauth/hybridauth et y rentrer les ids et secrets des services d'authentification que vous souhaitez utiliser. 

	En cas de problèmes n'hésitez pas à lire les docs de Bootstrap et de Hybridauth.

	Pour pouvoir simuler la serre, il vous faudra une beaglebone reliée également à internet. (Attention si réseau ISEN utiliser un partage de connexion, les ports sont fermés)

	Pour utiliser la librairie MySQLdb il faut utiliser Python 2.7 et installer la librairie :
	Sous Windows télécharger MySQL-python sur le site python
	Sous linux taper sudo apt-get install python2.7-mysqldb
	
	Et lancer le script python simulateur_beaglebone.py, après y avoir également modifié les champs adresse, port et mot de passe de votre base de données.
	
	Si vous voulez avoir le programme python de lancer dès le lancement de la beaglebone il vous faudra créer un service sur la beaglebone pour cela suivez la démarche suivante :
	-Mettre le code python fonctionnel sur la carte
	-Faire cd /usr/bin/
	Taper nano <scriptname>.sh
	Puis taper #!/bin/bash
	/home/<chemin_vers_le_code>/<name_of_compiled_code>
	-Sauvegarder puis donner les permissions avec chmod u+x /usr/bin/<scriptname>.sh
	-Créer le service
	nano /lib/systemd/<scriptname>.service
	-Taper dans le fichier :
	[Unit]
	Description=<description du code>
	After=syslog.target network.target
	[Service]
	Type=simple
	ExecStart=/usr/bin/<scriptname>.sh
	[Install]
	WantedBy = multi-user.target
	-Créer un lien symbolique
	cd etc/systemd/system/
	ln /lib/systemd/<scriptname>.service <scriptname>.service
	-Demarrer le service :
	systemctl daemon-reload
	systemctl start <scriptname>.service
	systemctl enable <scriptname>.service
	-Relancer la carte


En cas de problèmes de compréhension vous pouvez nous contacter : 
louisjaouen@me.com
benoit.lau@isen-ouest.yncrea.fr
