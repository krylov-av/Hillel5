<?php
class Currency
{
    private $isoCode;
    private function getCurrencyInfo ($curency)
    {
        $curercy_base = array(
            'AFA' => '971',
            'AWG' => '533',
            'AUD' => '036',
            'ARS' => '032',
            'AZN' => '944',
            'BSD' => '044',
            'BDT' => '050',
            'BBD' => '052',
            'BYR' => '974',
            'BOB' => '068',
            'BRL' => '986',
            'GBP' => '826',
            'BGN' => '975',
            'KHR' => '116',
            'CAD' => '124',
            'KYD' => '136',
            'CLP' => '152',
            'CNY' => '156',
            'COP' => '170',
            'CRC' => '188',
            'HRK' => '191',
            'CPY' => '196',
            'CZK' => '203',
            'DKK' => '208',
            'DOP' => '214',
            'XCD' => '951',
            'EGP' => '818',
            'ERN' => '232',
            'EEK' => '233',
            'EUR' => '978',
            'GEL' => '981',
            'GHC' => '288',
            'GIP' => '292',
            'GTQ' => '320',
            'HNL' => '340',
            'HKD' => '344',
            'HUF' => '348',
            'ISK' => '352',
            'INR' => '356',
            'IDR' => '360',
            'ILS' => '376',
            'JMD' => '388',
            'JPY' => '392',
            'KZT' => '368',
            'KES' => '404',
            'KWD' => '414',
            'LVL' => '428',
            'LBP' => '422',
            'LTL' => '440',
            'MOP' => '446',
            'MKD' => '807',
            'MGA' => '969',
            'MYR' => '458',
            'MTL' => '470',
            'BAM' => '977',
            'MUR' => '480',
            'MXN' => '484',
            'MZM' => '508',
            'NPR' => '524',
            'ANG' => '532',
            'TWD' => '901',
            'NZD' => '554',
            'NIO' => '558',
            'NGN' => '566',
            'KPW' => '408',
            'NOK' => '578',
            'OMR' => '512',
            'PKR' => '586',
            'PYG' => '600',
            'PEN' => '604',
            'PHP' => '608',
            'QAR' => '634',
            'RON' => '946',
            'RUB' => '643',
            'SAR' => '682',
            'CSD' => '891',
            'SCR' => '690',
            'SGD' => '702',
            'SKK' => '703',
            'SIT' => '705',
            'ZAR' => '710',
            'KRW' => '410',
            'LKR' => '144',
            'SRD' => '968',
            'SEK' => '752',
            'CHF' => '756',
            'TZS' => '834',
            'THB' => '764',
            'TTD' => '780',
            'TRY' => '949',
            'AED' => '784',
            'USD' => '840',
            'UGX' => '800',
            'UAH' => '980',
            'UYU' => '858',
            'UZS' => '860',
            'VEB' => '862',
            'VND' => '704',
            'AMK' => '894',
            'ZWD' => '716'
        );
        return $curercy_base[$curency];
    }

    public function __construct($cur)
    {
        $this->setisoCode($cur);
    }
    public function getisoCode()
    {
        return $this->isoCode;
    }
    private function setisoCode($cur)
    {
        if ($this->getCurrencyInfo($cur))
        {
            $this->isoCode=$cur;
        }
        else
        {
            throw new InvalidArgumentException('Currency code is invalid');
        }
    }
    public function equals (Currency $currency)
    {
        //We return true, if iso codes is equal
        return ($this->getisoCode()==$currency->getisoCode());
    }
}

class Money
{
    private int $amount;
    private Currency $currency;
    //Число и валюту принимать через конструктор класса.
    public function __construct(int $amount, Currency $currency)
    {
        $this->setAmount($amount)
             ->setCurrency($currency);
        return $this;
    }
    public function getAmount()
    {
        return $this->amount;
    }
    private function setAmount(int $amount)
    {
        $this->amount=$amount;
        return $this;
    }
    public function getCurrency()
    {
        return $this->currency->getisoCode();
    }
    private function setCurrency($currency)
    {
        $this->currency=$currency;
        return $this;
    }
    public function equals(Money $money)
    {
        return ($this->getCurrency()==$money->getCurrency() && $this->amount==$money->amount);
    }
    public function add(Money $money)
    {
        if ($this->getCurrency()!=$money->getCurrency())
            throw new InvalidArgumentException('Currencies must be the same in add function.');
        $this->amount+=$money->amount;
    }
}

function dd($variable)
{
    print "<pre>";
    var_dump($variable);
    print "</pre>";
}

$cur1=new Currency("UAH");
dd($cur1);
print "<hr>";
$cur2=new Currency("RUB");
dd($cur2);
print "<hr>";
print $cur1->equals($cur2);
print "<hr><hr>";

$cur3=new Currency("USD");
dd($cur3);
print "<hr>";
$cur4=new Currency("USD");
dd($cur4);
print "<hr>";
print $cur3->equals($cur4);
print "<hr><hr>";

//$cur5=new Currency("UUU");

$money1 = new Money(5,new Currency("USD"));
$money2 = new Money(5,new Currency("USD"));
dd($money1);
print "Money1=Money2::".$money1->equals($money2)."<hr>";
$money3 = new Money(53,new Currency("USD"));
$money1->add($money3);
dd($money1);
$money4 = new Money(53,new Currency("UAH"));

print "Money4 amount = ".$money4->getAmount()."<br>";
print "Money4 currency = ".$money4->getCurrency();

$money2->add($money4);