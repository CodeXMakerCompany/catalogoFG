var preloader;

	function setOpacity(opacity) {
		if (opacity <= 0) {
				showPreloader();
		}else{
			preloader.style.opacity = opacity;
			window.setTimeout(function() {
				setOpacity(opacity - 0.04)
			}, 100);
		}
	}

	function showPreloader(){
		
		preloader.style.display = 'none';

		
	}

	document.addEventListener("DOMContentLoaded", function() {
		preloader = document.getElementById('loading');
		setOpacity(1);
	})