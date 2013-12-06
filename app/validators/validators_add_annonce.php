<?php
class validators_add_annonce extends BaseValidator
{
	public function add(){
        // Add specific rule for the validation of data
        $rules = array(
            'productName' => 'required|min:6',
            'description' => 'required|min:4',
            'price' => 'required',
            'photo' => 'required',
            'url_sell' => 'required'
        );
        return $this->test($rules);
	}
}