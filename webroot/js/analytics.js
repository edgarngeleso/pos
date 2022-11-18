let loading = document.querySelector(".loading");
let analytics = document.querySelector(".analytics");
let canvas = document.querySelector(".canvas");
let canvas1 = document.querySelector(".canvas1");
let canvas2 = document.querySelector(".canvas2");
let canvas3 = document.querySelector(".canvas3");



fetch("/analytics/analyticsData").
then(req=>req.json()).
then(data=>{
    loading.style.display = "none";
    analytics.style.display = "flex";
    createDailyChart(createDailyChartData(data.daily));
    createWeeklyChart(createWeeklyChartData(data.weekly));
    createMonthlyChart(createMonthlyChartData(data.monthly));
    createYearlyChart(createYearlyChartData(data.yearly));
}).catch(e=>{
    throw new Error(e);
})

let createDailyChartData = (data)=>{
    let output = {labels:[],dataArray:[]};
    data.forEach((sale,index)=>{
        output.labels.push(sale.saleInvoiceNumber);
        output.dataArray.push(sale.saleAmount);
    })
    return output;
}

let createDailyChart = (d)=>{
    let chartdata = {
        labels:d.labels,
        datasets:[
            {
                label:"Today's sales",
                backgroundColor:"#27ae60",
                hoverBackgroundColor:"green",
                data:d.dataArray
            }
        ],
        options:[{
            reponsive:false
        }]
    };
    
    let chart = new Chart(canvas,{
        type:"bar",
        data:chartdata
    });
}


let createWeeklyChartData = (data)=>{
    let days = ["Sunday","Monday","Tueday","Wednesday","Thursday","Friday","Saturday"];
    let output = {labels:[],dataArray:[]};
    for (let index = data.length-1; index >= 0; index--) {
        output.labels.push(days[new Date(data[index].date).getDay()]);
        output.dataArray.push(data[index].dailySaleAmount);
        
    }
    data.forEach((sale,index)=>{
        
    })
    return output;
}

let createWeeklyChart = (d)=>{
    let chartdata = {
        labels:d.labels,
        datasets:[
            {
                label:"Weekly sales",
                backgroundColor:"#27ae60",
                hoverBackgroundColor:"green",
                data:d.dataArray
            }
        ],
        options:[{
            reponsive:false
        }]
    };
    
    let chart = new Chart(canvas1,{
        type:"bar",
        data:chartdata
    });
}


let createMonthlyChartData = (data)=>{
    let output = {labels:[],dataArray:[]};
    for (let index = data.length-1; index >= 0 ; index--) {
        output.labels.push(data[index].date);
        output.dataArray.push(data[index].weeklySaleAmount);
    }
    return output;
}

let createMonthlyChart = (d)=>{
    let chartdata = {
        labels:d.labels,
        datasets:[
            {
                label:"Monthly sales",
                backgroundColor:"#27ae60",
                hoverBackgroundColor:"green",
                data:d.dataArray
            }
        ],
        options:[{
            reponsive:false
        }]
    };
    
    let chart = new Chart(canvas2,{
        type:"bar",
        data:chartdata
    });
}


let createYearlyChartData = (data)=>{
    let output = {labels:[],dataArray:[]};
    for (let index = data.length-1; index >= 0; index--) {
        output.labels.push(data[index].date);
        output.dataArray.push(data[index].monthlySaleAmount);
    }
    return output;
}

let createYearlyChart = (d)=>{
    let chartdata = {
        labels:d.labels,
        datasets:[
            {
                label:"Yearly sales",
                backgroundColor:"#27ae60",
                hoverBackgroundColor:"green",
                data:d.dataArray
            }
        ],
        options:[{
            reponsive:false
        }]
    };
    
    let chart = new Chart(canvas3,{
        type:"bar",
        data:chartdata
    });
}
