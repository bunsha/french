<div class="form-group">
	{!! Form::label('name', 'Name') !!}
	{!! Form::text('name', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('content', 'Content') !!}
	{!! Form::textarea('content', null, array('class' => 'form-control wysiwyg-editor', 'id' => 'editor1')) !!}
</div>


<div class="form-group">
	{!! Form::label('active', 'Active') !!}
	{!! Form::checkbox('active', true, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('homepage', 'Is on homepage?') !!}
	{!! Form::checkbox('homepage', true, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('url', 'URL') !!}
	{!! Form::text('url', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('image', 'Image') !!}
	<br>

	<br><br>
	{!! Form::file('image', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('percent', 'Cashback') !!}
	{!! Form::text('percent', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	<input type="button" id="referer" class="btn btn-default" value="Cancel" onclick="window.history.back()">
	{!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
</div>