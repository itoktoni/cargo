<div class="panel-body {{ $errors->has('temp_id') ? 'has-error' : ''}}">
    <div class="panel panel-default">
        <div class="row">
            <div class="col-md-6">
                @if (isset($model->detail) && !old('temp_id'))
                <h2 id="total" class="panel-title text-left">
                    <span id="total_name">Total : </span> <span class="money"
                        id="total_value">{{ number_format($model->detail->sum('purchase_detail_total_order')) }}</span>
                    <input type="hidden" id="hidden_total"
                        value="{{ $model->detail->sum('purchase_detail_total_order') }}" name="total">
                </h2>
                @else
                <h2 id="total" class="panel-title text-left">
                    <span id="total_name">{{ old('total') ? 'Total :' : '' }}</span> <span class="money"
                        id="total_value">{{ old('total') ? number_format(old('total')) : '' }}</span>
                    <input type="hidden" id="hidden_total" value="{{ old('total') ? old('total') : 0 }}" name="total">
                </h2>
                @endif
            </div>
            <div class="col-md-6">
                <h2 class="panel-title text-right">
                    <span id="add" class="btn btn-success detail">Add Detail</span>
                </h2>
            </div>
        </div>
        <div class="panel-body line">
            <div class="col-md-12 col-lg-12">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="inputDefault">Product</label>
                    <div class="col-md-4 {{ $errors->has('product') ? 'has-error' : ''}}">
                        <select class="form-control col-md-4" id="product" name="product">
                            <option value="">Select Product</option>
                            @foreach($product as $value)
                            <option value="{{ $value->item_product_id.'#'.floatval($value->item_product_sell) }}">
                                {{ $value->item_product_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <label class="col-md-1 control-label" for="inputDefault">Price</label>
                    <div class="col-md-2">
                        {!! Form::text('price', null, ['id' => 'price', 'class' => 'money form-control']) !!}
                    </div>
                    <label class="col-md-1 control-label" for="inputDefault">Qty</label>
                    <div class="col-md-2">
                        {!! Form::text('qty', null, ['id' => 'qty', 'class' => 'number form-control']) !!}
                    </div>
                    <hr>
                    <label class="col-md-2 control-label" for="inputDefault">Size</label>
                    <div class="col-md-4 {{ $errors->has('size') ? 'has-error' : ''}}">
                        <select class="form-control col-md-4" id="size" name="size">
                            <option value="">Select Size</option>
                            @foreach($size as $key => $s)
                            <option value="{{ $key }}">
                                {{ $key }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {!! Form::label('name', 'Color', ['class' => 'col-md-1 control-label']) !!}
                    <div class="col-md-5 {{ $errors->has('color') ? 'has-error' : ''}}">
                        {{ Form::select('color', $color , null, ['class'=> 'form-control', 'id' => 'color']) }}
                        {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
                    </div>

                </div>
                @include($folder.'::page.'.$template.'.table')
                <div>
                </div>
            </div>
        </div>

    </div>
</div>