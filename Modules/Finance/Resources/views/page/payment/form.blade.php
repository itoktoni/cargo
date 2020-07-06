@component('component.mask', ['array' => ['money']])
@endcomponent

@component('component.date', ['array' => ['date']])
@endcomponent

<div class="form-group">

    {!! Form::label('name', 'Tanggal Pembayaran', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
        <div class="input-group">
            {!! Form::text($form.'date', $model->finance_payment_date ??
            date('Y-m-d'), ['class' => 'date
            form-control', 'readonly'])
            !!}
            <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </span>
        </div>
    </div>

    {!! Form::label('name', 'Tipe Pembayaran', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has('finance_payment_account_id') ? 'has-error' : ''}}">
        {{ Form::select('finance_payment_account_id', $account, null, ['class'=> 'form-control']) }}
        {!! $errors->first('finance_payment_account_id', '<p class="help-block">:message</p>') !!}
    </div>

    
</div>

<div class="form-group">
    
    {!! Form::label('name', 'No. Order', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has('finance_payment_sales_order_id') ? 'has-error' : ''}}">
        {{ Form::select('finance_payment_sales_order_id', $order, null, ['class'=> 'form-control' ,'id' => 'reference']) }}
        {!! $errors->first('finance_payment_sales_order_id', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Nomor Referensi', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
        {!! Form::text($form.'reference', null, ['class' => 'form-control']) !!}
    </div>
    
</div>

<div class="form-group">

    {!! Form::label('name', 'Nama Orang Terkait', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
        {!! Form::text($form.'person', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::label('name', 'Nominal', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'amount') ? 'has-error' : ''}}">
        {!! Form::text($form.'amount', null, ['class' => 'form-control money']) !!}
        {!! $errors->first($form.'amount', '<p class="help-block">:message</p>') !!}
    </div>

</div>
<div class="form-group">

    {!! Form::label('name', 'Status', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'status') ? 'has-error' : ''}}">
        {{ Form::select($form.'status', $status, null, ['class'=> 'form-control']) }}
        {!! $errors->first($form.'status', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Catatan Pembayaran', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'notes') ? 'has-error' : ''}}">
        {!! Form::textarea($form.'notes', null, ['class' => 'form-control', 'rows' => '3']) !!}
        {!! $errors->first($form.'notes', '<p class="help-block">:message</p>') !!}
    </div>
</div>