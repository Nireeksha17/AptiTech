<!--PHP code for displaying PDF file -->

<?php
	$conn=mysqli_connect("localhost","root","","aptitech");
	if(isset($_POST["btn"]))
	{
		$topicID=$_POST["btn"];
		$result="SELECT * FROM topic WHERE topic_id='$topicID'";
        $row=mysqli_query($conn,$result);
        $values=$row->fetch_assoc();
        header('content-type:'.$values['intro_type']);
        echo $values['introduction'];
	}
?>
