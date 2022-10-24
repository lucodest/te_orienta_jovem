<?php
    function exibirCard($card)
    {
        echo '<h3 class="card-title">'.$card["nome"].'</h3>' . '<br>';
        echo '<img src=img/'.$card["foto"].' class="card-img-top">'.'<br> <br>';
        echo 'CPF: '.$card["cpf"].'<br>';
        echo 'Formação: '.$card["formacao"].'<br>';
        echo 'Email: '.$card["email"].'<br>';
        echo 'Telefone: '.$card["telefone"].'<br>';
        echo 'Senha: '.$card["senha"].'<br>';
        echo 'Valor p/Hora: $'.$card["valor"].'<br> <br> <br>';
    }
?>