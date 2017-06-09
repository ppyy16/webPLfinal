<?php
//project view
require_once('projectmodel.php');

//session checker otherwise dont let them here
if(!isset($_SESSION['loggedin'])) {
    header('Location:index5.html');
}



class projectview {
	//variable model
	private $model;

	//view constructor for building new instance of model
	function __construct() {
		$this->model = new projectmodel();
	}

	//run function view student info and encode it into json to send back
	public function addartist($artiststagename, $artistfullname, $artistfulllastnamelabel, $artistbirthday, $artistdesc, $artisttwitter) {
		$result = $this->model->addartist($artiststagename, $artistfullname, $artistfulllastnamelabel, $artistbirthday, $artistdesc, $artisttwitter);

        // result will hold an associate array of students
		echo json_encode($result);
	}


	
	public function searchartist($artiststagename) {
		$result = $this->model->searchartist($artiststagename);
		echo json_encode($result);
	}

	public function filloutartist($artiststagename){
		$result = $this->model->filloutartist($artiststagename);
		//result is an array and we want the shit out of the array
		$_SESSION['stagename2'] = $result[0]['stagename'];
		$_SESSION['first2'] = $result[0]['first'];
		$_SESSION['last2'] = $result[0]['last'];
		$_SESSION['birthday2'] = $result[0]['birthday'];
		$_SESSION['description2'] = $result[0]['description'];
		$_SESSION['twitter2'] = $result[0]['twitterid'];


		json_encode($result);

	}

	public function autosearch($autosearch){
				$result = $this->model->autosearch($autosearch);


		echo json_encode($result);
	}



public function addartisttofaves($addtofave, $useremail){
				$result = $this->model->addartisttofaves($addtofave, $useremail);


		echo json_encode($result);
	}


	



	
}

?>
