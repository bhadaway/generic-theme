(function( $ )
{
$.fn.vids = function( options )
{
var settings = {
customSelector: null
}
var div = document.createElement('div'),
ref = document.getElementsByTagName('base')[0] || document.getElementsByTagName('script')[0];
div.className = 'vids-style';
div.innerHTML = '&shy;<style type="text/css">.video-wrap{position:relative;width:100%;padding:0}.video-wrap embed, .video-wrap object, .video-wrap iframe{position:absolute;top:0;left:0;width:100%;height:100%}</style>';
ref.parentNode.insertBefore(div,ref);
if ( options ) {
$.extend( settings, options );
}
return this.each(function()
{
var selectors = [
"iframe[src^='//www.youtube.com']",
"iframe[src^='http://www.youtube.com']",
"iframe[src^='https://www.youtube.com']",
"iframe[src^='//www.youtube-nocookie.com']",
"iframe[src^='http://www.youtube-nocookie.com']",
"iframe[src^='https://www.youtube-nocookie.com']",
"iframe[src^='http://player.vimeo.com']",
"iframe[src^='//player.vimeo.com']",
"iframe[src^='http://www.dailymotion.com']",
"iframe[src^='http://www.metacafe.com']",
"iframe[src^='http://blip.tv']",
"embed",
"object"
];
if (settings.customSelector) {
selectors.push(settings.customSelector);
}
var $allVideos = $(this).find(selectors.join(','));
$allVideos.each(function(){
var $this = $(this);
if (this.tagName.toLowerCase() == 'embed' && $this.parent('object').length || $this.parent('.video-wrap').length) { return; }
var height = this.tagName.toLowerCase() == 'object' ? $this.attr('height') : $this.height(),
aspectRatio = height / $this.width();
if(!$this.attr('id')){
var videoID = 'vids' + Math.floor(Math.random()*999999);
$this.attr('id', videoID);
}
$this.wrap('<div class="video-wrap"></div>').parent('.video-wrap').css('padding-top', (aspectRatio * 100)+"%");
$this.removeAttr('height').removeAttr('width');
});
});
}
})( jQuery );