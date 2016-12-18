<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	{{ Form::label($name, title_case($name), ['class' => 'col-md-4 control-label']) }}
	<div class="col-md-6">
	    {{ Form::textarea($name, $value, ['class' => 'form-control']) }}
	    @if ($errors->has($name))
	        <span class="help-block">
	            <strong>{{ $errors->first($name) }}</strong>
	        </span>
	    @endif
	</div>
</div>
