<?php
class CrawlerModel
{
    /**
     * @var Curl @curl
     */
    private $curl;
    public function __construct()
    {
        $this->initCurl();
    }
    /**
     * init crul
     */
    private function initCurl()
    {
        $timeout_sec = '3600';
        ini_set("max_execution_time", $timeout_sec);
        //$this->curl = new Curl;
    }
    /**
     * @param string $url
     * @param array $header
     * @param string $data
     */
    public function getHtml($url, $header = [], $data = Null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "user-agent:Mozilla/5.0 (Windows NT 5.1; rv:24.0) Gecko/20100101 Firefox/24.0"); //解决错误：“未将对象引用设置到对象的实例。”
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
        if ($data) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        if (!$res) {
            file_put_contents(ROOT_DIR . "/log/TESTcurlErrLog.txt", date('Y-m-d H:i:s') . ' curl error: ' . curl_error($ch) . PHP_EOL, FILE_APPEND);
            return false;
        }
        curl_close($ch);
        return $res;
    }
    /**
     * @param string $html html
     * @param string $xpath xpath query
     */
    public function xpath($html, $xpath)
    {
        // create document object model
        $dom = new DOMDocument();
        // load html into document object model
        @$dom->loadHTML('<?xml encoding="UTF-8">' . $html);
        // create domxpath instance
        $domXPath = new DOMXPath($dom);
        // get all elements with a particular id and then loop through and print the href attribute
        $elements = $domXPath->query($xpath);
        return $elements;
    }
    /**
     * @param string $keyword
     * @param int $page
     * @param int $area
     * @param int $indcat
     * @return array
     */
    public function crawling104($keyword = null, $page = 1, $area = null, $indcat = null)
    {
        $header[] = "Referer: https://www.104.com.tw/cust/list/index/?page={$page}&area={$area}&indcat={$indcat}&order=1&mode=s&jobsource=checkc&keyword={$keyword}";
        $header[] = "Accept: application/json, text/javascript, */*; q=0.01";
        $header[] = "Pragma: no-cache";
        $header[] = "X-Requested-With: XMLHttpRequest";
        $url = "https://www.104.com.tw/cust/list/ajax/index?page={$page}&area={$area}&indcat={$indcat}&order=1&mode=s&jobsource=checkc&keyword={$keyword}";
        return json_decode($this->getHtml($url, $header), true);
    }
}
