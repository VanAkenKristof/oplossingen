<?php 

class ToDo
{
	protected $toDoTitle;
	protected $itemCompleted;


	function __construct($toDoTitle)
	{
		$this->toDoTitle = $toDoTitle;
		$this->itemCompleted = false;
	}

	public function setCompletedTrue(){
		$this->itemCompleted=true;
	}

	public function setCompletedFalse(){
		$this->itemCompleted=false;
	}

	public function getItemCompleted(){
		return $this->itemCompleted;
	}

	public function getName(){
		return $this->toDoTitle;
	}
}









?>