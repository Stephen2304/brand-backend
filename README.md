# Déploiement local avec Docker

## Prérequis

-   [Docker](https://www.docker.com/products/docker-desktop) installé sur votre machine

## Étapes

1. **Cloner le projet**

    ```bash
    git clone <url-du-repo>
    cd <nom-du-repo>
    ```

2. **Copier le fichier d'environnement**

    ```bash
    cp .env.example .env
    ```

3. **Lancer les conteneurs**

    ```bash
    docker-compose up --build -d
    ```

4. **Installer les dépendances Composer**

    ```bash
    docker-compose exec app composer install
    ```

5. **Générer la clé d'application**

    ```bash
    docker-compose exec app php artisan key:generate
    ```

6. **Lancer les migrations et seeders**

    ```bash
    docker-compose exec app php artisan migrate --seed
    ```

7. **Accéder à l'application**
    - L'application sera disponible sur [http://localhost:8000](http://localhost:8000)

## Commandes utiles

-   Arrêter les conteneurs :  
    `docker-compose down`

-   Voir les logs :  
    `docker-compose logs -f`

-   Accéder au conteneur app :  
    `docker-compose exec app bash`

---

**Remarques** :

-   Les fichiers uploadés (storage) et les dépendances (vendor) sont persistés via des volumes.
-   Le mot de passe MySQL par défaut est `secret` (modifiable dans `docker-compose.yml` et `.env`).
-   Pour modifier la configuration Nginx, éditez `docker/nginx/conf.d/default.conf`.

---
