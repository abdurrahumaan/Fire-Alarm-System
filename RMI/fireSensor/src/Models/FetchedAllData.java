package Models;

import java.io.Serializable;

public class FetchedAllData implements Serializable{
    
    private int index;
    private String floor;
    private String sensor;
    private String smoke;
    private String co2;
    private String room;
    private String status_val;
    private String status_color;

    public FetchedAllData() {
    }

    public FetchedAllData(int index, String floor, String sensor, String smoke, String co2, String room, String status_val, String status_color) {
        this.index = index;
        this.floor = floor;
        this.sensor = sensor;
        this.smoke = smoke;
        this.co2 = co2;
        this.room = room;
        this.status_val = status_val;
        this.status_color = status_color;
    }

    public int getIndex() {
        return index;
    }

    public void setIndex(int index) {
        this.index = index;
    }

    public String getFloor() {
        return floor;
    }

    public void setFloor(String floor) {
        this.floor = floor;
    }

    public String getSensor() {
        return sensor;
    }

    public void setSensor(String sensor) {
        this.sensor = sensor;
    }

    public String getSmoke() {
        return smoke;
    }

    public void setSmoke(String smoke) {
        this.smoke = smoke;
    }

    public String getCo2() {
        return co2;
    }

    public void setCo2(String co2) {
        this.co2 = co2;
    }

    public String getRoom() {
        return room;
    }

    public void setRoom(String room) {
        this.room = room;
    }

    public String getStatus_val() {
        return status_val;
    }

    public void setStatus_val(String status_val) {
        this.status_val = status_val;
    }

    public String getStatus_color() {
        return status_color;
    }

    public void setStatus_color(String status_color) {
        this.status_color = status_color;
    }
    
    
}
