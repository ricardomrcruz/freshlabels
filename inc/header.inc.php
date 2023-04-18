<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, orientation=landscape">
    <title>Food Safety Labels</title>

    <!-- main style sheet -->

    <link rel="stylesheet" href="assets/css/style.css">

    <!--font awesome-->
    
    <script src="https://kit.fontawesome.com/e7ee09d895.js" crossorigin="anonymous"></script>


    <!--fontawesome-->
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <!-- script js nav highlights-->
    <script defer src="./assets/js/activeNav.js"></script>
    
    
    <!-- script js nav popup-->
    <script defer src="./assets/js/popup.js"></script>


    

    
    <!-- google charts -->

    <!-- DONUT CATEGORIES CHART --> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"  >
       
      
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = google.visualization.arrayToDataTable([    ['Category', 'Nº Products Used'],
        ['Condimentation', <?php echo $_SESSION['user']['clicks'][1]; ?>],
        ['Meat', <?php echo $_SESSION['user']['clicks'][2]; ?>],
        ['Bread', <?php echo $_SESSION['user']['clicks'][3]; ?>],
        ['Sauces', <?php echo $_SESSION['user']['clicks'][4]; ?>],
        ['Drinks', <?php echo $_SESSION['user']['clicks'][5]; ?>],
        ['Deserts', <?php echo $_SESSION['user']['clicks'][6]; ?>],
        ['Others', <?php echo $_SESSION['user']['clicks'][7]; ?>]
    ]);


        var options = {
          title: 'Daily Product Usage per category',
          is3D: true,
          backgroundColor: 'transparent',
          colors: ['#54873a', '#AD4132', '#e3a80b', '#d8a88b', '#3e5e6e', '#756382', '#9ca8b5']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    <!-- COLUMN PRODUCT CHART -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Copper", <?php echo $_SESSION['user']['clicks'][1];?>, 'color: #54873a; opacity: 0.8'],
        ["Silver", 1, 'color: #54873a; opacity: 0.8'],
        ["Gold", 2, 'color: #54873a; opacity: 0.8'],
        ["Platinum", 3, 'color: #54873a; opacity: 0.8'],
        ["Platinum", 1, 'color: #54873a; opacity: 0.8'],
        ["Platinum", 1, 'color: #54873a; opacity: 0.8'],
        ['2030', 2, 'color: #54873a; opacity: 0.8']
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Daily Product Usage",
        backgroundColor: 'transparent',
        width: 600,
        height: 400,
        bar: {groupWidth: "45%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
    

</head>


<body class="flex" >
