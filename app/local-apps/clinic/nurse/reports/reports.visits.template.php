<?php
    // echo "<pre>";
    // print_r(JSON_DECODE($_POST['data']));
    // echo "</pre>";

    // Check data and decode if json
    $data = isset($_POST['data']) ? json_decode($_POST['data'], true) : [];

    $fixedLevels = [
        "Nursery", "Pre-Kinder", "Kinder",
        "Grade 1", "Grade 2", "Grade 3", "Grade 4", "Grade 5", 
        "Grade 6", "Grade 7", "Grade 8", "Grade 9", "Grade 10", 
        "Grade 11", "Grade 12", "Admin", "Faculty", "Utility"
    ];

    $orderedLevels = [];
    foreach ($fixedLevels as $level) {
        $orderedLevels[$level] = $data['levelSum'][$level] ?? 0;
    }

    arsort($data['complaintsSum']); // Sort by count (descending)

    $sumPatients = array_sum($data['levelSum']);
    $medCase = $data['sumMedTrau']['Medical'];
    $trauCase = $data['sumMedTrau']['Trauma'];
    $gatepass = $data['sumGP'];
    $complaintsSum = $data['complaintsSum'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Report</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="d-flex justify-content-end" style="margin-top:50px; margin-right:350px;">
        <button onclick="printTable()" class="btn btn-primary">Print Report</button>
    </div>

    <div class="container" style="margin-top:10px;">
        <table class="table table-bordered table-striped table-hover text-center" id="tbl_MonthlyReport">
        <thead>
            <tr>
            <th scope="col" class="" colspan="10" style="font-size:24px;">Clinic Monthly Report</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Served Patients</th>
                <th>Medical Cases</th>
                <th>Trauma Cases</th>
                <th>Gate Pass Issued</th>
            </tr>
            <tr>
                <td><?php echo $sumPatients ?></td>
                <td><?php echo $medCase ?></td>
                <td><?php echo $trauCase ?></td>
                <td><?php echo $gatepass ?></td>
            </tr>

            <tr>
                <th colspan="2">Patients</th>
                <th colspan="2">Complaints</th>
            </tr>

            <?php
            // Convert objects to arrays (if they are stdClass objects)
            $orderedLevels = (array) $orderedLevels;
            $complaintsSum = (array) $complaintsSum;

            // Get the max rows needed to cover both arrays
            $maxRows = max(count($orderedLevels), count($complaintsSum));

            // Get array keys
            $levelKeys = array_keys($orderedLevels);
            $complaintKeys = array_keys($complaintsSum);

            for ($i = 0; $i < $maxRows; $i++) {
                echo "<tr>";

                // Patient Levels
                if (isset($levelKeys[$i])) {
                    $level = $levelKeys[$i];
                    echo "<td>$level</td><td>{$orderedLevels[$level]}</td>";
                } else {
                    echo "<td></td><td></td>"; // Empty cells if no more levels
                }

                // Complaints
                if (isset($complaintKeys[$i])) {
                    $complaint = $complaintKeys[$i];
                    echo "<td>$complaint</td><td>{$complaintsSum[$complaint]}</td>";
                } else {
                    echo "<td></td><td></td>"; // Empty cells if no more complaints
                }

                echo "</tr>";
            }
            ?>
        </tbody>
        </table>

        
    <script>
        function printTable() {
            let printContent = document.getElementById("tbl_MonthlyReport").outerHTML;
            let printWindow = window.open("", "", "width=800,height=600");
            printWindow.document.write("<html><head><title>Clinic Montly Report</title>");
            printWindow.document.write("<link rel='stylesheet' href='../../css/bootstrap.min.css'>");
            printWindow.document.write("</head><body>");
            printWindow.document.write("<table class='table table-bordered table-striped'>" + printContent + "</table>");
            printWindow.document.write("<div class='d-flex justify-content-start'>");
            printWindow.document.write("<div>");
            printWindow.document.write("____________________");    
            printWindow.document.write("<p>Prepared by:</p>");
            printWindow.document.write("</div>");
            printWindow.document.write("</div>");
            printWindow.document.write("<div class='d-flex justify-content-center'>");
            printWindow.document.write("<div>");
            printWindow.document.write("____________________");    
            printWindow.document.write("<p>Prepared by:</p>");
            printWindow.document.write("</div>");
            printWindow.document.write("</div>");
            printWindow.document.write("</body></html>");
            printWindow.document.close();
            printWindow.print();
        }
    </script>
    </div>
    
</body>
</html>


