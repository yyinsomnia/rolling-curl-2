<?php
namespace RollingCurl;

class Request
{
	public $url = false;
    public $method = 'GET';
    public $postData = null;
    public $headers = null;
    public $options = null;

    /**
     * @param string $url
     * @param string $method
     * @param $postData
     * @param $headers
     * @param $options
     * @return void
     */
    function __construct($url, $method = 'GET', $postData = null, $headers = null, $options = null) {
        $this->url = $url;
        $this->method = $method;
        $this->postData = $postData;
        $this->headers = $headers;
        $this->options = $options;
    }

    /**
     * @return void
     */
    public function __destruct() {
        unset($this->url, $this->method, $this->postData, $this->headers, $this->options);
    }
}