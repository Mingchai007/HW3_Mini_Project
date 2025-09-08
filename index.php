<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pxelnetwork</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
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


  <?= include 'assets/component/footer.php'; ?>

  <script>
    // Auto update year
    document.getElementById("currentYear").textContent = new Date().getFullYear();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
</body>

</html>