<?php
/**
 * Created by PhpStorm.
 * User: linyulin
 * Date: 2019/4/8
 * Time: 6:17 PM
 */

namespace Im050\WeChat\Message\Formatter;


class Transfer extends Message
{
    private $fee;

    private $transactionId;

    private $memo;

    /**
     * via Vbot
     */
    public function handleMessage()
    {
        $array = (array) simplexml_load_string($this->content, 'SimpleXMLElement', LIBXML_NOCDATA);
        $des = (array) $array['appmsg']->des;
        $fee = (array) $array['appmsg']->wcpayinfo;

        $this->memo = is_string($fee['pay_memo']) ? $fee['pay_memo'] : null;
        $this->fee = substr($fee['feedesc'], 3);
        $this->transactionId = $fee['transcationid'];

        $this->string = current($des);
    }

    /**
     * @return mixed
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param mixed $fee
     * @return Transfer
     */
    public function setFee($fee)
    {
        $this->fee = $fee;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param mixed $transactionId
     * @return Transfer
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * @param mixed $memo
     * @return Transfer
     */
    public function setMemo($memo)
    {
        $this->memo = $memo;
        return $this;
    }

}