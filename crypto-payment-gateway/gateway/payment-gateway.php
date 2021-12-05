<?php 


$userethId=get_option('walletId');

//echo ($userethId);

{?>

    <head>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.6.1/web3.min.js"
        integrity="sha512-5erpERW8MxcHDF7Xea9eBQPiRtxbse70pFcaHJuOhdEBQeAxGQjUwgJbuBDWve+xP/u5IoJbKjyJk50qCnMD7A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>
    </head>

    <form method='post' action=''>
    
        <p class="submit"><button class="enableEthereumButton" type="submit" name="submit" id="user_submit" class="button button-primary" value="Pay" onclick="myFunction()">Pay</button></p>
   
    <script> 
        
        async function myFunction() {
         var myValue = '<?php echo $amount ;?>';
         console.log(myValue);
            if (window.ethereum) {
                window.web3 = new Web3(ethereum);
                try {
                    await ethereum.enable();
                    const accounts = await web3.eth.getAccounts();
                    window.localStorage.setItem("userAddress", accounts[0]);
                
                    web3.eth.sendTransaction({
                        from: accounts[0],
                        to: '<?php echo $userethId ;?>',
                        value: myValue,
                    }).on('error', console.error);

                } catch (error) {
                    console.error(error)
                }
            } else {
                window.open("https://metamask.io/download.html", "_blank");
                    return;
            }
            
         
          console.log(window.web3);
        }
        
    </script>
 
    </form>


<?php }