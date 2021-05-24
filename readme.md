# Laravel Bootstrap Italia Preset

A Laravel front-end scaffolding preset for [Bootstrap Italia](https://italia.github.io/bootstrap-italia/).

## Usage

1. Fresh install Laravel >= 7.0 and `cd` to your app. 
   
2. Install this preset via `composer require robertogallea/bootstrap-italia-preset --dev`. 
   Laravel will automatically discover this package. No need to register the service provider.
   
3. Run `php artisan ui bootstrap-italia` for copying preset configuration.

4. Run `npm install && npm run dev` to build the assets.

## Template customization

To customize the template color variables, please edit the file `resources/scss/app.scss`. Follow the instructions at 
the page https://italia.github.io/bootstrap-italia/docs/come-iniziare/personalizzazione-della-libreria/
   


