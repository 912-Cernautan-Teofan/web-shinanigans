/*
 * Generated by the Jasper component of Apache Tomcat
 * Version: Apache Tomcat/7.0.47
 * Generated at: 2024-06-06 15:41:16 UTC
 * Note: The last modified time of this file was set to
 *       the last modified time of the source file after
 *       generation to assist with modification tracking.
 */
package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;

public final class index_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {

  private static final javax.servlet.jsp.JspFactory _jspxFactory =
          javax.servlet.jsp.JspFactory.getDefaultFactory();

  private static java.util.Map<java.lang.String,java.lang.Long> _jspx_dependants;

  private javax.el.ExpressionFactory _el_expressionfactory;
  private org.apache.tomcat.InstanceManager _jsp_instancemanager;

  public java.util.Map<java.lang.String,java.lang.Long> getDependants() {
    return _jspx_dependants;
  }

  public void _jspInit() {
    _el_expressionfactory = _jspxFactory.getJspApplicationContext(getServletConfig().getServletContext()).getExpressionFactory();
    _jsp_instancemanager = org.apache.jasper.runtime.InstanceManagerFactory.getInstanceManager(getServletConfig());
  }

  public void _jspDestroy() {
  }

  public void _jspService(final javax.servlet.http.HttpServletRequest request, final javax.servlet.http.HttpServletResponse response)
        throws java.io.IOException, javax.servlet.ServletException {

    final javax.servlet.jsp.PageContext pageContext;
    javax.servlet.http.HttpSession session = null;
    final javax.servlet.ServletContext application;
    final javax.servlet.ServletConfig config;
    javax.servlet.jsp.JspWriter out = null;
    final java.lang.Object page = this;
    javax.servlet.jsp.JspWriter _jspx_out = null;
    javax.servlet.jsp.PageContext _jspx_page_context = null;


    try {
      response.setContentType("text/html");
      pageContext = _jspxFactory.getPageContext(this, request, response,
      			null, true, 8192, true);
      _jspx_page_context = pageContext;
      application = pageContext.getServletContext();
      config = pageContext.getServletConfig();
      session = pageContext.getSession();
      out = pageContext.getOut();
      _jspx_out = out;

      out.write("<!DOCTYPE html>\n");
      out.write("<html>\n");
      out.write("<head>\n");
      out.write("    <title>TicTacToe</title>\n");
      out.write("</head>\n");
      out.write("<body>\n");
      out.write("    <h1>TicTacToe</h1>\n");
      out.write("\n");
      out.write("    <h2>Login</h2>\n");
      out.write("    <form action=\"login\" method=\"post\">\n");
      out.write("        <label for=\"username\">Username:</label><br>\n");
      out.write("        <input type=\"text\" id=\"username\" name=\"username\"><br>\n");
      out.write("        <label for=\"password\">Password:</label><br>\n");
      out.write("        <input type=\"password\" id=\"password\" name=\"password\"><br>\n");
      out.write("        <input type=\"submit\" value=\"Login\">\n");
      out.write("    </form>\n");
      out.write("\n");
      out.write("    <h2>Register</h2>\n");
      out.write("    <form action=\"register\" method=\"post\">\n");
      out.write("        <label for=\"new_username\">Username:</label><br>\n");
      out.write("        <input type=\"text\" id=\"new_username\" name=\"new_username\"><br>\n");
      out.write("        <label for=\"new_password\">Password:</label><br>\n");
      out.write("        <input type=\"password\" id=\"new_password\" name=\"new_password\"><br>\n");
      out.write("        <input type=\"submit\" value=\"Register\">\n");
      out.write("    </form>\n");
      out.write("</body>\n");
      out.write("</html>\n");
      out.write("\n");
      out.write("<script>\n");
      out.write("    // Check if the 'registered' parameter is in the URL\n");
      out.write("    var urlParams = new URLSearchParams(window.location.search);\n");
      out.write("    if (urlParams.get('registered') === 'true') {\n");
      out.write("        // Show a popup message\n");
      out.write("        alert('Registration successful! You can now log in.');\n");
      out.write("    }\n");
      out.write("</script>");
    } catch (java.lang.Throwable t) {
      if (!(t instanceof javax.servlet.jsp.SkipPageException)){
        out = _jspx_out;
        if (out != null && out.getBufferSize() != 0)
          try { out.clearBuffer(); } catch (java.io.IOException e) {}
        if (_jspx_page_context != null) _jspx_page_context.handlePageException(t);
        else throw new ServletException(t);
      }
    } finally {
      _jspxFactory.releasePageContext(_jspx_page_context);
    }
  }
}
