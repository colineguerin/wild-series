# wild-series

-- OVERVIEW --

This website is a school project which purpose is to understand through practice the main features of PHP framework Symfony v6.

It includes many Symfony features, such as:
- Webpack Encore
- Doctrine
- Joint fixtures
- FakerPHP
- Forms, CRUD, user
- Services
- Flash messages
- Mailtrap
- Vich Upload
- ... and many more!

The database is managed with MySQL, templates with Twig, style with Bootstrap. The project is structured with a MVC architecture.

On this website, a user may navigate through the different programs listed by category, its seasons and episodes. He can add a new category, program, season or episode, edit or delete them. He can also upload posters for the programs, add actors, and receives notification emails. Soon, he will be able to create and manage his account.

-- INSTALLATION --

1. Clone this repo in your favorite editor
2. Run composer install
3. Set up the database configuration in the .env file (ideally creating a .env.local file)
4. Run database migrations: php bin/console doctrine:migrations:migrate
5. This project uses Webpack Encore, install javascript dependencies with yarn install or npm install
6. You may also install the symfony CLI

-- USAGE --

1. Start the symfony development server (for example, symfony server:start)
2. Compile the assets using Webpack Encore: yarn watch, yarn dev-server or yarn build
3. Open your web browser and navigate to http://localhost:8000 to view the project.