<?php
require '../../config.php';

use app\models\Questionario;

$questionario = new Questionario;

echo json_encode($questionario->gerearGrafico());