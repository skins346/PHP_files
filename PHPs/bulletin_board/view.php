<?php
	require_once("../dbconfig.php");
	$bNo = $_GET['bno'];

	if(!empty($bNo) && empty($_COOKIE['board_free_' . $bNo])) {
		$sql = 'update board_free set b_hit = b_hit + 1 where b_no = ' . $bNo;
		$result = $db->query($sql); 
		if(empty($result)) {
			?>
			<script>
				alert('오류가 발생했습니다.');
				history.back();
			</script>
			<?php 
		} else {
			setcookie('board_free_' . $bNo, TRUE, time() + (60 * 60 * 24), '/');
		}
	}
	
	$sql = 'select b_title, b_content, b_date, b_hit, b_id from board_free where b_no = ' . $bNo;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>자유게시판 | Kurien's Library</title>
	<link rel="stylesheet" href="./css/normalize.css" />
	<link rel="stylesheet" href="./css/board.css" />
	<script src="./js/jquery-2.1.3.min.js"></script>
</head>
<body>
	<article class="boardArticle">
<br/><br/><br/>		
<div id="boardView">
			<h3 id="boardTitle"><?php echo $row['b_title']?></h3>
			<div id="boardInfo">
				<span id="boardID">작성자: <?php echo $row['b_id']?></span><br/>
				<span id="boardDate">작성일: <?php echo $row['b_date']?></span><br/>
				<span id="boardHit">조회: <?php echo $row['b_hit']?></span><br/>
			</div>
<br/><br/><br/>
			<div id="boardContent"><?php echo $row['b_content']?></div>
			<div class="btnSet">
				<a href="./write.php?bno=<?php echo $bNo?>"><button>수정</button></a>
				<a href="./delete.php?bno=<?php echo $bNo?>"><button>삭제</button></a>
				<a href="./index.php"><button>목록</button></a>
			</div>
		<div id="boardComment">
		</div>
		</div>
	</article>
</body>
</html>