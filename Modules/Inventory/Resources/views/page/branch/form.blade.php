<div class="form-group">

    {!! Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'name') ? 'has-error' : ''}}">
        {!! Form::text($form.'name', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'name', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Description', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
        {!! Form::textarea($form.'description', null, ['class' => 'form-control', 'rows' => '3']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::label('name', 'Area Cabang', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10 {{ $errors->has('inventory_branch_area_id') ? 'has-error' : ''}}">
        {{ Form::select('inventory_branch_area_id', $area, null, ['class'=> 'form-control', 'id' => 'from_area']) }}
        {!! $errors->first('inventory_branch_area_id', '<p class="help-block">:message</p>') !!}
    </div>

</div>