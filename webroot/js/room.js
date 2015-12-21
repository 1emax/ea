jQuery(document).ready(function($) {
	var ticketPrice = 50;
	var currency = 'грн.';
	
	$('.event-ticket').on('click', function(e) {
		if ($(this).hasClass('disabled')) return;

		$(this).toggleClass('btn-success').toggleClass('btn-default');
		// TO DO: in future do not calc by length. Iterate each and get data-price value
		var amount = 0;
		var totalPrice = 0;
		amount = getBookedList().length;
		$(this).find('input').prop('checked') ? amount-- : amount++;
		totalPrice = amount * ticketPrice;
		$('#tickets-total').text(amount + ' билет(а) на ' + totalPrice + ' ' + currency);
	});
	

	 $('#myButton').on('click', function () {
	    var $btn = $(this).button('loading')
	    // business logic...
	    // $btn.button('reset')
	    setTimeout(function() {
                $btn.button("reset")
            }, 700);
	  })
});

function getBookedList() {
	return $('.room-content .event-ticket:not(.disabled) input:checked');
}
