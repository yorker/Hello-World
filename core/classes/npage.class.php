<?php
/**
 * Create On February 3, 2011
 * Author By Yorker
 */
/**
 * 普通分页
 */

class NPage extends Pbase {

    static $displayPageNum = 8;
    static $num = 20;
    static $rTotal;
    static $pTotal;
    static $current;
    static $url = null;
    static $rStart;
    static $rEnd;

	function page($totalRecords, &$currentPage, $url, $limit, $displayPageNum=8) {
		if($totalRecords == 0) {
			return '';
		} else {
			$tmp = '<div id="pagination">';
			$tmp .= self::_showNumbers($totalRecords, $currentPage, $url, $limit, $displayPageNum) . '&nbsp;&nbsp;&nbsp;';
			$tmp .= self::_showLocation($totalRecords, $currentPage, $limit);
			$tmp .= '</div>';
			return $tmp;
		}
	}


    function _showLocation($totalRecords, &$currentPage, $limit) {

        self::__constructor($totalRecords, $currentPage, null, $limit);


        $show = '共' . self::$pTotal . '页（' . self::$rStart . '-' . self::$rEnd . '/' . self::$rTotal . '）';

        return $show;
    }

    function _showNumbers($totalRecords, &$currentPage, $url, $limit, $displayPageNum = 10) {
        self::$displayPageNum = $displayPageNum;

        self::__constructor($totalRecords, $currentPage, $url, $limit);

        if( self::__isSinglePage() ) {
            $show = '&nbsp;';
        } else {

            $show = self::__showNumbers();

            if(!self::__isFirstPage()) {
                $show = self::__first() . self::__previous() . $show;
            }
            if(!self::__isLastPage()) {
                $show .= self::__next() . self::__last();
            }
        }


        return $show;
    }

	function __constructor($totalRecords, &$currentPage, $url, $limit) {
        self::$rTotal = $totalRecords;
		self::$num = $limit;
        self::$pTotal = ceil($totalRecords / self::$num);

		if($currentPage > self::$pTotal) {
			self::$current = self::$pTotal;
		} else {
			self::$current = $currentPage;
		}

		//通过引用调整当前页码，防止页码超出而检索不到数据
		$currentPage = self::$current;

		self::$rStart = (self::$current - 1) * self::$num + 1;

        if(self::$current * self::$num > self::$rTotal) {
            self::$rEnd = self::$rTotal;
        } else {
            self::$rEnd = self::$current * self::$num;
        }

        self::$url = $url;
    }

    function __isLastPage() {
        return (self::$pTotal == self::$current);
    }


    function __isFirstPage() {
        return (self::$current == 1);
    }

    function __isSinglePage() {
        return (self::$pTotal == 1);
    }

    function __first() {
		return '<span class="first"><a href="' . self::__url(1) . '">&nbsp;</a></span>';
    }


    function __previous() {
		return '<span class="prev"><a href="' . self::__url(self::$current - 1) . '">&nbsp;</a></span>';
    }


    function __showNumbers() {
        $show = '';

        $middle = (int)(self::$displayPageNum / 2);

        $startPage = (self::$current -$middle > 0) ? self::$current - $middle : 1;
        $endPage = $startPage + self::$displayPageNum - 1;

        for($i = $startPage; $i <= self::$pTotal && $i <= $endPage; $i++) {
            if($i == self::$current) {
                $show .= '<span class="number"><strong>[' . $i . ']</strong></span>';
            } else {
				$show .= '<span class="number"><a href="' . self::__url($i) . '">[' . $i . ']</a></span>';
            }
        }
        return $show;
    }


    function __next() {
		return '<span class="next"><a href="' . self::__url(self::$current + 1) . '">&nbsp;</a></span>';
    }

    function __last() {
		return '<span class="last"><a href="' . self::__url(self::$pTotal) . '">&nbsp;</a></span>';
    }

	function __url($page) {
		if(preg_match('/\.html$/', self::$url)) {
			return preg_replace('/\.html$/', '-page-'.$page.'.html', self::$url);
		} elseif(preg_match('/\.[a-zA-Z]{2,4}\?/', self::$url)) {
			return self::$url . '&page=' . $page;
		}
		return self::$url . '?page=' . $page;
	}
}