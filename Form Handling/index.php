<?php
// Start PHP block
// Initialize result variable
$result = '';
// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the first number from the form, default to 0 if not set
    $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0;
    // Get the second number from the form, default to 0 if not set
    $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : 0;
    // Get the selected operator, default to '+' if not set
    $operator = $_POST['operator'] ?? '+';
    // Perform calculation based on the selected operator
    switch ($operator) {
        case '+':
            // Addition
            $result = $num1 + $num2;
            break;
        case '-':
            // Subtraction
            $result = $num1 - $num2;
            break;
        case '*':
            // Multiplication
            $result = $num1 * $num2;
            break;
        case '/':
            // Division, check for division by zero
            $result = $num2 != 0 ? $num1 / $num2 : 'Error: Division by zero';
            break;
        default:
            // Handle invalid operator
            $result = 'Invalid operator';
    }
}
// End PHP block
?>
<!DOCTYPE html>
<!-- Declare HTML5 document -->
<html lang="en">
<head>
    <!-- Set character encoding -->
    <meta charset="UTF-8">
    <!-- Set viewport for responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Set page title -->
    <title>Styled Calculator App</title>
    <style>
        /* Style the body for background and centering */
        body {
            background: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        /* Style the calculator container */
        .calculator {
            background: #fff;
            padding: 2rem 2.5rem;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            min-width: 320px;
        }
        /* Style the calculator title */
        .calculator h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }
        /* Style number input fields */
        .calculator input[type="number"] {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
        }
        /* Style select and button elements */
        .calculator select, .calculator button {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }
        /* Style the calculate button */
        .calculator button {
            background: #0078d7;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
        }
        /* Button hover effect */
        .calculator button:hover {
            background: #005fa3;
        }
        /* Style the result display */
        .result {
            text-align: center;
            font-size: 1.2rem;
            color: #0078d7;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <!-- Calculator container -->
    <div class="calculator">
        <!-- Calculator title -->
        <h2>Calculator</h2>
        <!-- Calculator form -->
        <form method="post">
            <!-- First number input -->
            <input type="number" name="num1" step="any" placeholder="First number" required value="<?= isset($_POST['num1']) ? htmlspecialchars($_POST['num1']) : '' ?>">
            <!-- Operator selection -->
            <select name="operator">
                <option value="+" <?= (isset($_POST['operator']) && $_POST['operator'] == '+') ? 'selected' : '' ?>>+</option>
                <option value="-" <?= (isset($_POST['operator']) && $_POST['operator'] == '-') ? 'selected' : '' ?>>-</option>
                <option value="*" <?= (isset($_POST['operator']) && $_POST['operator'] == '*') ? 'selected' : '' ?>>×</option>
                <option value="/" <?= (isset($_POST['operator']) && $_POST['operator'] == '/') ? 'selected' : '' ?>>÷</option>
            </select>
            <!-- Second number input -->
            <input type="number" name="num2" step="any" placeholder="Second number" required value="<?= isset($_POST['num2']) ? htmlspecialchars($_POST['num2']) : '' ?>">
            <!-- Submit button -->
            <button type="submit">Calculate</button>
        </form>
        <!-- Display result if available -->
        <?php if ($result !== ''): ?>
            <div class="result">
                Result: <strong><?= htmlspecialchars($result) ?></strong>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
