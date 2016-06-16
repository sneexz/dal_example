# Simple JSON Rest API w/ Database Abstraction Layer

**API URL**
----
  Prepend this to all requests and base domain URL
  
  `/api.php/`

  **Sample:** `http://localhost:8888/api.php/`

**Headers**
----
  Apply headers to all requests

  `Accept: application/json`
  
  `Content-Type: application/json`

**Method: Get All Companies**
----
  Returns company entries

* **URL**

  `/company/`

* **Method:**

  `GET`
  
*  **URL Params**

  **Optional:**
    _Returns singular company if unique `id` supplied_
    
    `/company/1`

* **Data Params**

  N/A

* **Success Response:**

    **Content:** `{ success: true, message: 'Operation successful', data: ... }`
 
* **Error Response:**

    **Content:** `{ success: false, message: ..., data: ... }`

**Method: Get All Employees per Company**
----
  Returns employees entries specific to each company

* **URL**

  `/company/:id/employee/`

* **Method:**

  `GET`
  
*  **URL Params**
  
  **Required:**
    _Pass unique company `id` to limit employees_

    `/company/1/employee/`

* **Data Params**

  N/A

* **Success Response:**

    **Content:** `{ success: true, message: 'Operation successful', data: ... }`
 
* **Error Response:**

    **Content:** `{ success: false, message: ..., data: ... }`

**Method: Create Company**
----
  Create a company

* **URL**

  `/company/`

* **Method:**

  `POST`
  
*  **URL Params**
  
  N/A

* **Data Params**
  
    **Content:** `{ "name": "Company Test Name", "description": "Company Test Description"}`

* **Success Response:**

    **Content:** `{ success: true, message: 'Operation successful', data: ... }`
 
* **Error Response:**

    **Content:** `{ success: false, message: ..., data: ... }`

**Method: Create Employee for Company**
----
  Create an Employee & assign to a company

* **URL**

  `/company/:id/employee/`

* **Method:**

  `POST`
  
*  **URL Params**
  
  **Required:**
    _Pass unique company `id` to limit employees_

    `/company/1/employee/`

* **Data Params**
  
    **Content:** `{ "company_id": "2", "name": "Employee Test Name", "description": "Employee Test Description"}`

* **Success Response:**

    **Content:** `{ success: true, message: 'Operation successful', data: ... }`
 
* **Error Response:**

    **Content:** `{ success: false, message: ..., data: ... }`
