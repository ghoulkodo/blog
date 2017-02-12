<?php
namespace Framework;
/**
 * 自定义分页类,用于产生分页视图
 *
 */
class paginate
{

    const pagePre = '<ul class="pagination">';
    const pageEnd = '</ul>';

    public $pageLastStr = '';
    public $pageNextStr = '';
    public $url;

    public function __construct(){
        $this->url = $this->getUrl();
    }
    /**
     * @param $text
     * @return string
     */
    public static function getActivePageWrapper($text)
    {
        return '<li class="fl "><span>' . $text . '</span></li>';
    }


    /**
     * 获取当前页按钮的页面样式
     * @param $url
     * @param $page
     * @return string
     */
    public static function getActivePageLinkWrapper($url, $page)
    {
        return  '<a href="' . $url . '" class="active btn btn-outline">' . $page . '</a>';
;
    }


    /**
     * 获取非当前页按钮的页面样式
     * @param $url
     * @param $page
     * @return string
     */
    public static function getPageLinkWrapper($url, $page)
    {
        return '<a href="' . $url . '" class="btn btn-outline">' . $page . '</a>';
    }


    /**
     * 获取整个的分页样式
     * @param $nowPage 当前页
     * @param $totalPage 共多少页面
     * @param $baseUrl  当前url
     * @param $search   搜索
     * @return string
     */
    public  function getSelfPageView($nowPage, $totalPage)
    {

        $baseUrl = $this->setUrl($nowPage);
        if ($nowPage <= 1) {
            $nowPage = 1;
            $pageLastStr = '<button disabled="disabled" href="javascript:;" class="btn btn-outline">«</button>';
        }
        if ($nowPage >= $totalPage) {
            $nowPage = $totalPage;
            $pageNextStr = '<button disabled="disabled" href="javascript:;" class="btn btn-outline">»</button>';
        }

        //$search['totalPage'] = $totalPage;

        if (empty($pageLastStr)) {
            $lastPage = $nowPage - 1;
            $search['nowPage'] = $lastPage;
            $url = $this->setUrl($lastPage);
            $pageLastStr = self::getPageLinkWrapper($url, '«');
        }


        if (empty($pageNextStr)) {
            $pageNext = $nowPage + 1;
            $search['nowPage'] = $pageNext;
            $url = $this->setUrl($pageNext);
            $pageNextStr = self::getPageLinkWrapper($url, '»');
        }


        $pageTemp = '';
        $pageRange = self::getPageRange($nowPage, $totalPage);
        $pageTemp .= $pageLastStr;
        foreach ($pageRange as $page) {
            $url = $this->setUrl($page);
            if ($page == $nowPage) {
                $pageTemp .= self::getActivePageLinkWrapper($url, $page);
            } else {
                $pageTemp .= self::getPageLinkWrapper($url, $page);
            }
        }
        $pageTemp .= $pageNextStr;
        $pageView = self::pagePre . $pageTemp . self::pageEnd;
        return $pageView;
    }


    /**
     * 获取实际显示页面范围的范围
     * @param $nowPage
     * @param $totalPage
     * @return array
     */
    public static function getPageRange($nowPage, $totalPage)
    {
        $returnArray = [];

        if ($totalPage <= 5) {
            for ($i = 1; $i <= $totalPage; $i++) {
                $returnArray[] = $i;
            }
        } else {
            $lengthLeft = $nowPage - 1;
            $lengthRight = $totalPage - $nowPage;

            if (($lengthLeft < 2) && ($lengthRight < 2)) {
                $returnArray = [];
            } elseif (($lengthLeft < 2) && ($lengthRight > 2)) {
                for ($i = 1; $i <= 5; $i++) {
                    $returnArray[] = $i;
                }
            } elseif (($lengthLeft > 2) && ($lengthRight < 2)) {
                $start = $totalPage - 4;
                for ($i = $start; $i <= $totalPage; $i++) {
                    $returnArray[] = $i;
                }
            } else {
                for ($i = $nowPage - 2; $i <= $nowPage + 2; $i++) {
                    $returnArray[] = $i;
                }
            }
        }

        return $returnArray;
    }


    /**
     * 将搜索的数组拼接成为url
     * 
     * @param $array
     * @return string
     */
    public static function getUrl()
    {
        //return $_SERVER;
        //获取文件地址
        $path = $_SERVER['SCRIPT_NAME'];
        //获取主机名
        $host = $_SERVER['SERVER_NAME'];
        //获取端口号
        $port = $_SERVER['SERVER_PORT'];
        //获取协议
        $scheme = $_SERVER['REQUEST_SCHEME'];
        //获取网页的请求参数
        $queryString = $_SERVER['QUERY_STRING'];
        
        //var_dump($queryString);
        if (strlen($queryString)) {
            parse_str($queryString , $array);
            //var_dump($array);
            unset($array['page']);
            //var_dump($array);
            $path = $path . '?' . http_build_query($array);
            
            //var_dump($path);
        }
        $url = $scheme . '://' . $host . ':' . $port . $path;
        
        return $url;
    }

    protected  function setUrl($page)
    {
        if (strstr($this->url , '?')) {
            return $this->url . '&page=' . $page;
        } else {
            return $this->url . '?page=' . $page;
        }
    }
}
