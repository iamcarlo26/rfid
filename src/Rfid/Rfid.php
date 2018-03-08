<?php
/**
 * @author Carlo Roxas <iam@carloroxas.com>
 * PHP Serial Reader
 */
namespace Rfid;

use lepiaf\SerialPort\SerialPort;
use lepiaf\SerialPort\Parser\SeparatorParser;
use lepiaf\SerialPort\Configure\TTYConfigure;


class Rfid
{
    private $serialPort;
    private $tty;
    private $configure;

    public function __construct($tty)
    {
        $this->configure = new TTYConfigure();
        $this->configure->setOption("9600");
        $this->serialPort = new SerialPort(new SeparatorParser(), $this->configure);

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
        return $this->serialPort->read();
    }

    public function closeSerial()
    {
        $this->serialPort->close();
    }
}