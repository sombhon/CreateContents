<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utility
{
    private $charList = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
    public function genCode($num = 11)
    {
        $code = "";
        for ($i = 0; $i < $num; $i++) {
            $code .= $this->charList[mt_rand(0, 61)];
        }
        return $code;
    }

    /* ==== เข้ารหัส ถอดรหัส ===== */

    public function encode($text = "")
    {
        $CI =& get_instance();
        $CI->load->library("encrypt");

        $encoded = "";
        //นำข้อมูลมาเข้ารหัส และตรวจสอบว่า เมื่ถอดรหัสออก มีค่าเท่ากับที่สงเข้ามาหรือไม่ ถ้าไม่ = ให้เข้ารหัสใหม่อีกครั้ง
        do {
            $encoded = $CI->encrypt->encode($text);
        } while ($text != $CI->encrypt->decode($encoded));
        return $encoded;
    }

    public function decode($encoded)
    {
        $CI =& get_instance();
        $CI->load->library("encrypt");
        return $CI->encrypt->decode($encoded);
    }

    /* ==== จบ เข้ารหัส ถอดรหัส === */

    public function error_box($text)
    {
        echo "<div class='alert d-block alert-danger'>" . $text . "</div>";
    }

    public function success_box($text)
    {
        echo "<div class='alert d-block alert-success'>" . $text . "</div>";
    }

    public function getAge($birthday)
    {
        $then = strtotime($birthday);
        return (floor((time() - $then) / 31556926));
    }

    public function numtoStar($numstar)
    {
        $x        = round($numstar);
        $star     = "&#9733;";
        $starnone = "&#9734";
        $reult    = '';
        switch ($x) {
            case 1:
                $reult = $star . $starnone . $starnone . $starnone . $starnone;
                break;
            case 2:
                $reult = $star . $star . $starnone . $starnone . $starnone;
                break;
            case 3:
                $reult = $star . $star . $star . $starnone . $starnone;
                break;
            case 4:
                $reult = $star . $star . $star . $star . $starnone;
                break;
            case 5:
                $reult = $star . $star . $star . $star . $star;
                break;
            default:
                $reult = "คะแนนไม่ถูกต้อง";
        }
        return $reult;
    }

    public function calcDiscountPer($full , $perdiscount)
    {
        return $full * $perdiscount / 100;
    }
}
