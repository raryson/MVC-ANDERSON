<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/css/index.css">
    <title>CEMEAR</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <?php if(!empty($returnMessage)): ?>
        <div class="box-message">
            <p><?= $returnMessage ?></p>
            <button class="btn-close-message" onclick="reload()">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
        </div>
    <?php endif; ?>
    <h1>LANÇAMENTO DE PEDIDOS PARA O FINANCEIRO</h1>
    <form action="index.php">
        <input class="input" type="search" name="search" placeholder="Pesquisar">
        <input type="hidden" name="a" value="search">
        <input class="button" type="submit" name="submit" value="Pesquisar">
    </form>
    <a class="button" href="./index.php?a=goToNew">Enviar Pedido</a>
    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?= $counter=0; ?>
                <?php foreach($resultData as $data): ?>
                    <tr id="product-row-<?= $counter ?>">

                        <td> <?= $data["id"]; ?> </td>
                        <td> <?= $data["name"]; ?> </td>
                        <td> <?= $data["email"]; ?> </td>
                        <td> <?= $data["phone"]; ?> </td>
                        <td> 
                            <a class="button btn-edit" onclick="edit(<?= $counter ?>)" href="./index.php?a=search&v=editCreate&search=<?= $data['id'] ?>">Editar</a>
                            <button class="button btn-delete" onclick="verifyDelete(<?= $data['id'] ?>)">Deletar</button> 
                        </td>
                    </tr>
                <?= $counter++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    function verifyDelete(id)
    {
        let result = confirm('Você tem certeza que deseja deletar o registro com id: '+id);
        console.log(result);
        if(result)
        {
            window.location.replace('./index.php?a=delete&id='+id);
        }
    }


    function edit(id) {
        $(`#product-row-${id}`).blur();
    }


    function reload()
    {
        window.location.replace('index.php');
    }
</script>
</html>