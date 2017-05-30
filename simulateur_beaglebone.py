#! /usr/bin/env python
# -*- coding: utf-8 -*-

import MySQLdb
import time
from random import *


i = 0

##Création de mes variables en string
eau = ''
ph = ''
lum = ''
temp_eau = ''
temp_air = ''
hum = ''
conduc = ''

##Création de mes flottants
Eau = 0
pH = 0.0
luminosite = 0.0
temperature_eau = 0.0
temperature_air = 0.0
humidite = 0.0
conductivite = 0.0

while True:
        eau = randint(0,2)
        ph = uniform(6, 8)
        lum = uniform(100, 150)
        tempo = uniform(10,14)
        tempr = uniform(14,20)
        hum = uniform(20, 80)
        conduc = uniform(80, 90)
        ##Ouverture du fichier texte
        ##Ecriture du fichier texte avec des valeurs aléatoires
        mon_fichier = open("donnees.txt", "w")
##        print("ouvert ecriture")
        mon_fichier.write(str(eau)+"\n")
        mon_fichier.write(str(ph)+"\n")
        mon_fichier.write(str(lum)+"\n")
        mon_fichier.write(str(tempo)+"\n")
        mon_fichier.write(str(tempr)+"\n")
        mon_fichier.write(str(hum)+"\n")
        mon_fichier.write(str(conduc)+"\n")

        mon_fichier.close() 

        ##Ouverture du fichier texte
        with open("donnees.txt", "r") as contenu:
##            print("ouvert")
            
            ##Récupération de mes données dans mes variables type string
            ##Changer la valeur du modulo si plus de 7 valeurs
            for valeur in contenu.readlines():
                    if i%7 == 0:
                        eau = valeur.strip()
                        i = i + 1
                    elif i%7 == 1:
                        ph = valeur.strip()
                        i = i + 1
                    elif i%7 == 2:
                        lum = valeur.strip()
                        i = i + 1
                    elif i%7 == 3:
                        temp_eau = valeur.strip()
                        i = i + 1
                    elif i%7 == 4:
                        temp_air = valeur.strip()
                        i = i + 1
                    elif i%7 == 5:
                        hum = valeur.strip()
                        i = i + 1
                    elif i%7 == 6:
                        conduc = valeur.strip()
                        i = i + 1
                    else:
                        print("Erreur")                   
                
        ##Fermeture du fichier de données
        contenu.close()
##        print("ferme")

        ##Connexion à la base de données
        ##Base de données locale
##        try:
##                print("Connection Base de donnees")
##                db = MySQLdb.connect(host="localhost",
##                                     user="root",
##                                     passwd="root",
##                                     db="projet")
##                cursor = db.cursor()
        ##Base de données distantes
        try :
                print("Connexion")
                db = MySQLdb.connect(host="*ajouter l'adresse de votre site",
                                port=*port*
                                user="root",
                                passwd="*mot de passe*",
                                db="projet")
                cursor = db.cursor()
             
                capteur_o = 1
                capteur_pH = 2
                capteur_Lum = 3
                capteur_Tempo = 4
                capteur_Tempr = 5
                capteur_Hum = 6
                capteur_conduc = 7
                    
                ##Conversion en float et insertion dans la base de donnees
                Eau = int ("".join(eau))
                cursor.execute("""INSERT INTO valeur (id_capteur, value)
                    VALUES (%s, %s)""", (capteur_o, eau))
                db.commit()
                ##time.sleep(1)
                ##j+=1
                ##print(j)

                pH = float("".join(ph))
                print(pH) ##Test de la donnée ph
                cursor.execute("""INSERT INTO valeur (id_capteur, value)
                    VALUES (%s, %s)""", (capteur_pH, pH))
                db.commit()
                ##time.sleep(1)
                ##j+=1
                ##print(j)
                
                luminosite = float("".join(lum))
                cursor.execute("""INSERT INTO valeur (id_capteur, value)
                    VALUES (%s, %s)""", (capteur_Lum, luminosite))
                db.commit()
                ##time.sleep(1)
                ##j+=1
                ##print(j)
                
                temperature_eau = float("".join(temp_eau))
                cursor.execute("""INSERT INTO valeur (id_capteur, value)
                    VALUES (%s, %s)""", (capteur_Tempo, temperature_eau))
                db.commit()
                ##time.sleep(1)
                ##j+=1
                ##print(j)
                
                temperature_air = float("".join(temp_air))
                cursor.execute("""INSERT INTO valeur (id_capteur, value)
                    VALUES (%s, %s)""", (capteur_Tempr, temperature_air))
                db.commit()
                ##time.sleep(1)
                ##j+=1
                ##print(j)
                
                humidite = float("".join(hum))
                cursor.execute("""INSERT INTO valeur (id_capteur, value)
                    VALUES (%s, %s)""", (capteur_Hum, humidite))
                db.commit()
                ##time.sleep(1)
                ##j+=1
                ##print(j)
                
                conductivite = float("".join(conduc))
                cursor.execute("""INSERT INTO valeur (id_capteur, value)
                    VALUES (%s, %s)""", (capteur_conduc, conductivite))
                db.commit()
                ##time.sleep(1)
                ##j+=1
                ##print(j)
                   



                ##Fermeture de la connexion
                time.sleep(2)
                db.close()
##                print("Fin de la connexion")
        ##Gestion et identification des erreurs
        except Exception, err:
            print('La connexion a echoue: \n'\
                'Erreur detecte :\n%s' %err)
