/*
 * CSS viewport units with jQuery
 * http://www.w3.org/TR/css3-values/#viewport-relative-lengths
 From: http://stackoverflow.com/users/670396/elclanrs
 */
;(function( $, window ){
  
  var $win = $(window)
      , _css = $.fn.css;
  
  function viewportToPixel( val ) {
    var percent = val.match(/\d+/)[0] / 100,
      unit = val.match(/[vwh]+/)[0];
    return (unit == 'vh' ? $win.height() : $win.width()) * percent + 'px';
  }
  
  function parseProps( props ) {
    var p, prop;
    for ( p in props ) {
      prop = props[ p ];
      if ( /[vwh]$/.test( prop ) ) {
        props[ p ] = viewportToPixel( prop );
      }
    }
    return props;
  }
  
  $.fn.css = function( props ) {
    var self = this,
        update = function() {
          return _css.call( self, parseProps( $.extend( {}, props ) ) );
        };
    $win.resize( update );
    return update();
  };
  
}( jQuery, window ));
//
//$('html').css({
//width: '100vw',
//});
//
//$('body').css({
//width: '100vw',
//});
//
//$('.site-wrap').css({
//width: '100vw',
//});
//
//$('.site-slides').css({
//width: '100vw',
//});
//
//
//$('.site-header').css({
//width: '100vw',
//});
//
//$('.site-main').css({
//width: '100vw',
//});
//
//$('.site-footer').css({
//width: '100vw',
//});

