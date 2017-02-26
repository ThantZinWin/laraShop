@extends('frontend.layouts.app')

@section('content')

<div class='container'>
    <div class='row' style='padding-top:25px; padding-bottom:25px;'>
        <div class='col-md-12'>
            <div id='mainContentWrapper'>
                <div class="col-md-8 col-md-offset-2">
                    <h2 style="text-align: center; color: #fff;">
                        Complete Your Order & Complete Checkout
                    </h2>
                    <hr/>
                    
                    <div class="shopping_cart">
                        
                        {{ Form::open(['route' => 'frontend.checkout_process', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'payment-form']) }}    
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Contact
                                            and Billing Information</a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse">
                                    <div class="panel-body">
                                        <b>Help us keep your account safe and secure, please verify your billing
                                            information.</b>
                                        <br/><br/>
                                        <table class="table table-striped" style="font-weight: bold;">
                                        	<tr>
                                                <td style="width: 175px;">
                                                    <label for="id_name">Name:</label></td>
                                                <td>
                                                    <input class="form-control" id="id-name" name="name"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_email">Email:</label></td>
                                                <td>

                                                    <input class="form-control" id="id_email" value="{{ Auth::user()->email }}"
                                                    required="required" type="email"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_phone">Phone:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_phone" name="phone" type="text"/>
                                                </td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_address_line_1">Address:</label></td>
                                                <td>
                                                	<textarea class="form-control" id="id_address_line_1" name="address" required="required"></textarea>
                                                 
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_city">City:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_city" name="city"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_state">State:</label></td>
                                                <td>
                                                    <select class="form-control" id="id_state" name="state">
                                                        <option value="YG">Yangon</option>
                                                        <option value="MDL">Mandalay</option>
                                                        <option value="MY">MonYwa</option>
                                                        <option value="SG">Sagaing</option>
                                                        <option value="TG">TaungGyi</option>
                                                        <option value="MLM">MawLaMyaing</option>
                                                        <option value="POL">PyinOoLwin</option>
                                                        <option value="KS">KyaukSe</option>
                                                        <option value="ST">SitTway</option>
                                                        <option value="NPT">NayPyiTaw</option>
                                                        <option value="KY">Kayar</option>
                                                        <option value="Kyi">Kayin</option>
                                                        <option value="SH">Shan</option>
                                                        <option value="MO">Mon</option>
                                                        <option value="YK">YaKhaing</option>
                                                        <option value="CH">Chin</option>
                                                        <option value="AYW">AyeYarWaTi</option>
                                                        
                                                    </select>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                            <b>Payment Information</b>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <span class='payment-errors'></span>
                                        <fieldset>
                                            <legend>What method would you like to pay with today?</legend>
                                           
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="card-holder-name">Payment Method
                                                    </label>
                                                <div class="col-sm-9">
                                                    <label><input type="radio" name="payment_form" value="1">Cash on Delivery</label>
                                            		<label><input type="radio" name="payment_form" value="2">Paypal</label>
                                            	</div>	
                                            </div>
                                            
                                            	
                                            <div class="form-group">
                                            	<label class="col-md-3 control-label">Payment Phone</label>
                                            	<div class="col-sm-9">
                                                    <input type="text" name="phone" class="form-control" placeholder="Phone">
                                            	</div>	
                                            </div>	
                                            	
                                            	
                                            <div class="form-group">
                                            	<label class="col-md-3 control-label">Payment Email</label>
                                            	<div class="col-sm-9">
                                                    <input type="email" name="email" class="form-control"placeholder="Email">
                                            	</div>	
                                            </div>
                                            	
                                            
                                                
                                      
                                        <button type="submit" class="btn btn-success btn-lg" style="width:100%;">Pay
                                            Now
                                        </button>
                                        <br/>
                                        <div style="text-align: left;"><br/>
                                            By submiting this order you are agreeing to our <a href="/legal/billing/">universal
                                                billing agreement</a>, and <a href="/legal/terms/">terms of service</a>.
                                            If you have any questions about our products or services please contact us
                                            before placing this order.
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>



    
@endsection

