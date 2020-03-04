<?php

namespace pebblip\domain;

class Environment implements \Serializable
{
    /**
     * @var float
     */
    private $currentVal = 0;

    /**
     * @var array
     */
    private $oprands;

    /**
     * @var bool
     */
    private $requestedQuit = false;

    /**
     * @return float
     */
    public function getCurrentVal(): float
    {
        return $this->currentVal;
    }

    /**
     * @param float $currentVal
     * @return Environment
     */
    public function setCurrentVal(float $currentVal): Environment
    {
        $this->currentVal = $currentVal;
        return $this;
    }

    /**
     * @param int index
     * @return float
     */
    public function getOprand(int $i): float
    {
        return $this->oprands[$i];
    }

    /**
     * @param array $oprands
     * @return Environment
     */
    public function setOprands(array $oprands): Environment
    {
        $this->oprands = $oprands;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRequestedQuit(): bool
    {
        return $this->requestedQuit;
    }

    /**
     * @param bool $requestedQuit
     * @return Environment
     */
    public function setRequestedQuit(bool $requestedQuit): Environment
    {
        $this->requestedQuit = $requestedQuit;
        return $this;
    }

    public function clear()
    {
        $this->oprands = [];
        $this->requestedQuit = false;
        $this->currentVal = 0;
    }

    /**
     * @inheritDoc
     */
    public function serialize()
    {
        return serialize([$this->currentVal, $this->oprands, $this->requestedQuit,]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        [$this->currentVal, $this->oprands, $this->requestedQuit] = unserialize($serialized);
    }
}
