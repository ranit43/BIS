<!DOCTYPE html>
<html>
<head>
	<title>  </title>
	{!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
</head>
<body>
	<h1> Skill Hunting.</h1>
	 <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/search') }}">TalentSearch</a>
                    <a href="{{ url('/forum') }}">Forum</a>
                    
                    @if (Auth::check())
                       <!-- <a href="{{ url('/edit') }}">Edit</a>  -->
                        <a href="{{ url('/home') }}">Profile</a>    
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                        
                    @endif
                </div>
            @endif
     </div>
	<div class="well">
		<div class="row">
			<div class="col-md-6 col-md-offset-3"> 
			<p>Select the specific skills and search for talent with that skills.</p>
				
			
			 {!! Form::open(array('route' => 'searchResult') ) !!}
					<div class="form-group">
					@if(count($skills))
				    	@foreach($skills as $skill)
					    	
								
								{{ Form::checkbox('skill[]', $skill->id) }}
								{{ Form::label('skill', $skill->name) }}
							
				      <!-- <tr>
				        <td>{{ $skill->id }}</td>
				        <td>{{ $skill->name }}</td>
				        
				      </tr> -->
				      	@endforeach
			    	@else
			    		No data found
			    	@endif
					</div>


					

					<div class="form-group">
		            	{{ Form::submit('Search', ['class' => 'btn btn-success']) }}
					</div>
					{!! Form::close() !!}
			</div>
		</div>

		
	</div>

</body>
</html>
