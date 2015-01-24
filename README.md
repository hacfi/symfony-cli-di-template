# Symfony CLI App with Dependency Injection

Using [box-project/scaffold](https://github.com/box-project/scaffold)

## Add command

Check out `src/App/Command/TestCommand.php` and `services.yml` to see how it’s done. Basically


## Build Phar

To create a Phar archive from your project install [box-project/box2](https://github.com/box-project/box2) globally via composer:


```sh
composer global require kherge/box --prefer-source
```

Then run

```sh
box build
```

to create it. Edit the `box.json` to make changes to the phar.