<?php
/**
 * Created by PhpStorm.
 * User: tinkle
 * Date: 2017/9/22
 * Time: 11:57
 */
namespace Activity\Controller;
use Think\Controller;
class RequestCurlController extends Controller {

    protected $ch;
    public function __construct()
    {
        $this->ch = curl_init();
        $this->_init();
    }

    public function _init()
    {
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_HEADER, 0);
        curl_setopt($this->ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 10);
    }

    public function setOption($param,$value)
    {
        curl_setopt($this->ch,$param,$value);
    }

    public function get()
    {
        return curl_exec($this->ch);
    }

    public function _destroy()
    {
        curl_close($this->ch);
        $this->ch = null;
    }
}