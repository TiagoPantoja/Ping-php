<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ping</title>
        <link href="css/css.css" rel="stylesheet" type="text/css">
        <script src="script/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <script>
            $(function () {
                setInterval(function () {
                    $.ajax({
                        url: 'dados.php',
                        type: 'GET',
                        dataType: 'html',
                        success: function (response) {
                            $('#dados').empty().html(response);
                        }
                    });
                }, 1000);
            });
        </script>        
        <main>
            <div id="div-central">
                <table id="ping">
                    <thead>
                        <tr>
                            <th><label>andar</label></th>
                            <th><label>setor</label></th>
                            <th><label>tipo</label></th>
                            <th><label>host</label></th>
                            <th><label>estado</label></th>
                            <th><label>taxa</label></th>
                            <th><label>porta</label></th>
                        </tr>
                    </thead>
                    <tbody id="dados">
                        <!--espaco para receber dados-->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8"><label>projeto andrei</label></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </main>        
        <?php
        ?>
    </body>
</html>
