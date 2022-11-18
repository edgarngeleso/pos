let modal = document.querySelector("#modal");
let payButton = document.querySelector(".payButton");

let addProductBtns = document.querySelectorAll("#add-product");
let addServiceBtns = document.querySelectorAll("#add-service");

let allProductsData = document.querySelectorAll("#productData");
let allServicesData = document.querySelectorAll("#serviceData");

//get saved data from local storage
let items = document.querySelector(".items");
let clearCart = document.querySelector(".clearCart");
let cartTotalAmount = document.querySelector(".cartTotalAmount");
let servicePrice, servicePriceIndex;

let generateHtml = {
    setServicePriceHtml:function(){
        return(
            `
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Set service price</h5>
                        <button type="button" onclick="closeSetServiceModal()" class="close closeModal" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true" >&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Enter service price</p>
                        <input type="number" required onchange="generatedPrice()"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn custom-button" onclick="setPrice()">Set</button>
                    </div>
                </div>
            </div>
            `
        )
    },
    paymentHtml:function(){
        return(
            `
            <div class="modal-dialog" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Payment</h5>
                        <button type="button" onclick="closeModal()" class="close closeModal" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true" >&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <button type="button" class="w-25 btn custom-button">Cash</button>
                        <br>
                        Total: Ksh.${currencyFormatter(cart.cartTotal())}<br>
                        <label>Amount</label><br>
                        <input type="number" placeholder="Amount..." onchange="calculateBalance()" class="amount"/><br>
                        <label>Balance</label><br>
                        <input type="number" class="balance"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn custom-button" onkeydown="enterClicked()"  onclick="confirmPayment()">Confirm</button>
                    </div>
                </div>
            </div>
            `
        );
    },
    cartHtml:function(data){
        let output = "";
        if(data.length > 0){
            data.forEach((item,index)=>{
                output+=`
                <div class="item-card">
                    <img src="/img/${item.productImage??item.serviceImage}" />
                    <div class="item-description">
                    <div class="delete">
                        <b></b>
                        <img src="/img/assets/delete.png" class="delete-item" onclick="deleteItem(${index})"/>
                    </div>
                    
                    <span>${item.productName??item.serviceName}</span>
                    <span>Ksh.${currencyFormatter(item.productSellingPrice)}</span>
                    ${item.serviceName!==undefined?"":
                    `    <div class="quantity" >
                            <img src="/img/assets/subtract.png" class="decrease" onclick="decrease(${index})"/>
                            <input type="number" value="${item.qty}" class="quantityInput" onchange="quantityInput(${index})"/>
                            <img src="/img/assets/add.png" class="increase" onclick="increase(${index})"/>
                        </div>`}
                </div>
            </div>
                `
            })
        }else{
            output="<div class='no'>No items</div>";
        }
        
        return output;
    }
}

let check = (data,obj)=>{
    let isFound = {status:false,index:null};
    data.forEach((element,i) => {
        if(element.productID == obj.productID){
            isFound.status = true;
            isFound.index = i;
        }
    });
    return isFound;
}

addProductBtns.forEach((product,index)=>{
    product.addEventListener("click",(e)=>{
        //add product to cart
        fetch(`/products/productData/${parseInt(allProductsData[index].value)}`).
        then(req=>req.json()).
        then(data=>{
            let newData = {...data,qty:1,type:"product"};
            //check exitence of the product in the cart
            let isFound = check(cart.cartItems,newData);
            if(isFound.status){
                cart.updateItem(isFound.index,"INC");
            }else{
                cart.addItem(newData);
            }
            items.innerHTML = generateHtml.cartHtml(cart.cartItems);
            cartTotalAmount.innerHTML = "Ksh."+currencyFormatter(cart.cartTotal());
        }).catch(e=>{
            return new Error(e);
        })
    })
})


let servicePriceModal = null;
addServiceBtns.forEach((service,index)=>{
    service.addEventListener("click",(e)=>{
        //load a bootstrap modal to set the price of the service
        servicePriceIndex = index;
        modal.innerHTML = generateHtml.setServicePriceHtml();
        servicePriceModal = new bootstrap.Modal(modal,{backdrop: 'static'});
        servicePriceModal.show();
    })
})

let closeSetServiceModal = ()=>{
    servicePriceModal.hide();
}

let generatedPrice = ()=>{
    servicePrice = this.event.target.value;
}

let setPrice = ()=>{
    //retrieve service data and add to cart
    if(servicePrice >= 1){
        servicePriceModal.hide();
        fetch(`/services/serviceData/${parseInt(allServicesData[servicePriceIndex].value)}`).
        then(req=>req.json()).
        then(data=>{
            let newData = {...data,productSellingPrice:servicePrice,qty:1,productBuyingPrice:0,type:"service"};
            cart.addItem(newData);
            items.innerHTML = generateHtml.cartHtml(cart.cartItems);
            cartTotalAmount.innerHTML = "Ksh."+currencyFormatter(cart.cartTotal());
            servicePriceModal.hide();
        }).catch(e=>{
            return new Error(e);
        })
    }else{
        return false;
    }
}


//Retrieve saved cart data
let localStorage = window.localStorage;
window.onload = function(){
    if(localStorage.getItem("cart-items")){
        cart.cartItems = JSON.parse(localStorage.getItem("cart-items"));
    }

    items.innerHTML = generateHtml.cartHtml(cart.cartItems);
    cartTotalAmount.innerHTML = "Ksh."+currencyFormatter(cart.cartTotal());
}


let cart = {
    cartItems:[],
    saveCartItems:function(){
        localStorage.setItem("cart-items",JSON.stringify(this.cartItems));
    },
    addItem:function(itemObject){
        this.cartItems.push(itemObject);
        this.saveCartItems();
    },
    removeItem:function(itemIndex){
        this.cartItems.splice(itemIndex,1);
        this.saveCartItems();
    },
    updateItem:function(itemIndex,option,typedValue=0){
        switch (option) {
            case "DEC":
                this.cartItems[itemIndex].qty = this.cartItems[itemIndex].qty<=1?1:this.cartItems[itemIndex].qty-1;
                break;
            case "TYPED":
                if(typedValue <= 1){
                    typedValue=1
                }
                this.cartItems[itemIndex].qty=typedValue;
                break;
            case "INC":
                this.cartItems[itemIndex].qty+=1;
                break;
        
            default:
                break;
        }
        
        this.saveCartItems();
    },
    cartTotal:function(){
        let total = 0;
        if (this.cartItems.length>0) {
            return this.cartItems.map(cartItem=>cartItem.qty*cartItem.productSellingPrice).reduce((prev,curr)=>prev+curr,0);
        } else {
            return total;
        }
    },
    clearCart:function(){
        this.cartItems = [];
        localStorage.clear();
    }
};


let paymentModal = null;
payButton.addEventListener("click",(e)=>{
    if(cart.cartItems.length > 0){
        modal.innerHTML = generateHtml.paymentHtml();
        paymentModal = new bootstrap.Modal(modal,{backdrop:"static"});
        paymentModal.show();
    }
})

let balance;
let userAmount;
let calculateBalance = ()=>{
    userAmount = this.event.target.value;
    balance = userAmount-cart.cartTotal();
    if(balance>0){
        document.querySelector(".balance").style.border = "1px solid black";
    }
    document.querySelector(".balance").value = balance;
}

const enterClicked = ()=>{
    if(this.event.key == "Enter"){
        console.log("clicked");
    }
}

const confirmPayment = ()=>{
    if(balance>=0){
        
        let formData = new FormData();
        formData.append("cart",JSON.stringify(cart.cartItems));
        console.log(cart.cartItems);
        fetch("/sales/addSale",{
            method:"POST",
            body:formData
        }).
        then(req=>req.json()).
        then(data=>{
            //print receipt
            printData(data);

            cart.clearCart();
            items.innerHTML = generateHtml.cartHtml(cart.cartItems);
            cartTotalAmount.innerHTML = "Ksh."+currencyFormatter(cart.cartTotal());
            paymentModal.hide();

        }).catch(e=>{
            return new Error(e);
        })

        
        
    }else{
        document.querySelector(".balance").style.border = "2px solid red";
    }
}
const closeModal = ()=>{
    paymentModal.hide();
}


const printData = (data)=>{
    let disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
            disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
    let styles = {
        padding:"padding-left:4px;",
        border:"border: 1px solid #999999;"
    }

    let content_vlue = `<h1 style="text-align:center;">Company Name</h1>
                        <h2 style="text-align:center;">Company Description</h2>
                        <h4>Receipt No: ${data.invoiceNumber}</h4>
                        <h4>Date: ${data.saleDate}</h4>
                        <br>
                        <table style="width:94%;border:1px solid black;border-spacing: 0;">
                            <thead>
                                <tr>
                                    <th style="width:5%;text-align:left;${styles.border}${styles.padding}">#</th>
                                    <th style="width:30%;text-align:left;${styles.border}${styles.padding}">Product</th>
                                    <th style="width:20%;text-align:left;${styles.border}${styles.padding}">Price(Ksh.)</th>
                                    <th style="width:15%;text-align:left;${styles.border}${styles.padding}">Qauntity</th>
                                    <th style="width:20%;text-align:left;${styles.border}${styles.padding}">Total(Ksh.)</th>
                                </tr>
                            </thead>
                            <tbody>`;

    data.saleData.forEach((sale,index)=>{
        content_vlue+=`
            <tr>
                <td style="width:5%;text-align:left;${styles.border}${styles.padding}">${index+1}</td>
                <td style="width:40%;text-align:left;${styles.border}${styles.padding}">${sale.salesOrderProductName}</td>
                <td style="width:20%;text-align:left;${styles.border}${styles.padding}">${currencyFormatter(sale.salesOrderPrice)}</td>
                <td style="width:15%;text-align:left;${styles.border}${styles.padding}">${sale.salesOrderQuantity}</td>
                <td style="width:20%;text-align:left;${styles.border}${styles.padding}">${currencyFormatter(sale.salesOrderAmount)}</td>
            </tr>
        `;
    });
    

    content_vlue+=`
                            <tr>
                                <td colspan="4" style="text-align:right;${styles.border}${styles.padding}">Total</td>
                                <td colspan="1" style="text-align:left;${styles.border}${styles.padding}">${currencyFormatter(data.total)}</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align:right;${styles.border}${styles.padding}">Amount</td>
                                <td colspan="1" style="text-align:left;${styles.border}${styles.padding}">${currencyFormatter(userAmount)}</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="font-weight:bolder;text-align:right;${styles.border}${styles.padding}">Change</td>
                                <td colspan="1" style="text-align:left;${styles.border}${styles.padding}">${currencyFormatter(balance)}</td>
                            </tr>
                        </tbody>
                    </table><br>
                    <p>Served by:${data.cashier}</p>
                    <p>At ${currentTime()}</p>
                    <h3>Welcome again!</h3>`;

    let docprint=window.open("","",disp_setting); 
    docprint.document.open(); 
    docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
    docprint.document.write(content_vlue); 
    docprint.document.close(); 
    docprint.focus(); 
}

const currencyFormatter = (num)=>{
    let formatter = new Intl.NumberFormat();
    return formatter.format(num);
}

const currentTime = ()=>{
    let today = new Date();
    let AMPM = today.getHours()>=12?"PM":"AM";
    return `${today.getHours()}:${today.getMinutes()}:${today.getSeconds()} ${AMPM}`;
}

let deleteItem = (index)=>{
    cart.removeItem(index);
    items.innerHTML = generateHtml.cartHtml(cart.cartItems);
    cartTotalAmount.innerHTML = "Ksh."+currencyFormatter(cart.cartTotal());
}

let decrease = (index)=>{
    cart.updateItem(index,"DEC");
    items.innerHTML = generateHtml.cartHtml(cart.cartItems);
    cartTotalAmount.innerHTML = "Ksh."+currencyFormatter(cart.cartTotal());
}

let quantityInput = (index)=>{
    cart.updateItem(index,"TYPED",this.event.target.value);
    items.innerHTML = generateHtml.cartHtml(cart.cartItems);
    cartTotalAmount.innerHTML = "Ksh."+currencyFormatter(cart.cartTotal());
}

let increase = (index)=>{
    cart.updateItem(index,"INC");
    items.innerHTML = generateHtml.cartHtml(cart.cartItems);
    cartTotalAmount.innerHTML = "Ksh."+currencyFormatter(cart.cartTotal());
}

clearCart.addEventListener("click",(e)=>{
    cart.clearCart();
    items.innerHTML = generateHtml.cartHtml(cart.cartItems);
    cartTotalAmount.innerHTML = "Ksh."+currencyFormatter(cart.cartTotal());
})


