@extends('layouts.admin')

@section('title', 'Payment Settings ')

@section('content')
<style>
blockquote {
    margin: 0 0 1rem;
    padding: 6px;
}

form.form-horizontal {
    margin-top: 20px;
}
</style>
<div class="page">
<div class="page-header">
        <!-- <h1 class="page-title">@lang('admin.account.update_profile')</h1> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('admin.include.admin_dashboard')</a></li>
          <li class="breadcrumb-item active">Payment Settings</li>
        </ol>
        
</div>

<div class="page-content">
@if(Session::has('flash_success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_success') !!}</em></div>
@endif

        <div class="row">
          <div class="col-md-6">
            <!-- Panel Static Labels -->
            <div class="panel">
            
              <div class="panel-body container-fluid">
              <!-- <div class="form-box row">
    		<div class="example-wrap"> -->
            <h4 class="example-title">Payment Methods</h4>
            <form action="{{route('admin.settings.payment.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}

               
                <div class="form-group row">
                    <label for="cash-payments" class="col-md-3 form-control-label">
                            @lang('admin.payment.cash_payments') 
                        </label>
                    <div class="col-md-6">
                        <div class="checkbox-custom checkbox-warning">
                            <input type="checkbox" @if(config('constants.cash') == 1) checked  @endif autocomplete="off" name="cash" />
                            <label></label>
                      </div>
                        <!-- <input @if(config('constants.cash') == 1) checked  @endif autocomplete="off" name="cash" id="cash-payments" type="checkbox" class="js-switch" data-color="#43b968"> -->
                    </div>
                </div>
                 
                <div class="form-group row">
                    <label for="cash-payments" class="col-md-3 form-control-label">
                    Online Payments
                        </label>
                    <div class="col-md-6">
                        <div class="checkbox-custom checkbox-warning">
                            <input type="checkbox" @if(config('constants.online') == 1) checked  @endif autocomplete="off" name="online" />
                            <label></label>
                      </div>
                        <!-- <input @if(config('constants.cash') == 1) checked  @endif autocomplete="off" name="cash" id="cash-payments" type="checkbox" class="js-switch" data-color="#43b968"> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stripe_secret_key" class="col-md-3 form-control-label">
                            @lang('admin.payment.card_payments')
                        </label>
                    <div class="col-md-6">
                    <div class="checkbox-custom checkbox-warning">
                            <input type="checkbox" @if(config('constants.card') == 1) checked  @endif autocomplete="off" name="card"  id="stripe_check"  class="js-switch"/>
                            <label></label>
                      </div>
                        <!-- <input @if(config('constants.card') == 1) checked  @endif autocomplete="off" name="card" id="stripe_check" type="checkbox" class="js-switch" data-color="#43b968"> -->
                    </div>
                </div>
                <div class="payment_settings" @if(config('constants.card') == 0) style="display: none;" @endif>
                    <div class="form-group row">
                        <label for="stripe_secret_key" class="col-md-3 form-control-label">@lang('admin.payment.stripe_secret_key')</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="{{ config('constants.stripe_secret_key') }}" name="stripe_secret_key" id="stripe_secret_key"  placeholder="@lang('admin.payment.stripe_secret_key')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stripe_publishable_key" class="col-md-3 form-control-label">@lang('admin.payment.stripe_publishable_key')</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="{{ config('constants.stripe_publishable_key') }}" name="stripe_publishable_key" id="stripe_publishable_key"  placeholder="@lang('admin.payment.stripe_publishable_key')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stripe_currency" class="col-md-3 form-control-label">@lang('admin.payment.currency')</label>
                        <div class="col-md-6">
                            <select name="stripe_currency" class="form-control" required>
                            <option @if(config('constants.stripe_currency') == "BRL") selected @endif value="BRL">Payment Settings</option>
                            <option @if(config('constants.stripe_currency') == "USD") selected @endif value="USD">USD</option>
                        </select>
                        </div>
                    </div>
                </div>
            </blockquote>
        
                 <div class="form-group row">
                    <div class="col-md-8">
                    
                        <button type="submit" class="btn btn-primary btn-block">Update Payment Methods</button>
                    </div>
                </div>
            </form>
            </div>
<!-- 
        </div>
              </div> -->
            </div>
            <!-- End Panel Static Labels -->
          </div>

          <div class="col-md-6">
            <!-- Panel Floating Labels -->
            <div class="panel">
            <div class="panel-body container-fluid">
              <!-- <div class="form-box row">
    		<div class="example-wrap"> -->
            <h4 class="example-title">Payment Settings</h4>
            <form action="{{route('admin.settings.payment.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
                        <div class="form-group row">
                            <label for="daily_target" class="col-md-3 form-control-label">@lang('admin.payment.daily_target')</label>
                            <div class="col-md-8">
                                <input class="form-control" 
                                    type="number"
                                    value="{{ config('constants.daily_target', '0')  }}"
                                    id="daily_target"
                                    name="daily_target"
                                    min="0"
                                    required
                                    placeholder="Daily Target">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tax_percentage" class="col-md-3 form-control-label">@lang('admin.payment.tax_percentage')</label>
                            <div class="col-md-8">
                                <input class="form-control"
                                    type="number"
                                    value="{{ config('constants.tax_percentage', '0')  }}"
                                    id="tax_percentage"
                                    name="tax_percentage"
                                    min="0"
                                    max="100"
                                    placeholder="Tax Percentage">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="commission_percentage" class="col-md-3 form-control-label">@lang('admin.payment.commission_percentage')</label>
                            <div class="col-md-8">
                                <input class="form-control"
                                    type="number"
                                    value="{{ config('constants.commission_percentage', '0') }}"
                                    id="commission_percentage"
                                    name="commission_percentage"
                                    min="0"
                                    max="100"
                                    placeholder="@lang('admin.payment.commission_percentage')">
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="peak_percentage" class="col-md-3 form-control-label">@lang('admin.payment.peak_percentage')</label>
                            <div class="col-md-8">
                                <input class="form-control"
                                    type="number"
                                    value="{{ config('constants.peak_percentage', '0') }}"
                                    id="peak_percentage"
                                    name="peak_percentage"
                                    min="0"
                                    max="100"
                                    placeholder="@lang('admin.payment.peak_percentage')">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="waiting_percentage" class="col-md-3 form-control-label">@lang('admin.payment.waiting_percentage')</label>
                            <div class="col-md-8">
                                <input class="form-control"
                                    type="number"
                                    value="{{ config('constants.waiting_percentage', '0') }}"
                                    id="waiting_percentage"
                                    name="waiting_percentage"
                                    min="0"
                                    max="100"
                                    placeholder="@lang('admin.payment.waiting_percentage')">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="minimum_negative_balance" class="col-md-3 form-control-label">@lang('admin.payment.minimum_negative_balance')</label>
                            <div class="col-md-8">
                                <input class="form-control"
                                    type="number"
                                    value="{{ config('constants.minimum_negative_balance') }}"
                                    id="minimum_negative_balance"
                                    name="minimum_negative_balance"
                                    max='0'
                                    placeholder="@lang('admin.payment.minimum_negative_balance')">
                            </div>
                        </div>

                    <div class="form-group row">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-block">Update Payment Settings</button>
                        </div>
                    </div>
                </div>
            </form>
    		
    	<!-- </div>
    </div> -->
    </div>
    <!-- End Panel Floating Labels -->
    </div>
</div>
</div>
</div>

@endsection

@section('script')
<script type="text/javascript">

$('.js-switch').on('change', function() {
    
    if($(this).is(':checked')) {
        //alert('test');
        // console.log($(this).closest('blockquote').find('.payment_settings'));
        //$(this).closest('blockquote').find('.payment_settings').fadeIn(700);
       // $('.payment_settings').css('display','block;');
       $( ".payment_settings" ).fadeIn();
       //$( ".payment_settings" ).show();
    } else {
        $( ".payment_settings" ).fadeOut();
        //$( ".payment_settings" ).hide();
       // $('.payment_settings').css('display','none;');
        //$(this).closest('blockquote').find('.payment_settings').fadeOut(700);
    }
    
});


$(function() {
    var ad_com="{{ config('constants.commission_percentage') }}";   
    if(ad_com>0){        
        $("#fleet_commission_percentage").val(0);
        $("#fleet_commission_percentage").prop('disabled', true);
        $("#fleet_commission_percentage").prop('required', false);       
    }
    else{
        $("#fleet_commission_percentage").prop('required', true);
    }
    $("#commission_percentage").on('keyup', function(){
        var ad_ins=parseFloat($(this).val());
        // console.log(ad_ins);
        if(ad_ins>0){
            $("#fleet_commission_percentage").val(0);
            $("#fleet_commission_percentage").prop('disabled', true);
            $("#fleet_commission_percentage").prop('required', false);
        }
        else{
            $("#fleet_commission_percentage").val('');
            $("#fleet_commission_percentage").prop('disabled', false);
            $("#fleet_commission_percentage").prop('required', true);
        }
        
    });
});    
</script>
@endsection