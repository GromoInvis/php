<?php
// Подключаем объявление класса игры.
require_once(dirname(__FILE__) . '/xotry2(1).php');

session_start();

// Получаем из сессии текущую игру.
// Если игры еще нет, создаём новую.
$game = isset($_SESSION['game']) ? $_SESSION['game'] : null;
if (!$game || !is_object($game)) {
    $game = new TicTacGame();
}

// Обрабатываем запрос пользователя, выполняя нужное действие.
$params = $_GET + $_POST;
if (isset($params['action'])) {
    $action = $params['action'];

    if ($action == 'move') {
        // Обрабатываем ход пользователя.
        $game->makeMove((int)$params['x'], (int)$params['y']);
    } else if ($action == 'newGame') {
        // Пользователь решил начать новую игру.
        $game = new TicTacGame();
    }
}
// Добавляем вновь созданную игру в сессию.
$_SESSION['game'] = $game;


// Отображаем текущее состояние игры в виде HTML страницы.
$width = $game->getFieldWidth();
$height = $game->getFieldHeight();
$field = $game->getField();
$winnerCells = $game->getWinnerCells();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" version="XHTML+RDFa 1.0" dir="ltr">

<head profile="http://www.w3.org/1999/xhtml/vocab">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <center>
        <!-- Отображаем состояние игры и игровое поле. -->

        <!-- CSS-стили, задающие внешний вид элементов HTML. -->
        <style type="text/css">
            .ticTacField--center {
                display: flex;
                justify-content: center;
            }

            .ticTacField {
                overflow: hidden;
                align-items: center;
                justify-content: center;
            }

            .ticTacRow {
                clear: both;
            }

            .ticTacCell {
                float: left;
                border: 1px solid #ccc;
                width: 200px;
                height: 200px;
                position: relative;
                text-align: center;
                font-size: 200px;
                /* Increase font size */
            }

            .ticTacCell a {
                position: absolute;
                left: 0;
                top: 0;
                right: 0;
                bottom: 0
            }

            .ticTacCell a:hover {
                background: #aaa;
            }

            .ticTacCell.winner {
                background: #f00;
            }

            .icon {
                display: inline-block;
            }

            .player1:after {
                content: 'X';
            }

            .player2:after {
                content: 'O';
            }
        </style>

        <?php if ($game->getCurrentPlayer()) { ?>
            <!-- Отображаем приглашение сделать ход. -->
            Ход делает игрок
            <div class="icon player<?php echo $game->getCurrentPlayer() ?>"></div>...
        <?php } ?>

        <?php if ($game->getWinner()) { ?>
            <!-- Отображаем сообщение о победителе -->
            Победил игрок
            <div class="icon player<?php echo $game->getWinner() ?>"></div>!
        <?php } ?>

        <!-- Рисуем игровое поле, отображая сделанные ходы
и подсвечивая победившую комбинацию. -->
        <div class="ticTacField--center">
            <div class="ticTacField">
                <?php for ($y = 0; $y < $height; $y++) { ?>
                    <div class="ticTacRow">
                        <?php for ($x = 0; $x < $width; $x++) {
                            // $player - игрок, сходивший в эту клетку :), или null, если клетка свободна.
                            // $winner - флаг, означающий, что эта клетка должна быть подсвечена при победе.
                            $player = isset($field[$x][$y]) ? $field[$x][$y] : null;
                            $winner = isset($winnerCells[$x][$y]);
                            $class = ($player ? ' player' . $player : '') . ($winner ? ' winner' : '');
                        ?>
                            <div class="ticTacCell<?php echo $class ?>">
                                <?php if (!$player) { ?>
                                    <!-- Клетка свободна. Отображаем здесь ссылку,
                        на которую нужно кликнуть для совершения хода. -->
                                    <a href="?action=move&amp;x=<?php echo $x ?>&amp;y=<?php echo $y ?>"></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <br /><a href="?action=newGame">Начать новую игру</a>
        <br> <a href='index.html'>Назад</a>
    </center>
</body>

</html>