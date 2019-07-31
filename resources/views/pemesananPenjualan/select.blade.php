@extends('index')
@section('content')
<style type="text/css">
    form{
        margin: 20px 0;
    }
    form input, button{
        padding: 5px;
    }
    table{
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 10px;
        text-align: left;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h1>Pemesanan Penjualan</h1>
                    <h3>{{$id}}</h3>
                </div>
                <a href="#" class="btn btn-success" onclick="addrow()">
                    <i class="fa fa-plus" aria-hidden="true"></i>Tambah Item
                </a>
                <div class="x_content">
                    <form action="/sopenjualan/selectpost" method="post">
                        @csrf

                        <!-- Contents -->
                        <br>
                        <div class="form-row">
                            <!-- column 1 -->
                            <div class="form-group col-md-12">
                                <input type="hidden" value="1" id="totalItem">
                                <table id="items">
                                    <tr>
                                        <td>item</td>
                                        <td>quantity</td>
                                        <td>price/pcs</td>
                                        <td>total</td>
                                        <td></td>
                                    </tr>
                                    <tr class="rowinput">
                                        <td>
                                            <select name="item[]" class="form-control item1">
                                                @foreach($items as $item)
                                                    <option value="{{$item->KodeItem}}">{{$item->NamaItem}}</option>
                                                    <input type="hidden" id="{{$item->KodeItem}}" value="{{$item->price}}">
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" onchange="qty(1)" name="qty[]" class="form-control qty1" required="" value="0">
                                        </td>
                                        <td>
                                            <input readonly="" type="text" name="price[]" class="form-control price1" required="" value="0">
                                        </td>
                                        <td>
                                            <input readonly="" type="text" name="total[]" class="form-control total1" required="" value="0">
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- pembatas -->
                            
                            <!-- pembatas -->
                            <div class="form-group col-md-9"></div>

                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    function qty(int){
        var qty =$(".qty"+int).val();
        var item =$(".item"+int).val();
        var price =$("#"+item).val();
        $(".price"+int).val(price);
        $(".total"+int).val(price*qty);
    }

    function addrow(){
        $("#totalItem").val(parseInt($("#totalItem").val())+1);
        var count =$("#totalItem").val();
        var markup = $(".rowinput").html();
        var res = "<tr class='tambah"+count+"'>"+markup+"</tr>";
        res = res.replace("qty1", "qty"+count);
        res = res.replace("item1", "item"+count);
        res = res.replace("price1", "price"+count);
        res = res.replace("total1", "total"+count);
        res = res.replace("qty(1)", "qty("+count+")");
        res = res.replace("<td></td>", '<td><i onclick="del('+count+')" class="fa fa-trash"></i></td>');
        $("#items tbody").append(res);
    }

    function del(int){
        $(".tambah"+int).remove();
    }
</script>
@endsection