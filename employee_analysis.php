<?php

// Function to read the dataset from a file
function readDataset($filename) {
    $dataset = [];
    $file = fopen($filename, "r");

    if ($file) {
        while (($line = fgets($file)) !== false) {
            $data = explode(";", trim($line));
            $employee = [
                'age' => $data[0],
                'job' => $data[1],
                'marital' => $data[2],
                'education' => $data[3],
                'default' => $data[4],
                'balance' => (int)$data[5],
                'housing' => $data[6],
                'loan' => $data[7],
                'contact' => $data[8],
                'day' => $data[9],
                'month' => $data[10],
                'duration' => $data[11],
                'campaign' => $data[12],
                'pdays' => $data[13],
                'previous' => $data[14],
                'poutcome' => $data[15],
                'y' => $data[16]
            ];
            $dataset[] = $employee;
        }
        fclose($file);
    }

    return $dataset;
}

// Function to count the number of employees
function countTotal($dataset) {
    $count = 0;

    foreach ($dataset as $employee) {
        $count++;
    }

    return $count;
}

// Function to count the number of single employees
function countSingle($dataset) {
    $count = 0;

    foreach ($dataset as $employee) {
        if ($employee['marital'] == '"single"') {
            $count++;
        }
    }

    return $count;
}

// Function to count the number of married employees
function countMarried($dataset) {
    $count = 0;

    foreach ($dataset as $employee) {
        if ($employee['marital'] == '"married"') {
            $count++;
        }
    }

    return $count;
}

// Function to count the number of divorced employees
function countDivorced($dataset) {
    $count = 0;

    foreach ($dataset as $employee) {
        if ($employee['marital'] == '"divorced"') {
            $count++;
        }
    }

    return $count;
}

// Function to filter and return the number of employees who have attained secondary education and have a blue-collar job
function filterByEducationAndJob($dataset) {
    $count = 0;

    foreach ($dataset as $employee) {
        if ($employee['education'] == '"secondary"' && $employee['job'] == '"blue-collar"') {
            $count++;
        }
    }

    return $count;
}

// Function to filter and return the number of employees who have attained secondary education and have a blue-collar job
function filterByEducationAndJob1($dataset) {
    $count = 0;

    foreach ($dataset as $employee) {
        if ($employee['education'] == '"tertiary"' && $employee['job'] == '"blue-collar"') {
            $count++;
        }
    }

    return $count;
}

// Function to filter and return the number of employees who are eligible for a loan
function filterByAgeBalanceAndLoan($dataset) {
    $count = 0;

    foreach ($dataset as $employee) {
        if ($employee['age'] == '60' && $employee['balance'] == '10000' && $employee['loan'] = '"no"') {
            $count++;
        }
    }

    return $count;
}

// Read the dataset from the file
$dataset = readDataset('employee.csv');

// Count and display the number of employees
$totalCount = countTotal($dataset);
echo "Number of Employees: " . $totalCount . PHP_EOL;

// Count and display the number of single employees
$singleCount = countSingle($dataset);
echo "Number of Single Employees: " . $singleCount . PHP_EOL;

// Count and display the number of married employees
$marriedCount = countMarried($dataset);
echo "Number of Married Employees: " . $marriedCount . PHP_EOL;

// Count and display the number of divorced employees
$divorcedCount = countDivorced($dataset);
echo "Number of Divorced Employees: " . $divorcedCount . PHP_EOL;

// Count and display the number of employees with secondary education and blue-collar job
$filteredCount = filterByEducationAndJob($dataset);
echo "Number of Employees with Secondary Education and Blue-Collar Job: " . $filteredCount . PHP_EOL;

// Count and display the number of employees with secondary education and blue-collar job
$filteredCount1 = filterByEducationAndJob1($dataset);
echo "Number of Employees with Tertiary Education and Blue-Collar Job: " . $filteredCount1 . PHP_EOL;

// Count and display the number of employees who are eligible for a loan
$filteredCount2 = filterByEducationAndJob($dataset);
echo "Number of Employees who are eligible for a loan: " . $filteredCount2 . PHP_EOL;

?>
