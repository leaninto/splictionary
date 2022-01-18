var width = function(){
	return window.innerWidth
	|| document.documentElement.clientWidth
	|| document.body.clientWidth;
}

var resizeId;

window.addEventListener("resize",function() {
    clearTimeout(resizeId);
    hideAdverts();
    resizeId = setTimeout(doneResizing, 500);
});
function hideAdverts(){
	
}
function doneResizing(){
    console.log(width());
}

