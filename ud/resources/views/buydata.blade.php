@include('layouts.sidebar')

<div class="row">
    <!--    <div class="card">-->
    <div class="card-body">
        <div class="module-head">
            <center><h3>
                    Buy Data</h3></center>
        </div>
        <center>
            <script>
                function myNewFunction(sel) {
                    // alert(sel.options[sel.selectedIndex].id);
                    document.getElementById("po").value = (sel.options[sel.selectedIndex].id);
                    document.getElementById("pk").value = (sel.options[sel.selectedIndex].text);
                }
            </script>
            <div class="btn-controls">
                <form action="{{ route('bill') }}" method="post">
                    @csrf
                    <label for="network" class=" requiredField">
                        Select Network from the Rectangular Box<span class="asteriskField">*</span>
                    </label>
                    <select  name="productid" class="text-success form-control" onChange="myNewFunction(this);" required="">
                        <option>-------</option>
                        @foreach($data as $datas)
                            <option value="{{$datas->id}}" id="{{$datas->tamount}}" >{{$datas->network}}{{$datas->plan}}
                            </option>
                        @endforeach

                    </select>
                    <br>
                    <label for="network" class=" requiredField">
                        Amount<span class="asteriskField">*</span>
                    </label>
                    <input name="amount" class="text-success form-control" value="" placeholder="Amount" id="po" readonly>
                    <br>
                    <input type="hidden" name="id" value="<?php echo rand(10000000, 999999999); ?>">

                    <label for="network" class=" requiredField">
                        Enter Phone no<span class="asteriskField">*</span>
                    </label>
                    <input type="number" name="number" class="form-control" required>
                    <br>
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

                    <button type="submit" class="button btn btn-success" style="color: white;background-color: #ff0066" onclick="this.classList.toggle('button--loading') ">
                        <span class="button__text">Purchase Now</span>
                    </button>
                    <script>
                        const btn = document.querySelector(".button");

                        btn.classList.add("button--loading");
                        btn.classList.remove("button--loading");

                    </script>
                    <br>
                </form>
        </center>
        <br>



        <p>You can use the codes below to check your Data Balance!  </p>

        <h6>
            <ul>
                <li> MTN [SME] *461*4# or *556#</li>
                <li>MTN [CG] *131*4# or *460*260#</li>
                <li>9mobile [Gifting] *228#</li>
                <li>Airtel *140#</li>
                <li>Glo *127*0#</li>
            </ul>
        </h6>



        <br>
        <style>
            img {
                max-width: 100%;
                height: auto;
            }
        </style>
        <div class="card-body">
            <div class="center">
                <img    src="{{asset('images/re.jpg')}}" alt="#" />
            </div>
        </div>

        <br>
    </div>
</div>
</div>
</center>
