# AuctionProMax

This is an extended version of AuctionProJapan.

## Backend
- **Language:** PHP
- **Framework:** SlimPHP
- **Database:** MySQL
- **ORM:** Doctrine
- **Dependency Injection:** PHP-DI
- **Components:** Symfony Components

## Frontend
- **Design:** HTML/CSS/JS
- **Template Engine:** Twig
- **Style Framework:** Bootstrap

## Installation Steps
- Ensure you have Composer and npm installed. After pulling the latest changes or switching to a new branch, run:
  ```bash
  composer install
  npm install
    ```
- For development, build assets by running:`npm run dev`
- For production, build assets with:`npm run build`
- To continuously build assets during development and automatically rebuild on updates, run:`npm run watch`
- Run `docker-compose up -d --build` to rebuild docker containers if you are using docker.