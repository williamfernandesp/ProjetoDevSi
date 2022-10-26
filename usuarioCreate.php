<?php
$titulo = "Novo Usuário";
include "cabecalho.php";

if( isset($_POST) && !empty($_POST)) {
    //echo "<pre>";
    //print_r($_POST);
    //echo "</pre>";

    $nome = $_POST["nome"];
    $senha = hash("sha512", $_POST["senha"]);
    $login = $_POST["login"];

    if(isset($POST["ativo"]) && $_POST["ativo"] == "on") {
        $ativo = 1;
    } else {
        $ativo = 0;
    }

    include "conexao.php";
    $query = "insert into usuarios(nome, login, senha, ativo)";
    $query.= "values('$nome','$login','$senha', $ativo)";
    $resultado = mysqli_query($conexao,$query);

    if($resultado) {
        header("Location: usuarios.php?sucesso=Cadastrado com sucesso");
        exit();
    }else{
        ?>
            <div class="alert alert-danger">
                Alguma coisa está errada. Cheque a ortografia.
            </div>
        <?php
    }
}
?>

<div class="row">
    <div class="col-md-4 offset-4">
        <form action="usuarioCreate.php" method="post">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Login</label>
                <input type="text" name="login" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Ativo</label>
                <input type="checkbox" name="ativo" class="form-check"/>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    Salvar Usuário
                </button>
            </div>
        </form>
    </div>
</div>
<?php include "rodape.php"; ?>