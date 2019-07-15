<?php
class CustModel extends DBCommonModel
{
    public function getCustInfo($page = 1)
    {
        $info = $this->pdo->fetchAll("select * from custs limit " . (string) ($page - 1) * 10 . ", 10", []);
        return $info;
    }
    /**
     * insert into cust
     * @param array $cust
     */
    public function putData($cust)
    {
        $this->pdo->query(
            "insert into custs(custName,
            custEmployeeDesc,
            custCapitalDesc,
            profile,
            product,
            areaDesc,
            custWebSite,
            indcatTreeDesc) values(?,?,?,?,?,?,?,?);",
            [
                $cust['custName'],
                $cust['custEmployeeDesc'],
                $cust['custCapitalDesc'],
                $cust['profile'],
                $cust['product'],
                $cust['areaDesc'],
                $cust['custWebSite'],
                $cust['indcatTreeDesc']
            ]
        );
    }
    /**
     * insert into cust list
     * @param array $custLists cust lists ['custName','custEmployeeDesc','custCapitalDesc','profile',
     *                             'product','areaDesc','custWebSite','indcatTreeDesc']
     */
    public function putList($custLists, $retry = 5)
    {
        if ($custLists["data"]["list"]) {
            $count = 0;
            $try = 0;
            foreach ($custLists["data"]["list"] as $cust) {
                $indb =  $this->pdo->fetchRow("select custName from custs where custName = ?;", [$cust['custName']]);
                if ($indb['custName']) {
                    if ($try >= $retry) {
                        echo "已達連續重複最高次數{$retry}次<br/>";
                        die("停止爬取");
                    }
                    $try += 1;
                    echo $indb['custName'] . " 連續重複{$try}次<br/>";
                    continue;
                }
                $res = $this->putData($cust);
                if ($res) {
                    $count += 1;
                    echo '第' . $count . '筆資料已新增: ' . $cust['custName'] . '<br/>';
                } else {
                    die("已停止 共 $count 筆");
                }
                ob_flush();
                flush();
            }
        }
    }
    /**
     * total cust nunber
     */
    public function totalNun()
    {
        $totalNun = $this->pdo->fetchCol("select count(id) from custs");
        return $totalNun;
    }
    /**
     * fetch cust info
     */
    public function fetchInfo($id)
    {
        $info = $this->pdo->fetchRow("select * from custs where id = ?", "$id");
        return $info;
    }
}
