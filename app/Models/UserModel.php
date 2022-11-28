<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuario';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // ========================================================================
    public function verifica_login ($email, $senha){
        $params = [
            'email' => $email 
        ];

        $db = db_connect();
        $results = $db->query("SELECT id, senha FROM usuario WHERE :email: = email", $params)->getResultObject();

        // Results
        if(count($results) == 0){
            return [
                'status' => false,
                'id_user' =>null,
                'conta_invalida' => true
            ];
        }    

        if(!password_verify($senha, $results[0]->senha)){
            return [
                'status' => false,
                'id_user' =>null,
                'conta_invalida' => true
            ];
        } else {
            return [
                'status' => true,
                'id_user' => $results[0]->id,
                'conta_invalida' => false
            ];
        }
    }
    public function get_user_data($id_user)
    {
        $params = [
            'id_user' => $id_user
        ];

        $db = db_connect();

        return $db->query("SELECT * FROM usuario WHERE id = :id_user:", $params)->getResultObject();
    }

    // ========================================================================
    public function meus_pets(){

        $params = [
            'id' => session()->usuario->id
        ];
        
        $db = db_connect();

        return $db->query("SELECT * FROM pet WHERE id_usuario = :id: ", $params);
    }

    // ========================================================================
    public function checar_conta($email){
        $params =[
            'email' => $email
        ];

        $db = db_connect();
        $results = $db->query("SELECT id FROM usuario WHERE :email: = email", $params)->getResultObject();
        return count($results) == 0 ? false : true;
    }

    // ========================================================================
    public function criar_conta($email, $senha, $nome, $sobrenome, $celular)
    {   

        $params = [
            'email' => $email,
            'nome' => $nome,
            'sobrenome' => $sobrenome,
            'celular' => $celular,
            'senha' => password_hash($senha, PASSWORD_DEFAULT),
        ];

        $db = db_connect();
        $db->query("INSERT INTO usuario(email, nome, senha, sobrenome, celular) VALUES (:email:, :nome:, :senha:, :sobrenome:, :celular:)", $params);


    }    

    // ========================================================================
    public function cadastra_pet($nome, $raca, $tipo, $porte)
    {   
        $params = [
            'tipo' => $tipo,
            'nome' => $nome,
            'raca' => $raca,
            'porte' => $porte,
            'id_user' => session()->usuario->id
        ];

        $db = db_connect();
        $db->query("INSERT INTO pet(nome, raca, tipo, porte, id_usuario) VALUES (:nome:, :raca:, :tipo:, :porte:, :id_user:)", $params);


    }    

    // ========================================================================
    public function procura_pet($pesquisa)
    {   
        if (!empty($pesquisa)){

          $params = [
            'pesquisa' => $pesquisa
        ];

        $db = db_connect();
        return $db->query("SELECT * FROM pet WHERE nome lIKE :pesquisa: OR tipo lIKE :pesquisa: OR porte lIKE :pesquisa: OR raca lIKE :pesquisa:;", $params);  
        
    }

    }    


    // ========================================================================
    // public function envia_email($purl){


    //     $envio = \Config\Services::email();

    //     $envio->setFrom( 'teste@portal.com', 'Rodrigo Gomes');
    //     $envio->setTo('');
    //     $envio->setCC('rodrigo.svasconcelos@telefonica.com');

    //     $envio->setSubject('Teste de email PHP');
    //     $envio->setMailType('html');

    //     $mensagem = 
    //     '
    //     <h3>Confirmação de teste</h3>
    //     <p>Link: <a href="'.$purl.'">Confirmar</a></p>
    //     ';

    //     $envio->setMessage($mensagem);
    //     $envio->send();

    // }
    // ========================================================================




    // ================================ ADM =================================== //
    public function altera_nome($nome, $id)
    {
        $params = [
            'nome' => $nome,
            'id' => $id,
        ];

        $db = db_connect();
        return $db->query("UPDATE usuario SET nome = :nome: WHERE id = :id: ", $params);    
    }

    public function altera_profile($permissao, $id)
    {
        $params = [
            'profile' => $permissao,
            'id' => $id,
        ];

        $db = db_connect();
        return $db->query("UPDATE usuario SET profile = :profile: WHERE id = :id: ", $params);    
    }

    public function altera_status($status, $id)
    {
        $params = [
            'status' => $status,
            'id' => $id,
        ];

        $db = db_connect();
        return $db->query("UPDATE usuario SET active = :status:, blocked_until = NOW() WHERE id = :id: ", $params);    
    }

    public function registra_portal($nome, $endereco, $grupo){

        $params = [
            'nome' => $nome,
            'endereco' => $endereco,
            'grupo' => $grupo
        ];

        $db = db_connect();
        return $db->query("INSERT INTO portal(nome_portal,endereco_portal,nome_grupo) VALUES (:nome:, :endereco:, :grupo:)", $params); 
    }

    public function get_portal(){

        $db = db_connect();
        return $db->query("SELECT Id, nome_portal, endereco_portal, nome_grupo FROM portal ORDER BY nome_portal");
    }

    public function get_portal_coram(){

        $db = db_connect();
        return $db->query("SELECT Id, nome_portal, endereco_portal, nome_grupo FROM portal WHERE nome_grupo = 'Gestão CORAN' ORDER BY nome_portal");
    }

    public function get_portal_prioridade(){

        $db = db_connect();
        return $db->query("SELECT Id, nome_portal, endereco_portal, nome_grupo FROM portal WHERE nome_grupo = 'Gestão de Prioridades' ORDER BY nome_portal");
    }

    public function get_portal_area(){

        $db = db_connect();
        return $db->query("SELECT Id, nome_portal, endereco_portal, nome_grupo FROM portal WHERE nome_grupo = 'Portais da Area' ORDER BY nome_portal");
    }

    public function get_portal_n2n3(){

        $db = db_connect();
        return $db->query("SELECT Id, nome_portal, endereco_portal, nome_grupo FROM portal WHERE nome_grupo = 'Portais N2/N3' ORDER BY nome_portal");
    }


    public function editar_portal($id_user)
    {
 
       $params = [
          'id' => $id_user
       ];
 
       $db = db_connect();
       return $db->query("SELECT * FROM portal WHERE id = :id:", $params);
    }

    public function portal_update($nome, $endereco, $grupo, $id){

        $params = [
            'nome' => $nome,
            'endereco' => $endereco,
            'grupo' => $grupo,
            'id' => $id
        ];

        $db = db_connect();
        return $db->query("UPDATE portal SET nome_portal = :nome:, endereco_portal = :endereco:, nome_grupo = :grupo: WHERE id = :id:", $params);
    }

    public function portal_delete($id_portal){

        $db = db_connect();
        return $db->query("DELETE FROM portal WHERE id = ".$id_portal."");
    }
}



