@extends(Helper::setExtendBackend())

@component('component.date', ['array' => ['date']])
@endcomponent

@section('content')
<div class="row">

    {!! Form::model($model, ['route'=>[$action_code, 'code' => $model->$key],'class'=>'form-horizontal','files'=>true])
    !!}

    <div class="panel-body">
        <div class="panel panel-default">
            <header class="panel-heading">

                <div class="row">
                    <div class="col-md-6">
                    <h2 class="panel-title">Edit Order {{ $model->sales_order_id }} </h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <br>                    
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapse" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Tampilkan Data Resi {{ $model->sales_order_rajaongkir_waybill }}
                        </a>
                    </div>
                </div>

            </header>

            <div class="panel-body line">
                <div class="col-md-12 col-lg-12">

                    <div class="collapse" id="collapse">
                        @include($folder.'::page.'.$template.'.form')
                        <hr>
                    </div>

                    <div class="form-group">

                        {!! Form::label('name', 'Tanggal', ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-4 {{ $errors->has($form.'value') ? 'has-error' : ''}}">
                            <div class="input-group">
                                <input type="text" name="so_delivery_date" value="{{ date('Y-m-d') }}" class="date">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                            {!! $errors->first($form.'value', '<p class="help-block">:message</p>') !!}
                        </div>

                        {!! Form::label('name', 'Status Barang', ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-4 {{ $errors->has('so_delivery_type') ? 'has-error' : ''}}">
                            {{ Form::select('so_delivery_type', $delivery, null, ['class'=> 'form-control', 'id' => 'to_area']) }}
                            {!! $errors->first('so_delivery_type', '<p class="help-block">:message</p>') !!}
                        </div>

                    </div>

                    <div class="form-group">

                        {!! Form::label('name', 'Location', ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-4 {{ $errors->has('so_delivery_location') ? 'has-error' : ''}}">
                            {{ Form::select('so_delivery_location', $location, null, ['class'=> 'form-control', 'id' => 'to_area']) }}
                            {!! $errors->first('so_delivery_location', '<p class="help-block">:message</p>') !!}
                        </div>

                        {!! Form::label('name', 'Keterangan', ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-4 {{ $errors->has('so_delivery_description') ? 'has-error' : ''}}">
                            {!! Form::textarea('so_delivery_description', null, ['class' => 'form-control', 'rows' => 3]) !!}
                            {!! $errors->first('so_delivery_description', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="navbar-fixed-bottom" id="menu_action">
        <div class="text-right" style="padding:5px">
            @include(Helper::setViewCrud())
        </div>
    </div>
    {!! Form::close() !!}
</div>

@endsection