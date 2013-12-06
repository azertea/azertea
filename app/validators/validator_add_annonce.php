<?php
class validators_user extends BaseValidator
{
	public function add(){
        // Add specific rule for the validation of data
        $rules = array(
            'productName' => 'required|min:6|max:30',
            'description' => 'required|min:4',
            'price' => 'required|min:4',
            'photo' => 'required|min:4',
            'url_sell' => 'required|min:4'
        );
        return $this->test($rules);
	}
}