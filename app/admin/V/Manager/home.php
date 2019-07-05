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
        <tr class="text-nowrap">
          <th scope="col">#</th>
          <th scope="col">公司名稱</th>
          <th scope="col">員工人數</th>
          <th scope="col">資本額</th>
          <th scope="col">縣市</th>
          <th scope="col">公司網站</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($var as $val) : ?>
          <tr class="text-nowrap">
            <th scope="row">
              <?php echo $val['id']; ?>
            </th>
            <td>
              <div class="text-truncate" style="width:15rem">
                <?php echo  $val['custName']; ?>
              </div>
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
              <div class="text-truncate" style="width:15rem">
                <a href="<?php echo  $val['custWebSite']; ?>" target="_blank"><?php echo $val['custWebSite']; ?></a>
              </div>
            </td>
            <td>
              <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                <button type="button" class="btn edit btn-secondary">編輯</button>
                <button type="button" class="btn delete btn-secondary">刪除</button>
                <button type="button" class="btn btn-secondary">送出</button>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- edit Modal -->
  <div class="modal fade" id="editModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLongTitle">編輯</h5>
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

  <!-- delete Modal -->
  <div class="modal fade" id="deleteModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title" id="deleteModalLongTitle">刪除</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger">Save changes</button>
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
      $('#editModalLong').modal('show');
    });
    $(".delete").click(function() {
      $('#deleteModalLong').modal('show');
    });
  </script>
</body>

</html>