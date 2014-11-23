<?php

class Quote extends Controller
{
	public function index( $id = '' )
	{
		if ( $id == '' )
		{
			$maxId = ArloriaQuote::max('id');
			self::id(rand(2, $maxId));
			//$this->view('Quote/Index');
		}
		else
		{
			self::id( $id );
		}	
	}

	public function all()
	{
		$quotes = ArloriaQuote::all();//->paginate(15); // paginate
		$this->view('Quote/All', $quotes);
	}

	public function id( $id='' )
	{		
		if ( $id )
		{
			$quote = ArloriaQuote::find($id);
			if ( $quote )
			{
				if ( preg_match( '#json#', $id ) )
				{

					print_r(json_encode($quote)); exit;
				}
				$this->view('Quote/Quote', $quote);
			}
			else
			{
				$users = array('Mikey', 'Serio', 'Cat', 'Sheep', 'Mikouen', 'book', 'darkclone', 'TheDoctor', 'Lulolwen', 'unic0rn', 'Crumbs', 'Lucy', 'Didz', 'applet', 'Smek', 'Raz0r', 'cooldude');
				$randuser = array_rand($users);
				$this->view('Error/Error', "Whoops! ". $users[$randuser]  ." ate #" . $id);
			}
		}
		else
		{
			$this->view('Error/Error', "No quote with ID: " . $id);
		}
	}

	public function add()
	{
		$input = $_POST;
		if ( $input )
		{
			$quote = new ArloriaQuote;
			$quote->quote = nl2br(htmlspecialchars($input['quote']));
			$quote->save();
			$this->redirect( $quote->id );
		}
		else
		{
			$this->view('Quote/Add');
		}

	}

	public function random()
	{
		$maxId = ArloriaQuote::max('id');
		self::id(rand(2, $maxId));
	}

	public function search( $term='' )
	{
		$input = $_POST;

		if ( empty( $term ) )
		{
			$term = @$input['search'];
		}

		if ( $term )
		{
			$quotes = ArloriaQuote::where('quote', 'LIKE', '%'. $term . '%' )->get();
			$this->view('Quote/SearchResults', $quotes);
		}
		else
		{
			$this->view('Quote/Search');
		}
	}
}