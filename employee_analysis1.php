<?php

// Function to read the dataset from a file
function readDataset($filename) {
    $dataset = [];
    $file = fopen($filename, "r");

    if ($file) {
        while (($line = fgets($file)) !== false) {
            $data = explode(",", trim($line));
            $student = [
                'StudentID' => $data[0],
                'Name' => $data[1],
                'Gender' => $data[2],
                'Age' => $data[3],
                'Major' => $data[4],
                'GPA' => floatval($data[5]) // Convert GPA to float
            ];
            $dataset[] = $student;
        }
        fclose($file);
    }

    return $dataset;
}

// Function to calculate the average GPA of all students
function calculateAverageGPA($dataset) {
    $totalGPA = 0;
    $numStudents = count($dataset);

    foreach ($dataset as $student) {
        $totalGPA += $student['GPA'];
    }

    return $totalGPA / $numStudents;
}

// Function to filter and return male students
function filterMaleStudents($dataset) {
    $maleStudents = [];

    foreach ($dataset as $student) {
        if ($student['Gender'] === 'Male') {
            $maleStudents[] = $student;
        }
    }

    return $maleStudents;
}

// Read the dataset from the file
$dataset = readDataset('input.csv');

// Calculate the average GPA
$averageGPA = calculateAverageGPA($dataset);
echo "Average GPA: " . $averageGPA . PHP_EOL;

// Filter and display male students
$maleStudents = filterMaleStudents($dataset);
echo "Male Students:" . PHP_EOL;
foreach ($maleStudents as $student) {
    echo $student['StudentID'] . " | " . $student['Name'] . PHP_EOL;
}

?>
