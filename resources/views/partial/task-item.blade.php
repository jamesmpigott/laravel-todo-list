@if($task->completed)
<li class="task completed" data-task-id={{ $task->id }}>
@elseif(!empty($addedByAjax))
<li class="task" data-task-id={{ $task->id }} style="display:none;">
@else
<li class="task" data-task-id={{ $task->id }}>
@endif 
    <div class="form-check">
    	<label class="form-check-label">
    		<input class="checkbox isTaskCompleted" type="checkbox" @if($task->completed) checked="" @endif >
    		<span class="title">{{ $task->title }}</span>
			<span class="styled-checkbox"></span>
    	</label> 
    </div> 
    <button class="btn btn-danger remove">Delete</button>
</li>