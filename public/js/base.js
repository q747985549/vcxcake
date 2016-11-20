 	var Ohtml = document.documentElement;
    	getSize();
    	function getSize(){
    		var screenWidth = Ohtml.clientWidth;
    		if(screenWidth <= 320){
    			Ohtml.style.fontSize = '25.6px';
    		}else if(screenWidth >= 640){
    			Ohtml.style.fontSize = '51.2px';
    		}else{
    			Ohtml.style.fontSize = screenWidth/(12.5) +'px';
    		}
    	}