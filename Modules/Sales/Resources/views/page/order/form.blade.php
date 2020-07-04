@component('component.mask', ['array' => ['money', 'number']])
@endcomponent

<div class="form-group">

    {!! Form::label('name', 'Pengirim', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has('sales_order_rajaongkir_from_id') ? 'has-error' : ''}}">
        {{ Form::select('sales_order_rajaongkir_from_id', $customers, null, ['class'=> 'form-control']) }}
        {!! $errors->first('sales_order_rajaongkir_from_id', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_from_name') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_from_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'rajaongkir_from_name', '<p class="help-block">:message</p>') !!}
    </div>

</div>
<div class="form-group">
    {!! Form::label('name', 'Phone', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_from_phone') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_from_phone', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'rajaongkir_from_phone', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Email', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_from_email') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_from_email', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'rajaongkir_from_email', '<p class="help-block">:message</p>') !!}
    </div>

</div>
<div class="form-group">

    {!! Form::label('name', 'Kota Pengirim', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10 {{ $errors->has('sales_order_rajaongkir_from_area_id') ? 'has-error' : ''}}">
        {{ Form::select('sales_order_rajaongkir_from_area_id', $area, null, ['class'=> 'form-control']) }}
        {!! $errors->first('sales_order_rajaongkir_from_area_id', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group">

    {!! Form::label('name', 'Alamat Lengkap', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10 {{ $errors->has($form.'rajaongkir_from_address') ? 'has-error' : ''}}">
        {!! Form::textarea($form.'rajaongkir_from_address', null, ['class' => 'form-control', 'rows' => 3]) !!}
        {!! $errors->first($form.'rajaongkir_from_address', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<hr>

<div class="form-group">

    {!! Form::label('name', 'Penerima', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has('sales_order_rajaongkir_to_id') ? 'has-error' : ''}}">
        {{ Form::select('sales_order_rajaongkir_to_id', $customers, null, ['class'=> 'form-control']) }}
        {!! $errors->first('sales_order_rajaongkir_to_id', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Nama', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_to_name') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_to_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'rajaongkir_to_name', '<p class="help-block">:message</p>') !!}
    </div>

</div>
<div class="form-group">
    {!! Form::label('name', 'Phone', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_to_phone') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_to_phone', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'rajaongkir_to_phone', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Email', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_to_email') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_to_email', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'rajaongkir_to_email', '<p class="help-block">:message</p>') !!}
    </div>

</div>
<div class="form-group">

    {!! Form::label('name', 'Kota Penerima', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10 {{ $errors->has('sales_order_rajaongkir_to_area_id') ? 'has-error' : ''}}">
        {{ Form::select('sales_order_rajaongkir_to_area_id', $area, null, ['class'=> 'form-control']) }}
        {!! $errors->first('sales_order_rajaongkir_to_area_id', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group">

    {!! Form::label('name', 'Alamat Lengkap', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10 {{ $errors->has($form.'rajaongkir_to_address') ? 'has-error' : ''}}">
        {!! Form::textarea($form.'rajaongkir_to_address', null, ['class' => 'form-control', 'rows' => 3]) !!}
        {!! $errors->first($form.'rajaongkir_to_address', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<hr>

<div class="form-group">
    {!! Form::label('name', 'Berat / gram', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_weight') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_weight', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'rajaongkir_weight', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Koli', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_colli') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_colli', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'rajaongkir_colli', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group">

    {!! Form::label('name', 'Kategori', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has('sales_order_rajaongkir_category_id') ? 'has-error' : ''}}">
        {{ Form::select('sales_order_rajaongkir_category_id', $category, null, ['class'=> 'form-control']) }}
        {!! $errors->first('sales_order_rajaongkir_category_id', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Catatan', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'notes') ? 'has-error' : ''}}">
        {!! Form::textarea($form.'notes', null, ['class' => 'form-control', 'rows' => 2]) !!}
        {!! $errors->first($form.'notes', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<hr>

<div class="form-group"> 
    {!! Form::label('name', 'Paket', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has('sales_order_rajaongkir_rajaongkir_paket_id') ? 'has-error' : ''}}">
        {{ Form::select('sales_order_rajaongkir_rajaongkir_paket_id', $paket, null, ['class'=> 'form-control']) }}
        {!! $errors->first('sales_order_rajaongkir_rajaongkir_paket_id', '<p class="help-block">:message</p>') !!}
    </div>
    
    {!! Form::label('name', 'Metode Pembayaran', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has('sales_order_rajaongkir_finance_top_id') ? 'has-error' : ''}}">
        {{ Form::select('sales_order_rajaongkir_finance_top_id', $tops, null, ['class'=> 'form-control']) }}
        {!! $errors->first('sales_order_rajaongkir_finance_top_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
   
    {!! Form::label('name', 'Tambahan Harga', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_cost_additional') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_cost_additional', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'rajaongkir_cost_additional', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Harga', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_cost_value') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_cost_value', null, ['class' => 'form-control', 'readonly']) !!}
        {!! $errors->first($form.'rajaongkir_cost_value', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group">

    {!! Form::label('name', 'Keterangan Tambahan', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_cost_description') ? 'has-error' : ''}}">
        {!! Form::textarea($form.'rajaongkir_cost_description', null, ['class' => 'form-control', 'rows' => 2]) !!}
        {!! $errors->first($form.'rajaongkir_cost_description', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Total Harga', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_cost_total') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_cost_total', null, ['class' => 'form-control', 'readonly']) !!}
        {!! $errors->first($form.'rajaongkir_cost_total', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<hr>

<div class="form-group">
    {!! Form::label('name', 'Voucher', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has('sales_order_rajaongkir_marketing_promo_id') ? 'has-error' : ''}}">
        {{ Form::select('sales_order_rajaongkir_marketing_promo_id', $promo, null, ['class'=> 'form-control']) }}
        {!! $errors->first('sales_order_rajaongkir_marketing_promo_id', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Discount ( Harga / % )', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_marketing_promo_additional') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_marketing_promo_additional', null, ['class' => 'form-control']) !!}
        {!! $errors->first($form.'rajaongkir_marketing_promo_additional', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group">

    {!! Form::label('name', 'Keterangan Discount', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'marketing_promo_description') ? 'has-error' : ''}}">
        {!! Form::textarea($form.'marketing_promo_description', null, ['class' => 'form-control', 'rows' => 2]) !!}
        {!! $errors->first($form.'marketing_promo_description', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Total Discount', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_marketing_promo_total') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_marketing_promo_total', null, ['class' => 'form-control', 'readonly']) !!}
        {!! $errors->first($form.'rajaongkir_marketing_promo_total', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<hr>
<div class="form-group">
    {!! Form::label('name', 'Kode Unic', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_unic') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_unic', null, ['class' => 'form-control', 'readonly']) !!}
        {!! $errors->first($form.'rajaongkir_unic', '<p class="help-block">:message</p>') !!}
    </div>

    {!! Form::label('name', 'Total Tagihan', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4 {{ $errors->has($form.'rajaongkir_total') ? 'has-error' : ''}}">
        {!! Form::text($form.'rajaongkir_total', null, ['class' => 'form-control', 'readonly']) !!}
        {!! $errors->first($form.'rajaongkir_total', '<p class="help-block">:message</p>') !!}
    </div>

</div>