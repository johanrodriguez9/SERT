<?php

class Hasher {

    private static $salt = 'sisTShareTheSort-*-_salt:)951';
    private static $size = 25;

    public function __construct() {
        $string = FCPATH;
       // $string = $string . "\\application\\libraries\\Hashids.php";
        require_once APPPATH . "/libraries/Hashids.php";
     //   require_once($string);
       // $string = FCPATH;
       // $string = $string . "\\application\\libraries\\Mapping.php";
        require_once APPPATH . "/libraries/Mapping.php";
      //  require_once($string);
    }

    public static function make($parm1, $param2 = NULL, $param3 = NULL, $param4 = NULL, $param5 = NULL) {
        $me = new Hasher;
        $encoded = "";
        $ha = new Hashids(self::$salt, self::$size);
        $ra = rand(1, 10000);

        if (is_null($param2) && is_null($param3) && is_null($param4) && is_null($param5)) {
            $encoded = $ha->encode($ra, $parm1);
        } elseif (!is_null($param2) && is_null($param3) && is_null($param4) && is_null($param5)) {
            $encoded = $ha->encode($ra, $parm1, $param2);
        } elseif (!is_null($param2) && !is_null($param3) && is_null($param4) && is_null($param5)) {
            $encoded = $ha->encode($ra, $parm1, $param2, $param3);
        } elseif (!is_null($param2) && !is_null($param3) && !is_null($param4) && is_null($param5)) {
            $encoded = $ha->encode($ra, $parm1, $param2, $param3, $param4);
        } elseif (!is_null($param2) && !is_null($param3) && !is_null($param4) && !is_null($param5)) {
            $encoded = $ha->encode($ra, $parm1, $param2, $param3, $param4, $param5);
        }

        return "/u/" . $encoded;
    }

    public static function verify($hash_string) {
        $me = new Hasher;
        $return = false;
        $ha = new Hashids(self::$salt, self::$size);
        if (count($ha->decode($hash_string)) > 0) {
            $return = true;
        }
        return $return;
    }

    public static function getList($hash_string) {
        $me = new Hasher;
        if (Hasher::verify($hash_string)) {
            $ha = new Hashids(self::$salt, self::$size);
            return $ha->decode($hash_string);
        } else {
            return "";
        }
    }

    public static function existInMap($hash_string) {
        $me = new Hasher;
        $return = false;
        $list = Hasher::getList($hash_string);
        foreach (Mapping::map() as $key => $value) {
            if ($key == $list[1]) {
                $return = true;
                break;
            }
        }
        return $return;
    }

    public static function getClassController($hash_string) {
        $me = new Hasher;
        $list = Hasher::getList($hash_string);
        $nameRoute = "";
        foreach (Mapping::map() as $key => $value) {
            if ($key == $list[1]) {
                $nameRoute = explode('@', $value);
                $nameRoute = $nameRoute[0];
                break;
            }
        }
        return $nameRoute;
    }

    public static function getMethodController($hash_string) {
        $me = new Hasher;
        $list = Hasher::getList($hash_string);
        $nameRoute = "";
        foreach (Mapping::map() as $key => $value) {
            if ($key == $list[1]) {
                $nameRoute = explode('@', $value);
                $nameRoute = $nameRoute[1];
                break;
            }
        }
        return $nameRoute;
    }

    public static function callController($hash) {
        if (Hasher::verify($hash)) {
            if (Hasher::existInMap($hash)) {
                $Class = Hasher::getClassController($hash);
                $Method = Hasher::getMethodController($hash);
                $list = Hasher::getList($hash);

                $string = $Class . '/' . $Method;
                if (count($list) > 2) {
                    for ($i = 2; $i < count($list); $i++) {
                        $string = $string . '/' . $list[$i];
                    }
                }
                return $string;
            } else {
                echo "No exist in Mapping Class...";
                die();
            }
        } else {
            echo "Error to verify Hash...";
            die();
        }
    }

    public static function getMenu() {
        $menu = [];
        foreach (Mapping::menus() as $key => $val) {
            if (gettype($val) == "string") {
                $menu[$key] =  Hasher::make($val);
            } elseif (gettype($val) == "array") {
                foreach ($val as $skey => $sval) {
                    $menu[$key][$skey] =  Hasher::make($sval);
                }
            }
        }
   return $menu;
    }

    //--------- modificacion santos limachi 
    public static function gethost()
        {
          if( $_SERVER['SERVER_NAME']=='www.sistemas.com')
          {
               return ;
          }else
          {
              return '/sistemas';
          }
        }
    //---------fin modificacion  aporte santos limachi 
    
    
//    public static function getMenu(){
//        $array = [];
//        foreach (Mapping::menus() as $key => $value) {
//            $array[$key] = "/dip/".Hasher::make($value);
//        }
//        return $array;
//    }
}