<html>
<head>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>
<body>
    <!-- Place this where you need payment button -->
    <button id="payment-button">Pay with Khalti</button>
    <!-- Place this where you need payment button -->
    <!-- <button id="payment-button">Pay with Khalti</button> -->
    <!-- Paste this code anywhere in your body tag -->
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_ff5d469c87b0434eba698bd395861110",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
            ],
            "eventHandler": {
                onSuccess(payload) {
                    // hit merchant api for initiating verification
                    console.log(payload);
                    var paragraph = document.getElementById('status');
                    paragraph.textContent = 'Paid';
                    localStorage.setItem('status', 'Paid');
                },
                onError(error) {
                    console.log(error);
                },
                onClose() {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function() {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({ amount: 1000 });
        };

        // Retrieve the status from localStorage on page load
        window.addEventListener('load', function() {
            var savedStatus = localStorage.getItem('status');
            if (savedStatus) {
                var paragraph = document.getElementById('status');
                paragraph.textContent = savedStatus;
            }
        });
    </script>
    <!-- Paste this code anywhere in your body tag -->
    
    <p id="status">Pending</p>
</body>
</html>
