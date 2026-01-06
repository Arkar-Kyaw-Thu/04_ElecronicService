<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/design.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
  <div class="grid-container">
<?php include "admin_header.php" ?>
    <main class="main-container">
      <div style="display: flex;align-items: center;justify-content: center;min-height: 75vh;">
        <div class="wrapper user-wrapper">
          <section class="users">
            <div class="search">
              <span class="text">Select an user to start chat</span>
              <input type="text" placeholder="Enter name to search...">
              <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
  
            </div>
          </section>
        </div>
      </div>
    </main>
  </div>

  <script src="javascript/users.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
  <script src="javascript/scripts.js"></script>

</body>
</html>
