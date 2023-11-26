<?php ?>

    <script> //=================================
            //PAYSTACK PAYMENT INTEGRATION
            //=================================

            const paymentForm = document.getElementById('paymentForm');
            paymentForm.addEventListener("submit", payWithPaystack, false);

            function payWithPaystack(e) {
                e.preventDefault();
                let handler = PaystackPop.setup({
                    key: document.getElementById("key").value,
                    email: document.getElementById("email-address").value,
                    firstname: document.getElementById("first-name").value,
                    amount: document.getElementById("amount").value * 100,
                    ref: ''+Math.floor((Math.random() * 1000000000) + 1), 
                    onClose: function(){
                        window.location = "https://www.dilyastrend.com/product-services?dil=cart";
                        alert('Transaction Canceled!');
                    },
                    callback: function(response){
                        let message = 'Payment complete! Reference: ' + response.reference;
                        alert(message);
                        window.location = "http://www.dilyastrend.com/appfunctions/appfunctions.php?trxnid=<?php echo $trxnid; ?>&reference=" + response.reference;
                    }
                });
                handler.openIframe();
            }
            //appfunctions/appfunctions.php?accept-job=3&xid=
            //localhost/dilyastrend/product-services?dil=verify_transaction&reference=
//==============================================================================================
                // var paymentForm = document.getElementById('paymentForm');
                // paymentForm.addEventListener('submit', payWithPaystack, false);
                // function payWithPaystack() {
                // var handler = PaystackPop.setup({
                //     key: '<?php //echo $pay_stk_pub_key; ?>', // Replace with your public key
                //     email: '<?php //echo $email; ?>',
                //     amount: '<?php //echo $total * 100; ?>', // the amount value is multiplied by 100 to convert to the lowest currency unit
                //     currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
                //     firstname: '<?php //echo $fname; ?>',
                //     ref: '<?php //echo $trxnid; ?>', // Replace with a reference you generated
                //     callback: function(response) {
                //         //this happens after the payment is completed successfully
                //         var reference = response.reference;
                //         alert('Payment complete! Reference: ' + reference);
                //         // Make an AJAX call to your server with the reference to verify the transaction
                //         //window.location = "http://localhost/dilyastrend/product-services?dil=verify_transaction&reference=" + response.reference;
                //     },
                //     onClose: function() {
                //         alert('Transaction was not completed, window closed.');
                //        // windows.location = "http://localhost/dilyastrend/product-services?dil=cart";
                //     },
                // });
                // handler.openIframe();
                // }
//=================================================================================================
            // function payWithPaystack(e) {
            //     e.preventDefault();
            //     let handler = PaystackPop.setup({
            //         key: <?php //echo $pay_stk_pub_key; ?>,
            //         email: <?php //echo $email; ?>,
            //         amount: <?php //echo $total; ?> * 100,
            //         firstname: <?php //echo $fname; ?>,
            //         ref: 'DT'+Math.floor((Math.random() * 1000000000) + 1), 

            //         onClose: function(){
            //             windows.location = "http://localhost/dilyastrend/product-services?dil=cart";
            //             alert('Transaction Canceled!');
            //         },
            //         callback: function(response){
            //             let message = 'Payment complete! Reference: ' + response.reference;
            //             alert(message);
            //             window.location = "http://localhost/dilyastrend/product-services?dil=verify_transaction&reference=" + response.reference;
            //             //window.location = "http://www.yoururl.com/verify_transaction.php?reference=" + response.reference;
            //         }
            //     });
            //     handler.openIframe();
            // }
            </script>

?>