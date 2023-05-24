<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{
    protected $modelName = 'App\Models\UsersModel';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'message' => 'success',
            'data users' => $this->model->orderBy('id', 'desc')->findAll()
        ];
        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);
        return $this->respond($data, 200);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = $this->validate($this->model->getValidationRules());
        if (!$rules) {
            $response = [
                'error' => $this->validator->getErrors()
            ];
            return $this->failValidationErrors($response);
        }

        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $data = $this->model->insert([
            'email' => esc($this->request->getVar('email')),
            'username' => esc($this->request->getVar('username')),
            'password' => esc($hashedPassword),
            'profile' => esc($this->request->getVar('profile')),
        ]);
        $response = [
            'success' => 'Account has been created !',
            'data' => [
                'Email' => $email,
                'Username' => $username,
                'Password' => $hashedPassword

            ]
        ];
        return $this->respondCreated($response);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {

        $isExist = $this->model->where('id', $id)->findAll();
        $password = $this->request->getVar('password');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'id' => $id,
            'password' => $hashedPassword
        ];
        if (!$isExist) {
            return $this->failNotFound("Data tidak ditemukan");
        }
        if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }
        $response = [
            'status' => 200,
            'error' => null,
            'message' => [
                'success' => 'Users Has Been Updated !'
            ]
        ];
        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->model->where('id', $id)->findAll();
        if (!$data) {
            return $this->failNotFound('Data Tidak Di temukan !');
        }
        $delete = $this->model->where('id', $id)->delete();
        $response = [
            'status' => 200,
            'error' => null,
            'message' => 'Data Berhasil Di Hapus !'
        ];
        return $this->respond($response, 200);
    }
}
