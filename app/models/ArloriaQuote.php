<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class ArloriaQuote extends Eloquent
{
	protected $table = 'quotes';
	protected $fillable = array('quote');
}