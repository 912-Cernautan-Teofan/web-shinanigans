<!DOCTYPE html>
<html>
<head>
    <title>Tic Tac Toe</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        button {
            width: 100px;
            height: 100px;
            font-size: large;
        }
        #back-button {
            display: none;
        }
    </style>
    <script>
        function makeMove(row, col, button) {
            $.post("/game", { row: row, col: col }, function() {
                button.disabled = true;
                button.textContent = gameState.currentPlayer == 'X' ? 'X' : 'O'; // Add this line
                getGameState();
            });
        }

        function getGameState() {
            $.get("/game", function(gameState) {
                $("#turn").text(gameState.currentPlayer + "'s turn");
                for (var i = 0; i < 3; i++) {
                    for (var j = 0; j < 3; j++) {
                        var button = $("#button-" + i + "-" + j);
                        if (gameState.board[i][j] == null) {
                            // If the square is empty, enable the button
                            button.prop("disabled", false);
                            button.text(''); // Clear the button text
                        } else {
                            // If the square is not empty, disable the button and set its text
                            button.prop("disabled", true);
                            button.text(gameState.board[i][j]);
                        }
                    }
                    if(gameState.result != null) {
                        $("#back-button").show();
                        for (var i = 0; i < 3; i++) {
                            for (var j = 0; j < 3; j++) {
                                var button = $("#button-" + i + "-" + j);
                                button.prop("disabled", true);
                            }
                        }
                    }
                }
            });
        }

        $(document).ready(function() {
            getGameState();
            setInterval(getGameState, 1000);
        });
    </script>
</head>
<body>
    <h1>Let's play Tic Tac Toe!</h1>
    <h2 id="turn">X's turn</h2>
    <table class="board">
        <tr>
            <td><button id="button-0-0" data-row="0" data-col="0" onclick="makeMove(0, 0, this)"></button></td>
            <td><button id="button-0-1" data-row="0" data-col="1" onclick="makeMove(0, 1, this)"></button></td>
            <td><button id="button-0-2" data-row="0" data-col="2" onclick="makeMove(0, 2, this)"></button></td>
        </tr>
        <tr>
            <td><button id="button-1-0" data-row="1" data-col="0" onclick="makeMove(1, 0, this)"></button></td>
            <td><button id="button-1-1" data-row="1" data-col="1" onclick="makeMove(1, 1, this)"></button></td>
            <td><button id="button-1-2" data-row="1" data-col="2" onclick="makeMove(1, 2, this)"></button></td>
        </tr>
        <tr>
            <td><button id="button-2-0" data-row="2" data-col="0" onclick="makeMove(2, 0, this)"></button></td>
            <td><button id="button-2-1" data-row="2" data-col="1" onclick="makeMove(2, 1, this)"></button></td>
            <td><button id="button-2-2" data-row="2" data-col="2" onclick="makeMove(2, 2, this)"></button></td>
        </tr>
    </table>
    <a id="back-button" href="index.jsp"><button>Back to Home</button></a>
</body>
</html>