<?php namespace App\Controllers;
use App\Models\PizzaModel;
class Pizzas extends BaseController
{
	public function index()
	{
		$pizza = new PizzaModel();
		$data['pizzas'] = $pizza->findAll();
		return view('/index',$data);
	}

	//--------------------------------------------------------------------

	public function addPizza()
	{
		$data = [];
		helper(['form']);
		if($this->request->getMethod() == "post"){

			$rules = [
				'name' => 'required',
				'ingredients' => 'required',
				'price' => 'required'
			];
			if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
				//return view('/index',$data);
			}else{
				$pizza = new PizzaModel();

				$newData = [
				'name' => $this->request->getVar('name'),
				'ingredients' => $this->request->getVar('ingredients'),
				'price' => $this->request->getVar('price'),
				];

				$pizza->save($newData);
				$session = session();
				$session->setFlashdata('success','successful Register');
				return redirect()->to('/pizza');
			}

		}
	}

	//--------------------------------------------------------------------
	
	public function delectPizza($id)
	{
        $pizza = new PizzaModel();
        $pizza->delete($id);
		return redirect()->to('/pizzas');
	}

	// public function showFormEdit($id)
	// {
	// 	$pizza = new PizzaModel();
	// 	$data['pizza'] = $pizza->find($id);
	// 	return view('Pizzas/update',$data);
	// }

	// //--------------------------------------------------------------------
	
	// public function updatePizza()
	// {
	// 	$pizza = new PizzaModel();
	// 	$pizza->update($_POST['id'],$_POST);
	// 	return redirect()->to('/pizza');

	// }

}
