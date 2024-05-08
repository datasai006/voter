<!DOCTYPE html>
<html>

<head>
    <title>Voter Data</title>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    .filter-form {
        margin-bottom: 10px;
    }
    </style>
</head>

<body>

    <h2>Voter Data</h2>

    <!-- Filter Form -->
    <form class="filter-form">
        <label for="filter-userid">User ID:</label>
        <input type="text" id="filter-userid" name="filter-userid">
        <label for="filter-booth">Booth Number:</label>
        <input type="text" id="filter-booth" name="filter-booth">
        <button type="button" onclick="filterTable()">Filter</button>
        <button type="button" onclick="clearFilters()">Clear Filters</button>
    </form>

    <!-- Table -->
    <table id="voter-table">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Booth Number</th>
                <th>Serial Number</th>
                <th>Date and Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($voter_data as $row): ?>
            <tr>
                <td><?php echo $row['userid']; ?></td>
                <td><?php echo $row['booth_no']; ?></td>
                <td><?php echo $row['serial_no']; ?></td>
                <td><?php echo $row['datetime']; ?></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
    function filterTable() {
        var inputUserId = document.getElementById("filter-userid").value.toUpperCase();
        var inputBooth = document.getElementById("filter-booth").value.toUpperCase();
        var table = document.getElementById("voter-table");
        var rows = table.getElementsByTagName("tr");

        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var display = true;

            var userId = cells[0].textContent.toUpperCase();
            var booth = cells[1].textContent.toUpperCase();

            if (inputUserId && userId.indexOf(inputUserId) === -1) {
                display = false;
            }
            if (inputBooth && booth.indexOf(inputBooth) === -1) {
                display = false;
            }

            rows[i].style.display = display ? "" : "none";
        }
    }

    function clearFilters() {
        document.getElementById("filter-userid").value = "";
        document.getElementById("filter-booth").value = "";
        filterTable();
    }
    </script>

</body>

</html>