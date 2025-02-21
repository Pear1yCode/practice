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
        <a href="/">홈페이지</a>
    </div>
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button> <!-- 버튼 추가 -->
    <nav>
        <ul>
            <li><a href="/">홈</a></li>
            <li><a href="/about.php">소개</a></li>
            <li><a href="/services.php">서비스</a></li>
            <li><a href="/contact.php">연락처</a></li>
        </ul>
    </nav>
</header>

<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('header.sidebar');
        const content = document.querySelector('.content');

        sidebar.classList.toggle('collapsed');
        content.classList.toggle('collapsed');
    }
</script>

</body>
</html>
