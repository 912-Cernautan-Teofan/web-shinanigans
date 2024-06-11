import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.nio.file.*;

public class LoginServlet extends HttpServlet {
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String username = request.getParameter("username");
        String password = request.getParameter("password");

        Path path = Paths.get("accounts.txt");
        try (BufferedReader reader = Files.newBufferedReader(path)) {
            String line;
            while ((line = reader.readLine()) != null) {
                String[] parts = line.split(",");
                if (parts.length == 2 && parts[0].equals(username) && parts[1].equals(password)) {
                    // If valid, check the number of logged-in users
                    Integer count = (Integer) getServletContext().getAttribute("count");
                    if (count == null) {
                        count = 0;
                    }
                    if (count < 2) {
                        // If less than 2, increment the count and show the waiting message
                        getServletContext().setAttribute("count", count + 1);
                        response.sendRedirect("waiting.jsp");
                    } else {
                        // If 2, show an error message
                        response.sendRedirect("index.jsp?error=Game in progress");
                    }
                    return;
                }
            }
        } catch (IOException e) {
            // Handle the exception
            response.sendError(HttpServletResponse.SC_INTERNAL_SERVER_ERROR, "An error occurred while processing your request");
            return;
        }

        // If not valid, redirect back to the login page with an error message
        response.sendRedirect("index.jsp?error=Invalid username or password");
    }
}