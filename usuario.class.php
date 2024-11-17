<?php

class usuario extends db {

    function __construct() {
        parent::__construct();
    }

    public function cadastrar($dados = array()) {
        extract($dados);
        $erro = array();
        // Valida cada campo do formulário usando a classe "valida"
        $erro['nome'] = valida::nome($nome);
        $erro['sobrenome'] = valida::sobrenome($sobrenome);
        $erro['cidade'] = valida::cidade($cidade);
        $erro['estado'] = valida::estado($estado);
        $erro['cep'] = valida::cep($cep);
        $erro['telefone'] = valida::telefone($telefone);
        $erro['email'] = valida::email($email);
        $erro['senha'] = valida::senha($senha);
        //
        // Verifica se houve algum erro com algum dos campos de cadastro
        foreach ($erro as $e) {
            if ($e != false) {
                $erro['sucesso'] = false;
                return $erro;
            }
        }
        //

        $senha = sha1($senha); // Criptografa a senha usando a função sha1()
        $dateTime = date('Y-m-d H:i:s');
        $q = $this->fetch("SELECT * FROM usuario WHERE email = '$email'"); // Verifica se o usuário já está cadastado
        if (!$q) {
            $q = $this->query("INSERT INTO usuario VALUES('', '$nome', '$sobrenome', '$cidade', '$estado', '$cep', '$telefone', '$email', '$senha', '$dateTime')");
            if ($q) {
                $erro['sucesso'] = true;
                return $erro;
            } else {
                $erro['sucesso'] = false;
                return $erro;
            }
        } else {
            $erro['email'] = "Este email já está cadastrado";
            $erro['sucesso'] = false;
            return $erro;
        }
    }

    public function editar($dados = array()) {
        extract($dados);
        $erro = array();
        // Valida cada campo do formulário usando a classe "valida"
        $erro['nome'] = valida::nome($nome);
        $erro['sobrenome'] = valida::sobrenome($sobrenome);
        $erro['cidade'] = valida::cidade($cidade);
        $erro['estado'] = valida::estado($estado);
        $erro['cep'] = valida::cep($cep);
        $erro['telefone'] = valida::telefone($telefone);
        $erro['email'] = valida::email($email);
        $erro['senha'] = valida::senha($senha);
        //
        // Verifica se houve algum erro com algum dos campos
        foreach ($erro as $e) {
            if ($e != false) {
                $erro['sucesso'] = false;
                return $erro;
            }
        }
        //
        // Somente o administrador pode editar qualquer usuário
        if ($_SESSION['idusuario'] != 1)
            $idusuario = $_SESSION['idusuario'];
        //

        $senha = sha1($senha); // Criptografa a senha usando a função sha1()

        $q = $this->fetch("SELECT * FROM usuario WHERE email = '$email' AND idusuario <> $idusuario"); // Verifica se o email já existe
        if (!$q) {
            $q = $this->query("UPDATE usuario SET nome = '$nome', sobrenome = '$sobrenome', cidade = '$cidade', estado = '$estado', cep = '$cep', telefone = '$telefone', email = '$email', senha = '$senha' WHERE idusuario = $idusuario");
            if ($q) {
                $erro['sucesso'] = true;
                return $erro;
            } else {
                $erro['sucesso'] = false;
                return $erro;
            }
        } else {
            $erro['email'] = "Este email já está sendo usado";
            $erro['sucesso'] = false;
            return $erro;
        }
    }

    public function deletarUsuario($id) {
        $q = $this->query("DELETE FROM usuario WHERE idusuario = " . (int) $id);
        if ($q)
            return true;
        else
            return false;
    }

    public function validaLogin($dados = array()) {
        extract($dados);

        $senha = sha1($senha);
        $q = $this->fetch("SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'");
        if ($q) {
            session_start();
            $_SESSION['idusuario'] = $q[0]['idusuario'];
            $_SESSION['logado'] = true;
            // Se a opção "Manter-me Conectado" for ativa, cria Cookies 
            // para manter o usuário logado por 30 dias
            if (isset($cookies)) {
                $expire = time() + 60 * 60 * 24 * 30;
                setcookie("email", $email, $expire);
                setcookie("senha", $senha, $expire);
            }
            //
            return true;
        } else
            return false;
    }

    public function usuarioInfo($id) {
        $dados = $this->fetch("SELECT * FROM usuario WHERE idusuario = " . (int) $id);
        if ($dados)
            return $dados[0];
        else
            return null;
    }

    public function todosUsuariosInfo() {
        $dados = $this->fetch("SELECT * FROM usuario");
        if ($dados)
            return $dados;
        else
            return null;
    }

}

?>