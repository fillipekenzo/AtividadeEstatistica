<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Atividade Estatística</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .tamanhoFonte {
            font-size: 1.5em;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Estatística</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Calcular
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="calculaMedia.php">Média/Mediana/Moda</a>
                        <a class="dropdown-item" href="calculaDesvio.php">Desvio Padrão</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" id="teste">
        <h1 class="text-center">Média/Mediana/Moda</h1>
        <form class="mt-4">
            <label id="numeros" class="tamanhoFonte">Insira os números que deseja calcular: [</label><label class="tamanhoFonte">]</label>
            <div class="form-row">
                <div class="form-row col-md-4">
                    <input type="text" class="form-control col-md-9" id="inputNumber">
                    <button id="btnAdd" type="button" class="btn btn-success col-md-3"><b>+</b></button>
                </div>
            </div>
            <button id="btnCalcular" type="button" class="btn btn-primary mt-3">Calcular</button>
        </form>
    </div>

</body>
<script>
    var numeros = [];
    document.getElementById("btnAdd").onclick = function() {
        var textoAntigo = document.getElementById("numeros").innerText;
        var numero = document.getElementById("inputNumber").value;
        if (numero != "" && numero != " ") {
            document.getElementById("numeros").innerHTML = textoAntigo + numero + ", ";
            numeros.push(numero);
        }
        document.getElementById("inputNumber").value = "";
    }


    document.getElementById("btnCalcular").onclick = function() {
        nLength = numeros.length;
        var media, mediana, moda, nMaximo = 0;
        ordenado = numeros.sort(compararNumeros);
        if ((nLength % 2) == 0) {
            mediana = (parseInt(ordenado[(nLength - 2) / 2]) + parseInt(ordenado[(nLength) / 2])) / 2;
        } else {
            mediana = ordenado[(nLength - 1) / 2];
        }

        var i, soma = 0;
        for (i = 0; i < nLength; i++) {
            soma += parseInt(numeros[i]);
        }
        media = soma / nLength;

        for (i = 0; i < nLength; i++) {
            var nVezes = 0;
            for (var j = 0; j < nLength; j++) {
                if (numeros[i] == numeros[j])
                    nVezes++;
            }
            if (nVezes > nMaximo) {
                moda = numeros[i];
                nMaximo = nVezes;
            }
        }

        var table = document.createElement("TABLE");
        table.setAttribute("id", "tabela");
        table.setAttribute("class","table table-striped table-dark mt-4");
        document.getElementById("teste").appendChild(table);

        var thead = document.createElement("THEAD");
        thead.setAttribute("id", "cabecalho");
        document.getElementById("tabela").appendChild(thead);

        var coluna1 = document.createElement("TD");
        var mediaAtt = document.createTextNode("Média");
        coluna1.setAttribute("class","font-weight-bold");
        coluna1.appendChild(mediaAtt);
        document.getElementById("cabecalho").appendChild(coluna1);

        var coluna2 = document.createElement("TD");
        var medianaAtt = document.createTextNode("Mediana");
        coluna2.setAttribute("class","font-weight-bold");
        coluna2.appendChild(medianaAtt);
        document.getElementById("cabecalho").appendChild(coluna2);

        var coluna3 = document.createElement("TD");
        var modaAtt = document.createTextNode("Moda");
        coluna3.setAttribute("class","font-weight-bold");
        coluna3.appendChild(modaAtt);
        document.getElementById("cabecalho").appendChild(coluna3);

    }

    function compararNumeros(a, b) {
        return a - b;
    }
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>