package Controllers;

import Common.httpJson;
import Models.User;
import firesensor.RMIInterface;
import firesensor.Server;
import java.rmi.NotBoundException;
import java.rmi.RemoteException;
import java.rmi.registry.LocateRegistry;
import java.rmi.registry.Registry;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

public class UserController {

    private static RMIInterface look_up;
    public static int user_id;
    public static String user_email;

    public UserController() throws RemoteException, NotBoundException {
        Registry reg = LocateRegistry.getRegistry("localhost", 9999);
        look_up = (RMIInterface) reg.lookup("hi_server");
    }
    //login user
    public int loginUser(String username, String password) {

        String resp = new httpJson().jsonRequest("http://127.0.0.1:8000/api/authadmin?un=" + username + "&pw=" + password);
        System.out.println("----------------------------------------------------");
        if (resp != null) {
            try {
                JSONParser jsonParser = new JSONParser();
                JSONObject responseObj = (JSONObject) jsonParser.parse(resp);
                System.out.println(responseObj.get("code"));
                if (Integer.parseInt(responseObj.get("code").toString()) == 1) {
                    JSONObject newsensor = (JSONObject) responseObj.get("user");
                    user_id = Integer.parseInt(newsensor.get("id").toString());
                    user_email = newsensor.get("email").toString();
                    return 1;
                } else {
                    System.out.println(responseObj.get("msg"));
                }

            } catch (Exception e) {
                System.out.println("Server Exception: " + e);
            }
        }

        return 0;

    }
    //register user
    public int registerUser(String username, String email, String password, String mobileNo, int userType) {

        String resp = new httpJson().jsonRequest("http://127.0.0.1:8000/api/regadmin?un="+username+"&pw="+password+"&email="+email+"&mno="+mobileNo);
        System.out.println("http://127.0.0.1:8000/api/regadmin?un="+username+"&pw="+password+"&email="+email+"&mno="+mobileNo);
        System.out.println("----------------------------------------------------");
        if (resp != null) {
            try {
                JSONParser jsonParser = new JSONParser();
                JSONObject responseObj = (JSONObject) jsonParser.parse(resp);
                System.out.println(responseObj.get("code"));
                if (Integer.parseInt(responseObj.get("code").toString()) == 1) {
                    JSONObject newsensor = (JSONObject) responseObj.get("user");
                    return 1;
                } else {
                    System.out.println("");
                }

            } catch (Exception e) {
                System.out.println("Server Exception: " + e);
            }
        }

        return 0;

    }
}
