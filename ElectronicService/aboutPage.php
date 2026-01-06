<!DOCTYPE html>
<?php
include_once('header.php');
include "php/db_conn.php";
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<style type="text/css">
.grid-container {
  display: grid;
  width: 100%;
  height: 75vh;
}
.main-container {
  grid-area: main;
  overflow-y: auto;
  padding: 20px 20px;
  color: black;
}
.history-main-card{
  display: grid;
  grid-template-columns: 1fr;
  gap: 20px;
  margin-top: 5%;
  margin-right: 500px;
}

.history-main-card a{
  text-decoration: none;
  color: black;
}
.history-card {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 10px 40px;
  border: 1px solid black;
  border-radius: 20px;
}

.history-card-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.history-card:hover{
  box-shadow: 5px 6px 6px 4px rgba(0,0,0,0.3);
}
.active{
  height: 70px;
  overflow: hidden;
}
	</style>
</head>
<body>
	<div class="grid-container">
    <main class="main-container">
        <div class="history-main-card">
  <?php
    $query="SELECT * FROM post order by date desc;";
    $result=mysqli_query($conn,$query);
    while ($row=mysqli_fetch_assoc($result)) {
      
  ?>
          <div class="history-card" style="width: 350px;">
            <div onclick="clickto(<?=$row['oid']?>)">
              <div class="history-card-inner">
                <p></p>
                <p><?=$row['date']?></p>
              </div>
              <div class="history-card-inner">
                <img src="images/post/<?=$row['post_img']?>" style="width: 100%;">
              </div>
              <div class="history-card-inner">
                <p class="active" id="<?=$row['oid']?>"><?=$row['post_description']?></p>
              </div>
            </div>
          <?php if(strlen($row['post_description'])>200){ ?>
            <p onclick="clickme(<?=$row['oid']?>)">see more....</p>
          <?php } ?>
          </div>
  <?php } ?>
        </div>
    </main>
    <div style="border: height: 75vh;position: absolute;left: 60%;">
      <img src="images/about.jpg" style="width:100%;height: 100%;">
    </div>
      <!-- End Main -->
  </div>
	<?php include_once('footer.php');?>
  <script type="text/javascript">
    function clickme(num){
      var a=document.getElementById(num);
      a.classList.remove("active");
    }
    function clickto(num){
      var a=document.getElementById(num);
      a.classList.add("active");
    }

  </script>
</body>
</html>