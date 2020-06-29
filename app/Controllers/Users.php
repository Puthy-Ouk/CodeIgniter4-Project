<?php namespace App\Controllers;
use App\Models\UserModel;
class Users extends BaseController
{
	public function index()
	{
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post"){
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];

			if(!$this->validate($rules,$errors)){
				$data['validation'] = $this->validator;
	
			}else{
				$model = new UserModel();
				$user = $model->where('email',$this->request->getVar('email'))
							  ->first();
				$user = $model->where('password',$this->request->getVar('password'))
							  ->first();
				$this->setUserSession($user);
			
				return redirect()->to('Pizza');
			}

		}
		return view('auths/login',$data);
		//return view('auths/login');
	}

	public function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'email' => $user['email'],
			'password' => $user['password'],
			'address' => $user['address'],
			'roles' => $user['roles']
		];

		session()->set($data);
		return true;
	}	
	
   
    //--------------------------------------------------------------------
    
    public function singOut()
	{
		return view('auths/register');
	}

    
	//--------------------------------------------------------------------

	public function register()
	{
		$data = [];
		helper(['form']);
		if($this->request->getMethod() == "post"){
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required',
				'address' => 'required',
				
			];
			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
				return view('auths/register',$data);
			}else{
				$model = new UserModel();
				$newData = [
				'email' => $this->request->getVar('email'),
				'password' => $this->request->getVar('password'),
				'address' => $this->request->getVar('address'),
				'roles' => $this->request->getVar('roles'),
				];

				$model->save($newData);
				$session = session();
				$session->setFlashdata('success','successful Register');
				return redirect()->to('/signin');
			}

		}
		// return view('auths/register',$data);

	}

	//--------------------------------------------------------------------


	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}

	// set login
	 
	}