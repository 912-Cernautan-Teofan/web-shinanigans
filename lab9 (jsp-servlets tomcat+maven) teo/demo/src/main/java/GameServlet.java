import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import com.google.gson.Gson;
import java.io.IOException;
import javax.servlet.ServletException;

@WebServlet("/game")
public class GameServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    private String currentPlayer = "X";
    private String[][] board = new String[3][3];

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String result = checkWinner();
        response.setContentType("application/json");
        response.getWriter().write(new Gson().toJson(new GameState(currentPlayer, board, result)));
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        int row = Integer.parseInt(request.getParameter("row"));
        int col = Integer.parseInt(request.getParameter("col"));

        board[row][col] = currentPlayer;
        String winner = checkWinner();
        if (winner != null) {
            response.getWriter().write(new Gson().toJson(new GameState(winner, board, winner)));
            return;
        }
        currentPlayer = (currentPlayer.equals("X")) ? "O" : "X";

        response.setStatus(HttpServletResponse.SC_OK);
    }

    private String checkWinner() {
        for (int i = 0; i < 3; i++) {
            if (board[i][0] != null && board[i][0].equals(board[i][1]) && board[i][0].equals(board[i][2])) {
                return board[i][0]; // Winner in a row
            }
            if (board[0][i] != null && board[0][i].equals(board[1][i]) && board[0][i].equals(board[2][i])) {
                return board[0][i]; // Winner in a column
            }
        }
        if (board[0][0] != null && board[0][0].equals(board[1][1]) && board[0][0].equals(board[2][2])) {
            return board[0][0]; // Winner in a diagonal
        }
        if (board[0][2] != null && board[0][2].equals(board[1][1]) && board[0][2].equals(board[2][0])) {
            return board[0][2]; // Winner in the other diagonal
        }

        // Check for a draw
        boolean isDraw = true;
        for (int i = 0; i < 3; i++) {
            for (int j = 0; j < 3; j++) {
                if (board[i][j] == null) {
                    isDraw = false;
                    break;
                }
            }
            if (!isDraw) {
                break;
            }
        }
        if (isDraw) {
        return "Draw";
    }

        return null; // No winner yet
    }
}

class GameState {
    String currentPlayer;
    String[][] board;
    String result;

    GameState(String currentPlayer, String[][] board, String result) {
        this.currentPlayer = currentPlayer;
        this.board = board;
        this.result = result;
    }
}