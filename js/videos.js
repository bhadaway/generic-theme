;(function($) {
"use strict";
$.fn.vids = function (options) {
var settings = {
customSelector: null,
ignore: null
};
if (!document.getElementById("vids-style")) {
var head = document.head || document.getElementsByTagName("head")[0];
var css = ".video-wrap{width:100%;position:relative;padding:0}.video-wrap iframe, .video-wrap object, .video-wrap embed{position:absolute;top:0;left:0;width:100%;height:100%}";
var div = document.createElement("div");
div.innerHTML = "<p>x</p><style id=\"vids-style\">" + css + "</style>";
head.appendChild(div.childNodes[1]);
}
if (options) {
$.extend(settings, options);
}
return this.each(function() {
var selectors = [
"iframe[src*=\"youtube.com\"]",
"iframe[src*=\"youtu.be\"]",
"iframe[src*=\"youtube-nocookie.com\"]",
"iframe[src*=\"player.vimeo.com\"]",
"iframe[src*=\"dailymotion.com\"]",
"iframe[src*=\"metacafe.com\"]",
"iframe[src*=\"player.twitch.tv\"]",
"iframe[src*=\"tiktok.com\"]",
"iframe[src*=\"liveleak.com\"]",
"iframe[src*=\"kickstarter.com\"][src*=\"video.html\"]",
"iframe[src*=\"blip.tv\"]",
"iframe[src*=\"anchor.fm\"]",
"iframe[src*=\"spotify.com\"]",
"iframe[src*=\"soundcloud.com\"]",
"iframe[src*=\"wordpress.com\"]",
"object",
"embed"
];
if (settings.customSelector) {
selectors.push(settings.customSelector);
}
var ignoreList = ".vids-ignore";
if (settings.ignore) {
ignoreList = ignoreList + ", " + settings.ignore;
}
var $allVideos = $(this).find(selectors.join(","));
$allVideos = $allVideos.not("object object");
$allVideos = $allVideos.not(ignoreList);
$allVideos.each(function (count) {
var $this = $(this);
if ($this.parents(ignoreList).length > 0) {
return;
}
if (this.tagName.toLowerCase() === "embed" && $this.parent("object").length || $this.parent(".video-wrap").length) {
return;
}
if ((!$this.css("height") && !$this.css("width")) && (isNaN($this.attr("height")) || isNaN($this.attr("width")))) {
$this.attr("height", 9);
$this.attr("width", 16);
}
var height = (this.tagName.toLowerCase() === "object" || ($this.attr("height") && !isNaN(parseInt($this.attr("height"), 10)))) ? parseInt($this.attr("height"), 10) : $this.height(),
width = !isNaN(parseInt($this.attr("width"), 10)) ? parseInt($this.attr("width"), 10) : $this.width(),
aspectRatio = height / width;
if (!$this.attr("id")) {
var videoID = "vid" + count;
$this.attr("id", videoID);
}
$this.wrap("<div class=\"video-wrap\"></div>").parent(".video-wrap").css("padding-top", (aspectRatio * 100) + "%");
$this.removeAttr("height").removeAttr("width");
});
});
};
})(window.jQuery || window.Zepto);