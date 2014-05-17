<?php

class Application
{
	private $path;
	public $connection;
	
	
	public function __construct()
	{
		session_start();
		
		$this->path['application'] = __DIR__.'/..';
		$this->path['controller'] = $this->path['application'].'/controllers';
		$this->path['modele'] = $this->path['application'].'/modeles';
		$this->path['library'] = $this->path['application'].'/libraries';
		$this->path['view'] = $this->path['application'].'/views';
		$this->path['css'] = $this->path['application'].'/css';
		$this->path['javascript'] = $this->path['application'].'/javascript';
		$this->path['image'] = $this->path['application'].'/images';
				
		$this->load('library', 'connection.php');
		$this->connection = array(	'server' => 'localhost',
									'username' => 'root',
									'password' => '',
									'database' => '');
		$this->connection = new Connection($this->connection['server'], $this->connection['username'], $this->connection['password'], $this->connection['database']);
		$this->connection->select_database('whatsup');
	}
	
	public function path($type, $name)
	{
		return $this->path[$type].'/'.$name;
	}
	
	public function load($type, $name)
	{
		require_once $this->path($type, $name);
	}
}

