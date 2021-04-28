<?php

//importa a conexão com o banco de dados
require("./database/conexao.php");


switch ($_POST["acao"]) {

    case "inserir":
    
        //se houver o envio do fomulário com uma tarefa
        if (isset($_POST["tarefa"])) {
            $tarefa = $_POST["tarefa"];

            //declara o SQL de inserção
            $sqlInsert = " INSERT INTO tblDescricao (descricao) VALUES ('$tarefa') ";

            //executa o SQL
            $resultado = mysqli_query($conexao, $sqlInsert);

            if($resultado){
                $mensagem = "Tarefa adicionada com sucesso!";
            }else{
                $mensagem = "Erro ao adicionar tarefa!";
            }

            //redirecionar para index.php (página das tarefas)
            header("location: index.php?mensagem=$mensagem"); //$_GET query params
        }
   
        break;


        case "deletar":
        //verificar se veio o tarefaId
        if (isset($_POST["tarefaId"])) {
            $tarefaId = $_POST["tarefaId"];

            //declarar o sql de delete
            $sqlDelete = " DELETE FROM tblDescricao WHERE id = $tarefaId ";

            //executar o sql
            $resultado = mysqli_query($conexao, $sqlDelete);

            if($resultado){
                $mensagem = "Tarefa excluída com sucesso!";
            }else{
                $mensagem = "Erro ao excluir a tarefa!";
            }

            //redirecionar para a index.php
            header("location: index.php?mensagem=$mensagem");
        }
        
        break;

        case "editar":

        if (isset($_POST["tarefa"]) && isset($_POST["tarefaId"])) {
            
            $tarefa = $_POST["tarefa"];
            $tarefaId = $_POST["tarefaId"];

            $sqlUpdate = "UPDATE tblDescricao SET descricao = '$tarefa' WHERE id = $tarefaId";

            $resultado = mysqli_query($conexao, $sqlUpdate);

            if ($resultado){
                $mensagem = "Tarefa editada com sucesso!";
            }else {
                $mensagem = "Ops, erro ao editar a tarefa!";
            }
            
            header("location: index.php?mensagem=$mensagem");
        }
         break;

    }

    header("location: index.php?mensagem=$mensagem&tipoMensagem=$tipoMensagem");