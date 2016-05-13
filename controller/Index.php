<?php
require_once 'lib/Controller.php';
require_once 'service/UserService.php';
require_once 'model/User.php';

class Index extends Controller {
	
	public function create($name, $age) {
		$this->view->message = 'Index Controller:: Creating User';
		echo "Name: ". $name . "<br/>" . "Age: " . $age . "<br/>";
		$user = $this->getUser($name, $age);
		echo "Name: ". $user->getName() . "<br/>" . "Age: " . $user->getAge() . "<br/>";
		$userService = new UserService();
		$userService->insertUser($user);
		$this->view->render('view/index/index.phtml');
	}

	public function fetchUser($name) {
		$this->view->message = 'Index Controller:: Fetching User';
		$user = $this->getUser($name, null);
		$userService = new UserService();
		$userService->selectUser($user);
		$this->view->render('view/index/index.phtml');
	}

	public function updateUser($name, $age) {
		$this->view->message = 'Index Controller:: Updating User';
		$user = $this->getUser($name, $age);
		$userService = new UserService();
		$userService->updateUser($user);
		$this->view->render('view/index/index.phtml');
	}

	public function deleteUser($name) {
		$this->view->message = 'Index Controller:: Deleting User';
		$user = $this->getUser($name, null);
		$userService = new UserService();
		$userService->deleteUser($user);
		$this->view->render('view/index/index.phtml');
	}

	private function getUser($name, $age) {
		echo "Name: ". $name . "<br/>" . "Age: " . $age . "<br/>";
		$user = new User();

		if($age!=null) {
			$user->setAge($age);
		}

		$user->setName($name);
		return $user;
	}
}