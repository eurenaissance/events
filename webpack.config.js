const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addStyleEntry('lib', './assets/scss/lib.scss')
    .addStyleEntry('app', './assets/scss/app.scss')
    .addEntry('index', './assets/tsx/index.tsx')
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableSassLoader()
    .enableTypeScriptLoader()
    .enableReactPreset()
;

module.exports = Encore.getWebpackConfig();