var Encore = require('@symfony/webpack-encore');

const CopyPlugin = require('copy-webpack-plugin');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())

    .enableSingleRuntimeChunk()

    .addEntry('js/app', './assets/js/app.js')
    .addEntry('js/welcome', './assets/js/welcome.js')
    .addEntry('js/login', './assets/js/login.js')
    .addEntry('js/validation', './assets/js/validation.js')

    .addStyleEntry('css/cf', './assets/css/clearfix.css')
    .addStyleEntry('css/common', './assets/scss/common.scss')
    .addStyleEntry('css/app', './assets/scss/app.scss')
    .addStyleEntry('css/welcome', './assets/scss/welcome.scss')
    .addStyleEntry('css/login', './assets/scss/login.scss')

    // uncomment if you use Sass/SCSS files
    .enableSassLoader()

    .autoProvidejQuery()

    .addPlugin(new CopyPlugin([
        { from: './assets/img', to: 'img' }
    ]))

    // uncomment for legacy applications that require $/jQuery as a global variable
    // .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
