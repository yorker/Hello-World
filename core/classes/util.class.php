<?php
/*
 * Created on Oct 9, 2010
 * Author by Yorker
 * Modified on Oct 14, 2010
 */
interface baseUtil {
    /*拼音处理*/
    public function pinyin($_String, $_Code='utf-8');
    public function cnFirstPinyin($cn, $charset='utf-8');
    public function cnSplit($cn, $charset='utf-8');

    /*获得农历1900-2020年之间*/
    public function getLunarCalendar($timestamp = null);

    /*获得文本标签*/
    public function getTags($subjectenc, $messageenc='', $charset = 'utf-8');

    /*根据IP获得所在的地区*/
    public function ip2area($ip, $ipdatafile);
}

class Util implements baseUtil {
    /**
     * Constructor and destructor
     */
    function __construct() {
    }
    function __destruct() {
    }
    /**
     * 将中文字翻译成拼音的函数
     */
    public function pinyin($_String, $_Code='utf-8') {
        $_DataKey = "a|ai|an|ang|ao|ba|bai|ban|bang|bao|bei|ben|beng|bi|bian|biao|bie|bin|bing|bo|bu|ca|cai|can|cang|cao|ce|ceng|cha".
                "|chai|chan|chang|chao|che|chen|cheng|chi|chong|chou|chu|chuai|chuan|chuang|chui|chun|chuo|ci|cong|cou|cu|".
                "cuan|cui|cun|cuo|da|dai|dan|dang|dao|de|deng|di|dian|diao|die|ding|diu|dong|dou|du|duan|dui|dun|duo|e|en|er".
                "|fa|fan|fang|fei|fen|feng|fo|fou|fu|ga|gai|gan|gang|gao|ge|gei|gen|geng|gong|gou|gu|gua|guai|guan|guang|gui".
                "|gun|guo|ha|hai|han|hang|hao|he|hei|hen|heng|hong|hou|hu|hua|huai|huan|huang|hui|hun|huo|ji|jia|jian|jiang".
                "|jiao|jie|jin|jing|jiong|jiu|ju|juan|jue|jun|ka|kai|kan|kang|kao|ke|ken|keng|kong|kou|ku|kua|kuai|kuan|kuang".
                "|kui|kun|kuo|la|lai|lan|lang|lao|le|lei|leng|li|lia|lian|liang|liao|lie|lin|ling|liu|long|lou|lu|lv|luan|lue".
                "|lun|luo|ma|mai|man|mang|mao|me|mei|men|meng|mi|mian|miao|mie|min|ming|miu|mo|mou|mu|na|nai|nan|nang|nao|ne".
                "|nei|nen|neng|ni|nian|niang|niao|nie|nin|ning|niu|nong|nu|nv|nuan|nue|nuo|o|ou|pa|pai|pan|pang|pao|pei|pen".
                "|peng|pi|pian|piao|pie|pin|ping|po|pu|qi|qia|qian|qiang|qiao|qie|qin|qing|qiong|qiu|qu|quan|que|qun|ran|rang".
                "|rao|re|ren|reng|ri|rong|rou|ru|ruan|rui|run|ruo|sa|sai|san|sang|sao|se|sen|seng|sha|shai|shan|shang|shao|".
                "she|shen|sheng|shi|shou|shu|shua|shuai|shuan|shuang|shui|shun|shuo|si|song|sou|su|suan|sui|sun|suo|ta|tai|".
                "tan|tang|tao|te|teng|ti|tian|tiao|tie|ting|tong|tou|tu|tuan|tui|tun|tuo|wa|wai|wan|wang|wei|wen|weng|wo|wu".
                "|xi|xia|xian|xiang|xiao|xie|xin|xing|xiong|xiu|xu|xuan|xue|xun|ya|yan|yang|yao|ye|yi|yin|ying|yo|yong|you".
                "|yu|yuan|yue|yun|za|zai|zan|zang|zao|ze|zei|zen|zeng|zha|zhai|zhan|zhang|zhao|zhe|zhen|zheng|zhi|zhong|".
                "zhou|zhu|zhua|zhuai|zhuan|zhuang|zhui|zhun|zhuo|zi|zong|zou|zu|zuan|zui|zun|zuo";

        $_DataValue = "-20319|-20317|-20304|-20295|-20292|-20283|-20265|-20257|-20242|-20230|-20051|-20036|-20032|-20026|-20002|-19990".
                "|-19986|-19982|-19976|-19805|-19784|-19775|-19774|-19763|-19756|-19751|-19746|-19741|-19739|-19728|-19725".
                "|-19715|-19540|-19531|-19525|-19515|-19500|-19484|-19479|-19467|-19289|-19288|-19281|-19275|-19270|-19263".
                "|-19261|-19249|-19243|-19242|-19238|-19235|-19227|-19224|-19218|-19212|-19038|-19023|-19018|-19006|-19003".
                "|-18996|-18977|-18961|-18952|-18783|-18774|-18773|-18763|-18756|-18741|-18735|-18731|-18722|-18710|-18697".
                "|-18696|-18526|-18518|-18501|-18490|-18478|-18463|-18448|-18447|-18446|-18239|-18237|-18231|-18220|-18211".
                "|-18201|-18184|-18183|-18181|-18012|-17997|-17988|-17970|-17964|-17961|-17950|-17947|-17931|-17928|-17922".
                "|-17759|-17752|-17733|-17730|-17721|-17703|-17701|-17697|-17692|-17683|-17676|-17496|-17487|-17482|-17468".
                "|-17454|-17433|-17427|-17417|-17202|-17185|-16983|-16970|-16942|-16915|-16733|-16708|-16706|-16689|-16664".
                "|-16657|-16647|-16474|-16470|-16465|-16459|-16452|-16448|-16433|-16429|-16427|-16423|-16419|-16412|-16407".
                "|-16403|-16401|-16393|-16220|-16216|-16212|-16205|-16202|-16187|-16180|-16171|-16169|-16158|-16155|-15959".
                "|-15958|-15944|-15933|-15920|-15915|-15903|-15889|-15878|-15707|-15701|-15681|-15667|-15661|-15659|-15652".
                "|-15640|-15631|-15625|-15454|-15448|-15436|-15435|-15419|-15416|-15408|-15394|-15385|-15377|-15375|-15369".
                "|-15363|-15362|-15183|-15180|-15165|-15158|-15153|-15150|-15149|-15144|-15143|-15141|-15140|-15139|-15128".
                "|-15121|-15119|-15117|-15110|-15109|-14941|-14937|-14933|-14930|-14929|-14928|-14926|-14922|-14921|-14914".
                "|-14908|-14902|-14894|-14889|-14882|-14873|-14871|-14857|-14678|-14674|-14670|-14668|-14663|-14654|-14645".
                "|-14630|-14594|-14429|-14407|-14399|-14384|-14379|-14368|-14355|-14353|-14345|-14170|-14159|-14151|-14149".
                "|-14145|-14140|-14137|-14135|-14125|-14123|-14122|-14112|-14109|-14099|-14097|-14094|-14092|-14090|-14087".
                "|-14083|-13917|-13914|-13910|-13907|-13906|-13905|-13896|-13894|-13878|-13870|-13859|-13847|-13831|-13658".
                "|-13611|-13601|-13406|-13404|-13400|-13398|-13395|-13391|-13387|-13383|-13367|-13359|-13356|-13343|-13340".
                "|-13329|-13326|-13318|-13147|-13138|-13120|-13107|-13096|-13095|-13091|-13076|-13068|-13063|-13060|-12888".
                "|-12875|-12871|-12860|-12858|-12852|-12849|-12838|-12831|-12829|-12812|-12802|-12607|-12597|-12594|-12585".
                "|-12556|-12359|-12346|-12320|-12300|-12120|-12099|-12089|-12074|-12067|-12058|-12039|-11867|-11861|-11847".
                "|-11831|-11798|-11781|-11604|-11589|-11536|-11358|-11340|-11339|-11324|-11303|-11097|-11077|-11067|-11055".
                "|-11052|-11045|-11041|-11038|-11024|-11020|-11019|-11018|-11014|-10838|-10832|-10815|-10800|-10790|-10780".
                "|-10764|-10587|-10544|-10533|-10519|-10331|-10329|-10328|-10322|-10315|-10309|-10307|-10296|-10281|-10274".
                "|-10270|-10262|-10260|-10256|-10254";
        $_TDataKey   = explode('|', $_DataKey);
        $_TDataValue = explode('|', $_DataValue);

        $_Data = (PHP_VERSION>='5.0') ? array_combine($_TDataKey,  $_TDataValue) : $this->_Array_Combine($_TDataKey, $_TDataValue);
        arsort($_Data);
        reset($_Data);

        if($_Code != 'gb2312') $_String = $this->_U2_Utf8_Gb($_String);
        $_Res = '';
        for($i=0; $i<strlen($_String); $i++) {
            $_P = ord(substr($_String, $i, 1));
            if($_P>160) { $_Q = ord(substr($_String, ++$i, 1)); $_P = $_P*256 + $_Q - 65536; }
            $_Res .= $this->_Pinyin($_P, $_Data);
        }
        return preg_replace("/[^a-z0-9]*/", '', $_Res);
    }

    private function _Pinyin($_Num, $_Data) {
        if ($_Num>0      && $_Num<160   ) return chr($_Num);
        elseif($_Num<-20319 || $_Num>-10247)
            return '';
        else {
            foreach($_Data as $k=>$v){ if($v<=$_Num) break; }
            return $k;
        }
    }

    private function _U2_Utf8_Gb($_C) {
        $_String = '';
        if($_C < 0x80)
            $_String .= $_C;
        elseif($_C < 0x800) {
                $_String .= chr(0xC0 | $_C>>6);
                $_String .= chr(0x80 | $_C & 0x3F);
        } elseif($_C < 0x10000) {
                $_String .= chr(0xE0 | $_C>>12);
                $_String .= chr(0x80 | $_C>>6 & 0x3F);
                $_String .= chr(0x80 | $_C & 0x3F);
        } elseif($_C < 0x200000) {
                $_String .= chr(0xF0 | $_C>>18);
                $_String .= chr(0x80 | $_C>>12 & 0x3F);
                $_String .= chr(0x80 | $_C>>6 & 0x3F);
                $_String .= chr(0x80 | $_C & 0x3F);
        }
        return iconv('UTF-8', 'GB2312', $_String);
    }

    private function _Array_Combine($_Arr1, $_Arr2) {
        for($i=0; $i<count($_Arr1); $i++) $_Res[$_Arr1[$i]] = $_Arr2[$i];
        return $_Res;
    }

    /**
    * 获取汉字的第一个拼音字母，如果为中文件直接返回
    */
    public function cnFirstPinyin($cn, $charset = 'utf-8') {
        $cns = $this->_cnSplit($cn, $charset);
        $revalue = '';
        foreach($cns as $val) {
            $val = trim($val);
            if(!empty($val)) {
                $revalue .= substr($this->pinyin($val), 0, 1);
            }
        }
        return $revalue;
    }

    /**
     * 将字符串中的汉字（英文字母过滤掉）分离到一个数组中
     * @return array
     */
    public function cnSplit($cn, $charset='utf-8') {
        $tmp = $this->_cnSplit($cn, $charset);
        $revalue = array();
        foreach($tmp as &$v) {
            if(strlen($v) >= 2) {
                $revalue[] = $v;
            }
        }
        return $revalue;
    }

    //将汉字和英文字母分离到一个数组中
    private function _cnSplit($cn, $charset) {
        if(empty($cn)) {
            return false;
        }
        $cns = array();
        $len = strlen($cn);
        $i = 0;
        if(strtolower($charset) == 'utf-8') {
            while($i < $len) {
                $tmp = substr($cn, $i, 1);
                if(ord($tmp) >= 224) {
                    $cns[] = substr($cn, $i, 3);
                    $i += 3;
                } elseif(ord($tmp) >= 192) {
                    $cns[] = substr($cn, $i, 2);
                    $i += 2;
                } else {
                    $cns[] = substr($cn, $i, 1);
                    $i += 1;
                }
            }
        } else {
            while($i < $len) {
                $tmp = substr($cn, $i, 1);
                if(ord($tmp) >= 129) {
                    $cns[] = substr($cn, $i, 2);
                    $i += 2;
                } else {
                    $cns[] = substr($cn, $i, 1);
                    $i += 1;
                }
            }
        }
        return $cns;
    }

    /**
     * 判断字符串是否有中文字符（多字节字符）
     */
     public function isCn($str) {
		$len = strlen($str);
		for($i = 0; $i < $len; $i++) {
			$tmp = substr($str, $i, 1);
			if(ord($tmp)>=129) {
				return true;
			}
		}
		return false;
     }


    /**
     * 获取农历相关数据
     * @param integer $timestamp Unix时间截
     */
    public function getLunarCalendar($timestamp = null) {
        $everymonth=array(
            0=>array(8,0,0,0,0,0,0,0,0,0,0,0,29,30,7,1),
            1=>array(0,29,30,29,29,30,29,30,29,30,30,30,29,0,8,2),
            2=>array(0,30,29,30,29,29,30,29,30,29,30,30,30,0,9,3),
            3=>array(5,29,30,29,30,29,29,30,29,29,30,30,29,30,10,4),
            4=>array(0,30,30,29,30,29,29,30,29,29,30,30,29,0,1,5),
            5=>array(0,30,30,29,30,30,29,29,30,29,30,29,30,0,2,6),
            6=>array(4,29,30,30,29,30,29,30,29,30,29,30,29,30,3,7),
            7=>array(0,29,30,29,30,29,30,30,29,30,29,30,29,0,4,8),
            8=>array(0,30,29,29,30,30,29,30,29,30,30,29,30,0,5,9),
            9=>array(2,29,30,29,29,30,29,30,29,30,30,30,29,30,6,10),
            10=>array(0,29,30,29,29,30,29,30,29,30,30,30,29,0,7,11),
            11=>array(6,30,29,30,29,29,30,29,29,30,30,29,30,30,8,12),
            12=>array(0,30,29,30,29,29,30,29,29,30,30,29,30,0,9,1),
            13=>array(0,30,30,29,30,29,29,30,29,29,30,29,30,0,10,2),
            14=>array(5,30,30,29,30,29,30,29,30,29,30,29,29,30,1,3),
            15=>array(0,30,29,30,30,29,30,29,30,29,30,29,30,0,2,4),
            16=>array(0,29,30,29,30,29,30,30,29,30,29,30,29,0,3,5),
            17=>array(2,30,29,29,30,29,30,30,29,30,30,29,30,29,4,6),
            18=>array(0,30,29,29,30,29,30,29,30,30,29,30,30,0,5,7),
            19=>array(7,29,30,29,29,30,29,29,30,30,29,30,30,30,6,8),
            20=>array(0,29,30,29,29,30,29,29,30,30,29,30,30,0,7,9),
            21=>array(0,30,29,30,29,29,30,29,29,30,29,30,30,0,8,10),
            22=>array(5,30,29,30,30,29,29,30,29,29,30,29,30,30,9,11),
            23=>array(0,29,30,30,29,30,29,30,29,29,30,29,30,0,10,12),
            24=>array(0,29,30,30,29,30,30,29,30,29,30,29,29,0,1,1),
            25=>array(4,30,29,30,29,30,30,29,30,30,29,30,29,30,2,2),
            26=>array(0,29,29,30,29,30,29,30,30,29,30,30,29,0,3,3),
            27=>array(0,30,29,29,30,29,30,29,30,29,30,30,30,0,4,4),
            28=>array(2,29,30,29,29,30,29,29,30,29,30,30,30,30,5,5),
            29=>array(0,29,30,29,29,30,29,29,30,29,30,30,30,0,6,6),
            30=>array(6,29,30,30,29,29,30,29,29,30,29,30,30,29,7,7),
            31=>array(0,30,30,29,30,29,30,29,29,30,29,30,29,0,8,8),
            32=>array(0,30,30,30,29,30,29,30,29,29,30,29,30,0,9,9),
            33=>array(5,29,30,30,29,30,30,29,30,29,30,29,29,30,10,10),
            34=>array(0,29,30,29,30,30,29,30,29,30,30,29,30,0,1,11),
            35=>array(0,29,29,30,29,30,29,30,30,29,30,30,29,0,2,12),
            36=>array(3,30,29,29,30,29,29,30,30,29,30,30,30,29,3,1),
            37=>array(0,30,29,29,30,29,29,30,29,30,30,30,29,0,4,2),
            38=>array(7,30,30,29,29,30,29,29,30,29,30,30,29,30,5,3),
            39=>array(0,30,30,29,29,30,29,29,30,29,30,29,30,0,6,4),
            40=>array(0,30,30,29,30,29,30,29,29,30,29,30,29,0,7,5),
            41=>array(6,30,30,29,30,30,29,30,29,29,30,29,30,29,8,6),
            42=>array(0,30,29,30,30,29,30,29,30,29,30,29,30,0,9,7),
            43=>array(0,29,30,29,30,29,30,30,29,30,29,30,29,0,10,8),
            44=>array(4,30,29,30,29,30,29,30,29,30,30,29,30,30,1,9),
            45=>array(0,29,29,30,29,29,30,29,30,30,30,29,30,0,2,10),
            46=>array(0,30,29,29,30,29,29,30,29,30,30,29,30,0,3,11),
            47=>array(2,30,30,29,29,30,29,29,30,29,30,29,30,30,4,12),
            48=>array(0,30,29,30,29,30,29,29,30,29,30,29,30,0,5,1),
            49=>array(7,30,29,30,30,29,30,29,29,30,29,30,29,30,6,2),
            50=>array(0,29,30,30,29,30,30,29,29,30,29,30,29,0,7,3),
            51=>array(0,30,29,30,30,29,30,29,30,29,30,29,30,0,8,4),
            52=>array(5,29,30,29,30,29,30,29,30,30,29,30,29,30,9,5),
            53=>array(0,29,30,29,29,30,30,29,30,30,29,30,29,0,10,6),
            54=>array(0,30,29,30,29,29,30,29,30,30,29,30,30,0,1,7),
            55=>array(3,29,30,29,30,29,29,30,29,30,29,30,30,30,2,8),
            56=>array(0,29,30,29,30,29,29,30,29,30,29,30,30,0,3,9),
            57=>array(8,30,29,30,29,30,29,29,30,29,30,29,30,29,4,10),
            58=>array(0,30,30,30,29,30,29,29,30,29,30,29,30,0,5,11),
            59=>array(0,29,30,30,29,30,29,30,29,30,29,30,29,0,6,12),
            60=>array(6,30,29,30,29,30,30,29,30,29,30,29,30,29,7,1),
            61=>array(0,30,29,30,29,30,29,30,30,29,30,29,30,0,8,2),
            62=>array(0,29,30,29,29,30,29,30,30,29,30,30,29,0,9,3),
            63=>array(4,30,29,30,29,29,30,29,30,29,30,30,30,29,10,4),
            64=>array(0,30,29,30,29,29,30,29,30,29,30,30,30,0,1,5),
            65=>array(0,29,30,29,30,29,29,30,29,29,30,30,29,0,2,6),
            66=>array(3,30,30,30,29,30,29,29,30,29,29,30,30,29,3,7),
            67=>array(0,30,30,29,30,30,29,29,30,29,30,29,30,0,4,8),
            68=>array(7,29,30,29,30,30,29,30,29,30,29,30,29,30,5,9),
            69=>array(0,29,30,29,30,29,30,30,29,30,29,30,29,0,6,10),
            70=>array(0,30,29,29,30,29,30,30,29,30,30,29,30,0,7,11),
            71=>array(5,29,30,29,29,30,29,30,29,30,30,30,29,30,8,12),
            72=>array(0,29,30,29,29,30,29,30,29,30,30,29,30,0,9,1),
            73=>array(0,30,29,30,29,29,30,29,29,30,30,29,30,0,10,2),
            74=>array(4,30,30,29,30,29,29,30,29,29,30,30,29,30,1,3),
            75=>array(0,30,30,29,30,29,29,30,29,29,30,29,30,0,2,4),
            76=>array(8,30,30,29,30,29,30,29,30,29,29,30,29,30,3,5),
            77=>array(0,30,29,30,30,29,30,29,30,29,30,29,29,0,4,6),
            78=>array(0,30,29,30,30,29,30,30,29,30,29,30,29,0,5,7),
            79=>array(6,30,29,29,30,29,30,30,29,30,30,29,30,29,6,8),
            80=>array(0,30,29,29,30,29,30,29,30,30,29,30,30,0,7,9),
            81=>array(0,29,30,29,29,30,29,29,30,30,29,30,30,0,8,10),
            82=>array(4,30,29,30,29,29,30,29,29,30,29,30,30,30,9,11),
            83=>array(0,30,29,30,29,29,30,29,29,30,29,30,30,0,10,12),
            84=>array(10,30,29,30,30,29,29,30,29,29,30,29,30,30,1,1),
            85=>array(0,29,30,30,29,30,29,30,29,29,30,29,30,0,2,2),
            86=>array(0,29,30,30,29,30,30,29,30,29,30,29,29,0,3,3),
            87=>array(6,30,29,30,29,30,30,29,30,30,29,30,29,29,4,4),
            88=>array(0,30,29,30,29,30,29,30,30,29,30,30,29,0,5,5),
            89=>array(0,30,29,29,30,29,29,30,30,29,30,30,30,0,6,6),
            90=>array(5,29,30,29,29,30,29,29,30,29,30,30,30,30,7,7),
            91=>array(0,29,30,29,29,30,29,29,30,29,30,30,30,0,8,8),
            92=>array(0,29,30,30,29,29,30,29,29,30,29,30,30,0,9,9),
            93=>array(3,29,30,30,29,30,29,30,29,29,30,29,30,29,10,10),
            94=>array(0,30,30,30,29,30,29,30,29,29,30,29,30,0,1,11),
            95=>array(8,29,30,30,29,30,29,30,30,29,29,30,29,30,2,12),
            96=>array(0,29,30,29,30,30,29,30,29,30,30,29,29,0,3,1),
            97=>array(0,30,29,30,29,30,29,30,30,29,30,30,29,0,4,2),
            98=>array(5,30,29,29,30,29,29,30,30,29,30,30,29,30,5,3),
            99=>array(0,30,29,29,30,29,29,30,29,30,30,30,29,0,6,4),
            100=>array(0,30,30,29,29,30,29,29,30,29,30,30,29,0,7,5),
            101=>array(4,30,30,29,30,29,30,29,29,30,29,30,29,30,8,6),
            102=>array(0,30,30,29,30,29,30,29,29,30,29,30,29,0,9,7),
            103=>array(0,30,30,29,30,30,29,30,29,29,30,29,30,0,10,8),
            104=>array(2,29,30,29,30,30,29,30,29,30,29,30,29,30,1,9),
            105=>array(0,29,30,29,30,29,30,30,29,30,29,30,29,0,2,10),
            106=>array(7,30,29,30,29,30,29,30,29,30,30,29,30,30,3,11),
            107=>array(0,29,29,30,29,29,30,29,30,30,30,29,30,0,4,12),
            108=>array(0,30,29,29,30,29,29,30,29,30,30,29,30,0,5,1),
            109=>array(5,30,30,29,29,30,29,29,30,29,30,29,30,30,6,2),
            110=>array(0,30,29,30,29,30,29,29,30,29,30,29,30,0,7,3),
            111=>array(0,30,29,30,30,29,30,29,29,30,29,30,29,0,8,4),
            112=>array(4,30,29,30,30,29,30,29,30,29,30,29,30,29,9,5),
            113=>array(0,30,29,30,29,30,30,29,30,29,30,29,30,0,10,6),
            114=>array(9,29,30,29,30,29,30,29,30,30,29,30,29,30,1,7),
            115=>array(0,29,30,29,29,30,29,30,30,30,29,30,29,0,2,8),
            116=>array(0,30,29,30,29,29,30,29,30,30,29,30,30,0,3,9),
            117=>array(6,29,30,29,30,29,29,30,29,30,29,30,30,30,4,10),
            118=>array(0,29,30,29,30,29,29,30,29,30,29,30,30,0,5,11),
            119=>array(0,30,29,30,29,30,29,29,30,29,29,30,30,0,6,12),
            120=>array(4,29,30,30,30,29,30,29,29,30,29,30,29,30,7,1)
        );
        $mten=array("null","甲","乙","丙","丁","戊","己","庚","辛","壬","癸");
        $mtwelve=array("null","子(鼠)","丑(牛)","寅(虎)","卯(兔)","辰(龙)",
                     "巳(蛇)","午(马)","未(羊)","申(猴)","酉(鸡)","戌(狗)","亥(猪)");
        $mmonth=array("闰","正","二","三","四","五","六",
                    "七","八","九","十","十一","十二","月");
        $mday=array("null","初一","初二","初三","初四","初五","初六","初七","初八","初九","初十",
                  "十一","十二","十三","十四","十五","十六","十七","十八","十九","二十",
                  "廿一","廿二","廿三","廿四","廿五","廿六","廿七","廿八","廿九","三十");
        $weekday = array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");

        $total=11;

        $mtotal=0;

        //获得当日日期
        if(!$timestamp) {
            $timestamp = time();
        }
        $today=getdate($timestamp);
        if($today["year"]<1901 || $today["year"]>2020)
            die("年份出错！");

        $cur_wday=$today["wday"];

        for($y=1901; $y<$today["year"]; $y++) { //计算到所求日期阳历的总天数-自1900年12月21日始,先算年的和
            $total+=365;
            if ($y%4==0)
                $total++;
        }

        switch($today["mon"]) { //再加当年的几个月
            case 12:
                $total+=30;
            case 11:
                $total+=31;
            case 10:
                $total+=30;
            case 9:
                $total+=31;
            case 8:
                $total+=31;
            case 7:
                $total+=30;
            case 6:
                $total+=31;
            case 5:
                $total+=30;
            case 4:
                $total+=31;
            case 3:
                $total+=28;
            case 2:
                $total+=31;
        }

        if($today["year"]%4 == 0 && $today["mon"]>2)
            $total++; //如果当年是闰年还要加一天

        $total=$total+$today["mday"]-1; //加当月的天数

        $flag1=0;  //判断跳出循环的条件
        $j=0;
        while ($j<=120){  //用农历的天数累加来判断是否超过阳历的天数
            $i=1;
            while ($i<=13){
                $mtotal+=$everymonth[$j][$i];
                if ($mtotal>=$total){
                     $flag1=1;
                     break;
                }
                $i++;
            }
            if ($flag1==1) break;
            $j++;
        }

        if($everymonth[$j][0]<>0 and $everymonth[$j][0]<$i){
            $mm=$i-1;
        } else {
            $mm=$i;
        }

        if($i==$everymonth[$j][0]+1 and $everymonth[$j][0]<>0) {
            $nlmon=$mmonth[0].$mmonth[$mm]; //闰月
        } else {
            $nlmon=$mmonth[$mm].$mmonth[13];
        }

        //计算所求月份1号的农历日期
        $md=$everymonth[$j][$i]-($mtotal-$total);
        if($md > $everymonth[$j][$i])
            $md-=$everymonth[$j][$i];
        $nlday=$mday[$md];
        $nowday = $mten[$everymonth[$j][14]] . $mtwelve[$everymonth[$j][15]] . "年" . $nlmon . $nlday;
        return $nowday;
    }

    //获取一段文本的标签
	function getTags($subjectenc, $messageenc='', $charset = 'utf-8') {
	    $return = '';
        $subjectenc = rawurlencode(strip_tags($subjectenc));
        $messageenc = rawurlencode(strip_tags(preg_replace("/\[.+?\]/U", '', $messageenc)));
        $data = @implode('', file("http://keyword.discuz.com/related_kw.html?title=" . $subjectenc . "&content=" . $messageenc . "&ics=" . $charset . "&ocs=" . $charset));

		if($data) {
			$values = null;
			$index = null;
			$parser = xml_parser_create();
			xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
			xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
			xml_parse_into_struct($parser, $data, $values, $index);
			xml_parser_free($parser);

			$kws = array();

			foreach($values as $valuearray) {
				if($valuearray['tag'] == 'kw' || $valuearray['tag'] == 'ekw') {
					if(PHP_VERSION > '5' && $charset != 'utf-8') {
						$valuearray['value'] = encodeconvert("UTF-8", $valuearray['value']);
					} else {
						$valuearray['value'] = trim($valuearray['value']);
					}
					$kws[] = $valuearray['value'];
				}
			}

			if($kws) {
				foreach($kws as $kw) {
					$kw = htmlspecialchars($kw);
					$return .= $kw.' ';
				}
				$return = htmlspecialchars($return);
			}
		}
		return ($return);
	}

    public function ip2area($ip, $ipdatafile) {
        static $fp = NULL, $offset = array(), $index = NULL;
        $ipdot = explode('.', $ip);
        $ip = pack('N', ip2long($ip));

        $ipdot[0] = (int)$ipdot[0];
        $ipdot[1] = (int)$ipdot[1];

        if($fp === NULL && $fp = @fopen($ipdatafile, 'rb')) {
            $offset = @unpack('Nlen', @fread($fp, 4));
            $index  = @fread($fp, $offset['len'] - 4);
        } elseif($fp == FALSE) {
            return  '- Invalid IP data file';
        }
        $length = $offset['len'] - 1028;
        $start  = @unpack('Vlen', $index[$ipdot[0] * 4] . $index[$ipdot[0] * 4 + 1] . $index[$ipdot[0] * 4 + 2] . $index[$ipdot[0] * 4 + 3]);
        for ($start = $start['len'] * 8 + 1024; $start < $length; $start += 8) {
            if ($index{$start} . $index{$start + 1} . $index{$start + 2} . $index{$start + 3} >= $ip) {
                $index_offset = @unpack('Vlen', $index{$start + 4} . $index{$start + 5} . $index{$start + 6} . "\x0");
                $index_length = @unpack('Clen', $index{$start + 7});
                break;
            }
        }

        @fseek($fp, $offset['len'] + $index_offset['len'] - 1024);
        if($index_length['len']) {
            return '- '.@fread($fp, $index_length['len']);
        } else {
            return '- Unknown';
        }
    }
}