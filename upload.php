<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    <script language="javascript" type="text/javascript">
        function addtext(imglink) {
           parent.document.forms["commentform"]["comment"].value += '\n' + imglink ;
        }
        </script>

    </head>
    <body>
      <?php
        $upload_dir = "./";
        $fh = fopen($upload_dir . './upload_url.txt', 'r');
        $upload_url = fread($fh, filesize('./upload_url.txt'));

        if ($_FILES["file"]["error"] > 0){
            echo "Error code: " . $_FILES["file"]["error"];
        } else {
            $filename = basename($_FILES['file']['name']);
            $ext = substr($filename, strrpos($filename, '.') + 1);
            $image_file = (($ext == "jpg") || ($ext == "JPG") ) && ($_FILES["file"]["type"] == "image/jpeg") ;
            $image_file = (($ext == "jpg") || ($ext == "JPG") ) && ($_FILES["file"]["type"] == "image/jpg") || $image_file == true;
            $image_file = (($ext == "png") || ($ext == "PNG") ) && ($_FILES["file"]["type"] == "image/png") || $image_file == true;

            if ($image_file == true) {
                if (file_exists("$upload_dir" . $_FILES["file"]["name"])){
                    echo "<b>" . $_FILES["file"]["name"] . "</b> already exists";
                } else if (eregi('image/', $_FILES['file']['type'])){
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                    $upload_dir . /* "/images/" . */
                    $_FILES["file"]["name"]);
                    echo "<a href=\"#\" onClick=\"addtext('[img]" . $upload_url . $_FILES["file"]["name"] . "[/img]');\">Inserir link de imagem<a>";
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                        $upload_dir .
                        $_FILES["file"]["name"]);
                    echo "<b>[file]</b>" . $upload_url
                        . $_FILES["file"]["name"] . "<b>[/file]</b>";
                }
            } else {
                echo "Apenas imagens são permitidos de copiar: " . $_FILES["file"]["error"];
            }
        }

        echo "&nbsp;&nbsp;&nbsp; | ";
        echo "<a href='./upload.html'>Enviar mais imagens</a>";
        ?>
    </body>
</html>

