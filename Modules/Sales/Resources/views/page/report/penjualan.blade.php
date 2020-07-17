@extends(Helper::setExtendBackend())
@component('component.date', ['array' => ['date']])

@endcomponent
@section('content')
<div class="row">
    <div class="panel-body">
        {!! Form::open(['route' => $action_code, 'class' => 'form-horizontal', 'files' => true]) !!}
        <div class="panel panel-default">
            <header class="panel-heading">
                <h2 class="panel-title">Report Penjualan</h2>
            </header>

            <div class="panel-body line">
                <div class="col-md-12 col-lg-12">
                    <div class="form-group">

                        <label class="col-md-2 control-label">Dari Tanggal</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="from" value="{{ date('Y-m-d') }}" class="date">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>

                        <label class="col-md-2 control-label">Sampai Tanggal</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="to" value="{{ date('Y-m-d') }}" class="date">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        {!! Form::label('name', 'Cabang', ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-4 {{ $errors->has('sales_order_inventory_branch_id') ? 'has-error' : ''}}">
                            {{ Form::select('branch', $branch, null, ['class'=> 'form-control', 'id' => 'branch_id']) }}
                            {!! $errors->first('sales_order_inventory_branch_id', '<p class="help-block">:message</p>')
                            !!}
                        </div>

                        {!! Form::label('name', 'Status Order', ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-4 {{ $errors->has('sales_order_inventory_status_id') ? 'has-error' : ''}}">
                            {{ Form::select('status', $status, null, ['class'=> 'form-control', 'id' => 'status_id']) }}
                            {!! $errors->first('sales_order_inventory_status_id', '<p class="help-block">:message</p>')
                            !!}
                        </div>

                    </div>

                </div>
            </div>

            <div class="navbar-fixed-bottom" id="menu_action">
                <div class="text-right" style="padding:5px">
                    <button type="submit" value="export" name="action" class="btn btn-success">Export</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection