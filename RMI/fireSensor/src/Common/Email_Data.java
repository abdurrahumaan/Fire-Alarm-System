package Common;

public class Email_Data {
    
        String email=null;
        String password=null;
        
	//Email and Password of the System email
        public Email_Data getdata(){
            Email_Data ed=new Email_Data();
            ed.email="firealarmsystemds@gmail.com";
            ed.password="sliitds12345";
            
            return ed;
        }
}
