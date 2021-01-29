<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Contracts\Auth\MustVerifyEmail;

class EmiCalculator extends Model
{
    protected $_finalArray = [];
    protected $_time = NULL;
    protected $_principal = NULL;
    protected $_x = 0;
    protected $_paymentDate = NULL;

    protected $_totalInt = 0, $_rate = NULL, $_monthly, $_arr, $_data, $_tp, $_i = 0, $_k;
    
    public function setCalculationData(){
        $this->_x = pow(1+$this->_rate,$this->_time);
        $this->_paymentDate = date("Y m,d");
        $this->_monthly = ($this->_principal*$this->_x*$this->_rate)/($this->_x-1);
        return $this;
    }

    public function setPrincipal($principal){
        $this->_principal = $principal;
        return $this;
    }
    
    public function setInterest($interest){
        $this->_rate = $interest/100/12;
        return $this;
    }
    
    public function setDuration($duration){
        $this->_time = $duration;
        return $this;
    }

    public function getFinalData(){
        return $this->_finalArray;
    }

    public function getEmi($amount){
        $this->_i++;
        if($this->_time<=0){
            
            return 0;
        }
        $interest = $amount*$this->_rate;
        $principal = round($this->_monthly-$interest);
        $endBalance= round($amount-$principal);
        if($this->_time==2){
            $this->_data= $endBalance;
        }
        if($this->_time==1){
            $principal= $this->_data;	
            $endBalance= round($amount-$principal);
            $this->_monthly= round($principal+$interest);
        }
        $this->_totalInt = $this->_totalInt + $interest;
        $this->_tp = $this->_tp+$this->_monthly;
        $this->_time--;
        $this->_finalArray[$this->_i] = [
            'sn' => $this->_i,
            'interest' => number_format(round($interest)),
            'beginning_balance' => number_format($amount),
            'principle' => number_format($principal),
            'total_payment' => number_format($this->_monthly),
            'ending_balance' => number_format(round($endBalance))
        ];
        return $this->getEmi($endBalance);
    }  
    
}
