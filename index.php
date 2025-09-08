<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pixelnetwork Studio</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/card.css">
  <link rel="stylesheet" href="assets/css/navbar.css">
  <link rel="stylesheet" href="assets/css/course.css">
</head>

<body>

  <section>
    <?php include 'assets/component/navbar.php'; ?>
  </section>
  <?php
    if (!isset($_GET['page'])) {
      header("Location: ?page=Home");
      exit();
    }
  ?>

  <main>
    <?php
    if (isset($_GET['page'])) {
      switch ($_GET['page']) {
        case 'Home':
          include 'assets/page/Home.php';
          break;
        case 'About':
          include 'assets/page/About.php';
          break;
        case 'Setting':
          include 'assets/page/Setting.php';
          break;
        default:
          include 'assets/page/Home.php';
          break;

      }
    }
    ?>
  </main>


  <?php include 'assets/component/footer.php'; ?>

  <script>
    // Auto update year
    document.getElementById("currentYear").textContent = new Date().getFullYear();

    document.getElementById("toastbtn").onclick = function() {
      var toastElList = [].slice.call(document.querySelectorAll('.toast'))
      var toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl)
      })
      toastList.forEach(toast => toast.show()) 
    }
  </script>

  
  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
  
</body>

</html>