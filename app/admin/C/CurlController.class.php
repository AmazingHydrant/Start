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
        $endPage = 1;
        while ($page <= $endPage) {
            sleep(3);
            $custLists = $crawlerM->crawling104($keyword, $page, $area, $indcat);
            $custM = new CustModel;
            $custM->putList($custLists);
            $page += 1;
        }
    }
}
