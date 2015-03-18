window.onload = function(){
	var x = document.getElementById("mc4wp-form-1");
	if (x) {
		var y = x.getElementsByTagName("input");
		var i;
		for (i = 0; i < y.length ; i++) {
        		if (y[i].type == "submit") {
                		addListener(y[i], 'click', function() {
                        		ga('send', 'event', 'button', 'click', 'submit-buttons', 5);
					/*alert("Yes!");*/
                		});
        		}
		}

/**
 * Utility to wrap the different behaviors between W3C-compliant browsers
 * and IE when adding event handlers.
 *
 * @param {Object} element Object on which to attach the event listener.
 * @param {string} type A string representing the event type to listen for
 *     (e.g. load, click, etc.).
 * @param {function()} callback The function that receives the notification.
 */
		function addListener(element, type, callback) {
        		if (element.addEventListener) element.addEventListener(type, callback);
        		else if (element.attachEvent) element.attachEvent('on' + type, callback);
		}
	}
}
