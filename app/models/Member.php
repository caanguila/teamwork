<?php

class Member extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required',
    'lastname' => 'required',
    'email' => 'required|email'
	];

	// Don't forget to fill this array
	protected $fillable = ['name','lastname','email'];

	public function works()
	{
      return $this->hasMany('Work');
	}
}