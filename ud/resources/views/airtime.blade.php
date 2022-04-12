@include('layouts.sidebar')

<link rel="stylesheet" href="{{asset("Buy Data _ MobileNig_files/w3(1).css")}}">

<link rel="stylesheet" href="{{asset("Buy Data _ MobileNig_files/w3(2).css")}}">
<link rel="stylesheet" href="{{asset("Buy Data _ MobileNig_files/font-awesome.min.css")}}">
<link href="{{asset("Buy Data _ MobileNig_files/icon")}}" rel="stylesheet">

<div style="padding:90px 15px 20px 15px">
    <!--    <h4 class="align-content-center text-center">Data Subscription</h4>-->





    <!--            <div class="box w3-card-4">-->

    <form action="{{ route('pre') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-8">
                <br>
                <br>
                <div id="AirtimeNote" class="alert alert-danger" style="text-transform: uppercase;font-weight: bold;font-size: 23px;display: none;"></div>
                <div id="AirtimePanel">

                    <div id="div_id_airtimetype" class="form-group">
                        <label for="airtimetype_a" class=" requiredField">
                            Airtime Type<span class="asteriskField">*</span>
                        </label>
                        <div class="form-group">
                            <select name="airtimetype" class="text-success form-control" required="" id="airtimetype">
                                <option value="" selected="">---------</option>

                                <option value="VTU">AIRTIME VTU TOP-UP</option>

                            </select>
                        </div>
                    </div>
                    <div id="div_id_network" class="form-group">
                        <label for="network" class=" requiredField">
                            Network<span class="asteriskField">*</span>
                        </label>
                        <div class="">
                            <select name="id" class="text-success form-control" required="">
                                @foreach($data as $datas)
                                    <option value="" selected="">---------</option>

                                    <option value="{{$datas->id}}">{{$datas->network}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class=" btn" style="color: white;background-color: #ff0066" id="btnsubmit"> Purchase Now</button>
                </div>
            </div>
            <div class="col-sm-4 ">
                <br>

                <p>You can use the codes below to check your Airtime Balance!  </p>

                <h6>
                    <ul>
                        <li> MTN *556#</li>
                        <li>MTN [CG] *131*4# or *460*260#</li>
                        <li>9mobile  *223#</li>
                        <li>Airtel *123#</li>
                        <li>Glo *124*0#</li>
                    </ul>
                </h6>






            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    </form>


</div>


</div>


