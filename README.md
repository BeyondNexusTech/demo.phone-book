<div style="text-align:center;">
  
  [![BNetWork](https://www.blache-nolwenn.fr/public/image/logo/blache/logo-full.webp)](https://www.blache-nolwenn.fr)

</div>

# Annuaire Téléphonique Inversé

Bienvenue sur le dépôt GitHub de l'Annuaire Téléphonique Inversé ! Ce projet vous permet de rechercher des informations de contact en utilisant soit un numéro de téléphone, soit un nom ou un prénom. Idéal pour retrouver facilement les coordonnées de vos contacts.

<br>

## À Propos de ce Projet

L'Annuaire Téléphonique Inversé est une application web qui permet de rechercher rapidement et efficacement des informations de contact à partir d'une base de données. Que vous ayez un numéro de téléphone ou seulement un nom ou prénom, cette annuaire vous fournira les informations disponibles associées.

<br>

## Fonctionnalités

- **Recherche par Téléphone :** Entrez un numéro de téléphone pour obtenir les informations de contact associées.
- **Recherche par Nom ou Prénom :** Entrez un nom ou un prénom pour trouver toutes les correspondances disponibles dans la base de données.
- **Base de Données :** Utilisation d'une base de données robuste pour stocker et gérer les informations de contact.
- **Interface Utilisateur Intuitive :** Une interface utilisateur conviviale pour faciliter la recherche et l'affichage des résultats.

<br>

### Prérequis

- **PHP :** Assurez-vous que PHP est installé et configuré sur votre serveur.
- **MySQL :** Une base de données MySQL pour stocker les informations de contact.
- **Apache/Nginx :** Un serveur web pour héberger l'application.

<br>

### Installation

1. Cloner le Dépôt
```powershell
git clone https://github.com/neshkel/demo_phone-book.git
cd demo_phone_book
```

3. Configurer la Base de Données

- Créez une base de données MySQL.
- Importez le fichier database.sql pour créer les tables nécessaires :

```powershell
mysql -u votreutilisateur -p votremotdepasse demo_phone-book.db < database.sql
```

4. Démarrer le Serveur
Assurez-vous que votre serveur web (Apache/Nginx) est configuré pour pointer vers le répertoire du projet et démarrez-le.

<br>

### Utilisation

- **Recherche par Téléphone :** Saisissez un numéro de téléphone dans la barre de recherche pour obtenir les informations de contact associées.
- **Recherche par Nom ou Prénom :** Saisissez un nom ou un prénom dans la barre de recherche pour obtenir les correspondances disponibles.

<br>

## Contribuer

Les contributions sont les bienvenues ! Si vous souhaitez contribuer à ce projet, veuillez suivre les étapes suivantes :

- Fork le dépôt.

- Créer une nouvelle branche pour votre fonctionnalité ou correction :
```powershell
git checkout -b feature/ma-fonctionnalite
```

- Commiter vos modifications :
```powershell
git commit -am 'Ajouter une nouvelle fonctionnalité'
```

- Pousser votre branche :
```powershell
git push origin feature/ma-fonctionnalite
```

- Ouvrir une Pull Request.

<br>

## Licence
Ce projet est sous licence BNetWork. Voir le fichier LICENSE pour plus de détails.

<br>

## Contact
Pour toute question ou support, veuillez ouvrir une issue sur GitHub ou contacter l'administrateur du projet via email.

<br>

![Build Status](https://github.com/neshkel/demo.phone-book/actions/workflows/ci.yml/badge.svg)

![Build Status](https://travis-ci.com/neshkel/demo.phone-book.svg?branch=main)

![Codecov](https://codecov.io/gh/neshkel/demo.phone-book/branch/master/graph/badge.svg)

![Coverage Status](https://coveralls.io/repos/github/neshkel/demo.phone-book/badge.svg?branch=main)

![Dependencies](https://david-dm.org/neshkel/demo.phone-book.svg)

![Known Vulnerabilities](https://snyk.io/test/github/neshkel/demo.phone-book/badge.svg)

![Top Langs](https://github-readme-stats.vercel.app/api/top-langs/?username=neshkel&layout=compact)

![GitHub release (latest by date)](https://img.shields.io/github/v/release/neshkel/demo.phone-book)

![License](https://img.shields.io/github/license/neshkel/demo.phone-book)

![GitHub commit activity](https://img.shields.io/github/commit-activity/m/neshkel/demo.phone-book)

![Documentation Status](https://readthedocs.org/projects/demo_phone-book/badge/?version=latest)
