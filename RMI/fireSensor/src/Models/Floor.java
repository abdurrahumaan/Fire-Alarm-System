package Models;

import java.io.Serializable;

public class Floor implements Serializable{
    public int id;
    public String no;
    public int user;

    public Floor() {
    }

    public Floor(int id, String no, int user) {
        this.id = id;
        this.no = no;
        this.user = user;
    }

    public int getId() {
        return id;
    }

    public String getNo() {
        return no;
    }

    public int getUser() {
        return user;
    }

    public void setNo(String no) {
        this.no = no;
    }

    public void setUser(int user) {
        this.user = user;
    }

}
