const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addStyleEntry('lib', './assets/scss/lib.scss')
    .addStyleEntry('app', './assets/scss/app.scss')
    .addEntry('global', './assets/tsx/global/index.tsx')
    .addEntry('city-autocomplete', './assets/tsx/city-autocomplete/index.tsx')
    .addEntry('home', './assets/tsx/home/index.tsx')
    .addEntry('search-event', './assets/tsx/search/event/index.tsx')
    .addEntry('search-group', './assets/tsx/search/group/index.tsx')
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableSassLoader()
    .enableTypeScriptLoader()
    .enableReactPreset()
;

module.exports = Encore.getWebpackConfig();
