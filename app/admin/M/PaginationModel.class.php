<?php
class PaginationModel
{
    public function getPagination($url, $total, $page)
    {
        $pageList = [];
        $totalPage = ceil($total / 10);
        $pre = $page - 1 > 0 ? $page - 1 : $page;
        $noPre = $page == 1 ? 'disabled' : '';
        $next = $page + 1 <= $totalPage ? $page + 1 : $page;
        $noNext = $page == $totalPage ? 'disabled' : '';
        for ($i = 1; $i <= 10; $i++) {
            if ($page <= 6) {
                if ($i == $page) {
                    //now page
                    $pageList[] = '<li class="page-item active"><a class="page-link" href="' . $url . $i . '">' . $i . '</a></li>';
                    continue;
                }
                if ($i > $totalPage) {
                    break;
                }
                $pageList[] = '<li class="page-item"><a class="page-link" href="' . $url . $i . '">' . $i . '</a></li>';
            } else {
                $offsetpage = $page - 6 + $i;
                if ($offsetpage == $page) {
                    //now page
                    $pageList[] = '<li class="page-item active"><a class="page-link active" href="' . $url . $offsetpage . '">' . $offsetpage . '</a></li>';
                    continue;
                }
                if ($offsetpage > $totalPage) {
                    break;
                }
                $pageList[] = '<li class="page-item"><a class="page-link" href="' . $url . $offsetpage . '">' . $offsetpage . '</a></li>';
            }
        }
        $html = '<nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item ' . $noPre . '">
                         <a class="page-link" href="' . $url . $pre . '" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>';
        foreach ($pageList as $item) {
            $html .= $item;
        }
        $html .= '<li class="page-item ' . $noNext . '">
                    <a class="page-link" href="' . $url . $next   . '" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>';

        return $html;
    }
}
