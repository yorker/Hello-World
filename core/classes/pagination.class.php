<?php
/**
 * Create on Mar 9, 2009
 * Author: yorker
 */

class Pagination extends Pbase {
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
			$tmp = '';
			$tmp .= self::_showNumbers($totalRecords, $currentPage, $url, $limit, $displayPageNum) . '&nbsp;&nbsp;&nbsp;';
			$tmp .= self::_showLocation($totalRecords, $currentPage, $limit);
			return $tmp;
		}
	}

	/**
	 * 获取分布的当前待显示页
	 */
	function getCurrentPage($setSessionPre='', $clearSession=false) {
		if($clearSession) {
			unset($_SESSION[$setSessionPre.'_page']);
		}
		if(isset($_GET['page']) && is_numeric($_GET['page'])) {
			$page = $_GET['page'];
		} elseif(isset($_SESSION[$setSessionPre.'_page']) && $_SESSION[$setSessionPre.'_page'] > 1) {
			$page = $_SESSION[$setSessionPre.'_page'];
		} else {
			$page = 1;
		}

		$_SESSION[$setSessionPre.'_page'] = $page;

		return $page;
	}

	function unsetPageSession($setSessionPre='') {
		if(isset($_SESSION[$setSessionPre.'_page'])) {
			unset($_SESSION[$setSessionPre.'_page']);
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
                $show = self::__first() . ' ' . self::__previous() . $show;                
            }
            if(!self::__isLastPage()) {
                $show .= self::__next() . ' ' . self::__last();
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
        return '<a href="javascript:pagination(\'' . self::$url . '\', 1)">[首页]</a>';
    }


    function __previous() {
        return '<a href="javascript:pagination(\'' . self::$url . '\', ' . (self::$current - 1) . ')">[上一页]</a> ';
    }


    function __showNumbers() {
        $show = '';
        
        $middle = (int)(self::$displayPageNum / 2);

        $startPage = (self::$current -$middle > 0) ? self::$current - $middle : 1;
        $endPage = $startPage + self::$displayPageNum - 1;

        for($i = $startPage; $i <= self::$pTotal && $i <= $endPage; $i++) {
            if($i == self::$current) {
                
                $show .= '<strong> [' . $i . '] </strong>';
            } else {
                $show .= '<a href="javascript:pagination(\'' . self::$url . '\', ' . $i . ')"> [' . $i . '] </a>';
            }
        }
        return $show;
    }


    function __next() {
        return '<a href="javascript:pagination(\'' . self::$url . '\', ' . (self::$current + 1) . ')">[下一页]</a>';
    }

    function __last() {
        return '<a href="javascript:pagination(\'' . self::$url . '\', ' . self::$pTotal . ')">[尾页]</a>';
    }
}