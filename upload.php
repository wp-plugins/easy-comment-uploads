<?php /**

Program by: Sajith.M.R
contact me: admin@sajithmr.com
*/ ?>
<?php
$target_path = "upload/";

$target_path = $target_path . basename( $_FILES['filefieldname']['name']); 

if(move_uploaded_file($_FILES['filefieldname']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}?>
<script type="text/javascript">
filelink = "<?php echo $_FILES['filefieldname']['name'] ?>";
parent.document.getElementById('uploadedfile').innerHTML += '<br><a href="upload/' + filelink + '">' + filelink + '</a>';
parent.document.forms["commentform"]["uploadfile"].innerHTML += filelink ;
//parent.document.forms["commentform"]["comment"].value += '\n' + filelink ;
//alert("double test");
</script>
