<html>
<head>

</head>
    <body>
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="PBW5KUJV7NUZS">
        <input type="image" class="button floatright" src="https://www.sandbox.paypal.com/en_AU/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
    </form>

    <form method="post" action="{{url('')}}/addorder">
        {{csrf_field()}}
        <input type="text" name="cardNumber" placeholder="Card No."></br>
        <input type="text" name="cardExpiry" placeholder="Cart expriy"></br>
        <input type="text" name="cardCVC" placeholder="CardCVC"></br>
        <input type="checkbox" name="subscribed" placeholder="subsribed"></br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <form method="post" action="{{url('')}}/createtransaction">
        {{csrf_field()}}
        <input type="text" name="amount" placeholder="amount"></br>
        <input type="text" name="PayPal_Invoice_Number" placeholder="Mapped to PayPal Invoice Number."></br>
        <input type="text" name="custom" placeholder="Paypal custom field"></br>
        <input type="text" name="payment_method_nonce" placeholder="payment method Nonce"></br>
        <input type="text" name="receipt" placeholder="Description for PayPal email receipt"></br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <form id="checkout" action="{{url('/pay')}}" method="post">
        {{csrf_field()}}
        <input   data-braintree-name="number" value="4111111111111111">
        <input  data-braintree-name="expiration_date" value="10/20">
        <input type="hidden" name="amount" value="250">
        <input type="submit" id="submit" value="Pay">
    </form>

    <script>
        alert('{{$clientToken}}')
        braintree.setup('{{$clientToken}}', 'custom', {id: 'checkout'});
    </script>

    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="seller@designerfotos.com">
        <input type="hidden" name="item_name" value="hat">
        <input type="hidden" name="item_number" value="123">
        <input type="hidden" name="amount" value="15.00">
        <input type="hidden" name="first_name" value="John">
        <input type="hidden" name="last_name" value="Doe">
        <input type="hidden" name="address1" value="9 Elm Street">
        <input type="hidden" name="address2" value="Apt 5">
        <input type="hidden" name="city" value="Berwyn">
        <input type="hidden" name="state" value="PA">
        <input type="hidden" name="zip" value="19312">
        <input type="hidden" name="night_phone_a" value="610">
        <input type="hidden" name="night_phone_b" value="555">
        <input type="hidden" name="night_phone_c" value="1234">
        <input type="hidden" name="email" value="jdoe@zyzzyu.com">
        <input type="image" name="submit"
               src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
               alt="PayPal - The safer, easier way to pay online">
    </form>
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="seller@designerfotos.com">
        <input type="hidden" name="item_name" value="mac">
        <input type="hidden" name="item_number" value="1342134">
        <input type="hidden" name="amount" value="3">
        <input type="hidden" name="tax" value="1">
        <input type="hidden" name="quantity" value="1">
        <input type="hidden" name="no_note" value="1">
        <input type="hidden" name="currency_code" value="USD">

        <!-- Enable override of buyers's address stored with PayPal . -->
        <input type="hidden" name="address_override" value="1">
        <!-- Set variables that override the address stored with PayPal. -->
        <input type="hidden" name="first_name" value="John">
        <input type="hidden" name="last_name" value="Doe">
        <input type="hidden" name="address1" value="345 Lark Ave">
        <input type="hidden" name="city" value="San Jose">
        <input type="hidden" name="state" value="CA">
        <input type="hidden" name="zip" value="95121">
        <input type="hidden" name="country" value="US">
        <input type="image" name="submit"
               src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
               alt="PayPal - The safer, easier way to pay online">
    </form>

   <form id="checkout" method="post" action="{{url('/tran')}}">
       {{csrf_field()}}
        <div id="container"></div>
       <input type="hidden" name="payment_method_nonce" >
       <input type="submit">
   </form>

    <form method="post" action="{{url('/trytran')}}">
        {{csrf_field()}}
        <div id="paypal-container"></div>
        <input type="hidden" name="amount" value="888">
        <input type="hidden" name="Invoice" value="123456">
        <input type="submit" name="sub" value="sub">
    </form>
    <form id="payform" action="{{url("/testpay")}}" method="post">
        {{csrf_field()}}
        <div id="dropin-container"></div>
        <button type="submit">place order</button>
    </form>
        <button onclick="payform()">place order out</button>
        <script>
            function payform()
            {
                document.getElementById('payform').submit();
            }
        </script>
    </body>
</html>
<script src="https://js.braintreegateway.com/js/braintree-2.27.0.min.js"></script>
<script>
    braintree.setup("{{$clientToken}}", "dropin", {
        container: "dropin-container",
        paypal: {
            singleUse: true,
            amount: 10.00,
            currency: 'USD'
        }
    });
</script>
