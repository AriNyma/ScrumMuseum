
// eventlistener to logout button + simple function to direct user to logon site
const inputSubmit = document.getElementById("logout");
inputSubmit.addEventListener("click", logout);

function logout() {
    window.alert("LOGGED OUT");
    window.location = 'http://www.cc.puv.fi/~e2203051/ketterat/museo/index.php';
}

// getting data json from museodata csv file through get_data.php
// set museonames and ids as an array to send to function as arguments

const sites = ["museo1", "museo2", "museo3", "museo4", "admin"];
const museoID = ["mid1", "mid2", "mid3", "mid4", "mids"];

for (var i = 0; i < sites.length; i++) {
    // check for site to display right chart
    if (window.location.toString().includes(sites[i])) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            const myObj = JSON.parse(this.responseText);
        
            //console.log(myObj);
            
            //call function to draw chart on screen
            museum_sales(myObj, museoID[i]);
    
        }
        xmlhttp.open("GET", "get_data.php", true);
        xmlhttp.send();
        break;
    }
}

function museum_sales(data, museoID) {
    console.log(data);
    var mid1 = 0, mid2 = 0, mid3 = 0, mid4 = 0, mids = 0;

    // counts sales from JSON data
    for (var i = 0; i < data.length; i++) {
        
        if (data[i].museoID == "mid1") {
            mid1++; 
            mids++;
        }
        else if (data[i].museoID == "mid2") {
            mid2++; 
            mids++; 
        }
        else if (data[i].museoID == "mid3") {
            mid3++;
            mids++; 
        }              
        else if (data[i].museoID == "mid4") {
            mid4++;
            mids++; 
        } 
        
        console.log(data[i].museoID);
    }

    const chart_canvas = document.getElementById('chartscreen');

    new Chart(chart_canvas, {
      type: 'bar',
      data: {
        labels: ['mid1', 'mid2', 'mid3', 'mid4', 'mids'],
        datasets: [{
          label: 'Number of Sales',
          data: [mid1, mid2, mid3, mid4, mids],
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