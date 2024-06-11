import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;

public class WaitingServlet extends HttpServlet {
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        // Check the number of logged-in users
        Integer count = (Integer) getServletContext().getAttribute("count");
        if (count != null && count == 2) {
            // If 2, redirect to the game page
            response.sendRedirect("game.jsp");
        } else {
            // If less than 2, redirect back to the waiting page
            response.sendRedirect("waiting.jsp");
        }
    }
}