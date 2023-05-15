
// eventlistener to logout button + simple function to direct user to logon site
const inputSubmit = document.getElementById("logout");
inputSubmit.addEventListener("click", logout);

function logout() {
    window.alert("LOGGED OUT");
    window.location = 'http://www.cc.puv.fi/~e2203060/ketterat/museo/index.php';
}

// getting data json from museodata csv file through get_data.php
// set museonames and ids as an array to send to function as arguments

const sites = ["museo1", "museo2", "museo3", "museo4"];
const museoID = ["mid1", "mid2", "mid3", "mid4"];

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
        
        console.log(data[i].cashierID);
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

console.log(data);
}




