<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/08/18
 * Time: 11:36 م
 */

namespace App\models;


class CreditCardUser{

    public $inputName = '';
    public $inputMobile = '';
    public $inputEmail = '';
    public $inputComments = '';

    public $inputCardName = '';
    public $inputCardNumber = 0;
    public $inputCardMonth = 1;
    public $inputCardYear = 2000;
    public $inputCardSecure = '';

    /**
     * CreditCardUser constructor.
     * @param string $inputName
     * @param string $inputMobile
     * @param string $inputEmail
     * @param string $inputComments
     * @param string $inputCardName
     * @param int $inputCardNumber
     * @param int $inputCardMonth
     * @param int $inputCardYear
     * @param string $inputCardSecure
     */
    public function __construct(string $inputName, string $inputMobile, string $inputEmail, string $inputComments, string $inputCardName, int $inputCardNumber, int $inputCardMonth, int $inputCardYear, string $inputCardSecure)
    {
        $this->inputName = $inputName;
        $this->inputMobile = $inputMobile;
        $this->inputEmail = $inputEmail;
        $this->inputComments = $inputComments;
        $this->inputCardName = $inputCardName;
        $this->inputCardNumber = $inputCardNumber;
        $this->inputCardMonth = $inputCardMonth;
        $this->inputCardYear = $inputCardYear;
        $this->inputCardSecure = $inputCardSecure;
    }

    /**
     * @return string
     */
    public function getInputName(): string
    {
        return $this->inputName;
    }

    /**
     * @param string $inputName
     */
    public function setInputName(string $inputName): void
    {
        $this->inputName = $inputName;
    }

    /**
     * @return string
     */
    public function getInputMobile(): string
    {
        return $this->inputMobile;
    }

    /**
     * @param string $inputMobile
     */
    public function setInputMobile(string $inputMobile): void
    {
        $this->inputMobile = $inputMobile;
    }

    /**
     * @return string
     */
    public function getInputEmail(): string
    {
        return $this->inputEmail;
    }

    /**
     * @param string $inputEmail
     */
    public function setInputEmail(string $inputEmail): void
    {
        $this->inputEmail = $inputEmail;
    }

    /**
     * @return string
     */
    public function getInputComments(): string
    {
        return $this->inputComments;
    }

    /**
     * @param string $inputComments
     */
    public function setInputComments(string $inputComments): void
    {
        $this->inputComments = $inputComments;
    }

    /**
     * @return string
     */
    public function getInputCardName(): string
    {
        return $this->inputCardName;
    }

    /**
     * @param string $inputCardName
     */
    public function setInputCardName(string $inputCardName): void
    {
        $this->inputCardName = $inputCardName;
    }

    /**
     * @return int
     */
    public function getInputCardNumber(): int
    {
        return $this->inputCardNumber;
    }

    /**
     * @param int $inputCardNumber
     */
    public function setInputCardNumber(int $inputCardNumber): void
    {
        $this->inputCardNumber = $inputCardNumber;
    }

    /**
     * @return int
     */
    public function getInputCardMonth(): int
    {
        return $this->inputCardMonth;
    }

    /**
     * @param int $inputCardMonth
     */
    public function setInputCardMonth(int $inputCardMonth): void
    {
        $this->inputCardMonth = $inputCardMonth;
    }

    /**
     * @return int
     */
    public function getInputCardYear(): int
    {
        return $this->inputCardYear;
    }

    /**
     * @param int $inputCardYear
     */
    public function setInputCardYear(int $inputCardYear): void
    {
        $this->inputCardYear = $inputCardYear;
    }

    /**
     * @return string
     */
    public function getInputCardSecure(): string
    {
        return $this->inputCardSecure;
    }

    /**
     * @param string $inputCardSecure
     */
    public function setInputCardSecure(string $inputCardSecure): void
    {
        $this->inputCardSecure = $inputCardSecure;
    }

}