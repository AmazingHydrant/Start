<!doctype html>
<html lang="zh-Hant-TW">

<head>
  <link rel="stylesheet" href="<?php echo CSS_DIR ?>bootstrap.min.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>資料整理系統</title>
</head>

<body>
  <div class="container my-5 py-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-4 col-md-5 col-sm-6 text-center border border-black-50" style="border-width:3px !important">
        <form>
          <img class="my-3" src="<?php echo ICON_DIR ?>/icon.png" alt="" width="72" height="72">
          <div class="form-group">
            <label for="user">User address</label>
            <input type="text" class="form-control" id="user" aria-describedby="userHelp" placeholder="User">
            <small id="UserHelp" class="form-text text-muted">We'll never share your info with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" placeholder="Password">
          </div>
          <div class="info text-danger d-none">請檢查帳號密碼輸入無誤</div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="button" class="btn btn-primary" id="submin">Submit</button>
          <p class="mt-5 mb-3 text-muted">&copy; 2019-2019</p>
        </form>
      </div>
    </div>
  </div>
  <script defer src="https://use.fontawesome.com/releases/v5.9.0/js/all.js" integrity="sha384-7Gk1S6elg570RSJJxILsRiq8o0CO99g1zjfOISrqjFUCjxHDn3TmaWoWOqt6eswF" crossorigin="anonymous"></script>
  <script src="<?php echo JS_DIR ?>jquery-3.3.1.slim.min.js"> </script>
  <script src="<?php echo JS_DIR ?>popper.min.js"> </script>
  <script src="<?php echo JS_DIR ?>bootstrap.min.js"> </script>
  <script src="<?php echo JS_DIR ?>my.js"> </script>
</body>

</html>