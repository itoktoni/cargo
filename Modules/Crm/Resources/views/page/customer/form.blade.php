@component('component.summernote', ['array' => ['basic']])

@endcomponent
<div class="form-group">

    {!! Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'name') ? 'has-error' : ''}}">
        {!! Form::text($form.'name', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'name', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Category', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'crm_category_id') ? 'has-error' : ''}}">
        {{ Form::select($form.'crm_category_id', $categories, null, ['class'=> 'form-control']) }}
        {!! $errors->first($form.'crm_category_id', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group">

    {!! Form::label('name', 'Email', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'email') ? 'has-error' : ''}}">
        {!! Form::text($form.'email', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'email', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Phone', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'phone') ? 'has-error' : ''}}">
        {!! Form::text($form.'phone', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'phone', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group">

    {!! Form::label('name', 'Kota Area', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10 {{ $errors->has('crm_customer_rajaongkir_area_id') ? 'has-error' : ''}}">
        {{ Form::select('crm_customer_rajaongkir_area_id', $area, null, ['class'=> 'form-control']) }}
        {!! $errors->first('crm_customer_rajaongkir_area_id', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group">
    {!! Form::label('name', 'Address', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
        {!! Form::textarea($form.'address', null, ['class' => 'form-control', 'rows' => '3'])
        !!}
    </div>

    {!! Form::label('name', 'Notes', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
        {!! Form::textarea($form.'notes', null, ['class' => 'form-control', 'rows' => '3'])
        !!}
    </div>
</div>