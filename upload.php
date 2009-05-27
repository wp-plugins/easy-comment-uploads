<?php /**

Program by: Sajith.M.R
contact me: admin@sajithmr.com
*/ ?>

<?php
		/*
		$target_path = "upload/";
		$target_path = $target_path . basename($_FILES['file']['name']);
		
		$filename = basename($_FILES['file']['name']);
		$ext = substr($filename, strrpos($filename, '.') + 1);
		$image_file = (($ext == "jpg") || ($ext == "JPG") ) && ($_FILES["file"]["type"] == "image/jpeg") ;
		$image_file = (($ext == "png") || ($ext == "PNG") ) && ($_FILES["file"]["type"] == "image/png") || $image_file == true;
		$image_file = (($ext == "gif") || ($ext == "GIF") ) && ($_FILES["file"]["type"] == "image/gif") || $image_file == true;
		
		
		if ($image_file)
				$type = "img";
		if (!$image_file)
				$type = "file";
				
		$type = "img";
		
		
		if ($type == "img" || !$images_only) {
			if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path) {
				$alert = "upload failed";
				//$filecode = "<b>[" . $type . "]</b>" . "wp-content/plugins/tom-ajax-upload/upload/" . $_FILES["file"]["name"] . "<b>[/" . $type . "]</b>";
				}
			}
		} else {
				$alert = "Sorry, you can only upload images."
		}
		*/
		
//$target_dir = "upload/";
$target_dir = file_get_contents("upload_dir.txt");
$target_path = $target_dir . basename( $_FILES['file']['name']);
$target_url = file_get_contents("upload_url.txt");

if (eregi('jpg', $_FILES['file']['type']) || eregi('png', $_FILES['file']['type']) || eregi('gif', $_FILES['file']['type']))
    $type = "img";
else
		$type = "file";

//$type = "file";
if ($type == "img" || !$images_only) {
		if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
	    //$alert = "The file ".  $target_path . " has been uploaded";
	    $filename = $_FILES["file"]["name"];
	    $filelink = /*"wp-content/plugins/tom-ajax-upload/upload/"*/$target_url . $filename;
	    $filecode = "[" . $type . "]" . $filelink . "[/" . $type . "]";
		} else {
			$alert = "There was an error uploading the file, please try again!";
		}
} else {
    $alert = "Sorry, you can only upload images.";
}
?>
<script type="text/javascript">
alert_msg = "<?php echo $alert ?>";
filecode = "<?php echo $filecode ?>";
filelink = "<?php echo $filelink ?>";
filename = "<?php echo $filename ?>";

parent.document.getElementById('uploadedfile').innerHTML += '<br><a href="' + filelink + '">' + filename + '</a> : ' + filecode;

if (!alert)
alert(alert_msg);

//alert(parent.document.forms["commentform"]["comment"].value);
if (parent.document.forms["commentform"]["comment"].value)
parent.document.forms["commentform"]["comment"].value += "\n" + filecode;
else
parent.document.forms["commentform"]["comment"].value += filecode;
</script>
