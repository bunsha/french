<div class="form-group">
	{!! Form::label('name', 'Name') !!}
	{!! Form::text('name', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('active', 'Active') !!}
	{!! Form::checkbox('active', true, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	<input type="button" id="referer" class="btn btn-default" value="Cancel" onclick="window.history.back()">
	{!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
</div>