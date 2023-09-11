@include('layouts.sidebar')

<div class="row">
    <!--    <div class="card">-->
    <div class="card-body">
        <div class="module-head">
            <center><h3>
                    Select Network</h3></center>
        </div>
        <center>
            <div class="btn-controls">
                <form action="{{ route('buydata') }}" method="POST">
                    @csrf
                    <label for="network" class=" requiredField">
                        Network<span class="asteriskField">*</span>
                    </label>
                    <select  name="id" class="text-success form-control" required="">
                        @if($serve->name == 'mcd')
                            <option value="mtn-data">MTN</option>
                            <option value="glo-data">GLO</option>
                            <option value="etisalat-data">9MOBILE</option>
                        @else
                            <option value="MTN">MTN-SME</option>
                            <option value="MTN_CG">MTN-CG</option>
                            <option value="MTN_DG">MTN-DG</option>
                            <option value="GLO">GLO</option>
                            <option value="GLO_CG">GLO-CG</option>
                            <option value="9MOBILE">9MOBILE</option>
                            <option value="9MOBILE_CG">9MOBILE-CG</option>
                        @endif
                        @if ($serve->name == 'mcd')
                            <option value="airtel-data">AIRTEL</option>
                        @else
                            <option value="AIRTEL_DG">AIRTEL_DG</option>
                            <option value="AIRTEL_CG">AIRTEL_CG</option>
                        @endif
                    </select>

                    <br>
                    <button type="submit" class=" btn" style="color: white;background-color: #ff0066">Click Next<span class="load loading"></span>
                    </button>
                    <script>
                        const btns = document.querySelectorAll('button');
                        btns.forEach((items)=>{
                            items.addEventListener('click',(evt)=>{
                                evt.target.classList.add('activeLoading');
                            })
                        })
                    </script>
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
