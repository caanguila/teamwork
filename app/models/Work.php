<?php

class Work extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'title' => 'required',
		'duration' => 'required|numeric|min:0',
		'member_id' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['title', 'description', 'member_id', 'duration', 'inidate', 'enddate', 'completed'];
	
	public function member()
  {
      return $this->belongsTo('Member');
  }

}