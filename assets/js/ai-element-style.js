(function($) {


	var AIAdvancedStyleH = function( $scope, $ ) {



   };
	$( window ).on( 'elementor/frontend/init', function() {
      elementorFrontend.hooks.addAction( 'frontend/element_ready/aew_advanced_styling_single.default', AIAdvancedStyleH );
   } );


})(jQuery);






