{!! Form::open($options) !!}
	{!! Form::token() !!}
	@if($options['method'] == 'DELETE' || $options['method'] == 'PUT')
		{{ method_field($options['method']) }}
	@endif
    @yield('form-components')
{!! Form::close() !!}
