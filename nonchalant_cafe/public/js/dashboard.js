// SIDEBAR TOOGLE

var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");

function openSidebar() {
    if (!sidebarOpen) {
        sidebar.classList.add("sidebar-responsive");
        sidebarOpen = true;
    }
}

function closeSidebar() {
    if (sidebarOpen) {
        sidebar.classList.remove("sidebar-responsive");
        sidebarOpen = false;
    }
}

//  LOGOUT TOOGLE

function subMenu() {
    const submenu = document.getElementById("submenu");
    submenu.classList.toggle("open-menu");
}

// SIDEBAR ITEM ACTIVE

var currentPage = window.location.pathname;
console.log("Current page:", currentPage);

document.querySelectorAll(".sidebar-list-item a").forEach(link => {
        if (currentPage.endsWith(link.getAttribute("href"))) {
            link.parentElement.classList.add("active");
}
    }
)

// --------------CHARTS-----------

// BAR CHART

var barChartOptions = {
          series: [{
          data: [250, 200, 175, 150, 100]
        }],
          chart: {
          type: 'bar',
          height: 350,
          toolbar: {
            show: false
          }
        },
        colors: [
            "#5a321d",
            "#5a321d",
            "#5a321d",
            "#5a321d",
            "#5a321d"
        ],
        plotOptions: {
          bar: {
            borderRadius: 4,
            borderRadiusApplication: 'end',
            horizontal: false,
            columnWidht: "40%",
          }
        },
        dataLabels: {
          enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
          categories: [ "Hot Cappuccino", "Hot Americano", "Hot Chocolate", "Hot Matcha", "Croissant"
          ],
        },
        yaxis: {
            title: {
                text : "Count" 
            }
        }
        };

        var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
        barChart.render();


// LINE CHART

var lineChartOptions = {
          series: [{
            name: "Sales Order",
            data: [10000, 20000, 15000, 18000, 25000, 23000, 30000, 35000, 33000]
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          },
          toolbar: {
            show: false
          }
        },
        colors: [ "#5a321d", "#f6f0ed"
        ],
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        title: {
          text: 'Sales Order by Month',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], 
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        }
        };

        var lineChart = new ApexCharts(document.querySelector("#line-chart"), lineChartOptions);
        lineChart.render();