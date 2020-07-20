@component('component.summernote', ['array' => ['basic']])
@endcomponent

@component('component.date', ['array' => ['date']])
@endcomponent

<div class="form-group">

    {!! Form::label('name', 'Kode', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'code') ? 'has-error' : ''}}">
        {!! Form::text($form.'code', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'code', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Nama', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'name') ? 'has-error' : ''}}">
        {!! Form::text($form.'name', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'name', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group">

    {!! Form::label('name', 'Tipe', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'type') ? 'has-error' : ''}}">
        {{ Form::select($form.'type', $type, $model->marketing_promo_type ?? null, ['class'=> 'form-control']) }}
        {!! $errors->first($form.'type', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Status', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'default') ? 'has-error' : ''}}">
        {{ Form::select($form.'default', $default, $model->marketing_promo_default ?? null, ['class'=> 'form-control']) }}
        {!! $errors->first($form.'default', '<p class="help-block">:message</p>') !!}
    </div>

</div>
<hr>
<div class="form-group">

    {!! Form::label('name', 'Angka Minimal', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'minimal') ? 'has-error' : ''}}">
        {!! Form::text($form.'minimal', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'minimal', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Maksimal Per Hari', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'maximal') ? 'has-error' : ''}}">
        {!! Form::text($form.'maximal', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'maximal', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group">

    {!! Form::label('name', 'Tanggal Mulai', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'start_date') ? 'has-error' : ''}}">
        {!! Form::text($form.'start_date', null, ['class' => 'form-control date']) !!}
        {!! $errors->first($form.'start_date', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Tanggal Berakhir', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'end_date') ? 'has-error' : ''}}">
        {!! Form::text($form.'end_date', null, ['class' => 'form-control date']) !!}
        {!! $errors->first($form.'end_date', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group">

    {!! Form::label('name', 'Status', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'status') ? 'has-error' : ''}}">
        {{ Form::select($form.'status', $status, null, ['class'=> 'form-control']) }}
        {!! $errors->first($form.'status', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Description', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
        {!! Form::textarea($form.'description', null, ['class' => 'form-control', 'rows' => '2']) !!}
    </div>

</div>

<hr>
<div class="form-group">
    {!! Form::label('name', 'Matrix [ *gunakan @value ] ', ['class' => 'col-md-2 control-label']) !!}
   <div class="col-md-10 {{ $errors->has($form.'matrix') ? 'has-error' : ''}}">
        {!! Form::text($form.'matrix', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'matrix', '<p class="help-block">:message</p>') !!}
    </div>
</div>