(function () {
  function init() {
    window._paq = window._paq || [];

    window.Matomo.on('TrackerSetup', function(tracker) {
      //ToDO::
      //Retrieve plugin measurable setting to check if the user has enabled file protocol tracking

      //Disable tracking if protocol is file
      if(window.location.protocol === 'file:'){
        window.Matomo.off(trackEvent, null);
      }
    });
  }

  if ('object' === typeof window.Matomo) {
    init();
  } else {
    // tracker might not be loaded yet
    if ('object' !== typeof window.matomoPluginAsyncInit) {
      window.matomoPluginAsyncInit = [];
    }

    window.matomoPluginAsyncInit.push(init);
  }

})();
