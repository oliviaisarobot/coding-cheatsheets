<html>
<body>
  <?php

    $preset = 'pink';

    if (isset($_POST['set'])) {
      $preset = $_POST['value'];
    }

   ?>

  <div class="wrapper">

    <p>
      Type the name of a color you like:
    </p>

    <form action="colorchanger.php" method="POST">
      <input type="text" name="value" />
      <input type="submit" name="set" />
    </form>

    <div class="container"></div>

  </div>

  <style>
    body {
      font-family: Arial, sans-serif;
    }

    p {
      margin-top: 80px;
    }

    .wrapper {
      width: 100vw;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .container {
      width: 500px;
      height: 500px;
      background-color: <?= $preset ?> ;
    }
  </style>
</body>
</html>
