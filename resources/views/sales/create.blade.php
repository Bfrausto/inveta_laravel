@extends('layouts/navbar')
@section('title', 'Realizar Venta')
@section('style')
    <style>
        p{
            margin: 0;
        }
        .ma{
            margin-bottom: 0px !important;
        }
        .saleTittles{
            width: 90px;
        }
        .calTittles{
            width: 100%;
        }
        .calc{
            height: 50px;
        }
        .border-grey{
            border:4px solid #ced4da;
            width:100%;
            border-radius: 10px;
        }
        .calc-buttons {
            padding-left: 4px;
            padding-right: 4px;

        }
        .icons{
            color: #e9ecef;
            font-size: 25px;
        }
        .icons:hover {
            color: #9ea2a7;
        }
        .sizes{
            width: 35px;
            height: 35px;
            padding-left: 0;
            padding-right: 0;
            padding-top: 5px;
            background-color: white;
        }
        .sizes:active {
            background-color: #9ea2a7;
        }

        .h-30{
            height: 30%;
            width:23%!important;
        }
        .selected{
            background-color:#e9ecef !important;
        }

        .selected .selectedName{
            color:black !important;
        }
        .selected .selectedDescription{
            color:#5d5b5b !important;
        }
    </style>
@stop
@section('content')

<div id="contenedor-principal">
    @error('paid')
        <p style="color :red">Ingrese el monto pagado</p>
    @enderror
    <div class="row">
        <div class="col-4 pl-0">
            <div class="row align-items-center" >
                <div class="col-2" >
                    <p style="margin: 0">Cliente:</p>
                </div>
                <div class="col">
                    <select name="client_id" class="custom-select " id="client_id" style="@error('client_id')border:0.5px solid red; @enderror">
                        @if (old('client_id') and old('client_id')!='Selecciona un cliente')
                        <option selected
                                value="{{old('client_id')}}">
                                {{App\models\Sale::getClient(old('client_id'))}}
                        </option>
                        @endif
                        @foreach ($data['clients'] as $client)
                            <option  value="{{$client->id}}">
                                {{$client->name}}
                            </option>
                        @endforeach
                </select>
                </div>
            </div>
            <div class="border-grey" >

                <div style="min-height:215px; height: 215px" id="contentSale" class="p-3 overflow-auto">
                    <div id="contentSalePre" class="" style="background-color:rgb(207, 207, 207); border-radius: 5px;">

                    </div>
                </div>

                <hr>
                <div class="row m-0" >
                    <div class="col">
                        <div class="input-group " >
                            <div class="input-group-prepend">
                                <span class="input-group-text  saleTittles"  >TOTAL &nbsp;$</span>
                            </div>
                                <p id="total"type="text" class="form-control">0</p>
                        </div>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text saleTittles" >Pagado $</span>
                            </div>
                            <input id="pay" type="text" class="form-control" placeholder="0">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text saleTittles" id="exchangeTittle">Cambio $</span>
                            </div>
                            <input id="exchange" type="text" class="form-control"  value="0" disabled>
                        </div>
                    </div>

                    <div class="col-4 d-flex justify-content-center align-items-center mb-3">

                        <form action="/sales" method="post" enctype="multipart/form-data"  id="register">
                        @csrf
                        <input id="SaleRegister" name="sale" type="hidden" value="">
                        <input id="Client" name="client_id" type="hidden" value="">
                        <input id="Paid" name="paid" type="hidden" value="">
                        <input id="TotalSale" name="total" type="hidden" value="">

                        <div class="row mb-0">
                            <button class="btn btn-primary rounded-pill" style=" border:4px solid #ced4da;" id="generar"  onclick="return generateSale();">Generar</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="border-grey mt-2 pl-2 pr-2 calc-buttons-event" >
                <div class="row  mb-0 calc-buttons " role="group" aria-label="Basic outlined example">
                    <button type="button" class="calc col btn btn-outline-secondary">1</button>
                    <button type="button" class=" col btn btn-outline-secondary">2</button>
                    <button type="button" class=" col btn btn-outline-secondary">3</button>
                    </div>
                    <div class="row  mb-0  calc-buttons " role="group" aria-label="Basic outlined example">
                    <button type="button" class="calc col btn btn-outline-secondary">4</button>
                    <button type="button" class="col btn btn-outline-secondary">5</button>
                    <button type="button" class="col btn btn-outline-secondary">6</button>
                    </div>
                    <div class="row  mb-0  calc-buttons " role="group" aria-label="Basic outlined example">
                    <button type="button" class="calc col btn btn-outline-secondary">7</button>
                    <button type="button" class="col btn btn-outline-secondary">8</button>
                    <button type="button" class="col btn btn-outline-secondary">9</button>
                    </div>
                    <div class="row  mb-0  calc-buttons " role="group" aria-label="Basic outlined example">
                    <button type="button" class="calc col btn btn-primary"><<</button>
                    <button type="button" class="col btn btn-outline-secondary">0</button>
                    <button type="button" class="col btn btn-primary">.</button>
                    </div>
                </div>
            </div>
        <div class="col border-grey  p-0 overflow-auto" style="align-content: flex-start; display: flex;flex-wrap: wrap;justify-content: center;height: 650px">


        @foreach ($data['products'] as $product)
            <div class=" h-30 m-2 p-2 rounded pt-0" style="background-color:#32b5e1">
                <p class="selectedName" style="color:white; font-size:50px; text-align: center;     margin-top: -10px;" >{{$product->name}}</p>
                <p class="selectedDescription" style="text-align: center; font-size:25px; margin-top: -20px; color:#e7e7e7">{{$product->description}}</p>
                <div class="d-flex justify-content-center sizes-product">
                    @if($product->small)
                        <input class="btn-check " type="radio" id="small{{$product->id}}"  name="size"  value="{{$product->id}}-{{$product->small->price}}-{{$product->name}}/{{$product->description}}-small">
                        <label class="btn btn-outline-secondary sizes  rounded-circle  @if($product->medium||$product->big) mr-1 @endif" for="small{{$product->id}}"
                        >Ch</label>
                    @endif
                    @if($product->medium)
                    <input class="btn-check"  type="radio" id="medium{{$product->id}}" name="size" value="{{$product->id}}-{{$product->medium->price}}-{{$product->name}}/{{$product->description}}-medium" >
                        <label class="btn btn-outline-secondary sizes  rounded-circle  @if($product->big) mr-1 @endif" for="medium{{$product->id}}">M</label>
                        @endif
                    @if($product->big)
                    <input class="btn-check" type="radio" id="big{{$product->id}}" name="size"  value="{{$product->id}}-{{$product->big->price}}-{{$product->name}}/{{$product->description}}-big">
                    <label class="btn btn-outline-secondary sizes  rounded-circle" for="big{{$product->id}}">G</label>
                    @endif

                </div>

                <div class="input-group mb-1">
                    <p style="font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                    <input style="height: 25px;" id="kg-{{$product->id}}" type="text" class="form-control" placeholder="0">
                    <p style="font-size: 18px;">&nbsp;kg&nbsp;</p>


                </div>
                <div class="input-group mb-1">

                    <p style="font-size: 18px;">&nbsp;&nbsp;$&nbsp;&nbsp;</p>

                    <input style="height: 25px;"  id="price-{{$product->id}}" type="text" class="form-control  " placeholder="0" >
                    <p style="font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    </button>
                </div>

            </div>
        @endforeach
       


        </div>
    </div>
</div>
@stop
@section('scripts')
    @parent
    <script>
        var selected=0;
        var sale =[];
        var actualSale={'price':0,'kg':0,'product':'','id':1,'size':'','house':false,'product_id':''}
        var sum=0;
        var divBefore="";
        var actualContentSale="";
        $('#pay').on('input',function(){
            let total =  parseFloat($('#total').text());
            let pay = parseFloat($('#pay').val())
            if(pay-total<0){
                $('#exchange').val((total-pay));
                $('#exchangeTittle').text('Falta\xa0\xa0\xa0\xa0\xa0$')
                $('#exchange').css('color', 'red');
                $('#exchangeTittle').css('color', 'red');
            }else{
                $('#exchange').val((pay-total));
                $('#exchangeTittle').text('Cambio $')
                $('#exchange').css('color', 'black');
                $('#exchangeTittle').css('color', 'black');
            }
        });
        $('.sizes-product input').on('change', function() {
            if(actualSale['kg']==0 && divBefore!=""){
                divBefore.parent().parent().removeClass('selected')
            }
            divBefore=$('input[name=size]:checked', '.sizes-product')
            selected= divBefore.val().split("-")
            $('#kg-'+selected[0]).focus()

            divBefore.parent().parent().addClass('selected')
            if(actualSale['kg']!=0){
                divBefore.parent().parent().addClass('selected')
                showActualSale(actualSale);
                appendSale()
           }
            $('#price-'+selected[0]).val(selected[1]);
            actualSale['price']=$('#price-'+selected[0]).val();
            actualSale['product']=selected[2];
            actualSale['size']=selected[3];
            actualSale['kg']=0;
            actualSale['product_id']=selected[0]
            $('#kg-'+selected[0]).val("");
            $("#saleResults > p").text(actualSale['price']);

            changeSelected(selected,actualSale)

            showActualSale(actualSale);

        });

        function appendSale(){
            sale.push([
                    actualSale['price'],
                    actualSale['kg'],
                    actualSale['product'],
                    actualSale['id'],
                    actualSale['size'],
                    actualSale['product_id']
                ])
                $('#contentSale').append(actualContentSale);
                actualSale['id']+=1
                saleSum()
        }
        function changeSelected(selected,actualSale) {
            $('#price-'+selected[0]).on('keyup', function() {
                actualSale['price']=$('#price-'+selected[0]).val();
                showActualSale(actualSale);
            });
            $('#kg-'+selected[0]).on('keyup', function() {
                actualSale['kg']=$('#kg-'+selected[0]).val();
                showActualSale(actualSale);

            });

        }

        function showActualSale(actualSale) {
            actualSale['house']=$('#house-'+actualSale['id']).prop('checked');

            let size=actualSale['size']=='small'?'Ch':(actualSale['size']=='medium'?'M':'G');

            actualContentSale="<div class='row ' id='saleResults'><div class='col-6 pr-0' id='saleProduct'><p>"+actualSale['id']+".-"+actualSale['product']+"/"+size+" </p></div> <div class='col-2'><p>"+actualSale['kg']+"kg</p></div><div class='col pr-0'> <p>"+actualSale['price']+"</p> </div> <div class='col-2 '><p>$"+(actualSale['kg']*actualSale['price'])+"</p></div><div class='col ml-0'><input class='form-check-input ml-0' type='checkbox'  id='house-"+actualSale['id']+"'"+(actualSale['house']==true?'checked':'')+"></div></div>";

            $('#contentSalePre').html(actualContentSale);
            $('#total').text(sum+(actualSale['kg']*actualSale['price']))
        }

        function saleSum(){
            sum=0;
            sale.forEach(sales=>sum+=sales[0]*sales[1]);
            $('#total').text(sum-(actualSale['kg']*actualSale['price']))
        }

        function generateSale() {
            var houseIsChecked=[];
            if(actualSale['kg']!=0){
                sale.push([
                    actualSale['price'],
                    actualSale['kg'],
                    actualSale['product'],
                    actualSale['id'],
                    actualSale['size'],
                    actualSale['product_id']
                ])
            }
            $("#contentSale  input").each(function() {
                houseIsChecked.push( $(this).prop('checked') );
            });
            sale.forEach(function (sales,index) {
                if (index == sale.length-1  && actualSale['kg']!=0){
                    sales.push( houseIsChecked[0] , "*")
                }else{
                    sales.push( houseIsChecked[index+1] , "*")
                }
            });
            $('#Paid').val($('#pay').val());
            $('#TotalSale').val($("#total").text());
            $('#Client').val($("#client_id option:selected").val());
            $('#SaleRegister').val(sale);
            return true;

        }

        $('.calc-buttons-event button').on('mousedown',
            function(event) {
                event.preventDefault();
            }
        );
        $('.calc-buttons-event button').on('click', function() {

            if($(this).text()=='<<'){
                $(':focus').val( $(':focus').val().slice(0, -1))
            }else{
                $(':focus').val( $(':focus').val()+$(this).text())
            }
            $(':focus').keyup()
        });

    </script>
@stop
