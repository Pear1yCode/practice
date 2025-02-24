<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>네비게이션 헤더</title>
    <link rel="stylesheet" href="../css/header.css">
</head>
<body>
<header class="sidebar">
    <div class="logo">
        <a id="home" href="index.php">
            <span class="text-part">Over</span><span class="text-part">Clock</span>
        </a>

    </div>
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button> <!-- 버튼 추가 -->
    <nav>
        <ul>
            <li><a href="post.php">홈</a></li>
            <li><a href="/info.php">정보</a></li>
            <li><a href="/chat.php">채팅</a></li>
            <li><a href="https://cofgame.tistory.com" target="_blank">블로그 이동</a></li>
        </ul>
    </nav>
</header>

<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('header.sidebar');
        const content = document.querySelector('.content');
        const toggleBtn = document.querySelector('.toggle-btn'); // 버튼을 선택

        sidebar.classList.toggle('collapsed');
        content.classList.toggle('collapsed');

        // 사이드바가 접힐 때 버튼 숨기기
        if (sidebar.classList.contains('collapsed')) {
            toggleBtn.style.display = 'none'; // 버튼 숨기기
        } else {
            toggleBtn.style.display = 'block'; // 버튼 보이기
        }
    }
</script>

</body>
</html>
