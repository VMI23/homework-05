<?php

require "VideoStore.php";

class Application
{
	private VideoStore $videoStore;

	public function __construct(VideoStore $videoStore)
	{
		$this->videoStore = $videoStore;
	}

	function run() : void
	{
		while (true) {
			echo "Choose the operation you want to perform \n";
			echo "Choose 0 for EXIT\n";
			echo "Choose 1 to fill video store\n";
			echo "Choose 2 to rent video (as user)\n";
			echo "Choose 3 to return video (as user)\n";
			echo "Choose 4 to list inventory\n";
			echo "Choose 5 to add rating!\n";

			$command = (int)readline();

			switch ($command) {
				case 0:
					echo "Bye!";
					die;
				case 1:
					$this->addMovies();
					break;
				case 2:
					$this->rentVideo();
					break;
				case 3:
					$this->returnVideo();
					break;
				case 4:
					$this->listInventory();
					break;
				case 5:
					$this->addRating();
					break;
				default:
					echo "Sorry, I don't understand you..";
			}
		}
	}

	private function addMovies()
	{
		$title = (string)readline("Enter movie title to add to store: ");


		$this->videoStore->addMovies($title);
	}

	private function rentVideo()
	{
		$title = readline("Enter movie title to rent video: ");


		$this->videoStore->checkOut($title);
	}

	private function returnVideo()
	{
		$title = readline("Enter movie title to rent video: ");


		$this->videoStore->returnMovie($title);
	}

	private function listInventory()
	{

		$this->videoStore->listItemsInStore();
	}

	private function addRating()
	{
		$title = readline("Enter Movie title to add rating ");
		$rating = (float)readline("Enter rating: ");
		$this->videoStore->usersRating($title, $rating);

	}
}
