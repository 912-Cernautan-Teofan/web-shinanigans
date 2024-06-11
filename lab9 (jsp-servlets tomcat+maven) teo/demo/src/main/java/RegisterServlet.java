import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;

public class RegisterServlet extends HttpServlet {
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String username = request.getParameter("new_username");
        String password = request.getParameter("new_password");

        // Validate the username and password
        if (username == null || username.isEmpty() || password == null || password.isEmpty()) {
            // Handle invalid input
            response.sendError(HttpServletResponse.SC_BAD_REQUEST, "Invalid username or password");
            return;
        }

        // Write the username and password to the file
        try (FileWriter writer = new FileWriter("accounts.txt", true)) {
            writer.write(username + "," + password + "\n");
        } catch (IOException e) {
            // Handle the exception
            response.sendError(HttpServletResponse.SC_INTERNAL_SERVER_ERROR, "An error occurred while processing your request");
            return;
        }

        // Redirect the user to the login page
        response.sendRedirect("index.jsp?registered=true");
    }
}