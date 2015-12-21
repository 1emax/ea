$(document).ready(function() {
	$('.events.content #place-id').on('change', function(e) {
		var placeId = $(this).val();
		$.post('/places/view/'+placeId, function(response) {
			var $targetSelect = $('#rooms-ids');
			$targetSelect.empty();
			for(var i in response.place.rooms) {
				var room = response.place.rooms[i];
				console.log(room.name,': ', room.id);
				var $option = $('<option>').val(room.id).text(room.name);
				$targetSelect.append($option);
			}
		}, 'json');
	});

		$('.tickets.content #event-id').on('change', function(e) {
		var eventId = $(this).val();
		$.post('/events/view/'+eventId, function(response) {
			var $targetSelect = $('#room-id');
			$targetSelect.empty();
			for(var i in response.event.rooms) {
				var room = response.event.rooms[i];
				console.log(room.name,': ', room.id);
				var $option = $('<option>').val(room.id).text(room.name);
				$targetSelect.append($option);
			}
		}, 'json');
	});
});
