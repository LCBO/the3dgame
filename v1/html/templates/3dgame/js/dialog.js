//dialog
function boxShow(e) {
	if (document.getElementById(e) == null) {
		return;
	};
	boxLayout(e);
	window.onresize = function () {
		boxLayout(e);
	}
	window.onscroll = function () {
		boxLayout(e);
	}
	document.onkeyup = function (event) {
		var evt = window.event || event;
		var code = evt.keyCode ? evt.keyCode : evt.which;
		if (code == 27) {
			boxRemove(e);
		}
	}
};

function boxRemove(e) {
	window.onscroll = null;
	window.onresize = null;
	document.getElementById('box_shadow').style.display = 'none';
	document.getElementById(e).style.display = 'none';
	
};

function boxLayout(e) {
	var a = document.getElementById(e);
	if (document.getElementById('box_shadow') == null) {
		var overlay = document.createElement('div');
		overlay.setAttribute('id', 'box_shadow');
		//        overlay.onclick = function(){
		//            boxRemove(e);
		//        };
		document.body.appendChild(overlay);
	}
	document.getElementById('box_shadow').onclick = function () {
		boxRemove(e);
	};
	var scrollLeft = (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
	var scrollTop = (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
	var clientWidth;
	if (window.innerWidth) {
		clientWidth = window.innerWidth;
	} else {
		clientWidth = document.documentElement.clientWidth;
	}
	var clientHeight;
	if (window.innerHeight) {
		clientHeight = window.innerHeight;
	} else {
		clientHeight = document.documentElement.clientHeight;
	}
	var b = document.getElementById('box_shadow');
	b.style.left = scrollLeft + 'px';
	b.style.top = scrollTop + 'px';
	b.style.width = clientWidth-17 + 'px';
	b.style.height = clientHeight + 'px';
	b.style.display = '';
	a.style.position = 'absolute';
	a.style.zIndex = '999';
	a.style.display = 'block';
	a.style.left = scrollLeft + ((clientWidth - a.offsetWidth) / 2) + 'px';
	a.style.top = scrollTop + ((clientHeight - a.offsetHeight) / 2) + 'px';
};


//gotop
$(function(){
    var sT = $(window).scrollTop();
	if ($(window).scrollTop() != "0")
	$("#back_top").fadeIn("slow");
	var scrollDiv = $("#back_top");
	$(window).scroll(function() {
		if ($(window).scrollTop() == "0")
			$(scrollDiv).fadeOut("slow")
		else 
			$(scrollDiv).fadeIn("slow")
		});
	$("#back_top").click(function() {
		$("html, body").animate({
			scrollTop: 0
		},"slow")
	});

})