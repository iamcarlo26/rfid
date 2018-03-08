<?php
/**
 * @author Carlo Roxas <iam@carloroxas.com>
 * PHP Serial Reader
 */
namespace Rfid;

use lepiaf\SerialPort\SerialPort;
use lepiaf\SerialPort\Parser\SeparatorParser;
use lepiaf\SerialPort\TTYConfigure;


class Rfid
{
    private $serialPort;
    private $tty;

    function __construct($tty)
    {
        $this->serialPort = new SerialPort(new SeparatorParser(), new TTYConfigure());

        if (isset($tty)) {
            $this->tty = $tty;
        }
    }

    public function openSerial()
    {
        $this->serialPort->open($this->tty);
    }

    public function readFromSerial()
    {
        $data = $this->serialPort->read();

        return $data;
    }

    public function closeSerial()
    {
        $this->serialPort->close();
    }
}