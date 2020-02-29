$(document).ready(function(){
	var token = $('.token input[name="_token"]').val();

	// Add task
	$('.add-items .add').click(function(){
		var form = $(this).closest('.add-items');
		var taskTitle = $('.todo-list-input').val();

		$.ajax({
			url: 'add-task/',
			method: 'POST',
			headers: {
				'X-CSRF-TOKEN': token
			},
			data: {
				'title': taskTitle
			},
			success: function(data){
				$(data).prependTo('.todo-list').show('fast');
			}
		});
	});
	
	//Toggle task completion
	$(document).on('change', '.task .isTaskCompleted' ,function(){
		var isTaskCompleted = $(this).is(':checked');
		var task = $(this).closest('.task');
		var id = $(task).attr('data-task-id');

		$.ajax({
			url: 'update-task/' + id,
			method: 'POST',
			headers: {
				'X-CSRF-TOKEN': token
			},
			data: {
				'completed': isTaskCompleted
			},
			success: function(data){
				console.log('task ' + id + ' has been updated.');
			}
		});

		$(task).toggleClass('completed');
	});

	// Remove task
	$(document).on('click', '.task .remove' ,function(){
		var task = $(this).closest('.task');
		var id = $(task).attr('data-task-id');

		$.ajax({
			url: 'delete-task/' + id,
			method: 'DELETE',
			headers: {
				'X-CSRF-TOKEN': token
			},
			success: function(data){
				task.slideUp('fast', function(){ task.remove(); });
			}
		});
	});
});