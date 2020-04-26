package Models;

import java.io.Serializable;

public class Room implements Serializable{
    
    public int room_id;
    public String room_no;
    public int user_id;
    public int floor_id;

    public Room() {
    }

    public Room(int room_id, String room_no, int user_id, int floor_id) {
        this.room_id = room_id;
        this.room_no = room_no;
        this.user_id = user_id;
        this.floor_id = floor_id;
    }

    public int getRoom_id() {
        return room_id;
    }

    public String getRoom_no() {
        return room_no;
    }

    public int getUser_id() {
        return user_id;
    }

    public int getFloor_id() {
        return floor_id;
    }

    public void setRoom_id(int room_id) {
        this.room_id = room_id;
    }

    public void setRoom_no(String room_no) {
        this.room_no = room_no;
    }

    public void setUser_id(int user_id) {
        this.user_id = user_id;
    }

    public void setFloor_id(int floor_id) {
        this.floor_id = floor_id;
    }
}
