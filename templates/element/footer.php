<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="footer">
    <h1>Footer</h1>
    <?php
        echo $this->Html->script("bootstrap/dist/js/bootstrap.bundle.min.js");
        echo $this->Html->script("jsprintmanager/JSPrintManager.js");
        echo $this->Html->script("rightbar.js");
    ?>
    
    <script type="text/javascript">
        /*//WebSocket settings
        JSPM.JSPrintManager.license_url = "http://localhost:8765/files/license";
        JSPM.JSPrintManager.auto_reconnect = true;
        JSPM.JSPrintManager.start();
        JSPM.JSPrintManager.WS.onStatusChanged = function () {
                //get client installed printers
                if(jspmWSStatus()){
                    JSPM.JSPrintManager.getPrinters().then(function (myPrinters) {
                    var options = '';
                    for (var i = 0; i < myPrinters.length; i++) {
                        options += '<option>' + myPrinters[i] + '</option>';
                    }
                    $('#installedPrinterName').html(options);
                });
                }
        };

         //Check JSPM WebSocket status
        function jspmWSStatus() {
            if (JSPM.JSPrintManager.websocket_status == JSPM.WSStatus.Open)
                return true;
            else if (JSPM.JSPrintManager.websocket_status == JSPM.WSStatus.Closed) {
                alert('JSPrintManager (JSPM) is not installed or not running! Download JSPM Client App from https://neodynamic.com/downloads/jspm');
                return false;
            }
            else if (JSPM.JSPrintManager.websocket_status == JSPM.WSStatus.Blocked) {
                alert('JSPM has blocked this website!');
                return false;
            }
        }*/


        document.querySelector("#clickBTN")?.addEventListener("click",function(){
            var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
            disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
            var content_vlue = "<table><thead><tr><th>Hello></tr></thead></table>"; 
            
            var docprint=window.open("","",disp_setting); 
            docprint.document.open(); 
            docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
            docprint.document.write(content_vlue); 
            docprint.document.close(); 
            docprint.focus(); 
        });
        
    </script>
</div>