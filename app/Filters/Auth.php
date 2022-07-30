<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = NULL)
	{
		if (!session()->has('logged_in')) {
			return redirect()->to(base_url());
		}
	}


	public function after(RequestInterface $request, ResponseInterface $response, $arguments = NULL)
	{
		;
	}
	
}


 ?>


