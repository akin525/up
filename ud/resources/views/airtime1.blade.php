
@include('layouts.sidebar')


<div style="padding:90px 15px 20px 15px">
    <!--    <h4 class="align-content-center text-center">Data Subscription</h4>-->





    <!--            <div class="box w3-card-4">-->

    <form action="{{ route('buyairtime1') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-8">
                <br>
                <br>
                <div id="AirtimeNote" class="alert alert-danger" style="text-transform: uppercase;font-weight: bold;font-size: 23px;display: none;"></div>
                <div id="AirtimePanel">
                    <div id="div_id_network" class="form-group">
                        <label for="network" class=" requiredField">
                            Network<span class="asteriskField">*</span>
                        </label>
                        <div class="">
                            <select name="id" class="text-success form-control" required="">
                                    <option value="" selected="">---------</option>

                                    <option value="MTN">MTN</option>
                                    <option value="GLO">GLO</option>
                                    <option value="AIRTEL">AIRTEL</option>
                                    <option value="9MOBILE">9MOBILE</option>

                            </select>
                        </div>
                    </div>
                    <div id="div_id_network" class="form-group">
                        <label for="network" class=" requiredField">
                            Enter Amount<span class="asteriskField">*</span>
                        </label>
                        <div class="">
                            <input type="number" name="amount" min="100" max="4000" class="text-success form-control" required>
                        </div>
                    </div>
                    <div id="div_id_network" class="form-group">
                        <label for="network" class=" requiredField">
                            Enter Phone Number<span class="asteriskField">*</span>
                        </label>
                        <div class="">
                            <input type="number" name="number" minlength="11" class="text-success form-control" required>
                        </div>
                    </div>
                    <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                    <style>
                        .button {
                            position: relative;
                            padding: 8px 16px;
                            background: #009579;
                            border: none;
                            outline: none;
                            border-radius: 2px;
                            cursor: pointer;
                        }

                        .button:active {
                            background: #e7eceb;
                        }

                        .button__text {
                            font: bold 20px "Quicksand", san-serif;
                            color: #ffffff;
                            transition: all 0.2s;
                        }

                        .button--loading .button__text {
                            visibility: hidden;
                            opacity: 0;
                        }

                        .button--loading::after {
                            content: "";
                            position: absolute;
                            width: 16px;
                            height: 16px;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            margin: auto;
                            border: 8px solid transparent;
                            border-top-color: #ffffff;
                            border-radius: 50%;
                            animation: button-loading-spinner 1s ease infinite;
                        }

                        @keyframes button-loading-spinner {
                            from {
                                transform: rotate(0turn);
                            }

                            to {
                                transform: rotate(1turn);
                            }
                        }
                    </style>

                    <button type="submit" class="button btn btn-success" >
                        Purchase Now<span class="load loading"></span>
                    </button>
                    <script>
                        const btns = document.querySelectorAll('button');
                        btns.forEach((items)=>{
                            items.addEventListener('click',(evt)=>{
                                evt.target.classList.add('activeLoading');
                            })
                        })
                    </script>
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
                <center>

                    <iframe width="300" class="widget widget-chat-message"
                            src="https://www.youtube.com/embed/ICXSsBrh9_0?autoplay=1">
                    </iframe>
                </center>





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


