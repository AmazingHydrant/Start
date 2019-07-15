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
    <!-- Cust table -->
    <table class="table table-hover table-striped table-sm">
      <thead>
        <tr class="text-nowrap">
          <th scope="col">#</th>
          <th scope="col">公司名稱</th>
          <th scope="col">產業類別</th>
          <th scope="col">員工人數</th>
          <th scope="col">資本額</th>
          <th scope="col">縣市</th>
          <th scope="col">公司網站</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($custInfo as $val) : ?>
          <tr class="text-nowrap" id="<?php echo $val['id']; ?>">
            <th scope="row edit">
              <!-- edit class must on sencend -->
              <div class="id edit">
                <?php echo $val['id']; ?>
              </div>
            </th>
            <td class="edit custName">
              <div class="text-truncate wrap" style="width:15rem">
                <?php echo $val['custName']; ?>
              </div>
            </td>
            <td class="edit indcatTreeDesc">
              <?php echo explode(' > ', $val['indcatTreeDesc'])[1]; ?>
            </td>
            <td class="edit custEmployeeDesc">
              <?php echo $val['custEmployeeDesc']; ?>
            </td>
            <td class="edit custCapitalDesc">
              <?php echo $val['custCapitalDesc']; ?>
            </td>
            <td class="edit areaDesc">
              <?php echo $val['areaDesc']; ?>
            </td>
            <td class="edit custWebSite">
              <div class="text-truncate wrap" style="width:15rem">
                <a href="<?php echo  $val['custWebSite']; ?>" target="_blank"><?php echo $val['custWebSite']; ?></a>
              </div>
            </td>
            <td>
              <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                <!-- edit class must on sencend -->
                <button type="button" class="btn edit btn-secondary">編輯</button>
                <button type="button" class="btn delete btn-secondary">刪除</button>
                <button type="button" class="btn btn-secondary">送出</button>
              </div>
            </td>
            <td class="d-none profile">
              <?php echo  $val['profile']; ?>
            </td>
            <td class="d-none product">
              <?php echo  $val['product']; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <!-- Pagination -->
    <div class="d-flex justify-content-center">
      <?php echo $pagination ?>
    </div>
    <div class="d-flex justify-content-center">
      <?php echo "第{$page}頁 共{$totalPage}頁" ?>
    </div>
  </div>

  <!-- edit Modal -->
  <div class="modal fade" id="editModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLongTitle" index="">編輯</h5>
          <button type="button" class="close editModalClose" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">公司名稱</span>
            </div>
            <input type="text" class="form-control editInput" id="custNameInput">
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">公司簡介</span>
            </div>
            <textarea class="form-control editInput" id="profileInput"></textarea>
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">產品服務</span>
            </div>
            <textarea class="form-control editInput" id="productInput"></textarea>
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">產業類別</span>
            </div>
            <input type="text" class="form-control editInput" id="indcatTreeDescInput">
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">員工人數</span>
            </div>
            <input type="text" class="form-control editInput" id="custEmployeeDescInput">
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">資本額</span>
            </div>
            <input type="text" class="form-control editInput" id="custCapitalDescInput">
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">縣市</span>
            </div>
            <input type="text" class="form-control editInput" id="areaDescInput">
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">公司網站</span>
            </div>
            <input type="text" class="form-control editInput" id="custWebSiteInput">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary editModalClose">Close</button>
          <button type="button" class="btn btn-primary" id="save">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Alert Modal -->
  <div class="modal fade" id="alertModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="alertModalLabel">提醒</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body bg-warning">
          關閉視窗修改內容將不會保存
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
          <button type="button" class="btn btn-primary alertModalYes">確定</button>
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
  <script src="<?php echo JS_DIR ?>table.js"> </script>
</body>

</html>