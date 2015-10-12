function notifAddWishlist() {
		setTimeout( function() {
			
			// create the notification
			var notification = new NotificationFx({
				message : '<center>You successfully added this place to <a href="http://localhost/JAKtrip/user#wishlist">your wishlist</a>.</center>',
				layout : 'growl',
				effect : 'genie',
				type : 'notice', // notice, warning or error
				onClose : function() {
					bttn.disabled = false;
				}
			});

			// show the notification
			notification.show();

		}, 200 );
		
		// disable the button (for demo purposes only)
		this.disabled = true;
};

function notifAddAchievement() {
		setTimeout( function() {
			
			// create the notification
			var notification = new NotificationFx({
				message : '<center>You successfully added this place to <a href="http://localhost/JAKtrip/user#visited">your visited</a>.</center>',
				layout : 'growl',
				effect : 'genie',
				type : 'notice', // notice, warning or error
				onClose : function() {
					bttn.disabled = false;
				}
			});

			// show the notification
			notification.show();

		}, 200 );
		
		// disable the button (for demo purposes only)
		this.disabled = true;
};

function notifDelWishlist() {
		setTimeout( function() {
			
			// create the notification
			var notification = new NotificationFx({
				message : '<center>You successfully deleted this place from <a href="http://localhost/JAKtrip/user#wishlist">your wishlist</a>.</center>',
				layout : 'growl',
				effect : 'genie',
				type : 'notice', // notice, warning or error
				onClose : function() {
					bttn.disabled = false;
				}
			});

			// show the notification
			notification.show();

		}, 200 );
		
		// disable the button (for demo purposes only)
		this.disabled = true;
};
	

function notifDelAchievement() {
		setTimeout( function() {
			
			// create the notification
			var notification = new NotificationFx({
				message : '<center>You successfully deleted this place from <a href="http://localhost/JAKtrip/user#visited">your visited</a>.</center>',
				layout : 'growl',
				effect : 'genie',
				type : 'notice', // notice, warning or error
				onClose : function() {
					bttn.disabled = false;
				}
			});

			// show the notification
			notification.show();

		}, 200 );
		
		// disable the button (for demo purposes only)
		this.disabled = true;
};

function notif(msg) {
		setTimeout( function() {
			
			// create the notification
			var notification = new NotificationFx({
				message : msg,
				layout : 'growl',
				effect : 'genie',
				type : 'notice', // notice, warning or error
				onClose : function() {
					bttn.disabled = false;
				}
			});

			// show the notification
			notification.show();

		}, 200 );
		
};