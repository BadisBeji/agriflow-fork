# Symfony Vanilla CRUD - Parcelles & Cultures

Ce dossier contient un exemple **simple** de CRUD Symfony (sans fonctionnalités avancées) pour :
- `Parcelle`
- `Culture`

## Contenu
- `src/Entity` : entités Doctrine avec contraintes de validation (`Assert`)
- `src/Form` : formulaires Symfony
- `src/Controller` : contrôleurs CRUD classiques
- `templates/` : vues Twig minimales

## Validation de saisie incluse
- Champs obligatoires (`NotBlank`, `NotNull`)
- Valeurs positives (`Positive`, `PositiveOrZero`)
- Taille max de texte (`Length`)

## Intégration rapide dans un projet Symfony
1. Copier le contenu de ce dossier dans un projet Symfony existant.
2. Vérifier les dépendances:
   - `symfony/form`
   - `symfony/validator`
   - `symfony/twig-bundle`
   - `doctrine/orm`
3. Générer la base:
   ```bash
   php bin/console make:migration
   php bin/console doctrine:migrations:migrate
   ```
4. Lancer:
   ```bash
   symfony server:start
   ```
5. Ouvrir:
   - `/parcelles`
   - `/cultures`
