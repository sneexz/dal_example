<?php
ini_set('default_charset', 'utf-8');
require_once('require.php');

$request = new Request;
$response = new Response($request);

$results = [];
switch ($request->method) {
  case 'GET':
  	if ($request->sub_resource && $request->sub_resource == 'employee') {
  		// get all employees per company
  		$employeeRepository = new EmployeeRepository;
		$results = $employeeRepository->findByCompany($request->resource_key);
  	} else {
  		if ($request->resource == 'company') {
  			// get all companies
	  		$companyRepository = new CompanyRepository;
			$results = $companyRepository->findAll($request->resource_key);
	  	} elseif ($request->resource == 'employee') {
	  		// get all employees
	  		$employeeRepository = new EmployeeRepository;
			$results = $employeeRepository->findAll();
	  	}
  	}
    break;
  case 'PUT':
    // NOT IMPLEMENTED
    break;
  case 'POST':
  	if ($request->sub_resource && $request->sub_resource == 'employee') {
  		// create employee for company
  		$employeeRepository = new EmployeeRepository;
		$results = $employeeRepository->createForCompany($request->input, $request->resource_key);
  	} else {
  		if ($request->resource == 'company') {
  			// create company
	  		$companyRepository = new CompanyRepository;
			$results = $companyRepository->create($request->input, $request->resource_key);
	  	}
  	}
    break;
  case 'DELETE':
    // NOT IMPLEMENTED
    break;
}

echo $response->serialize($results);
$error = json_last_error();
debug($error);
