<!doctype html>
<html lang="zh-Hant-TW">

<head>
  <link rel="stylesheet" href="<?php echo CSS_DIR ?>bootstrap.min.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>資料整理系統</title>
  <title>User Table</title>
</head>

<body class="">
  <div class="container">
    <div class="d-flex justify-content-end m-3">
      <button type="button" class="btn btn-primary" onclick="logout()">logout</button>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">User name</th>
          <th scope="col">Password</th>
          <th scope="col">Created time</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($res as $val) : ?>
          <tr>
            <th scope="row">
              <?php echo $val['id']; ?>
            </th>
            <td>
              <?php echo  $val['user']; ?>
            </td>
            <td>
              <?php echo  $val['pass']; ?>
            </td>
            <td>
              <?php echo  $val['create_at']; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <script defer src="https://use.fontawesome.com/releases/v5.9.0/js/all.js" integrity="sha384-7Gk1S6elg570RSJJxILsRiq8o0CO99g1zjfOISrqjFUCjxHDn3TmaWoWOqt6eswF" crossorigin="anonymous"></script>
  <script src="<?php echo JS_DIR ?>jquery-3.3.1.slim.min.js"> </script>
  <script src="<?php echo JS_DIR ?>popper.min.js"> </script>
  <script src="<?php echo JS_DIR ?>bootstrap.min.js"> </script>
  <script src="<?php echo JS_DIR ?>my.js"> </script>
</body>

</html>