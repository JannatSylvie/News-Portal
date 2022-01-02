<?php
	$con = mysqli_connect("localhost","root","","newsportal");
	if($con->connect_error) {
		exit('Could not connect');
	}
	if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment) values('$postid','$name','$email','$comment')");
if($query):
  unset($_SESSION['token']);
else :
 echo "<script>alert('Something went wrong. Please try again.');</script>";  

endif;}}
	$recData = $_POST['d'];
	$sql = "select name,comment,postingDate from  tblcomments where postId='$pid' ";
	$stmt = $con->prepare($sql);
	$stmt->bind_param("i", $recData);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($name, $comment, $postingDate);
	$stmt->fetch();
	$stmt->close();
	$con->close();

	class myClass {
		public $name, $comment, $postingDate;
		public function __construct($n,$com,$pd){
			$this->name=$n;
			$this->comment=$com;
			$this->postingDate=$pd;
		}
		}

		$obj = new myClass($name, $comment, $postingDate);
		$testJSON = json_encode($obj);

		echo $testJSON;
		
	
	
?>