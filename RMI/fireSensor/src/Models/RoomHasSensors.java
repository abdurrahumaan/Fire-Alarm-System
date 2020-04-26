package Models;

import java.io.Serializable;

public class RoomHasSensors implements Serializable{
    
    private int rhs_id;
    private int room_id;
    private int sensor_id;


    public RoomHasSensors() {}

    public RoomHasSensors(int rhs_id, int room_id, int sensor_id) {
        this.rhs_id = rhs_id;
        this.room_id = room_id;
        this.sensor_id = sensor_id;
    }

    public int getRhs_id() {
        return rhs_id;
    }

    public void setRhs_id(int rhs_id) {
        this.rhs_id = rhs_id;
    }

    public int getRoom_id() {
        return room_id;
    }

    public void setRoom_id(int room_id) {
        this.room_id = room_id;
    }

    public int getSensor_id() {
        return sensor_id;
    }

    public void setSensor_id(int sensor_id) {
        this.sensor_id = sensor_id;
    }

}
