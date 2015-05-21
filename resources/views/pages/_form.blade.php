<div class="form-group" {{ $errors->has('name') ? 'has error' : '' }}>
	{!! Form::label('name', 'Name') !!}
	{!! Form::text('name', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('content', 'Content') !!}
	{!! Form::textarea('content', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('active', 'Active') !!}
	{!! Form::checkbox('active', true, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('is_home', 'Homepage') !!}
	{!! Form::checkbox('is_home') !!}
</div>

<div class="form-group" {{ $errors->has('name') ? 'has error' : '' }}>
	{!! Form::label('slug', 'URL') !!}
	{!! Form::text('slug', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('title', 'SEO Title') !!}
	{!! Form::text('title', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('description', 'SEO Description') !!}
	{!! Form::text('description', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('keywords', 'SEO Keywords') !!}
	{!! Form::text('keywords', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	<input type="button" id="referer" class="btn btn-default" value="Cancel" onclick="window.history.back()">
	{!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
</div>