<?php
    require_once '../models/usuarioModel.php';

    class usuarioController {
        public function validarAluno(string $email, string $senha) {
            $email = str_replace(' ', '', $email);
            $senha = md5(str_replace(' ', '', $senha));

            $usuarioModel = new usuarioModel();
            $usuario = new usuarioModel(null, null, null, $email, $senha);
            $retorno = $usuarioModel->buscarUsuarioPorEmailESenha($usuario);
        
            session_start();
            
            if ($retorno) {
                $_SESSION['esta_logado'] = true;
                $_SESSION['id_tipo_usuario'] = $retorno['id_tipo_usuario'];
                $_SESSION['id_usuario'] = $retorno['id_usuario'];
                header('Location: ../views/principal.php');
            
            }
            else {
                header('Location: ../views/login.php');
            }
            
            exit();
        }

        public function alteraraDadosAluno( int $idUsuario, string $nome, string $email) {
            $email = str_replace(' ', '', $email);

            $usuarioModel = new usuarioModel();
            $aluno = new usuarioModel($idUsuario, null, $nome, $email, null);
            $retorno = $usuarioModel->alteraraDadosAluno($aluno);

            if ($retorno === true) {
                header('Location: ../views/principal.php');
            }
            else {
                header('Location: ../views/alterarDados.php');
            }

            exit();
        }

        public function excluirUsuario(int $idUsuario) {
            $usuarioModel = new usuarioModel();

            $usuarioModel->excluirUsuario($idUsuario);

            header('Location: ../views/gerenciamentoUsuario.php');

            exit();
        }

        public function cadastrarAluno(int $idTipoUsuario,string $nome ,string $email, string $senha) {
            $nome = str_replace(' ', '', $nome);
            $email = str_replace(' ', '', $email);

            $usuarioModel = new usuarioModel();
            $usuario = new usuarioModel(null ,$idTipoUsuario ,$nome, $email, $senha);
            $usuarioModel->cadastrarAluno($usuario);

            header('Location: ../views/gerenciamentoUsuario.php');

            exit();
        }

        public function salvarUsuarioAdmin(int $idUsuario, string $nome, string $email) {
            $nome = str_replace(' ', '', $nome);
            $email = str_replace(' ', '', $email);

            $usuarioModel = new usuarioModel();
            $usuario = new usuarioModel($idUsuario, null, $nome, $email, null);
            $usuarioModel->salvarUsuarioAdmin($usuario);

            header('Location: ../views/gerenciamentoUsuario.php');

            exit();
        }
    }