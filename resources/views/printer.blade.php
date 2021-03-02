<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>

<style>
#invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 40mm;
  background: #FFF;
}

::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: .7em;
  color: #666;
  line-height: 1.0em;
}

#top, #mid,#bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}

#top{min-height: 10px;}
#mid{min-height: 0px;}
#bot{ min-height: 50px;}

.info{
  display: block;
  margin-left: 0;
}
table{
  width: 100%;
  border-collapse: collapse;
}
td{
  padding: 5px 0 5px 15px;
  border: 1px solid #EEE
}
.tabletitle{
  padding: 5px;
  font-size: .5em;
  background: #EEE;
}
.service{border-bottom: 1px solid #EEE;}
.item{width: 24mm;}
.itemtext{font-size: .5em;}

#legalcopy{
  margin-top: 5mm;
}

</style>
</head>
<body>
<div id="invoice-POS">

    <center id="top">
        <div class="info">
            <h5>NVSERVICES</h5>
            <p>AA Block 171 No 5 D 12 Garki, Akwunanwa, Enugu</p>
            <p>08144161555, 0815522374</p>
        </div>
        <!--End Info-->
    </center>
    <!--End InvoiceTop-->

    <div id="mid">
        <div class="info">
            <p>
                Invoice number : {{ session()->get('invoice') }} </br>
                Attendant : {{ auth()->user()->fullname }}</br>
            </p>
        </div>
    </div>
    <!--End Invoice Mid-->

    <div id="bot">

        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item">
                        <h6>Item</h6>
                    </td>
                    <td class="Hours">
                        <h6>Qty</h6>
                    </td>
                    <td class="Rate">
                        <h6>Price</h6>
                    </td>
                    <td class="Rate">
                        <h6>Sub Total</h6>
                    </td>
                </tr>
                @foreach (Cart::content() as $item)
                <tr class="service">
                    <td class="tableitem">
                        <p class="itemtext">{{ $item->name }}</p>
                    </td>
                    <td class="tableitem">
                        <p class="itemtext">{{ $item->qty }}</p>
                    </td>
                    <td class="tableitem">
                        <p class="itemtext">&#8358;{{ $item->price }}</p>
                    </td>
                    <td class="tableitem">
                        <p class="itemtext">&#8358;{{ $item->price * $item->qty }}</p>
                    </td>
                </tr>
                @endforeach

                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td class="Rate">
                        <h2>Total</h2>
                    </td>
                    <td class="payment">
                        <h2>&#8358;{{ Cart::total()}}</h2>
                    </td>
                </tr>

            </table>
        </div>
        <!--End Table-->

        <div id="legalcopy" style="text-align:center">
            <p class="legal"><strong>Thank you for your patronage!</strong> 
            </p>
        </div>

    </div>
    <!--End InvoiceBot-->
</div>
<!--End Invoice-->
</body>
</html>
