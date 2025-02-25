<?php
require_once '../db/infoDB.php';  // infoDB.php 파일을 포함하여 함수들을 불러옵니다.

include 'header.php';  // 헤더 파일을 포함합니다 (헤더를 별도로 관리)

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;  // 페이지 번호를 GET 방식으로 받습니다 (기본값은 1)

$posts = getPosts($page);  // 게시물 목록을 가져옵니다

?>

<link rel="stylesheet" href="../css/post.css">
<link rel="stylesheet" href="../css/info.css">


<h1>정보 목록</h1>

<table>
    <thead>
    <tr>
        <th>제목</th>
        <th>작성일</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td><a href="view.php?id=<?php echo $post['id']; ?>"><?php echo htmlspecialchars($post['title']); ?></a></td>
            <td><?php echo date('Y-m-d H:i:s', strtotime($post['created_at'])); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
// 페이지네이션 처리
$total_posts = countAllPosts();  // 전체 게시물 수 가져오기
$total_pages = ceil($total_posts / 5);  // 전체 페이지 수 계산
?>

<div class="pagination">
    <?php
    if ($page > 1) {
        echo "<a href='?page=1'>처음</a> ";
        echo "<a href='?page=" . ($page - 1) . "'>◀</a> ";
    }

    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='?page=$i'>$i</a> ";
    }

    if ($page < $total_pages) {
        echo "<a href='?page=" . ($page + 1) . "'>▶</a> ";
        echo "<a href='?page=$total_pages'>끝</a>";
    }
    ?>
</div>

<?php
include 'footer.php';  // 푸터 파일을 포함합니다 (푸터를 별도로 관리)
?>
