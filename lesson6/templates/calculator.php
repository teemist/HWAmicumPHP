<form method="post" action="calculator.php">
    <input type="number" name="value1">
    <select name="op">
        <option value="*">Умножение</option>
        <option value="+" selected>Сложение</option>
        <option value="-">Вычитание</option>
        <option value="/">Деление</option>
    </select>
    <input type="number" name="value2">
    <input type="submit">
</form>

<?php
if(is_numeric($_POST['value1'])) $num1 = (int)$_POST['value1'];
else echo 'Передано не число';
$operation = $_POST['op'];
if(is_numeric($_POST['value2'])) $num2 = (int)$_POST['value2'];
else echo 'Передано не число';
switch ($operation) {
    case '*':
        echo $num1 * $num2;
        break;
    case '/':
        if ($num1 === 0 || $num2 === 0) echo 'zero division detected';
        echo $num1 / $num2;
        break;
    case '+':
        echo $num1 + $num2;
        break;
    case '-':
        echo $num1 - $num2;
        break;
}
?>
