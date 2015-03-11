<?php
namespace RollingCurl;

class Collector 
{
	private $data;
	private $requests;
    private $queue;

    public function __construct()
    {
        $this->queue = new Queue(array($this, 'processPage'));
    }

    public function processPage($response, $info, $request)
    {
    	list($key, ) = array_keys($this->requests, $request);
    	if ($info['http_code'] !== 200)
            $this->data[$key] = false; //not null because the api may return the null
        else
            $this->data[$key] = $response;
    }

    public function addRequest($key, Request $request)
    {
        $this->requests[$key] = $request;
    }


    public function run(array $requests)
    {
        foreach ($requests as $key => $request) {
        	if (!($request instanceof Request))
        		throw new Exception('The request must be instance of the \\RollingCurl\\Exception');
      		$this->requests[$key] = $request;
            $this->queue->add($request);
        }
        $this->queue->execute();
    }

    public function getData($key = null)
    {
        if ($key === null)
            return $this->data;
        else
            return isset($this->data[$key]) ? $this->data[$key] : null;
    }
}
