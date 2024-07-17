<?php
    require_once 'DAL/tipoUsuarioDAO.php';

    class tipoUsuarioModel {
        public ?int $idTipoUsuario;
        public ?string $descricao;

        public function __construct(?int $idTipoUsuario = null, ?string $descricao = null) {
            $this->idTipoUsuario = $idTipoUsuario;
            $this->descricao = $descricao;
        }

        public function buscarTiposUsuario() {
            $tipoUsuarioDAO = new tipoUsuarioDAO();

            $tiposUsuario =  $tipoUsuarioDAO->buscarTiposUsuario();

            foreach ($tiposUsuario as $chave => $tipoUsuario) {
                $tiposUsuario[$chave] = new tipoUsuarioModel($tipoUsuario['id_tipo_usuario'], $tipoUsuario['descricao']);
            }

            return $tiposUsuario;
        }
    }
?>