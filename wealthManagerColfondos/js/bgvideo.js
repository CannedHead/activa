var dataVideos=[
	{filename:"video"}	
];

var ratio = getDocumentRatio();
sizeVideo(ratio);

function getDocumentRatio(){
	var wh=$(window).height();
	var ww=$(window).width();
	var ratio=wh/ww;return ratio;
}

function sizeVideo(ratio){
	if(typeof ratio=="undefined"){
		ratio=getDocumentRatio();
	}
	if(ratio<9/16){
		console.log("width : 100%");
		$("video").css("width","100%").css("height","auto");
	}else{
		console.log("heigth  : 100%");
		$("video").css("width","auto").css("height","100%");
	}
}

window.onresize = function(){

	var ratio = getDocumentRatio();
	sizeVideo(ratio);

};

function isMobile(){
	var isMobile=false;
	if(navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)){
		isMobile=true;
	}
	return isMobile;
}

function getDocumentHeight(){
	var D=document;
	return Math.max(D.body.scrollHeight,D.documentElement.scrollHeight,D.body.offsetHeight,D.documentElement.offsetHeight,D.body.clientHeight,D.documentElement.clientHeight);
}
