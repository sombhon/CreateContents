<%@ page
language="java"
contentType="text/html; charset=UTF-8"
pageEncoding="UTF-8"
%>
<%@page import="ebooksellEntities.*, ebooksellDAO.* , java.sql.*"%>
<%
try {
	tbemployee tbemp = new tbemployee();
	tbemployeeDAO empdao = new tbemployeeDAO();
	tbemp = empdao.loginEmployee("sompor222@gmail.com", "admin");
	out.println(tbemp.getEmpAddress() +"ผลลัพธ์");
	empdao.closeConnection();
} catch (ClassNotFoundException | SQLException e) {
	e.printStackTrace();
}
%>