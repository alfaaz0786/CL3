// Import required java libraries
import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

// Extend HttpServlet class
public class BoothsAlgorithm extends HttpServlet {
 
   public void doGet(HttpServletRequest request, HttpServletResponse response)
      throws ServletException, IOException 
      {
      
        // Set response content type
        response.setContentType("text/html");

        PrintWriter out = response.getWriter();
        String title = "Booth's Multiplication";
        String docType ="<!doctype html public \"-//w3c//dtd html 4.0 " + "transitional//en\">\n";
            
        int first_num = Integer.parseInt(request.getParameter("first_num"));
        int second_num =Integer.parseInt(request.getParameter("second_num"));
        int ans= multiply(first_num,second_num);

        out.println(docType +
            "<html>\n" +
                "<head><title>" + title + "</title></head>\n" +
                "<body>\n" +
                "<h1 align = \"center\">" + title + "</h1>\n" +
                "<ul>\n" +
                    "  <li><b>Answer is </b>: "
                    + ans + "\n" +
                "</ul>\n" +
                "</body></html>"
        );
   }


    // Booths Algorithm
    public int multiply(int n1, int n2)
    {
        int[] m = binary(n1);
        int[] m1 = binary(-n1);
        int[] r = binary(n2);        
        int[] A = new int[9];
        int[] S = new int[9];
        int[] P = new int[9];        
        for (int i = 0; i < 4; i++)
        {
            A[i] = m[i];
            S[i] = m1[i];
            P[i + 4] = r[i];
        }
        for (int i = 0; i < 4; i++)
        {
            if (P[7] == 0 && P[8] == 0);
                // do nothing            
            else if (P[7] == 1 && P[8] == 0)
                add(P, S);                            
            else if (P[7] == 0 && P[8] == 1)
                add(P, A);            
            else if (P[7] == 1 && P[8] == 1);
                // do nothing
            rightShift(P);
        }
        return getDecimal(P);
    }
    /** Function to get Decimal equivalent of P **/
    public int getDecimal(int[] B)
    {
        int p = 0;
        int t = 1;
        for (int i = 7; i >= 0; i--, t *= 2)
            p += (B[i] * t);
        if (p > 64)
            p = -(256 - p);
        return p;        
    }
    /** Function to right shift array **/
    public void rightShift(int[] A)
    {        
        for (int i = 8; i >= 1; i--)
            A[i] = A[i - 1];        
    }
    /** Function to add two binary arrays **/
    public void add(int[] A, int[] B)
    {
        int carry = 0;
        for (int i = 8; i >= 0; i--)
        {
            int temp = A[i] + B[i] + carry;
            A[i] = temp % 2;
            carry = temp / 2;
        }        
    }
    /** Function to get binary of a number **/
    public int[] binary(int n)
    {
        int[] bin = new int[4];
        int ctr = 3;
        int num = n;
        /** for negative numbers 2 complment **/
        if (n < 0)
            num = 16 + n;
        while (num != 0)
        {
            bin[ctr--] = num % 2;
            num /= 2;
        }
        return bin;
    }
}