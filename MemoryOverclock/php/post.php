<?php
require_once '../db/postDB.php';

include 'header.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$search = isset($_GET['search']) ? $_GET['search'] : '';

$posts_per_page = 5;

if ($search) {
    $posts = SearchPost($search, $page, $posts_per_page);
    $totalPosts = countSearchPosts($search);
} else {
    $posts = [];
    $totalPosts = 0;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title']) && isset($_POST['content'])) {
    $title = $_POST['title'];  // 사용자가 입력한 제목
    $content = $_POST['content'];  // 사용자가 입력한 내용
    $cpu_manufacturer = !empty($_POST['cpu_manufacturer']) ? $_POST['cpu_manufacturer'] : 'AUTO';
    $cpu_name = !empty($_POST['cpu_name']) ? $_POST['cpu_name'] : 'AUTO';

    $system_memory_multiplier = !empty($_POST['system_memory_multiplier']) ? $_POST['system_memory_multiplier'] : 'AUTO';
    $infinity_fabric_frequency = !empty($_POST['infinity_fabric_frequency']) ? $_POST['infinity_fabric_frequency'] : 'AUTO';
    $uclk_div1_mode = !empty($_POST['uclk_div1_mode']) ? $_POST['uclk_div1_mode'] : 'AUTO';
    $cpu_vddio_mem = !empty($_POST['cpu_vddio_mem']) ? $_POST['cpu_vddio_mem'] : 'AUTO';
    $ddr_vdd_voltage = !empty($_POST['ddr_vdd_voltage']) ? $_POST['ddr_vdd_voltage'] : 'AUTO';
    $ddr_vddq_voltage = !empty($_POST['ddr_vddq_voltage']) ? $_POST['ddr_vddq_voltage'] : 'AUTO';
    $vddp = !empty($_POST['vddp']) ? $_POST['vddp'] : 'AUTO'; // VDDP
    $vcore_soc = !empty($_POST['vcore_soc']) ? $_POST['vcore_soc'] : 'AUTO';
    $cas_latency = !empty($_POST['cas_latency']) ? $_POST['cas_latency'] : 'AUTO';
    $trcd = !empty($_POST['trcd']) ? $_POST['trcd'] : 'AUTO';
    $trp = !empty($_POST['trp']) ? $_POST['trp'] : 'AUTO';
    $tras = !empty($_POST['tras']) ? $_POST['tras'] : 'AUTO';
    $trc = !empty($_POST['trc']) ? $_POST['trc'] : 'AUTO';
    $twr = !empty($_POST['twr']) ? $_POST['twr'] : 'AUTO';
    $tref = !empty($_POST['tref']) ? $_POST['tref'] : 'AUTO';
    $trfc1 = !empty($_POST['trfc1']) ? $_POST['trfc1'] : 'AUTO';
    $trfc2 = !empty($_POST['trfc2']) ? $_POST['trfc2'] : 'AUTO';
    $trfcsb = !empty($_POST['trfcsb']) ? $_POST['trfcsb'] : 'AUTO';
    $trtp = !empty($_POST['trtp']) ? $_POST['trtp'] : 'AUTO';
    $trrd_l = !empty($_POST['trrd_l']) ? $_POST['trrd_l'] : 'AUTO';
    $trrd_s = !empty($_POST['trrd_s']) ? $_POST['trrd_s'] : 'AUTO';
    $tfaw = !empty($_POST['tfaw']) ? $_POST['tfaw'] : 'AUTO';
    $twtrl = !empty($_POST['twtrl']) ? $_POST['twtrl'] : 'AUTO';
    $twtrs = !empty($_POST['twtrs']) ? $_POST['twtrs'] : 'AUTO';
    $trdrd_scl = !empty($_POST['trdrd_scl']) ? $_POST['trdrd_scl'] : 'AUTO';
    $trdrdsc = !empty($_POST['trdrdsc']) ? $_POST['trdrdsc'] : 'AUTO';
    $trdrdsd = !empty($_POST['trdrdsd']) ? $_POST['trdrdsd'] : 'AUTO';
    $trdrddd = !empty($_POST['trdrddd']) ? $_POST['trdrddd'] : 'AUTO';
    $twrwr_scl = !empty($_POST['twrwr_scl']) ? $_POST['twrwr_scl'] : 'AUTO';
    $twrwrsc = !empty($_POST['twrwrsc']) ? $_POST['twrwrsc'] : 'AUTO';
    $twrwrsd = !empty($_POST['twrwrsd']) ? $_POST['twrwrsd'] : 'AUTO';
    $twrwrd = !empty($_POST['twrwrd']) ? $_POST['twrwrd'] : 'AUTO';
    $twrrd = !empty($_POST['twrrd']) ? $_POST['twrrd'] : 'AUTO';
    $trdwr = !empty($_POST['trdwr']) ? $_POST['trdwr'] : 'AUTO';
    $gear_down_mode = $_POST['gear_down_mode'] ?? 'AUTO';
    $power_down_mode = $_POST['power_down_mode'] ?? 'AUTO';
    $author = !empty($_POST['author']) ? $_POST['author'] : 'auto';
    $memo = !empty($_POST['memo']) ? $_POST['memo'] : 'auto';

    $result = addPost($title, $content, $cpu_manufacturer, $cpu_name,
        $system_memory_multiplier, $infinity_fabric_frequency, $uclk_div1_mode,
        $vcore_soc, $cpu_vddio_mem, $ddr_vdd_voltage, $ddr_vddq_voltage, $vddp, $cas_latency, $trcd, $trp, $tras, $trc, $twr, $tref,
        $trfc1, $trfc2, $trfcsb, $trtp, $trrd_l, $trrd_s, $tfaw, $twtrl,
        $twtrs, $trdrd_scl, $trdrdsc, $trdrdsd, $trdrddd, $twrwr_scl,
        $twrwrsc, $twrwrsd, $twrwrd, $twrrd, $trdwr, $gear_down_mode,
        $power_down_mode, $author, $memo);

    if ($result === true) {
        echo "<script>alert('게시물이 성공적으로 추가되었습니다.'); window.location.href='post.php';</script>";
    } else {
        echo "<script>alert('{$result}'); window.location.href='post.php';</script>";
    }
}

// 페이지네이션 계산
$totalPages = ceil($totalPosts / $posts_per_page);

// 결과 배열 설정
// 이 부분을 다시 출력 형태로 설정
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/post.css">
    <title>게시물</title>
    <script>
        function openPasswordPrompt() {
            var password = prompt("비밀번호를 입력하세요:");

            if (password === "0000") {
                document.getElementById("postForm").style.display = "block";
            } else {
                alert("잘못된 비밀번호입니다.");
            }
        }
    </script>
    <script>
        function updateCpuNameOptions() {
            const cpuManufacturer = document.getElementById("cpu_manufacturer").value;
            const cpuNameSelect = document.getElementById("cpu_name");

            cpuNameSelect.innerHTML = '';

            if (cpuManufacturer === "Intel") {
                const options = [
                    { value: "14700K", text: "Intel 14700K" },
                    { value: "14700KF", text: "Intel 14700KF" },
                    { value: "14900K", text: "Intel 14900K" }
                ];
                options.forEach(option => {
                    const optElement = document.createElement("option");
                    optElement.value = option.value;
                    optElement.textContent = option.text;
                    cpuNameSelect.appendChild(optElement);
                });
            } else if (cpuManufacturer === "AMD") {
                const options = [
                    { value: "9950x", text: "AMD 9950X" },
                    { value: "7800x3d", text: "AMD 7800X3D" },
                    { value: "9800x3d", text: "AMD 9800X3D" }
                ];
                options.forEach(option => {
                    const optElement = document.createElement("option");
                    optElement.value = option.value;
                    optElement.textContent = option.text;
                    cpuNameSelect.appendChild(optElement);
                });
            }
        }

        window.onload = function() {
            updateCpuNameOptions();  // 페이지 로딩 시, 기본값에 맞게 CPU 이름 리스트 업데이트
        };
    </script>
</head>
<body>

<h1>게시물 목록</h1>
<ul>
    <?php if (empty($search)): ?>
        <li>검색어가 없습니다.</li>
    <?php elseif (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <li>
                <a href="post_detail.php?id=<?php echo $post['id']; ?>">
                    <strong><?php echo htmlspecialchars($post['title']); ?></strong>
                </a><br>
                <?php echo nl2br(htmlspecialchars($post['content'])); ?><br>
                <small><?php echo $post['created_at']; ?></small>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>게시물이 없습니다.</li>
    <?php endif; ?>
</ul>



<div class="pagination">
    <?php

    // 현재 페이지와 전체 페이지 수를 계산
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $total_pages = ceil($totalPosts / $posts_per_page);

    // 검색어 처리
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    // 페이지네이션 생성 함수 호출
    echo generatePagination($current_page, $total_pages, $search);
    ?>
</div>


<form action="post.php" method="GET" class="search-container">
    <input type="text" name="search" placeholder="통합검색" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
    <button type="submit">검색</button>
</form>

<button onclick="openPasswordPrompt()">게시물 작성</button>

<div id="postForm" style="display:none;">
    <h2>새 게시물 작성</h2>
    <form method="POST" action="post.php">
        <label for="title">제목:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="content">내용:</label>
        <textarea id="content" name="content" required></textarea><br>

        <label for="cpu_manufacturer">CPU 제조사:</label>
        <select id="cpu_manufacturer" name="cpu_manufacturer" onchange="updateCpuNameOptions()">
            <option value="Intel">Intel</option>
            <option value="AMD">AMD</option>
        </select><br>

        <label for="cpu_name">CPU 이름:</label>
        <select id="cpu_name" name="cpu_name">
            <option value="14700K">Intel 14700K</option>
            <option value="14700KF">Intel 14700KF</option>
            <option value="14900K">Intel 14900K</option>
        </select><br>

        <label for="system_memory_multiplier">램 클럭 (MHz):</label>
        <select id="system_memory_multiplier" name="system_memory_multiplier">
            <?php
            for ($i = 4000; $i <= 12000; $i += 100) {
                echo "<option value=\"$i\">$i MHz</option>";
            }
            ?>
        </select><br>

        <label for="infinity_fabric_frequency">동기화 클럭 - Infinity Fabric Frequency (MHz):</label>
        <select id="infinity_fabric_frequency" name="infinity_fabric_frequency">
            <option value="AUTO">AUTO</option>
            <option value="1600">1600</option>
            <option value="1633">1633</option>
            <option value="1667">1667</option>
            <option value="1700">1700</option>
            <option value="1733">1733</option>
            <option value="1767">1767</option>
            <option value="1800">1800</option>
            <option value="1833">1833</option>
            <option value="1867">1867</option>
            <option value="1900">1900</option>
            <option value="1933">1933</option>
            <option value="1967">1967</option>
            <option value="2000">2000</option>
            <option value="2033">2033</option>
            <option value="2067">2067</option>
            <option value="2100">2100</option>
            <option value="2133">2133</option>
            <option value="2167">2167</option>
            <option value="2200">2200</option>
            <option value="2233">2233</option>
            <option value="2267">2267</option>
            <option value="2300">2300</option>
            <option value="2333">2333</option>
            <option value="2367">2367</option>
            <option value="2400">2400</option>
            <option value="2433">2433</option>
            <option value="2467">2467</option>
            <option value="2500">2500</option>
            <option value="2533">2533</option>
            <option value="2567">2567</option>
            <option value="2600">2600</option>
            <option value="2633">2633</option>
            <option value="2667">2667</option>
            <option value="2700">2700</option>
            <option value="2733">2733</option>
            <option value="2767">2767</option>
            <option value="2800">2800</option>
            <option value="2833">2833</option>
            <option value="2867">2867</option>
            <option value="2900">2900</option>
            <option value="2933">2933</option>
            <option value="2967">2967</option>
            <option value="3000">3000</option>
            <option value="3033">3033</option>
            <option value="3067">3067</option>
            <option value="3100">3100</option>
            <option value="3133">3133</option>
            <option value="3167">3167</option>
            <option value="3200">3200</option>
            <option value="3233">3233</option>
            <option value="3267">3267</option>
            <option value="3300">3300</option>
            <option value="3333">3333</option>
            <option value="3367">3367</option>
            <option value="3400">3400</option>
            <option value="3433">3433</option>
            <option value="3467">3467</option>
            <option value="3500">3500</option>
            <option value="3533">3533</option>
            <option value="3567">3567</option>
            <option value="3600">3600</option>
            <option value="3633">3633</option>
            <option value="3667">3667</option>
            <option value="3700">3700</option>
            <option value="3733">3733</option>
            <option value="3767">3767</option>
            <option value="3800">3800</option>
            <option value="3833">3833</option>
            <option value="3867">3867</option>
            <option value="3900">3900</option>
            <option value="3933">3933</option>
            <option value="3967">3967</option>
            <option value="4000">4000</option>
        </select><br>

        <label for="uclk_div1_mode">uclk_div1_mode:</label>
        <select id="uclk_div1_mode" name="uclk_div1_mode"></select>

        <label for="vcore_soc">SOC 전압 (V):</label>
        <select id="vcore_soc" name="vcore_soc"></select>

        <script>
            const selectElement = document.getElementById("vcore_soc");

            for (let i = 1; i <= 50; i++) {
                const option = document.createElement("option");
                const voltage = (i / 10).toFixed(1);
                option.value = voltage;
                option.textContent = voltage;
                selectElement.appendChild(option);
            }
        </script><br>

        <!-- CPU VDDIO MEM -->
        <label for="cpu_vddio_mem">CPU VDDIO MEM 전압 (V):</label>
        <select id="cpu_vddio_mem" name="cpu_vddio_mem">
            <option value="AUTO">AUTO</option>
            <option value="1.1">1.1 V</option>
            <option value="1.2">1.2 V</option>
            <option value="1.3">1.3 V</option>
            <option value="1.4">1.4 V</option>
        </select><br>

        <!-- DDR VDD 전압 -->
        <label for="ddr_vdd_voltage">DDR VDD 전압 (V):</label>
        <select id="ddr_vdd_voltage" name="ddr_vdd_voltage">
            <option value="AUTO">AUTO</option>
            <option value="1.2">1.2 V</option>
            <option value="1.35">1.35 V</option>
            <option value="1.4">1.4 V</option>
        </select><br>

        <!-- DDR VDDQ 전압 -->
        <label for="ddr_vddq_voltage">DDR VDDQ 전압 (V):</label>
        <select id="ddr_vddq_voltage" name="ddr_vddq_voltage">
            <option value="AUTO">AUTO</option>
            <option value="1.2">1.2 V</option>
            <option value="1.35">1.35 V</option>
        </select><br>

        <!-- VDDP 전압 -->
        <label for="vddp">VDDP 전압 (V):</label>
        <select id="vddp" name="vddp">
            <option value="AUTO">AUTO</option>
            <option value="1.0">1.0 V</option>
            <option value="1.1">1.1 V</option>
            <option value="1.2">1.2 V</option>
        </select><br>

        <label for="cas_latency">CAS Latency:</label>
        <input type="text" id="cas_latency" name="cas_latency" placeholder="AUTO"><br>

        <label for="trcd">tRCD:</label>
        <input type="text" id="trcd" name="trcd" placeholder="AUTO"><br>

        <label for="trp">tRP:</label>
        <input type="text" id="trp" name="trp" placeholder="AUTO"><br>

        <label for="tras">tRAS:</label>
        <input type="text" id="tras" name="tras" placeholder="AUTO"><br>

        <label for="trc">tRC:</label>
        <input type="text" id="trc" name="trc" placeholder="AUTO"><br>

        <label for="tw">tWR:</label>
        <input type="text" id="tw" name="twr" placeholder="AUTO"><br>

        <label for="tref">tREF:</label>
        <input type="text" id="tref" name="tref" placeholder="AUTO"><br>

        <label for="trfc1">tRFC1:</label>
        <input type="text" id="trfc1" name="trfc1" placeholder="AUTO"><br>

        <label for="trfc2">tRFC2:</label>
        <input type="text" id="trfc2" name="trfc2" placeholder="AUTO"><br>

        <label for="trfcsb">tRFCSb:</label>
        <input type="text" id="trfcsb" name="trfcsb" placeholder="AUTO"><br>

        <label for="trtp">tRTP:</label>
        <input type="text" id="trtp" name="trtp" placeholder="AUTO"><br>

        <label for="trrd_l">tRRD_L:</label>
        <input type="text" id="trrd_l" name="trrd_l" placeholder="AUTO"><br>

        <label for="trrd_s">tRRD_S:</label>
        <input type="text" id="trrd_s" name="trrd_s" placeholder="AUTO"><br>

        <label for="tfaw">tFAW:</label>
        <input type="text" id="tfaw" name="tfaw" placeholder="AUTO"><br>

        <label for="twtrl">tWTRL:</label>
        <input type="text" id="twtrl" name="twtrl" placeholder="AUTO"><br>

        <label for="twtrs">tWTRS:</label>
        <input type="text" id="twtrs" name="twtrs" placeholder="AUTO"><br>

        <label for="trdrd_scl">tRDRD_SCL:</label>
        <input type="text" id="trdrd_scl" name="trdrd_scl" placeholder="AUTO"><br>

        <label for="trdrdsc">tRDRDSC:</label>
        <input type="text" id="trdrdsc" name="trdrdsc" placeholder="AUTO"><br>

        <label for="trdrdsd">tRDRDSD:</label>
        <input type="text" id="trdrdsd" name="trdrdsd" placeholder="AUTO"><br>

        <label for="trdrddd">tRDRDDD:</label>
        <input type="text" id="trdrddd" name="trdrddd" placeholder="AUTO"><br>

        <label for="twrwr_scl">tWRWR_SCL:</label>
        <input type="text" id="twrwr_scl" name="twrwr_scl" placeholder="AUTO"><br>

        <label for="twrwrsc">tWRWRSC:</label>
        <input type="text" id="twrwrsc" name="twrwrsc" placeholder="AUTO"><br>

        <label for="twrwrsd">tWRWRSD:</label>
        <input type="text" id="twrwrsd" name="twrwrsd" placeholder="AUTO"><br>

        <label for="twrwrd">tWRWRDD:</label>
        <input type="text" id="twrwrd" name="twrwrd" placeholder="AUTO"><br>

        <label for="twrrd">tWRRD:</label>
        <input type="text" id="twrrd" name="twrrd" placeholder="AUTO"><br>

        <label for="trdwr">tRDWR:</label>
        <input type="text" id="trdwr" name="trdwr" placeholder="AUTO"><br>

        <label for="gear_down_mode">Gear Down Mode:</label>
        <select id="gear_down_mode" name="gear_down_mode">
            <option value="auto">Auto</option>
            <option value="enabled">Enabled</option>
            <option value="disabled">Disabled</option>
        </select><br>

        <label for="power_down_mode">Power Down Mode:</label>
        <select id="power_down_mode" name="power_down_mode">
            <option value="auto">Auto</option>
            <option value="enabled">Enabled</option>
            <option value="disabled">Disabled</option>
        </select><br>

        <label for="author">작성자:</label>
        <input type="text" id="author" name="author" required><br>

        <label for="memo">메모:</label>
        <textarea id="memo" name="memo" required></textarea><br>


        <button type="submit">게시물 추가</button>
    </form>
</div>

</body>
</html>
