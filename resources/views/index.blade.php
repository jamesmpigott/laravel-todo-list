@extends('base')

@section('body')
<div class="page-content page-container">
    <div class="token">{{ csrf_field() }}</div>
    <div class="container d-flex justify-content-center pt-5">
        <div class="col-lg-12">
            <div class="card px-3">
                <div class="card-body">
                    <h4 class="card-title">To-do list</h4>
                    <div class="add-items d-flex">
                        <input type="text" class="form-control todo-list-input" placeholder="Task Name" name="title">
                		<button class="add btn btn-primary todo-list-add-btn">Add</button>
                	</div>
                    <div class="list-wrapper">
						@if ( !empty($tasks) )
                        	<ul class="d-flex flex-column todo-list">
								@foreach ($tasks as $task)
                                    @include('partial/task-item', $task)
                                @endforeach
                        	</ul>
						@else
							<h5>No Tasks</h5>
						@endif 

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection