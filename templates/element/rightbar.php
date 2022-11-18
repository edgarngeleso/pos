<?php
/** 
 * @var \App\View\AppView $this
 */
    echo $this->HTML->css("rightbar");
    $urls = ["/","Products","Services","Users","Reports","Inventory"];
?>
<div class="right-bar">
    <h4>Current Order</h4>
    <div class="items">
        
    </div>
    <div class="total" >
        <h5>Total:</h5>
        <h5 class="cartTotalAmount">Ksh.0.0</h5>
    </div>
    <div class="payment">
        <div>
            <button class="button clearCart">Clear</button>
            <button class="button hold">Hold</button>
        </div>
    
        <button class="button payButton">Pay</button>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment</h5>
                <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>