<?php
	require_once("../dbconfig.php");

	//$_GET['bno']이 있을 때만 $bno 선언
	if(isset($_GET['bno'])) {
		$bNo = $_GET['bno'];
	}
		 
	if(isset($bNo)) {
		$sql = 'select b_title, b_content, b_id from board_free where b_no = ' . $bNo;
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>자유게시판 | Kurien's Library</title>
	<link rel="stylesheet" href="./css/normalize.css" />
	<link rel="stylesheet" href="./css/board.css" />
 
     <script type="text/JavaScript">

    function checkForm(form) {
        form = document.f;
        if (form.bID.value == '') {
            alert("아이디를 입력하세요");
            form.bID.focus();
            return false;
        }
        if (form.bPassword.value == '') {
            alert("암호를 입력하세요");
            form.bPassword.focus();
            return false;
        }
        if (form.bTitle.value == '') {
            alert("제목을 입력하세요");
            form.bTitle.focus();
            return false;
        }
        if (form.bContent.value == '') {
            alert("내용을 입력하세요");
            form.bContent.focus();
            return false;
        }
    }
    </script>
</head>
<body>
	<article class="boardArticle">
		<div id="boardWrite">
			<form action="./write_update.php" method="post" name="f" onsubmit="return checkForm(this);">
				<?php
				if(isset($bNo)) {
					echo '<input type="hidden" name="bno" value="' . $bNo . '">';
				}
				?>
				<table id="boardWrite">
</br></br></br></br></br></br>
			<tbody>
						<tr>
							<th scope="row"><label for="bID" >아이디</label></th>
							<td class="id">
								<?php
								if(isset($bNo)) {
									echo $row['b_id'];
								} else { ?>
									<input type="text" name="bID" id="bID"  style="width:700px;height:150px;">
								<?php } ?>
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="bPassword">비밀번호</label></th>
							<td class="password"><input type="password" name="bPassword" id="bPassword"></td>
						</tr>
						<tr>
							<th scope="row"><label for="bTitle" >제목</label></th>
							<td class="title"><input type="text"  name="bTitle" id="bTitle" value="<?php echo isset($row['b_title'])?$row['b_title']:null?>"></td>
						</tr>
						<tr>
							<th scope="row"><label for="bContent">내용</label></th>
							<td class="content"><textarea name="bContent" style="width:700px;height:800px;" id="bContent"><?php echo isset($row['b_content'])?$row['b_content']:null?></textarea></td>
						</tr>
					</tbody>
				</table>
				<div class="btnSet">
					<button type="submit" class="btnSubmit btn" >
						<?php echo isset($bNo)?'수정':'작성'?>
					</button>
					<a href="./index.php" class="btnList btn"><button type="button">목록</button></a>
				</div>
			</form>
		</div>
	</article>
</body>
</html>