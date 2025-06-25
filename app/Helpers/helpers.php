<?php

if (! function_exists('youtube_embed')) {
    function youtube_embed($url): string
    {
        /*
        * type1: http://www.youtube.com/watch?v=H1ImndT0fC8
        * type2: http://www.youtube.com/watch?v=4nrxbHyJp9k&feature=related
        * type3: http://youtu.be/H1ImndT0fC8
        */
        $vid_id = "";
        $flag = false;
        if (isset($url) && !empty($url)) {
            /*case1 and 2*/
            $parts = explode("?", $url);
            if (isset($parts) && !empty($parts) && is_array($parts) && count($parts) > 1) {
                $params = explode("&", $parts[1]);
                if (isset($params) && !empty($params) && is_array($params)) {
                    foreach ($params as $param) {
                        $kv = explode("=", $param);
                        if (isset($kv) && !empty($kv) && is_array($kv) && count($kv) > 1) {
                            if ($kv[0] == 'v') {
                                $vid_id = $kv[1];
                                $flag = true;
                                break;
                            }
                        }
                    }
                }
            }

            /*case 3*/
            if (!$flag) {
                $needle = "youtu.be/";
                $pos = null;
                $pos = strpos($url, $needle);
                if ($pos !== false) {
                    $start = $pos + strlen($needle);
                    $vid_id = substr($url, $start, 11);
                    $flag = true;
                }
            }
        }
        return $vid_id;
    }
}

if(! function_exists('substr_')) {
    function substr_($string,$start,$limit=99999,$withFullWord=false,$continue=false){
        $originalString = $string;
        //This function doest not work in Japan alphabet
        $from=array("Ü","ü","Ö","ö",'Ç','ç','Ğ','ğ','Ə','ə','Ş','ş','"'); $to=array("ひ","ら","が","な","あ","本","人","そ","れ","で","も","急","変");
        $string=str_replace($from,$to,$string);
        if($withFullWord)
        {
            $string = preg_replace('/\s+?(\S+)?$/', '', mb_substr(decode_text($string,true,true), $start, $limit,"utf-8"));
        }
        else $string = mb_substr(decode_text($string,true,true,false), $start, $limit,"utf-8");
        $string=str_replace($to,$from,$string);
        if(strlen($originalString) > $limit && $continue)
            $string .= ' ...';
        return $string;
    }
}

if(! function_exists('decode_text'))
{
    function decode_text($value,$runHtml=false,$strip=false,$trim=true)
    {
        if ($trim) {
            $value = str_replace("&nbsp;", " ", $value);
            $value = trim($value);
        }
        $from = array('&single_quot;', '\\\\', "&nbsp;", "  ");
        $to = array("'", '\\', " ", " ");
        $value = str_replace($from, $to, $value);
        if ($runHtml) $value = html_entity_decode($value); else $value = htmlentities($value);
        if ($strip) $value = strip_tags($value);
        return $value;
    }
}
