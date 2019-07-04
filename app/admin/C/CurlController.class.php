<?php
class CurlController
{
    public function crawling104toDB()
    {
        $crawlerM = new CrawlerModel;
        $keyword = '';
        $area = 6001014000; //台南市
        // $indcat = 1001001000; //資訊行業
        $indcat = null;
        $page = 1;
        $c = 1;
        $re = 0;
        while (1) {
            sleep(3);
            $custList = $crawlerM->crawling104($keyword, $page, $area, $indcat);
            if ($custList["data"]["list"]) {
                $pdodb = PDODB::getInstance(['pass' => '!@#123qwe', 'dbname' => 'start']);
                foreach ($custList["data"]["list"] as $cust) {
                    $indb =  $pdodb->myQuery("select custName from custs where custName = ?;", [$cust['custName']]);
                    if ($indb['custName']) {
                        if ($re >= 3) {
                            echo $indb['custName'] . " 重複{$re}次";
                            die("停止爬取");
                        }
                        $re += 1;
                        echo $indb['custName'] . " 重複{$re}次";
                        continue;
                    }
                    $re = 0;
                    $res = $pdodb->query(
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
                    if ($res) {
                        echo '第' . $c . '筆資料已新增: ' . $cust['custName'] . '<br/>';
                        $c += 1;
                    } else {
                        die("已停止 第 $c 筆 第 $page 頁");
                    }
                    ob_flush();
                    flush();
                }
            }
            $page += 1;
        }
    }
}
