/* ___________________________________________________________________ begin */
$(document).ready(function () {
/* __________________________________________________________ highlight form */
$("input").focus(function () {
	$(this).css("background","#eee");
});
$("input").blur(function () {
	$(this).css("background","#fff");
});
$("textarea").focus(function () {
	$(this).css("background","#eee");
});
$("textarea").blur(function () {
	$(this).css("background","#fff");
});
/* _______________________________________________________________ accordion */
$(".toggleHead").click(function() {
	$(this).next().slideToggle("normal");
});
/* ______________________________________________________________ image zoom */
$("a.thumb").flyout({
	loadingSrc:"/archives/2010-04/img/loader.gif",
	outEase:"easeOutBack",
	inEase:"easeInBack"
});
/* ______________________________________________________________ menu hover */
$(function() {
	$("#lavaLamp").lavaLamp({
		fx: "easeOutBack",
        selectedColor: "#eee"
	});
});
/* _____________________________________________________________________ end */
});