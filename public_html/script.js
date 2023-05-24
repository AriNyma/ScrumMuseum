
// eventlistener to logout button + simple function to direct user to logon site
const inputSubmit = document.getElementById("logout");
const data_button1 = document.getElementById("data_button1");
const data_button2 = document.getElementById("data_button2");
const data_button3 = document.getElementById("data_button3");

inputSubmit.addEventListener("click", logout);
data_button1.addEventListener("click", show_employee_sales);
data_button2.addEventListener("click", show_daily_visitors);
data_button3.addEventListener("click", show_sold_ticket_types);


function logout() {
    window.alert("LOGGED OUT");
    //window.location = 'http://www.cc.puv.fi/~e2203060/ketterat/museo/index.php';
    window.location = 'http://www.cc.puv.fi/~e2203051/ketterat/museo/index.php';
}

// getting data json from museodata csv file through get_data.php
// set museonames and ids as an array to send to function as arguments

const sites = ["museo1", "museo2", "museo3", "museo4"];
const museoID = ["mid1", "mid2", "mid3", "mid4"];


// sort json by key-value pair
function sortByProperty(property){  
    return function(a,b){  
       if(a[property] > b[property])  
          return 1;  
       else if(a[property] < b[property])  
          return -1;  
   
       return 0;  
    }  
}

for (var i = 0; i < sites.length; i++) {
    // check for site to display right chart
    if (window.location.toString().includes(sites[i])) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            const myObj = JSON.parse(this.responseText);
        
            //console.log(myObj);
            
            //call function to draw chart on screen
            cashier_sales(myObj, museoID[i]);
        }
        xmlhttp.open("GET", "get_data.php", true);
        xmlhttp.send();
        break;
    }
}


//cashier id sales chart

function cashier_sales(data, museoID) {
    console.log(data);
    var eid1 = 0, eid2 = 0, eid3 = 0, eid4 = 0, eid5 = 0, eid6 = 0, eid7 = 0;

    // counts sales from JSON data
    for (var i = 0; i < data.length; i++) {
        
        if (data[i].cashierID == "eid1" && data[i].museoID == museoID) {
            eid1++; 
        }
        else if (data[i].cashierID == "eid2" && data[i].museoID == museoID) {
            eid2++;  
        }
        else if (data[i].cashierID == "eid3" && data[i].museoID == museoID) {
            eid3++; 
        }              
        else if (data[i].cashierID == "eid4" && data[i].museoID == museoID) {
            eid4++; 
        } 
        else if (data[i].cashierID == "eid5" && data[i].museoID == museoID) {
            eid5++;     
        } 
        else if (data[i].cashierID == "eid6" && data[i].museoID == museoID) {
            eid6++;
        } 
        else if (data[i].cashierID == "eid7" && data[i].museoID == museoID) {
            eid7++;
        } 
        
        //console.log(data[i].cashierID);
    }

    const chart_canvas = document.getElementById('chartscreen');

    new Chart(chart_canvas, {
      type: 'bar',
      data: {
        labels: ['eid1', 'eid2', 'eid3', 'eid4', 'eid5', 'eid6', 'eid7'],
        datasets: [{
          label: 'Number of Sales',
          data: [eid1, eid2, eid3, eid4, eid5, eid6, eid7],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    })

//console.log(data);
}


function show_employee_sales() {
    //clear chartscreen before drawing new
    let chartStatus = Chart.getChart("chartscreen");
    if (chartStatus != undefined) {
        chartStatus.destroy();
        //(or)
        // chartStatus.clear();
    }

    // hide date filters when not in use. this function does not use dates
    document.querySelector("#datepicker").style.visibility = "hidden"; 

    for (var i = 0; i < sites.length; i++) {
        // check for site to display right chart
        if (window.location.toString().includes(sites[i])) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                const myObj = JSON.parse(this.responseText);
            
                //console.log(myObj);
                
                //call function to draw chart on screen
                cashier_sales(myObj, museoID[i]);
        
            }
            xmlhttp.open("GET", "get_data.php", true);
            xmlhttp.send();
            break;
        }
    }

}

function ticket_type(data, museoID) {
  console.log(data);
  var NormTicket = 0, DiscTicket = 0, ChilTicket = 0;

  // counts sales from JSON data
  for (var i = 0; i < data.length; i++) {
      
      if (data[i].ticketType == "NormTicket 12" && data[i].museoID == museoID) {
          NormTicket++; 
      }
      else if (data[i].ticketType == "DiscTicket 10" && data[i].museoID == museoID) {
          DiscTicket++;  
      }
      else if (data[i].ticketType == "ChilTicket 06" && data[i].museoID == museoID) {
          ChilTicket++; 
      }              
  }

  const chart_canvas = document.getElementById('chartscreen');

  new Chart(chart_canvas, {
    type: 'pie',
    data: {
      labels: ['Normal ticket', 'Discount ticket', 'Child ticket'],
      datasets: [{
        label: 'Ticket type',
        data: [NormTicket, DiscTicket, ChilTicket],
        backgroundColor: [
          'rgba(255, 99, 132, 0.7)', // Normal ticket color
          'rgba(54, 162, 235, 0.7)', // Discount ticket color
          'rgba(255, 206, 86, 0.7)' // Child ticket color
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)', // Normal ticket border color
          'rgba(54, 162, 235, 1)', // Discount ticket border color
          'rgba(255, 206, 86, 1)' // Child ticket border color
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
}

function show_sold_ticket_types(){
  //clear chartscreen before drawing new
  let chartStatus = Chart.getChart("chartscreen");
  if (chartStatus != undefined) {
      chartStatus.destroy();
      //(or)
      // chartStatus.clear();
  }

  // hide date filters when not in use. this function does not use dates
  document.querySelector("#datepicker").style.visibility = "hidden"; 

  for (var i = 0; i < sites.length; i++) {
      // check for site to display right chart
      if (window.location.toString().includes(sites[i])) {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onload = function() {
              const myObj = JSON.parse(this.responseText);
          
              //console.log(myObj);
              
              //call function to draw chart on screen
              ticket_type(myObj, museoID[i]);
      
          }
          xmlhttp.open("GET", "get_data.php", true);
          xmlhttp.send();
          break;
      }
  }
}

function show_daily_visitors() {
        //clear chartscreen before drawing new
    let chartStatus = Chart.getChart("chartscreen");
    if (chartStatus != undefined) {
        chartStatus.destroy();
        //(or)
        // chartStatus.clear();
    }

    for (var i = 0; i < sites.length; i++) {
        // check for site to display right chart
        if (window.location.toString().includes(sites[i])) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                const myObj = JSON.parse(this.responseText);
            
                //console.log(myObj);
                
                //call function to draw chart on screen
                sort_visitor_data(myObj, museoID[i]);
        
            }
            xmlhttp.open("GET", "get_data.php", true);
            xmlhttp.send();
            break;
        }
    }

}

function sort_visitor_data(data, museoID) {

    var dates = [];
    var values = [];
  
    data.sort(sortByProperty("time"));
    //console.log(data);
  
    let counter = 0;
    for (var i = 0; i < data.length; i++) {
        if (data[i].museoID == museoID) {

        
            var timestamp = data[i].time;
            if (dates.includes(timestamp)) {
                for (var j = 0; j < dates.length; j++) {
                    if (dates[j] == timestamp) {
                    values[j]++;
                    }
                }
            }
            else {
            dates[counter] = timestamp;
            values[counter] = 1;
            counter++;
            }
        }
        else {

        }

        
    }
    console.log(dates);
    console.log(values);
  
    const chart_canvas = document.getElementById('chartscreen');
    
    myChart = new Chart(chart_canvas, {
      type: 'bar',
      data: {
        labels: dates,
        datasets: [{
          label: 'TOTAL VISITORS PER DAY',
          data: values,
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    })
    // if this chart is used which contains dates we create eventlistener to filter data
    // and show correct buttons
    document.querySelector("#datepicker").style.visibility = "visible"; 
    const filter_button = document.getElementById("filter_button");
    filter_button.addEventListener("click", filter_results_by_date);
    // create clear button to reload chart
    const clear_button = document.getElementById("clear_button");
    clear_button.addEventListener("click", show_daily_visitors); 
  
  //console.log(data);
  }


  function filter_results_by_date() {
    // get current status of chart and modify data to be displayed according to user dates.
    let chartStatus = Chart.getChart("chartscreen");
    const start = document.getElementById("start_date").value;
    const end = document.getElementById("end_date").value;
    var new_dates = [];
    var new_values = [];
    index_counter = 0;
    value_index_counter = 0;
    //console.log (chartStatus.data.labels);
    //console.log (start);
    //console.log (chartStatus.data.datasets[0].data);
    //console.log (end);
    chartStatus.data.labels.forEach(element => {
      if (element < end && element > start) {
        new_dates[index_counter] = element;
        new_values[index_counter] = chartStatus.data.datasets[0].data[value_index_counter];
        index_counter++;
        value_index_counter++;
      }
      else {
        value_index_counter++;
      }  
    });
    chartStatus.data.datasets[0].data = new_values;
    chartStatus.data.labels = new_dates;
    chartStatus.update();
  
    //console.log(new_dates);
    //console.log(new_values);
  }

  
