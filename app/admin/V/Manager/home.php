<!doctype html>
<html lang="zh-Hant-TW">

<head>
  <link rel="stylesheet" href="<?php echo CSS_DIR ?>bootstrap.min.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>資料整理系統</title>
  <title>Cust Info</title>
</head>

<body>
  <div class="container-fluid">
    <div class="d-flex m-3 align-items-center">
      <div class="h5 text-secondary mr-auto">
        <?php echo $_SESSION['user'] . " - 歡迎" ?>
      </div>
      <div class="">
        <button type="button" class="btn btn-light" onclick="logout()">登出</button>
      </div>
    </div>

    <table class="table table-hover table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">公司名稱</th>
          <th scope="col">員工人數</th>
          <th scope="col">資本額</th>
          <th scope="col">縣市</th>
          <th scope="col">公司網址</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($var as $val) : ?>
          <tr>
            <th scope="row">
              <?php echo $val['id']; ?>
            </th>
            <td>
              <?php echo  $val['custName']; ?>
            </td>
            <td>
              <?php echo  $val['custEmployeeDesc']; ?>
            </td>
            <td>
              <?php echo  $val['custCapitalDesc']; ?>
            </td>
            <td>
              <?php echo  $val['areaDesc']; ?>
            </td>
            <td>
              <a href="<?php echo  $val['custWebSite']; ?>" target="_blank"><?php echo $val['custWebSite']; ?></a>
            </td>
            <td>
              <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                <button type="button" class="btn edit btn-secondary">編輯</button>
                <button type="button" class="btn btn-secondary">刪除</button>
                <button type="button" class="btn btn-secondary">送出</button>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <script defer src="https://use.fontawesome.com/releases/v5.9.0/js/all.js" integrity="sha384-7Gk1S6elg570RSJJxILsRiq8o0CO99g1zjfOISrqjFUCjxHDn3TmaWoWOqt6eswF" crossorigin="anonymous"></script>
  <script src="<?php echo JS_DIR ?>jquery-3.3.1.slim.min.js"> </script>
  <script src="<?php echo JS_DIR ?>popper.min.js"> </script>
  <script src="<?php echo JS_DIR ?>bootstrap.min.js"> </script>
  <script>
    $(".edit").click(function() {
      $('#exampleModalLong').modal('show');
    });
  </script>
</body>

</html>