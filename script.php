<?php

function exePing($andar, $setor, $tipo, $host, $porta) {
    $mediaTaxa = 5; //variavel com valor para definir a taxa
    $execPing = shell_exec('ping -c 1 -W 1 ' . $host); //executa ping no ip
    $explPing = explode("\n", $execPing); //organiza em vetor
    $locStrTime = preg_grep('/time=/', $explPing); //localiza string igual a 'time='
    $indVetStr = array_keys($locStrTime)[0]; //atribui indice zero no vetor
    if (isset($indVetStr)) {//testa se vetor nao esta vazio
        foreach ($locStrTime as $vetStr) {
            $explVetStr = explode(' ', $vetStr); //organiza em vetor
            $locTime = preg_grep('/time=/', $explVetStr); //localiza string igual a 'time='
            $convArray = implode('', $locTime); //converte em string
            $taxa = substr($convArray, 5); //remove posicao na string
            if ($taxa <= $mediaTaxa) {
                conectadoBaixo($andar, $setor, $tipo, $host, $taxa, $porta);
            } else {
                conectadoAlto($andar, $setor, $tipo, $host, $taxa, $porta);
            }
        }
    } else {
        desconectado($andar, $setor, $tipo, $host, $taxa, $porta);
    }
}

//funcao conectadoBaixo
function conectadoBaixo($a, $b, $c, $d, $e, $f) {
    echo "<tr><td>" . $a . "</td>"
    . "<td>" . $b . "</td>"
    . "<td>" . $c . "</td>"
    . "<td>" . $d . "</td>"
    . "<td><samp class='verde'>conectado</samp></td>"
    . "<td>" . $e . " ms</td>"
    . "<td>" . $f . "</td>";
}

//funcao conectadoAlto
function conectadoAlto($a, $b, $c, $d, $e, $f) {
    echo "<tr><td>" . $a . '</td>'
    . "<td>" . $b . '</td>'
    . "<td>" . $c . '</td>'
    . "<td>" . $d . "</td>"
    . "<td><samp class='vermelho'>conectado</samp></td>"
    . "<td class='critico'>" . $e . " ms</td>"
    . "<td>" . $f . "</td>";
}

//funcao desconectado
function desconectado($a, $b, $c, $d, $e, $f) {
    echo "<tr><td>" . $a . '</td>'
    . "<td>" . $b . '</td>'
    . "<td>" . $c . '</td>'
    . "<td>" . $d . "</td>"
    . "<td><samp class = 'azul'>desconectado</samp></td>"
    . "<td class = 'semrede'>" . $e . '</td>'
    . "<td>" . $f . "</td>";
}
