require.config({
  baseUrl: "wp-content/themes/harvest/gemini/src/",
  paths: {
    "requireLib"                    : "bower_components/requirejs/require",
    "async"                         : "bower_components/requirejs-plugins/src/async",
    "jquery"                        : "bower_components/jquery/dist/jquery",
    "underscore"                    : "bower_components/underscore/underscore",
    "handlebars"                    : "bower_components/handlebars/handlebars.runtime",
    "fastclick"                     : "bower_components/fastclick/lib/fastclick",
    "hammerjs"                      : "bower_components/hammerjs/hammer",
    "mediaelement"                  : "bower_components/mediaelement/build/mediaelement-and-player",
    "jquery.boiler"                 : "bower_components/jquery-boiler/jquery.boiler",
    "jquery.hammer"                 : "bower_components/jquery-hammerjs/jquery.hammer",
    "jquery.placeholder"            : "bower_components/jquery-placeholder/jquery.placeholder",
    "jquery.cookie"                 : "bower_components/jquery-cookie/jquery.cookie",
    "gemini"                        : "bower_components/gemini-loader/gemini",
    "gemini.geolocation"            : "bower_components/gemini-geolocation/gemini.geolocation",
    "gemini.modal"                  : "bower_components/gemini-modal/gemini.modal",
    "gemini.scrollup"               : "bower_components/gemini-scrollup/gemini.scrollup",
    "gemini.modal.templates"        : "bower_components/gemini-modal/templates",
    "gemini.gallery"                : "bower_components/gemini-gallery/gemini.gallery",
    "gemini.gallery.templates"      : "bower_components/gemini-gallery/templates",
    "gemini.activator"              : "bower_components/gemini-activator/gemini.activator",
    "gemini.tabs"                   : "bower_components/gemini-tabs/gemini.tabs",
    "gemini.carousel"               : "bower_components/gemini-carousel/gemini.carousel",
    "gemini.carousel.templates"     : "bower_components/gemini-carousel/templates",
    "gemini.fold"                   : "bower_components/gemini-fold/gemini.fold",
    "gemini.lazyload"               : "bower_components/gemini-lazyload/gemini.lazyload",
    "gemini.popdrop"                : "bower_components/gemini-popdrop/gemini.popdrop",
    "gemini.gmaps"                  : "bower_components/gemini-gmaps/gemini.gmaps",
    "gemini.tooltip"                : "bower_components/gemini-tooltip/gemini.tooltip",
    "gemini.form"                   : "bower_components/gemini-form/gemini.form",
    "gemini.form.templates"         : "bower_components/gemini-form/templates",
    "gemini.resetform"              : "bower_components/gemini-resetform/gemini.resetform",
    "gemini.tracker"                : "bower_components/gemini-tracker/gemini.tracker",
    "gemini.share"                  : "bower_components/gemini-share/gemini.share",
    "gemini.accordion"              : "bower_components/gemini-accordion/gemini.accordion",
    "gemini.sticky"                 : "bower_components/gemini-sticky/gemini.sticky",
    "gemini.respond"                : "bower_components/gemini-respond/gemini.respond",
    "gemini.calculator"             : "bower_components/gemini-calculator/gemini.calculator",
    "gemini.ads"                    : "bower_components/gemini-ads/gemini.ads",
    "gemini.compare"                : "bower_components/gemini-compare/gemini.compare",
    "gemini.easter"                 : "bower_components/gemini-easter/gemini.easter",
    "gemini.touch"                  : "bower_components/gemini-touch/gemini.touch",
    "gemini.support"                : "bower_components/gemini-support/gemini.support"
  }
});

require(['gemini'], function (G) {
  require(['mediaelement'], function(){
    $('video, audio').mediaelementplayer({

    defaultVideoWidth: -1,

    videoVolume: 'horizontal',
    // features to show
    features: ['playpause', 'stop', 'loop','current','progress','duration', 'volume'],

});
  });
});
