<?php
class validators_search extends BaseValidator
{
	public function search(){
        // Add specific rule for the validation of data
        $rules = array(
            'search'=>''//string à spliter
        );
        return $this->test($rules);
	}
    public function tree(){
        // Add specific rule for the validation of data
        $rules = array(
            '??'=>''
        );
        return $this->test($rules);
    }
    public function produit(){
        // Add specific rule for the validation of data
        $rules = array(
            '??'=>''
        );
        return $this->test($rules);
    }
}