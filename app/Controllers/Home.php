<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function cadastro()
    {
        helper('app');
        $data = [];
        // Checar se ha erros de validacao na sessao 
        if (session()->has('validation_errors')) {
            $data['validation_errors'] = session()->getFlashdata('validation_errors');
        }

        if (session()->has('signup_error')) {
            $data['signup_error'] = session()->getFlashdata('signup_error');
        }

        return view('Common/head', $data)
            . view('Common/style')
            . view('cadastro');
    }

    public function cadastro_submit()
    {

        $validacao = $this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Preenchimento do {field} é obrigatório.',
                    'valid_email' => 'Favor inserir um {field} válido.'
                ]
            ],
            'senha' => [
                'label' => 'Senha',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Preenchimento da {field} é obrigatório.',
                ]
            ],
            'nome' => [
                'label' => 'Nome',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Preenchimento do {field} é obrigatório.',
                ]
            ],
            'sobrenome' => [
                'label' => 'Sobrenome',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Preenchimento do {field} é obrigatório.',
                ]
            ],
            'celular' => [
                'label' => 'Celular',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Preenchimento do {field} é obrigatório.',
                ]
            ],
            'confirm_senha' => [
                'label' => 'Nome',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Preenchimento do {field} é obrigatório.',
                ]
            ],

        ]);

         // Checar validacao
         if (!$validacao) {
            return redirect()
                ->back()
                ->withInput()
                ->with('validation_errors', $this->validator->getErrors());
        }

        $nome = $this->request->getPost('nome');
        $sobrenome = $this->request->getPost('sobrenome');
        $celular = $this->request->getPost('celular');
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

       
        $user = new UserModel;
        $result = $user->checar_conta($email);

        if ($result) {
            return redirect()
            ->back()
            ->withInput()
            ->with('signup_error', ['signup_senha' => 'Já existe uma conta registrada com o mesmo email.'] );
        }

        $user->criar_conta($email, $nome, $senha, $sobrenome, $celular);

        return redirect()->to('/');
    }

    public function cadastro_pet()
    {
        helper('app');
        $data = [];
        // Checar se ha erros de validacao na sessao 
        if (session()->has('validation_errors')) {
            $data['validation_errors'] = session()->getFlashdata('validation_errors');
        }

        return view('Common/head', $data)
            . view('Common/style')
            . view('cadastro_pet');
    }

    public function pet_submit()
    {
        $validacao = $this->validate([
            'tipo' => [
                'label' => 'Tipo de Pet',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Preenchimento do {field} é obrigatório.',
                ]
            ],
            'raca' => [
                'label' => 'Raça',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Preenchimento da {field} é obrigatório.',
                ]
            ],
            'nome' => [
                'label' => 'Nome',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Preenchimento do {field} é obrigatório.',
                ]
            ],
            'porte' => [
                'label' => 'Porte',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Preenchimento do {field} é obrigatório.',
                ]
            ],

        ]);

        // Checar validacao
        if (!$validacao) {
            return redirect()
                ->back()
                ->withInput()
                ->with('validation_errors', $this->validator->getErrors());
        }

        $nome = $this->request->getPost('nome');
        $raca = $this->request->getPost('raca');
        $tipo = $this->request->getPost('tipo');
        $porte = $this->request->getPost('porte');

        $pet = new UserModel;
        $pet->cadastra_pet($nome, $raca, $tipo, $porte);

        return redirect()->to('cadastro_pet/');
    }

    public function login()
    {
        helper('app');
        $data = [];
        // Checar se ha erros de validacao na sessao 
        if (session()->has('validation_errors')) {
            $data['validation_errors'] = session()->getFlashdata('validation_errors');
        }

        if (session()->has('login_error')) {
            $data['login_error'] = session()->getFlashdata('login_error');
        }

        return view('Common/head', $data)
            . view('Common/style')
            . view('login');

    }

    public function login_submit()
    {
        $validacao = $this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Preenchimento do {field} é obrigatório.',
                    'valid_email' => 'Favor inserir um {field} válido.'
                ]
            ],
            'senha' => [
                'label' => 'Senha',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Preenchimento da {field} é obrigatório.',
                ]
            ]

        ]);

        if (!$validacao) {
            return redirect()
                ->back()
                ->withInput()
                ->with('validation_errors', $this->validator->getErrors());
        }

        $user = new UserModel();
        $senha = $this->request->getPost('senha');
        $email = $this->request->getPost('email');

        $results = $user->verifica_login($email, $senha);

        if ($results['conta_invalida']) {

            // Login Erro
            return redirect()
                ->back()
                ->withInput()
                ->with('login_error', ['email' => 'Email ou senha invalido, Favor inserir uma credencial correta.'] );
        }

        $id_user = $results['id_user'];
        $results = $user->get_user_data($id_user);

        //Cria sessao de usuario
        session()->set('usuario', $results[0]);

        return redirect()->to('inicio');
    }

    public function inicio()
    {
        return view('Common/head')
            . view('Common/style')
            . view('inicio');
    }

    // =============================================================== 
    public function logout()
    {
        // remove sessao de usuario
        session()->remove('usuario');
        return redirect('/');
    }

    public function sobre(){

        return view('Common/head')
            . view('Common/style')
            . view('sobre');
    }

    public function buscar(){

        $data = [];
        $pesquisa = "%" . trim($this->request->getGet('buscar')) . "%";
        if (!empty($pesquisa)){
        
        
        $pet = new UserModel;
        $resultado = $pet->procura_pet($pesquisa);
        
        $data = [
            'resultado' => $resultado
        ];
    }
    
        return view('Common/head')
            . view('Common/style')
            . view('buscar', $data);
    
    }

    public function minha_conta(){

        return view('Common/head')
            . view('Common/style')
            . view('minha_conta');
    }

    public function meu_pet(){

        $pet = new UserModel;
        $result = $pet->meus_pets();

        $data = [
            'pet' => $result
        ];

        return view('Common/head')
            . view('Common/style')
            . view('meu_pet', $data);
    }
}
