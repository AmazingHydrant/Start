<?php
class CurlController
{
    public function curl()
    {
        $crawlerM = new CrawlerModel;
        $keyword = '';
        $area = 6001014000;
        // $indcat = 1001001000;
        $indcat = null;
        $page = 1;
        $res = $crawlerM->crawling104($keyword, $page, $area, $indcat);
        // var_dump($res);
        if ($res["data"]["list"]) {
            foreach ($res["data"]["list"] as $cust) {
                foreach ($cust as $k => $info) {
                    echo "$k => $info" . '<br/>';
                }
                echo $info . '<hr/>';
            }
        }
    }
}
