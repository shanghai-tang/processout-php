<?php

// The content of this file was automatically generated

namespace ProcessOut;

use ProcessOut\ProcessOut;
use ProcessOut\Networking\Request;

class InvoiceDevice
{

    /**
     * ProcessOut's client
     * @var ProcessOut\ProcessOut
     */
    protected $client;

    /**
     * Channel of the device
     * @var string
     */
    protected $channel;

    /**
     * IP address of the device
     * @var string
     */
    protected $ipAddress;

    /**
     * InvoiceDevice constructor
     * @param ProcessOut\ProcessOut $client
     * @param array|null $prefill
     */
    public function __construct(ProcessOut $client, $prefill = array())
    {
        $this->client = $client;

        $this->fillWithData($prefill);
    }

    
    /**
     * Get Channel
     * Channel of the device
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set Channel
     * Channel of the device
     * @param  string $value
     * @return $this
     */
    public function setChannel($value)
    {
        $this->channel = $value;
        return $this;
    }
    
    /**
     * Get IpAddress
     * IP address of the device
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set IpAddress
     * IP address of the device
     * @param  string $value
     * @return $this
     */
    public function setIpAddress($value)
    {
        $this->ipAddress = $value;
        return $this;
    }
    

    /**
     * Fills the current object with the new values pulled from the data
     * @param  array $data
     * @return InvoiceDevice
     */
    public function fillWithData($data)
    {
        if(! empty($data['channel']))
            $this->setChannel($data['channel']);

        if(! empty($data['ip_address']))
            $this->setIpAddress($data['ip_address']);

        return $this;
    }

    
}
