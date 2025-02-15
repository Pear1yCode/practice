<?php
session_start();

// CSRF 토큰 검증
if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    echo "잘못된 요청입니다.";
    exit;
}

// 데이터베이스 연결을 위한 파일
require_once '../db/postDB.php';

// POST로 전달된 ID 값을 받아옵니다.
if (isset($_POST['id'])) {
    $post_id = $_POST['id'];

    // 게시물 삭제 함수 호출
    $result = deletePostById($post_id);

    if ($result) {
        // 삭제 후 목록 페이지로 리디렉션
        header('Location: post.php');
        exit;
    } else {
        echo "게시물 삭제에 실패했습니다.";
    }
} else {
    echo "잘못된 접근입니다.";
}
?>
