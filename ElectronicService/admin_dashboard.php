<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/admin.css">
  </head>
<body>
	<div class="grid-container">
<?php
  include "admin_header.php";

  $tincome = 0;
  $income = 0;
  $order = 0;
  $newOrder = 0;

  $query = "SELECT * FROM history;";
  $result = mysqli_query($conn,$query);
  while($col = mysqli_fetch_assoc($result)){
    $pid = $col['pid'];
    $eid = $col['eid'];
    $query1 = "SELECT product_price FROM product WHERE pid='$pid';";
    $result1 = mysqli_query($conn,$query1);
    $col1 = mysqli_fetch_assoc($result1);
    $price = $col1['product_price'];

    if($eid == 0){
      $tincome += $price;
    }
    else if($eid != 0){
      $query2 = "SELECT comfirm_price FROM notification WHERE eid='$eid';";
      $result2 = mysqli_query($conn,$query2);
      $col2 = mysqli_fetch_assoc($result2);
      $cprice = $col2['comfirm_price'];
      $tincome += $price-$cprice;
    }
  }
  $que = "SELECT sum(price) FROM service_hisory;";
  $res = mysqli_query($conn,$que);
  $col2 = mysqli_fetch_assoc($res);
  $tincome += $col2['sum(price)'];
  //total income

  $today = date('-m-');
  $query = "SELECT * FROM history WHERE date like '%$today%';";
  $result = mysqli_query($conn,$query);
  while($col = mysqli_fetch_assoc($result)){
    $pid = $col['pid'];
    $eid = $col['eid'];
    $query1 = "SELECT product_price FROM product WHERE pid='$pid';";
    $result1 = mysqli_query($conn,$query1);
    $col1 = mysqli_fetch_assoc($result1);
    $price = $col1['product_price'];

    if($eid == 0){
      $income += $price;
    }
    else if($eid != 0){
      $query2 = "SELECT comfirm_price FROM notification WHERE eid='$eid';";
      $result2 = mysqli_query($conn,$query2);
      $col2 = mysqli_fetch_assoc($result2);
      $cprice = $col2['comfirm_price'];
      $income += $price-$cprice;
    }
  }
  $que = "SELECT sum(price) FROM service_hisory WHERE date like '%$today%';;";
  $res = mysqli_query($conn,$que);
  $col2 = mysqli_fetch_assoc($res);
  $income += $col2['sum(price)'];
  // income

  $que1 = "SELECT * FROM exchange;";
  $res1 = mysqli_query($conn,$que1);
  $order = mysqli_num_rows($res1);
  // number of order

  $que2 = "SELECT * FROM exchange WHERE status='uncomfirm';";
  $res2 = mysqli_query($conn,$que2);
  $newOrder = mysqli_num_rows($res2);
  // number of new order
?>
	  <main class="main-container">
        <div class="main-title">
          <h2>DASHBOARD</h2>
        </div>

        <div class="main-cards">
          <a href="#">
            <div class="card" style="background: #;">
              <div class="card-inner">
                <h3>Total Income</h3>
                <span class="material-icons-outlined">paid</span>
              </div>
              <h1 style="color: green;">+<?=$tincome?></h1>
            </div>
          </a>

          <a href="#">
            <div class="card" style="background: #;">
              <div class="card-inner">
                <h3>Income</h3>
                <span class="material-icons-outlined">paid</span>
              </div>
              <h1 style="color:blueviolet;">+<?=$income?></h1>
            </div>
          </a>

          <a href="#">
            <div class="card" style="background: #;">
              <div class="card-inner">
                <h3>Exchange Order</h3>
                <span class="material-icons-outlined">work_history</span>
              </div>
              <div class="card-inner">
                <h1><?=$order?></h1>
<?php if($newOrder>0){ ?>
                <h1 style="color:red;">new <?=$newOrder?></h1>
<?php } ?>
              </div>
            </div>
          </a>

        </div>

        <div class="charts">

          <div class="charts-card">
            <h2 class="chart-title" style="color:white;">Products</h2>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <h2 class="chart-title" style="color:white;">Sales Orders Per Month</h2>
            <div id="area-chart"></div>
          </div>

        </div>
      </main>
      <!-- End Main -->
	</div>
<?php
  $que1 = "SELECT * FROM history WHERE pid in(SELECT pid FROM product WHERE product_category='Aircon');";
  $res1 = mysqli_query($conn,$que1);
  $order1 = mysqli_num_rows($res1);

  $que2 = "SELECT * FROM history WHERE pid in(SELECT pid FROM product WHERE product_category='Tv');;";
  $res2 = mysqli_query($conn,$que2);
  $order2 = mysqli_num_rows($res2);

  $que3 = "SELECT * FROM history WHERE pid in(SELECT pid FROM product WHERE product_category='Refrigetor');";
  $res3 = mysqli_query($conn,$que3);
  $order3 = mysqli_num_rows($res3);

  $que4 = "SELECT * FROM history WHERE pid in(SELECT pid FROM product WHERE product_category='WashingMachine');";
  $res4 = mysqli_query($conn,$que4);
  $order4 = mysqli_num_rows($res4);

  $month[0] = date("m");
  $numberOrder[0] = 0; 
  for($i=0;$i<=3;$i++){
    $month[$i+1] = (int)$month[$i]-1;
    if($month[$i+1]<1){
      $month[$i+1]=12;
    }
    else if($month[$i+1]<10){
      $month[$i+1]="0".$month[$i+1];

    }
    $mon = "-".$month[$i]."-";
    $que = "SELECT * FROM history WHERE date like '%$mon%';";
    $res = mysqli_query($conn,$que);
    $numberOrder[$i] = mysqli_num_rows($res);
  }


?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
	<script>
// SIDEBAR TOGGLE

let sidebarOpen = false;
const sidebar = document.getElementById('sidebar');

function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add('sidebar-responsive');
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove('sidebar-responsive');
    sidebarOpen = false;
  }
}

// ---------- CHARTS ----------

// BAR CHART
const barChartOptions = {
  series: [
    {
      data: [<?=$order1?>, <?=$order2?>, <?=$order3?>, <?=$order4?>],
      name: 'Products',
    },
  ],
  chart: {
    type: 'bar',
    background: 'transparent',
    height: 350,
    toolbar: {
      show: false,
    },
  },
  colors: ['#2962ff', '#d50000', '#2e7d32', '#ff6d00', '#583cb3'],
  plotOptions: {
    bar: {
      distributed: true,
      borderRadius: 4,
      horizontal: false,
      columnWidth: '40%',
    },
  },
  dataLabels: {
    enabled: false,
  },
  fill: {
    opacity: 1,
  },
  grid: {
    borderColor: '#55596e',
    yaxis: {
      lines: {
        show: true,
      },
    },
    xaxis: {
      lines: {
        show: true,
      },
    },
  },
  legend: {
    labels: {
      colors: '#f5f7ff',
    },
    show: true,
    position: 'top',
  },
  stroke: {
    colors: ['transparent'],
    show: true,
    width: 2,
  },
  tooltip: {
    shared: true,
    intersect: false,
    theme: 'dark',
  },
  xaxis: {
    categories: ['Aircon', 'Tv', 'Refrigetor', 'WashingMachine'],
    title: {
      style: {
        color: '#f5f7ff',
      },
    },
    axisBorder: {
      show: true,
      color: '#55596e',
    },
    axisTicks: {
      show: true,
      color: '#55596e',
    },
    labels: {
      style: {
        colors: '#f5f7ff',
      },
    },
  },
  yaxis: {
    title: {
      text: 'Count',
      style: {
        color: '#f5f7ff',
      },
    },
    axisBorder: {
      color: '#55596e',
      show: true,
    },
    axisTicks: {
      color: '#55596e',
      show: true,
    },
    labels: {
      style: {
        colors: '#f5f7ff',
      },
    },
  },
};

const barChart = new ApexCharts(
  document.querySelector('#bar-chart'),
  barChartOptions
);
barChart.render();

// AREA CHART
const areaChartOptions = {
  series: [
    {
      name: 'Sales Orders',
      data: ['<?=$numberOrder[3]?>', '<?=$numberOrder[2]?>', '<?=$numberOrder[1]?>', '<?=$numberOrder[0]?>'],
    },
  ],
  chart: {
    type: 'area',
    background: 'transparent',
    height: 350,
    stacked: false,
    toolbar: {
      show: false,
    },
  },
  colors: ['#00ab57', '#d50000'],
  labels: ['<?=$month[3]?>', '<?=$month[2]?>', '<?=$month[1]?>', '<?=$month[0]?>'],
  dataLabels: {
    enabled: false,
  },
  fill: {
    gradient: {
      opacityFrom: 0.4,
      opacityTo: 0.1,
      shadeIntensity: 1,
      stops: [0, 100],
      type: 'vertical',
    },
    type: 'gradient',
  },
  grid: {
    borderColor: '#55596e',
    yaxis: {
      lines: {
        show: true,
      },
    },
    xaxis: {
      lines: {
        show: true,
      },
    },
  },
  legend: {
    labels: {
      colors: '#f5f7ff',
    },
    show: true,
    position: 'top',
  },
  markers: {
    size: 6,
    strokeColors: '#1b2635',
    strokeWidth: 3,
  },
  stroke: {
    curve: 'smooth',
  },
  xaxis: {
    axisBorder: {
      color: '#55596e',
      show: true,
    },
    axisTicks: {
      color: '#55596e',
      show: true,
    },
    labels: {
      offsetY: 5,
      style: {
        colors: '#f5f7ff',
      },
    },
  },
  yaxis: [
    {
      title: {
        text: 'Sales Orders',
        style: {
          color: '#f5f7ff',
        },
      },
      labels: {
        style: {
          colors: ['#f5f7ff'],
        },
      },
    },
    /*{
      opposite: true,
      title: {
        text: 'Sales Orders',
        style: {
          color: '#f5f7ff',
        },
      },
      labels: {
        style: {
          colors: ['#f5f7ff'],
        },
      },
    },*/
  ],
  tooltip: {
    shared: true,
    intersect: false,
    theme: 'dark',
  },
};

const areaChart = new ApexCharts(
  document.querySelector('#area-chart'),
  areaChartOptions
);
areaChart.render();
 
  </script>
</body>
</html>